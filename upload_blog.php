<?php
@include 'connect.php';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO blogs (title, description, image, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $description, $image, $date);
    // Set parameters and execute
    $title = $_POST['blogTitle'];
    $description = $_POST['blogDescription'];
    $image = basename($_FILES["blogImage"]["name"]);
    $date = $_POST['blogDate'];
    // Upload image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["blogImage"]["name"]);
    move_uploaded_file($_FILES["blogImage"]["tmp_name"], $target_file);
    // Execute SQL
    if ($stmt->execute() === TRUE) {
        echo "Blog uploaded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Upload</title>
    <style>body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    
    h1 {
        text-align: center;
        margin-top: 2rem;
    }
    
    form {
        width: 50%;
        margin: 0 auto;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    label {
        display: block;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
    
    input[type="text"],
    input[type="date"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    textarea {
        resize: vertical;
    }
    
    button[type="submit"] {
        padding: 0.5rem 1rem;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    button[type="submit"]:hover {
        background-color: #0056b3;
    }
    </style>
</head>
<body>
    <h1>Upload a New Blog</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="blogTitle">Blog Title</label>
            <input type="text" id="blogTitle" name="blogTitle" required>
        </div>
        <div class="form-group">
            <label for="blogDescription">Blog Description</label>
            <textarea id="blogDescription" name="blogDescription" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="blogImage">Blog Image</label>
            <input type="file" id="blogImage" name="blogImage" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="blogDate">Date</label>
            <input type="date" id="blogDate" name="blogDate" required>
        </div>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
