<?php
// Include your database connection code here
// For example, include 'db_connection.php'
include 'connect.php';

// Check if the article id is set in the URL
if(isset($_GET['id'])) {
    $article_id = $_GET['id'];

    // Fetch article details based on the id
    $selectQuery = "SELECT * FROM blogs WHERE id = $article_id";
    $result = mysqli_query($conn, $selectQuery);

    // Check if article exists
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Article not found!";
        exit();
    }
} else {
    echo "Article id not provided!";
    exit();
}

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection in $con

    // Sanitize user input (prevent SQL injection)
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Insert comment into the database
    $insertQuery = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    mysqli_query($conn, $insertQuery);

    // Redirect back to the article page or show a success message
    echo '<script>window.location.href = "blog1.php";</script>';
    
    exit();
}

// Fetch comments from the database
$selectCommentsQuery = "SELECT * FROM comments";
$commentsResult = mysqli_query($conn, $selectCommentsQuery);
?>

// Fetch comments from the database
$selectQuery = "SELECT * FROM comments";
$result = mysqli_query($conn, $selectQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .article-description {
            white-space: pre-line;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />

    <title>Blog1</title>
    <link rel="stylesheet" href="assets\css\header_footer-css.php">

    <link rel="stylesheet" href="assets\css\blog-css.php">
    <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
</head>

<body>
    <?php include 'header.php' ?>


    <section>
        <article>
        <h2><?php echo $row['title']; ?></h2><br>
        <p class="article-description"><?php echo $row['description']; ?></p>
            <!-- Add these lines inside the <section> tag, after the article content -->
            <div class="share-section">
                <h3>Share this article:</h3> <br>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://spacekraft.in/blog1.php" target="_blank"><i class="fab fa-facebook fa-2x" style="color: #3b5998;"></i></a>
                <a href="https://twitter.com/intent/tweet?url=https://spacekraft.in/blog1.php&text=Check out this article!" target="_blank"><i class="fab fa-twitter fa-2x" style="color: #1da1f2;"></i></a>
                <a href="https://api.whatsapp.com/send?text=Check out this article: https://spacekraft.in/blog1.php" target="_blank"><i class="fab fa-whatsapp fa-2x" style="color: #25d366;"></i></a>
                <a href="https://www.instagram.com/your-instagram-account" target="_blank"><i class="fab fa-instagram fa-2x" style="color: #c32aa3;"></i></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://spacekraft.in/blog1.php" target="_blank"><i class="fab fa-linkedin fa-2x" style="color: #0077b5;"></i></a>
                <!-- Add more share links for other platforms as needed -->
            </div>

            <div class="comment-section">
                <h3>Leave a Comment:</h3>
                <form class="comment-form" action="" method="post">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="comment">Your Comment:</label>
                    <textarea id="comment" name="comment" rows="4" required></textarea>

                    <input type="submit" value="Submit Comment">
                </form>

                </div>
               
            


            </div>

        </article>
        <h4 style="text-align: center;">RELATED BLOG</h4>
        <div class="related-blogs">

            <div class="blog-box">
                <h3>The Rise of Pop-Up Culture in India: A Closer Look at Pop-Up Spaces</h3>
                <p>In recent years, India has witnessed a flourishing of the pop-up culture, a trend that's transforming the retail and business landscape. Pop-up events, shops, and experiences are temporary, yet impactful, providing a fresh and dynamic approach to traditional retail. One of the crucial catalysts behind this burgeoning movement is the availability of short-term rental spaces. Let's delve into the compelling world of pop-up culture and the pivotal role short-term rentals play in its success.</p>
                <a href="blog2.php">Read More</a>
            </div>

            <div class="blog-box">
                <h3>Pop-Up Shop Strategies And Marketing Tactics for Success in the Indian Business Landscape</h3>
                <p>In the bustling landscape of Indian commerce, where innovation and dynamism reign supreme, the phenomenon of pop-up shops has emerged as a game-changer. Pop-up shops are temporary retail spaces that offer a unique and engaging shopping experience to customers. This trend has gained significant traction in recent years, proving to be a potent strategy for businesses to boost brand visibility, drive sales, and test the market. Let's unravel the essential strategies and marketing tactics to ensure a successful pop-up venture in India.
                </p>
                <a href="blog3.php">Read More</a>
            </div>
        </div>
        <!-- More articles go here -->
    </section>

    <?php include 'footer.php' ?>
</body>

</html>