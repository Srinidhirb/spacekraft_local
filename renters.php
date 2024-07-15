<?php
// Include your database connection file
@include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceKraft</title>
    <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <link rel="stylesheet" href="assets\css\header_footer-css.php">
    <link rel="stylesheet" href="assets\css\renters-css.php">
    <style>
        .banner {
margin: 65px 0 35px;
position: relative;
width: 100%;
height: 83vh;
/* Full height of the viewport */
background: url('assets/img/renters1.jpg') no-repeat center/cover;

display: flex;
justify-content: center;
align-items: center;
text-align: center;
color: white;
}
.marketing-space {
position: relative;
width: 100%;
max-height: 480px;
height: 50vh;
background-image: url('assets/img/renters3.jpg');
/* Update path to your image */
background-size: cover;
background-position: center;
display: flex;
justify-content: center;
align-items: center;
text-align: center;
color: white;
margin: 0 0 70px 0;
}
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="banner">
        <div class="banner-content">
            <h1>Carving Real-World Buzz For Your Brand?</h1>
            <a href="find.php" class="button">Find Your Ideal Space</a>
        </div>
    </div>
    <div class="container">
        <div class="container_header">
            <h1>Here's why you'll love us</h1>
        </div>
        <div class="features">
            <div class="feature">
                <svg width="30" height="34" viewBox="0 0 30 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.9998 11.3335L13.5668 17.8157C13.3227 18.0616 12.927 18.0616 12.6829 17.8157L9.99984 15.1121M8.33317 1.3335H21.6665C25.3484 1.3335 28.3332 4.31826 28.3332 8.00016V21.3335C28.3332 23.4319 27.3452 25.4078 25.6665 26.6668L18.9998 31.6668C16.6295 33.4446 13.3702 33.4446 10.9998 31.6668L4.33317 26.6668C2.65446 25.4078 1.6665 23.4319 1.6665 21.3335V8.00016C1.6665 4.31826 4.65127 1.3335 8.33317 1.3335Z" stroke="#222222" stroke-width="2" stroke-linecap="round" />
                </svg>

                <h3>EFFORTLESS RENTALS</h3>
                <p>Find your ideal space in minutes, no hassle guaranteed.</p>
            </div>
            <div class="feature">
                <svg width="30" height="36" viewBox="0 0 30 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.6665 8.00016C3.14799 9.66683 7.88873 13.0002 14.9998 13.0002C22.1109 13.0002 26.8517 9.66683 28.3332 8.00016M11.6665 13.0002L10.0008 34.6544C10.0008 34.6549 10.001 34.6552 10.0014 34.6554L10.0027 34.6561C10.0032 34.6563 10.0038 34.6561 10.004 34.6556C10.8404 32.4185 13.0032 24.6668 14.9998 24.6668C16.9965 24.6668 19.1592 32.4185 19.9956 34.6556C19.9958 34.6561 19.9964 34.6563 19.997 34.6561L19.9983 34.6554C19.9987 34.6552 19.9989 34.6549 19.9989 34.6544L18.3332 13.0002M18.3332 4.66683C18.3332 6.50778 16.8408 8.00016 14.9998 8.00016C13.1589 8.00016 11.6665 6.50778 11.6665 4.66683C11.6665 2.82588 13.1589 1.3335 14.9998 1.3335C16.8408 1.3335 18.3332 2.82588 18.3332 4.66683Z" stroke="#222222" stroke-width="2" stroke-linecap="round" />
                </svg>

                <h3>CONCIERGE SERVICE</h3>
                <p>Our friendly pros are here to help, every step of the way.</p>
            </div>
            <div class="feature">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.6659 4.8335L17.9392 2.53576C19.8918 0.583134 23.0576 0.583134 25.0102 2.53576C26.9629 4.48838 26.9629 7.6542 25.0102 9.60682L17.9392 16.6779C15.9866 18.6305 12.8207 18.6305 10.8681 16.6779M12.3326 22.3335L9.60585 25.0112C7.65322 26.9638 4.4874 26.9638 2.53478 25.0112C0.582157 23.0586 0.582157 19.8928 2.53478 17.9402L9.60585 10.8691C11.5585 8.91647 14.7243 8.91647 16.6769 10.8691" stroke="#111111" stroke-width="2" stroke-linecap="round" />
                </svg>

                <h3>INSTANT CONNECTION</h3>
                <p>Connect directly with space owners and seal the deal in a flash.</p>
            </div>
            <div class="feature">
                <svg width="30" height="36" viewBox="0 0 30 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.6665 8.00016C3.14799 9.66683 7.88873 13.0002 14.9998 13.0002C22.1109 13.0002 26.8517 9.66683 28.3332 8.00016M11.6665 13.0002L10.0008 34.6544C10.0008 34.6549 10.001 34.6552 10.0014 34.6554L10.0027 34.6561C10.0032 34.6563 10.0038 34.6561 10.004 34.6556C10.8404 32.4185 13.0032 24.6668 14.9998 24.6668C16.9965 24.6668 19.1592 32.4185 19.9956 34.6556C19.9958 34.6561 19.9964 34.6563 19.997 34.6561L19.9983 34.6554C19.9987 34.6552 19.9989 34.6549 19.9989 34.6544L18.3332 13.0002M18.3332 4.66683C18.3332 6.50778 16.8408 8.00016 14.9998 8.00016C13.1589 8.00016 11.6665 6.50778 11.6665 4.66683C11.6665 2.82588 13.1589 1.3335 14.9998 1.3335C16.8408 1.3335 18.3332 2.82588 18.3332 4.66683Z" stroke="#222222" stroke-width="2" stroke-linecap="round" />
                </svg>

                <h3>LAUNCH YOUR BRAND</h3>
                <p>Open your doors and watch your brand take flight.</p>
            </div>
        </div>
        <div class="main-content">
            <div class="text">
                <h2>With SpaceKraft, <br> renting is a breeze!</h2>
                <p>Forget long leases and confusing contracts. SpaceKraft is your secret weapon!</p>
                <p>We're the easiest way to rent short-term retail spaces, pop-up shops, work studios, and more for your brand marketing. SpaceKraft is your secret weapon!</p>
                <a href="find.php" class="button">Get Started</a>
            </div>
            <img src="assets/img/renters2.jpg" alt="Workspace">
        </div>
    </div>
    <div class="marketing-space">
        <div class="content">
            <h1>Spark Instant Brand Buzz!</h1>
            <p> <a href="find.php">Find your perfect marketing space now →</a></p>

        </div>
    </div>
    <section class="trusted-by">
        <span> <img src="assets/trusted_logo/trust.png" alt="" width="40px" height="40px">
            <h2> Trusted By</h2>
        </span>
        <div class="logos">
            <a class="logo-container" href="https://hermoneytalks.com/" target="_blank"> <img src="assets/trusted_logo/herm.png" alt="Company 3 Logo"></a>
            <a class="logo-container" href="https://www.linkedin.com/company/gold-leaf-hospitality-consulting/?originalSubdomain=in" target="_blank"> <img src="assets/trusted_logo/gold_leaf.jpeg" alt="Company 2 Logo"></a>
            <a class="logo-container" href="https://anibee.in" target="_blank"> <img src="assets/trusted_logo/anibee.jpg" alt="Company 1 Logo"></a>

            <a class="logo-container" href="https://raissa.in" target="_blank"> <img src="assets/trusted_logo/raissa.jpg" alt="Company 4 Logo"></a>

        </div>
    </section>
    <?php include 'footer.php' ?>
</body>

</html>