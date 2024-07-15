<?php if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-WXVP8RTRY0');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets\css\resources-css.php">
    <link rel="stylesheet" href="assets\css\header_footer-css.php">
</head>

<body>

    <?php include 'header.php' ?>

    <div class="res-cont">
        <span class="span">Latest Updates</span><br />
        <div class="main-res">
            <div class="img">
                <img src="assets\img\perks-of-short-term-rentals-in-retail-industry-for-upscaled.jpg" alt="">
            </div>
            <div class="cont">
                <h2>Perks of Short-Term Rentals for Indian Businesses</h2>
                <h6>In the dynamic and fast-paced realm of Indian commerce, businesses are constantly evolving and adapting to ever-changing market...</h6>
                <div class="details">
                    <div class="det1"> <i class="fa-regular fa-calendar gray-calendar"></i>&nbsp; 12 May -2024 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa-regular fa-eye gray-calendar"></i> &nbsp; 5</div>
                    <div class="det2"><a href="blog.php?id=12">Read More</a></div>
                </div>
            </div>

        </div>
        <div class="res-below">
            <div class="related">
                <span>Resent Post</span>
                <ul class="search-options">
                    <a href="blog1.php">
                        <li>Perks of Short-Term Rentals</li>
                    </a>
                    <a href="blog2.php">
                        <li>The Rise of Pop-Up Culture </li>
                    </a>
                    <a href="blog3.php">
                        <li> Pop-Up Shop Strategies And Marketing</li>
                    </a>
                    <a href="blog4.php">
                        <li>Pop-Up Power - Harnessing</li>
                    </a>
                </ul>
            </div>
            <hr class="hr">
            <div class="card_row">
            <?php
            // Include database connection
            @include 'connect.php';

            // Query to retrieve blog data
            $sql = "SELECT * FROM blogs";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
            ?>
                    <a href="blog.php?id=<?php echo $row['id']; ?>">
                       
                            <a href="blog.php?id=<?php echo $row['id']; ?>">
                                <div class="card">
                                <img src="<?php echo $row['image']; ?>" alt="Image">

                                    <h2><?php echo substr( $row['title'],0,40); ?></h2>
                                    <p><?php echo substr($row['description'], 0, 70); ?></p>

                                    <div class="details">
                                        <div class="date">
                                            <i class="far fa-calendar"></i> <?php echo date('d M Y', strtotime($row['date'])); ?>
                                        </div>
                                        <!-- <div class="counter">
                                            <i class="far fa-eye"></i>  Views
                                        </div> -->
                                    </div>
                                </div>
                            </a>
                       
                    </a>
            <?php
                }
            } else {
                echo "0 results";
            }

            // Close database connection
            $conn->close();
            ?>
            </div>


        </div>
    </div>
    <section class="trusted-by">
        <span> <img src="assets/trusted_logo/trust.png" alt="" width="40px" height="40px"> <h2> Trusted Partners</h2></span>
        <div class="logos">
        <a class="logo-container" href="https://hermoneytalks.com/" target="_blank" > <img  src="assets/trusted_logo/herm.png" alt="Company 3 Logo"></a>
            <a class="logo-container" href="https://www.linkedin.com/company/gold-leaf-hospitality-consulting/?originalSubdomain=in" target="_blank" > <img  src="assets/trusted_logo/gold_leaf.jpeg" alt="Company 2 Logo"></a>
            <a class="logo-container" href="https://anibee.in" target="_blank" > <img  src="assets/trusted_logo/anibee.jpg" alt="Company 1 Logo"></a>

            <a class="logo-container" href="https://raissa.in" target="_blank" > <img  src="assets/trusted_logo/raissa.jpg" alt="Company 4 Logo"></a> 
            
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>

</html>