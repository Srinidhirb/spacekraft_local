<?php // Include your database connection file
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
    <title>List your retail/event space now and generate new income</title>
    <meta name="description" content="Rent your retail or event space for short term rental on Spacekraft and start earning from your unused retail space.">
    <link rel="stylesheet" href="assets\css\header_footer-css.php">
    <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <link rel="stylesheet" href="assets\css\host-css.php">
    <style>
        .host-hero-section {
            background: url('assets/img/host_bg.jpg') no-repeat center center/cover;

            height: 320px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: #fff;
        }

       
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="host_section">
        <div class="host_header">
            <h1>How it works - Hosts</h1>
            <span>We're India's <b>first short-term retail rental platform</b>, connecting landlords like you with a
                network of
                eager <br> businesses and brands looking for temporary spaces.  </span>
        </div>
        <div class="host_flex">
            <div class="host_right">
                <span>Transform empty spaces <br>into bustling hotspots.</span>
                <p>List your retail space on Spacekraft and tap into a vast pool of potential renters, from established
                    brands
                    to exciting new ventures.</p>
            </div>
            <div class="host_left">
                <img src="assets/img/host_img1.jpg" alt="">
            </div>
        </div>
        <div class="host_black_bg">
            <div class="host_black_left">
                <img src="assets/img/host_img2.jpg" alt="">
            </div>
            <div class="host_black_right">
                <span class="host_black_span">Unlock Your Reatil Space's Earning Potential with <br> <b>
                        Spacekraft</b></span>
                <p>List your retail space on Spacekraft and tap into a vast pool of potential renters, from established
                    brands to exciting new ventures.</p>
                <a href="Space_Details.php"> <button>List your space <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H18M13 6L18.2929 11.2929C18.6834 11.6834 18.6834 12.3166 18.2929 12.7071L13 18" stroke="#222222" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button></a>
            </div>
        </div>
        <section class="offers-section">
            <h2>Here’s what Spacekraft offers Landlords</h2>
            <div class="offers-content">
                <div class="offers-list">
                    <div class="offer-item">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L14.6667 18.6667L20 13.3333M4 16C4 17.5759 4.31039 19.1363 4.91345 20.5922C5.5165 22.0481 6.40042 23.371 7.51472 24.4853C8.62902 25.5996 9.95189 26.4835 11.4078 27.0866C12.8637 27.6896 14.4241 28 16 28C17.5759 28 19.1363 27.6896 20.5922 27.0866C22.0481 26.4835 23.371 25.5996 24.4853 24.4853C25.5996 23.371 26.4835 22.0481 27.0866 20.5922C27.6896 19.1363 28 17.5759 28 16C28 14.4241 27.6896 12.8637 27.0866 11.4078C26.4835 9.95189 25.5996 8.62902 24.4853 7.51472C23.371 6.40042 22.0481 5.5165 20.5922 4.91345C19.1363 4.31039 17.5759 4 16 4C14.4241 4 12.8637 4.31039 11.4078 4.91345C9.95189 5.5165 8.62902 6.40042 7.51472 7.51472C6.40042 8.62902 5.5165 9.95189 4.91345 11.4078C4.31039 12.8637 4 14.4241 4 16Z" stroke="#198038" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <div class="offer-text">
                            <h3>Effortless Leasing</h3>
                            <p>Simply list your retail space on our platform with your space details and pictures.</p>
                        </div>
                    </div>
                    <div class="offer-item">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L14.6667 18.6667L20 13.3333M4 16C4 17.5759 4.31039 19.1363 4.91345 20.5922C5.5165 22.0481 6.40042 23.371 7.51472 24.4853C8.62902 25.5996 9.95189 26.4835 11.4078 27.0866C12.8637 27.6896 14.4241 28 16 28C17.5759 28 19.1363 27.6896 20.5922 27.0866C22.0481 26.4835 23.371 25.5996 24.4853 24.4853C25.5996 23.371 26.4835 22.0481 27.0866 20.5922C27.6896 19.1363 28 17.5759 28 16C28 14.4241 27.6896 12.8637 27.0866 11.4078C26.4835 9.95189 25.5996 8.62902 24.4853 7.51472C23.371 6.40042 22.0481 5.5165 20.5922 4.91345C19.1363 4.31039 17.5759 4 16 4C14.4241 4 12.8637 4.31039 11.4078 4.91345C9.95189 5.5165 8.62902 6.40042 7.51472 7.51472C6.40042 8.62902 5.5165 9.95189 4.91345 11.4078C4.31039 12.8637 4 14.4241 4 16Z" stroke="#198038" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <div class="offer-text">
                            <h3>Maximized Occupancy</h3>
                            <p>Unlock the earning potential of your unused space with short-term retail rental. Generate
                                income without long-term commitments.</p>
                        </div>
                    </div>
                    <div class="offer-item">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L14.6667 18.6667L20 13.3333M4 16C4 17.5759 4.31039 19.1363 4.91345 20.5922C5.5165 22.0481 6.40042 23.371 7.51472 24.4853C8.62902 25.5996 9.95189 26.4835 11.4078 27.0866C12.8637 27.6896 14.4241 28 16 28C17.5759 28 19.1363 27.6896 20.5922 27.0866C22.0481 26.4835 23.371 25.5996 24.4853 24.4853C25.5996 23.371 26.4835 22.0481 27.0866 20.5922C27.6896 19.1363 28 17.5759 28 16C28 14.4241 27.6896 12.8637 27.0866 11.4078C26.4835 9.95189 25.5996 8.62902 24.4853 7.51472C23.371 6.40042 22.0481 5.5165 20.5922 4.91345C19.1363 4.31039 17.5759 4 16 4C14.4241 4 12.8637 4.31039 11.4078 4.91345C9.95189 5.5165 8.62902 6.40042 7.51472 7.51472C6.40042 8.62902 5.5165 9.95189 4.91345 11.4078C4.31039 12.8637 4 14.4241 4 16Z" stroke="#198038" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <div class="offer-text">
                            <h3>Extensive Network</h3>
                            <p>Gain access to a diverse pool of renters seeking short-term rentals.</p>
                        </div>
                    </div>

                </div>
                <div class="offers-image">
                    <img src="assets/img/host_img3.jpg" alt="Luxury Hall">
                </div>
            </div>
        </section>
        <section class="host-hero-section">
            <div class="host-overlay">
                <h1>Retail rentals have never been easier</h1>
                <a href="Space_Details.php"><button>Get Started</button></a>
            </div>
        </section>
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