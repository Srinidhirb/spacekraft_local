<?php
@include 'connect.php';

// Handle edit form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_submit"])) {
  $id = $_POST["id"];
  $title = $_POST["title"];
  $description = $_POST["description"];
  $image = $_POST["image"]; // Default to existing image path

  // Check if a new file has been uploaded
  if (isset($_FILES["new_image"]) && $_FILES["new_image"]["error"] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["new_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES["new_image"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      // if everything is ok, try to upload file
      if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $target_file)) {
        $image = $target_file;
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }

  $sql = $conn->prepare("UPDATE blogs SET title=?, description=?, image=? WHERE id=?");
  $sql->bind_param("sssi", $title, $description, $image, $id);

  if ($sql->execute() === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  $sql->close();
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete_id"])) {
  $id = $_GET["delete_id"];

  $sql = $conn->prepare("DELETE FROM blogs WHERE id=?");
  $sql->bind_param("i", $id);

  if ($sql->execute() === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  $sql->close();
}

// Fetch blog posts
$sql = "SELECT id, title, description, image, date FROM blogs";
$result = $conn->query($sql);

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
  <title>Blog Dashboard</title>
  <style>
    /* styles.css */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #333;
      overflow: hidden;
    }

    .navbar-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 20px;
    }

    .navbar-brand {
      color: white;
      text-decoration: none;
      font-size: 24px;
    }

    .navbar-nav {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .nav-item {
      margin-left: 20px;
    }

    .nav-link {
      color: white;
      text-decoration: none;
      font-size: 18px;
    }

    .nav-link:hover {
      text-decoration: underline;
    }

    .container {
      padding: 20px;
    }

    .card {
      background: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin: 10px 0;
      padding: 20px;
      max-width: 300px;
      width: 35%;
      height: 350px;
    }

    .card h2 {
      margin: 0 0 10px;
      font-size: 24px;
    }

    .card p {
      font-size: 16px;
      color: #555;
    }

    .card img {
      max-width: 300px;
      width: 100%;
    }

    .edit-btn,
    .delete-btn {
      background-color: #007BFF;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 10px 2px;
      cursor: pointer;
      border-radius: 5px;
    }

    .delete-btn {
      background-color: #DC3545;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 500px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    label {
      display: block;
      margin: 10px 0 5px;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      margin: 5px 0 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    #viewPosts {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      gap: 25px;
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="#" class="navbar-brand">Blog Dashboard</a>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="upload_blog.php" class="nav-link">Add Post</a></li>
        <li class="nav-item"><a href="#viewPosts" class="nav-link">View Posts</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h2>View Posts</h2>
    <section id="viewPosts">

      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='card'>";
          echo "<h4>" . htmlspecialchars($row["title"]) . "</h4>"; // Output title safely

          echo "<img src='" . htmlspecialchars($row["image"]) . "' alt='Blog Image'>"; // Display image with correct path
          echo "<p>" . htmlspecialchars($row["date"]) . "</p>"; // Output date safely
          echo "<button class='edit-btn' onclick='editPost(" . $row["id"] . ", \"" . addslashes($row["title"]) . "\", \"" . addslashes($row["description"]) . "\", \"" . addslashes($row["image"]) . "\")'>Edit</button>";
          echo "<button class='delete-btn' onclick='deletePost(" . $row["id"] . ")'>Delete</button>";
          echo "</div>";
        }
      } else {
        echo "0 results";
      }
      ?>
    </section>
  </div>

  <!-- Edit Post Modal -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Edit Post</h2>
      <form id="editForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <input type="hidden" id="edit_id" name="id">
        <label for="edit_title">Title:</label>
        <input type="text" id="edit_title" name="title" required>
        <label for="edit_description">Description:</label>
        <textarea id="edit_description" name="description" required></textarea>
        <label for="edit_image">Current Image:</label>
        <input type="text" id="edit_image" name="image" required>
        <label for="new_image">Upload New Image:</label>
        <input type="file" id="new_image" name="new_image">
        <button type="submit" name="edit_submit">Save Changes</button>
      </form>

    </div>
  </div>

  <script>
    function editPost(id, title, description, image) {
      document.getElementById('edit_id').value = id;
      document.getElementById('edit_title').value = title;
      document.getElementById('edit_description').value = description;
      document.getElementById('edit_image').value = image;
      document.getElementById('editModal').style.display = 'block';
    }

    function deletePost(id) {
      if (confirm('Are you sure you want to delete this post?')) {
        window.location.href = 'abc.php?delete_id=' + id;
      }
    }

    // Close modal
    var modal = document.getElementById('editModal');
    var span = document.getElementsByClassName('close')[0];
    span.onclick = function() {
      modal.style.display = 'none';
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }
  </script>
</body>

</html>