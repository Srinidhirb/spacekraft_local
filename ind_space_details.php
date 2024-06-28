<?php
session_start();
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

@include 'connect.php';

// Function to get the current URL
function getCurrentURL()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $url = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $url;
}

$array_amenities = array(
    "Air conditioning",
    "CCTV",
    "Chair",
    "Electricity",
    "Elevator",
    "Parking",
    "Garden",
    "Soundproof",
    "Kitchen",
    "Furniture",
    "Restroom (Bathrooms)",
    "Terrace",
    "Table",
    "Water access"
);

// Check if spaceId is provided in the URL query string
if (isset($_GET['spaceId'])) {
    // Decode the spaceId
    $spaceId = base64_decode($_GET['spaceId']);



    // Check if this spaceId has already been clicked by this user
    $clickedCookieName = 'clicked_' . $spaceId;
    if (!isset($_SESSION[$clickedCookieName]) && !isset($_COOKIE[$clickedCookieName])) {
        // Update the click count
        $updateClickCount = "UPDATE combined_list SET click_count = click_count + 1 WHERE id = ?";
        $stmt = $conn->prepare($updateClickCount);
        $stmt->bind_param("i", $spaceId);
        $stmt->execute();

        // Set the cookie and session variable to mark this space as clicked
        setcookie($clickedCookieName, '1', time() + (86400 * 30), "/"); // 30 days expiration
        $_SESSION[$clickedCookieName] = '1';
    }

    // Fetch space details
    $sql = "SELECT * FROM combined_list WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $spaceId);
    $stmt->execute();
    $result = $stmt->get_result();
    $spaceDetails = $result->fetch_assoc();

    // Retrieve details for the specified spaceId
    $sql = "SELECT * FROM combined_list WHERE id = $spaceId";
    $result = $conn->query($sql);

    // Display details
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $spaceImg = $row['images'];
        $spaceName = $row['SpaceName'];
        $spaceType = $row['SpaceType'];
        $projectType = $row['projectType'];
        $spaceAddress1 = $row['SpaceAddress1'];
        $spaceAddress2 = $row['SpaceAddress2'];
        $city = $row['City'];
        $pinCode = $row['PinCode'];

        $spaceArea = $row['SpaceArea'];
        $spaceDes = $row['Description'];

        $amenities_db = explode(',', $row['Amenities']);
        $selectedYear = $row['selected_year'];
        $selectedMonth = $row['selected_month'];
        $selectedDates = explode(' ,', $row['selected_dates']);

        $minDuration = $row['min_duration'];
        $minDurationUnit = $row['min_duration_unit'];
        $maxDuration = $row['max_duration'];
        $maxDurationUnit = $row['max_duration_unit'];
        $spaceDailyPrice = $row['DailyPrice'];
        $spaceWeeklyPrice = $row['WeeklyPrice'];
        $spaceMonthlyPrice = $row['MonthlyPrice'];
        $spaceMain = $row['Maintenance'];
        $spaceDeposit = $row['SecurityDeposit'];

        // Get the current URL
        $current_url = getCurrentURL();

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Responsive Image Gallery with Slider</title>
            <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
            <link rel="stylesheet" href="assets\css\header_footer-css.php">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <link rel="stylesheet" href="assets\css\individual_space-css.php">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
            <style>

            </style>
        </head>

        <body>
            <?php
            include 'header.php';
            ?>
            <div id="loader">

                <div class="loader">
                    Spacekraft
                </div>
            </div>
            <div id="main-content" style="display:none;">
                <div class="gallery-container">
                    <div class="large-image">
                        <?php
                        // Check if there are images available
                        if ($spaceImg !== "N/A") {
                            // Handle multiple images
                            $imagePaths = explode(',', $spaceImg);
                            // Display the first image as the large image
                            echo '<img src="http://spacekraft.in/' . $imagePaths[0] . '"   alt="Large Image">';
                        }
                        ?>
                    </div>
                    <div class="small-images">
                        <?php
                        // Check if there are images available
                        if ($spaceImg !== "N/A") {
                            // Handle multiple images
                            // Display up to 2 additional images starting from index 1
                            for ($i = 1; $i < min(3, count($imagePaths)); $i++) {
                                if ($i == 2) {
                                    // For the third image, wrap it in a div with absolute positioning
                                    echo '<div class="absolute-container" onclick="View_all()">';
                                    echo '<img src="http://spacekraft.in/' . $imagePaths[$i] . '"  alt="Small Image ' . ($i + 1) . '">';
                                    echo '<svg width="65" height="54" viewBox="0 0 65 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.5 3.6C22.5 3.03995 22.5 2.75992 22.609 2.54601C22.7049 2.35785 22.8578 2.20487 23.046 2.10899C23.2599 2 23.5399 2 24.1 2H28.9C29.4601 2 29.7401 2 29.954 2.10899C30.1422 2.20487 30.2951 2.35785 30.391 2.54601C30.5 2.75992 30.5 3.03995 30.5 3.6V8.4C30.5 8.96005 30.5 9.24008 30.391 9.45399C30.2951 9.64215 30.1422 9.79513 29.954 9.89101C29.7401 10 29.4601 10 28.9 10H24.1C23.5399 10 23.2599 10 23.046 9.89101C22.8578 9.79513 22.7049 9.64215 22.609 9.45399C22.5 9.24008 22.5 8.96005 22.5 8.4V3.6Z" stroke="#FDFDFD" stroke-width="2"/>
                                            <path d="M22.5 15.6C22.5 15.0399 22.5 14.7599 22.609 14.546C22.7049 14.3578 22.8578 14.2049 23.046 14.109C23.2599 14 23.5399 14 24.1 14H28.9C29.4601 14 29.7401 14 29.954 14.109C30.1422 14.2049 30.2951 14.3578 30.391 14.546C30.5 14.7599 30.5 15.0399 30.5 15.6V20.4C30.5 20.9601 30.5 21.2401 30.391 21.454C30.2951 21.6422 30.1422 21.7951 29.954 21.891C29.7401 22 29.4601 22 28.9 22H24.1C23.5399 22 23.2599 22 23.046 21.891C22.8578 21.7951 22.7049 21.6422 22.609 21.454C22.5 21.2401 22.5 20.9601 22.5 20.4V15.6Z" stroke="#FDFDFD" stroke-width="2"/>
                                            <path d="M34.5 3.6C34.5 3.03995 34.5 2.75992 34.609 2.54601C34.7049 2.35785 34.8578 2.20487 35.046 2.10899C35.2599 2 35.5399 2 36.1 2H40.9C41.4601 2 41.7401 2 41.954 2.10899C42.1422 2.20487 42.2951 2.35785 42.391 2.54601C42.5 2.75992 42.5 3.03995 42.5 3.6V8.4C42.5 8.96005 42.5 9.24008 42.391 9.45399C42.2951 9.64215 42.1422 9.79513 41.954 9.89101C41.7401 10 41.4601 10 40.9 10H36.1C35.5399 10 35.2599 10 35.046 9.89101C34.8578 9.79513 34.7049 9.64215 34.609 9.45399C34.5 9.24008 34.5 8.96005 34.5 8.4V3.6Z" stroke="#FDFDFD" stroke-width="2"/>
                                            <path d="M34.5 15.6C34.5 15.0399 34.5 14.7599 34.609 14.546C34.7049 14.3578 34.8578 14.2049 35.046 14.109C35.2599 14 35.5399 14 36.1 14H40.9C41.4601 14 41.7401 14 41.954 14.109C42.1422 14.2049 42.2951 14.3578 42.391 14.546C42.5 14.7599 42.5 15.0399 42.5 15.6V20.4C42.5 20.9601 42.5 21.2401 42.391 21.454C42.2951 21.6422 42.1422 21.7951 41.954 21.891C41.7401 22 41.4601 22 40.9 22H36.1C35.5399 22 35.2599 22 35.046 21.891C34.8578 21.7951 34.7049 21.6422 34.609 21.454C34.5 21.2401 34.5 20.9601 34.5 20.4V15.6Z" stroke="#FDFDFD" stroke-width="2"/>
                                            <path d="M12.249 37.076L6.993 50H5.274L0.018 37.076H1.548C1.716 37.076 1.851 37.118 1.953 37.202C2.061 37.286 2.142 37.394 2.196 37.526L5.688 46.31C5.772 46.526 5.853 46.763 5.931 47.021C6.015 47.279 6.09 47.549 6.156 47.831C6.216 47.549 6.282 47.279 6.354 47.021C6.426 46.763 6.504 46.526 6.588 46.31L10.071 37.526C10.113 37.406 10.188 37.301 10.296 37.211C10.41 37.121 10.548 37.076 10.71 37.076H12.249ZM15.3385 40.856V50H13.5835V40.856H15.3385ZM15.6715 38.03C15.6715 38.192 15.6385 38.348 15.5725 38.498C15.5065 38.642 15.4165 38.771 15.3025 38.885C15.1945 38.993 15.0655 39.08 14.9155 39.146C14.7655 39.206 14.6095 39.236 14.4475 39.236C14.2855 39.236 14.1325 39.206 13.9885 39.146C13.8445 39.08 13.7155 38.993 13.6015 38.885C13.4935 38.771 13.4065 38.642 13.3405 38.498C13.2805 38.348 13.2505 38.192 13.2505 38.03C13.2505 37.862 13.2805 37.706 13.3405 37.562C13.4065 37.412 13.4935 37.283 13.6015 37.175C13.7155 37.061 13.8445 36.974 13.9885 36.914C14.1325 36.848 14.2855 36.815 14.4475 36.815C14.6095 36.815 14.7655 36.848 14.9155 36.914C15.0655 36.974 15.1945 37.061 15.3025 37.175C15.4165 37.283 15.5065 37.412 15.5725 37.562C15.6385 37.706 15.6715 37.862 15.6715 38.03ZM23.9365 44.411C23.9365 44.063 23.8855 43.742 23.7835 43.448C23.6875 43.154 23.5435 42.899 23.3515 42.683C23.1595 42.467 22.9255 42.299 22.6495 42.179C22.3735 42.059 22.0555 41.999 21.6955 41.999C20.9575 41.999 20.3755 42.212 19.9495 42.638C19.5295 43.064 19.2625 43.655 19.1485 44.411H23.9365ZM25.3855 48.695C25.1695 48.947 24.9205 49.166 24.6385 49.352C24.3565 49.532 24.0565 49.679 23.7385 49.793C23.4205 49.907 23.0905 49.991 22.7485 50.045C22.4125 50.099 22.0795 50.126 21.7495 50.126C21.1195 50.126 20.5345 50.021 19.9945 49.811C19.4605 49.595 18.9955 49.283 18.5995 48.875C18.2095 48.461 17.9035 47.951 17.6815 47.345C17.4655 46.733 17.3575 46.031 17.3575 45.239C17.3575 44.603 17.4565 44.012 17.6545 43.466C17.8525 42.914 18.1345 42.434 18.5005 42.026C18.8725 41.618 19.3255 41.297 19.8595 41.063C20.3935 40.829 20.9935 40.712 21.6595 40.712C22.2175 40.712 22.7305 40.805 23.1985 40.991C23.6725 41.171 24.0805 41.435 24.4225 41.783C24.7645 42.131 25.0315 42.56 25.2235 43.07C25.4215 43.58 25.5205 44.162 25.5205 44.816C25.5205 45.086 25.4905 45.269 25.4305 45.365C25.3705 45.455 25.2595 45.5 25.0975 45.5H19.1035C19.1215 46.046 19.1995 46.523 19.3375 46.931C19.4755 47.333 19.6645 47.669 19.9045 47.939C20.1505 48.209 20.4415 48.41 20.7775 48.542C21.1135 48.674 21.4885 48.74 21.9025 48.74C22.2925 48.74 22.6285 48.695 22.9105 48.605C23.1985 48.515 23.4445 48.419 23.6485 48.317C23.8585 48.209 24.0325 48.11 24.1705 48.02C24.3145 47.93 24.4405 47.885 24.5485 47.885C24.6925 47.885 24.8035 47.939 24.8815 48.047L25.3855 48.695ZM40.0184 40.856L37.0754 50H35.6714C35.5034 50 35.3894 49.889 35.3294 49.667L33.4034 43.709C33.3554 43.559 33.3134 43.412 33.2774 43.268C33.2414 43.118 33.2084 42.968 33.1784 42.818C33.1244 43.13 33.0494 43.433 32.9534 43.727L31.0004 49.667C30.9404 49.889 30.8114 50 30.6134 50H29.2814L26.3294 40.856H27.7154C27.8534 40.856 27.9674 40.889 28.0574 40.955C28.1534 41.021 28.2164 41.105 28.2464 41.207L29.8934 46.823C29.9474 47.051 29.9954 47.273 30.0374 47.489C30.0794 47.705 30.1184 47.921 30.1544 48.137C30.2084 47.921 30.2654 47.705 30.3254 47.489C30.3914 47.273 30.4574 47.051 30.5234 46.823L32.3504 41.171C32.3804 41.069 32.4374 40.988 32.5214 40.928C32.6054 40.862 32.7074 40.829 32.8274 40.829H33.5924C33.7244 40.829 33.8324 40.862 33.9164 40.928C34.0064 40.988 34.0664 41.069 34.0964 41.171L35.8784 46.823C35.9444 47.051 36.0074 47.276 36.0674 47.498C36.1274 47.714 36.1814 47.933 36.2294 48.155C36.2654 47.939 36.3074 47.723 36.3554 47.507C36.4034 47.285 36.4574 47.057 36.5174 46.823L38.1914 41.207C38.2214 41.105 38.2814 41.021 38.3714 40.955C38.4674 40.889 38.5754 40.856 38.6954 40.856H40.0184ZM52.3174 45.185L50.4004 40.172C50.2624 39.83 50.1244 39.398 49.9864 38.876C49.9204 39.134 49.8514 39.374 49.7794 39.596C49.7134 39.818 49.6474 40.016 49.5814 40.19L47.6734 45.185H52.3174ZM56.1064 50H54.6304C54.4624 50 54.3244 49.958 54.2164 49.874C54.1084 49.79 54.0304 49.682 53.9824 49.55L52.8394 46.553H47.1424L45.9994 49.55C45.9574 49.664 45.8794 49.769 45.7654 49.865C45.6514 49.955 45.5134 50 45.3514 50H43.8754L49.0234 37.076H50.9584L56.1064 50ZM59.1248 36.716V50H57.3608V36.716H59.1248ZM63.4314 36.716V50H61.6674V36.716H63.4314Z" fill="white"/>
                                          </svg>';

                                    echo '</div>';
                                } else {
                                    echo '<img src="http://spacekraft.in/' . $imagePaths[$i] . '"  alt="Small Image ' . ($i + 1) . '">';
                                }
                            }
                        }
                        ?>
                    </div>
                    <script>
                        function View_all() {
                            var x = document.getElementById("more_image");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        }
                    </script>
                </div>
                <div class="more_image" id="more_image" style="display: none;">
                    <div class="image">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <?php
                                // Check if there are images available
                                if ($spaceImg !== "N/A") {
                                    // Handle multiple images
                                    $imagePaths = explode(',', $spaceImg);

                                    // Display each image in the slideshow
                                    for ($i = 0; $i < min(4, count($imagePaths)); $i++) {
                                        echo '<div class="swiper-slide contain">';
                                        echo '<img class="listing-image" src="http://spacekraft.in/' . $imagePaths[$i] . '" height="200" alt="">';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <?php
                                // Check if there are images available
                                if ($spaceImg !== "N/A") {
                                    // Handle multiple images
                                    $imagePaths = explode(',', $spaceImg);

                                    // Display each image in the thumbnail slideshow
                                    for ($i = 0; $i < min(4, count($imagePaths)); $i++) {
                                        echo '<div class="swiper-slide">';
                                        echo '<img class="listing-image" src="http://spacekraft.in/' . $imagePaths[$i] . '" height="200" alt="">';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="more_img_close_icon" onclick="close_more()">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="20" fill="#CDCECF" />
                            <path d="M28 12L12 28M28 28L12 12" stroke="#111111" stroke-width="2" stroke-linecap="round" />
                        </svg>

                    </div>
                    <script>
                        function close_more() {
                            var x = document.getElementById("more_image");
                            if (x.style.display === "block") {
                                x.style.display = "none";
                            } else {
                                x.style.display = "block";
                            }
                        }
                    </script>
                </div>
                <div class="mobile_image_gallary">

                </div>
                <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

                <!-- Initialize Swiper -->
                <script>
                    var swiper = new Swiper(".mySwiper", {
                        loop: true,

                        spaceBetween: 10,
                        slidesPerView: 4,
                        freeMode: true,
                        watchSlidesProgress: true,
                    });
                    var swiper2 = new Swiper(".mySwiper2", {
                        loop: true,

                        spaceBetween: 10,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        thumbs: {
                            swiper: swiper,
                        },
                    });
                </script>

                <div class="container">
                    <div class="left-section">
                        <div class="space_name_share_button">
                            <span class="space_name"><?php echo $spaceName;   ?></span>
                            <div class="share_fav">
                                <button class="share" onclick="sharePage()"><svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M27.9129 17.3603C28.2384 17.0813 28.4011 16.9418 28.4607 16.7758C28.5131 16.6301 28.5131 16.4708 28.4607 16.3251C28.4011 16.1591 28.2384 16.0196 27.9129 15.7406L16.6186 6.05973C16.0583 5.57947 15.7781 5.33934 15.5409 5.33346C15.3348 5.32834 15.1379 5.41891 15.0076 5.57874C14.8577 5.76266 14.8577 6.13164 14.8577 6.8696V12.5966C12.0115 13.0946 9.40652 14.5368 7.47067 16.7023C5.36016 19.0631 4.19271 22.1184 4.19106 25.2851V26.1011C5.59018 24.4156 7.33707 23.0525 9.31207 22.105C11.0533 21.2697 12.9356 20.7749 14.8577 20.6445V26.2313C14.8577 26.9692 14.8577 27.3382 15.0076 27.5221C15.1379 27.682 15.3348 27.7725 15.5409 27.7674C15.7781 27.7615 16.0583 27.5214 16.6186 27.0411L27.9129 17.3603Z" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> </button>
                                <script>
                                    async function sharePage() {
                                        await navigator.share({
                                            title: document.title,
                                            url: window.location.href
                                        })
                                    }
                                </script>
                                <div class="fav">
                                    <a href="#" class="favorites-button">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9938 5.91615C10.1944 3.81913 7.19377 3.25504 4.93923 5.17528C2.68468 7.09552 2.36727 10.3061 4.13778 12.5771C5.60984 14.4654 10.0648 18.4478 11.5249 19.7368C11.6882 19.881 11.7699 19.9531 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9531 12.2994 19.881 12.4628 19.7368C13.9229 18.4478 18.3778 14.4654 19.8499 12.5771C21.6204 10.3061 21.3417 7.07532 19.0484 5.17528C16.7551 3.27524 13.7933 3.81913 11.9938 5.91615Z" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                        <span> Save to favorites</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="address"><span> <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 7.5C12 9.15685 10.6569 10.5 9 10.5C7.34315 10.5 6 9.15685 6 7.5C6 5.84315 7.34315 4.5 9 4.5C10.6569 4.5 12 5.84315 12 7.5Z" stroke="#6A6E7A" stroke-width="2" />
                                    <path d="M15 7.5C15 10.8137 10.5 16.5 9 16.5C7.5 16.5 3 10.8137 3 7.5C3 4.18629 5.68629 1.5 9 1.5C12.3137 1.5 15 4.18629 15 7.5Z" stroke="#6A6E7A" stroke-width="2" />
                                </svg>
                            </span> <?php
                                    // Combine the address components
                                    $combinedAddress = $spaceAddress1 . ', ' . $spaceAddress2 . ', ' . $city;
                                    // Encode the address for the Google Maps URL
                                    $encodedAddress = urlencode($combinedAddress);
                                    // Generate the Google Maps link
                                    $mapsLink = "https://www.google.com/maps/search/?api=1&query={$encodedAddress}";
                                    ?> <a href="<?php echo $mapsLink; ?>" target="_blank">
                                <p><?php echo " $spaceAddress1, $city - $pinCode"; ?></p>
                            </a></div>
                        <div class="details">
                            <span> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.075" y="0.075" width="23.85" height="23.85" rx="3.925" stroke="#4A494B" stroke-width="0.15" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 9H6V14H18V9H19V14H20.25C20.3881 14 20.5 14.1119 20.5 14.25V14.75C20.5 14.8881 20.3881 15 20.25 15H3.75C3.61193 15 3.5 14.8881 3.5 14.75V14.25C3.5 14.1119 3.61193 14 3.75 14H5V9ZM5 17V20H19V17H5ZM4.5 16C4.22386 16 4 16.2239 4 16.5V20.5C4 20.7761 4.22386 21 4.5 21H19.5C19.7761 21 20 20.7761 20 20.5V16.5C20 16.2239 19.7761 16 19.5 16H4.5Z" fill="#4A494B" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.0944 4L4.02177 6.95645C4.00739 6.9961 4 7.03805 4 7.08045V8.2755C4 8.6796 4.32373 9 4.71428 9C5.10485 9 5.42855 8.6796 5.42855 8.2755C5.42855 7.99935 5.65245 7.7755 5.92855 7.7755C6.2047 7.7755 6.42855 7.99935 6.42855 8.2755C6.42855 8.6796 6.7523 9 7.14285 9C7.5334 9 7.85715 8.6796 7.85715 8.2755C7.85715 7.99935 8.081 7.7755 8.35715 7.7755C8.6333 7.7755 8.85715 7.99935 8.85715 8.2755C8.85715 8.6796 9.1809 9 9.57145 9C9.9618 9 10.2854 8.6799 10.2857 8.2761C10.2859 8.00015 10.5097 7.7765 10.7857 7.7765C11.0617 7.7765 11.2855 8.00015 11.2857 8.2761C11.286 8.6799 11.6096 9 12 9C12.3905 9 12.7143 8.6796 12.7143 8.2755C12.7143 7.99935 12.9382 7.7755 13.2143 7.7755C13.4904 7.7755 13.7143 7.99935 13.7143 8.2755C13.7143 8.6796 14.038 9 14.4285 9C14.8189 9 15.1425 8.6799 15.1428 8.2761C15.1431 8.00015 15.3668 7.7765 15.6428 7.7765C15.9188 7.7765 16.1427 8.00015 16.1429 8.2761C16.1432 8.6799 16.4668 9 16.8571 9C17.2477 9 17.5714 8.6796 17.5714 8.2755C17.5714 7.99935 17.7953 7.7755 18.0714 7.7755C18.3475 7.7755 18.5714 7.99935 18.5714 8.2755C18.5714 8.6796 18.8952 9 19.2857 9C19.6763 9 20 8.6796 20 8.2755V7.08045C20 7.03805 19.9926 6.9961 19.9783 6.95645L18.9056 4H5.0944ZM18.0714 9.4928C17.7616 9.80575 17.3328 10 16.8571 10C16.3814 10 15.9527 9.80575 15.6428 9.4928C15.3331 9.80575 14.9043 10 14.4285 10C13.9529 10 13.524 9.80575 13.2143 9.4928C12.9045 9.80575 12.4757 10 12 10C11.5243 10 11.0955 9.80575 10.7857 9.4928C10.4759 9.80575 10.0471 10 9.57145 10C9.09575 10 8.6669 9.80575 8.35715 9.4928C8.04735 9.80575 7.61855 10 7.14285 10C6.6672 10 6.23835 9.80575 5.92855 9.4928C5.6188 9.80575 5.18995 10 4.71428 10C3.76357 10 3 9.22395 3 8.2755V7.08045C3 6.9219 3.02764 6.7645 3.08172 6.6154L4.17181 3.6108C4.30414 3.24605 4.65006 3 5.04095 3H18.959C19.3499 3 19.6958 3.24605 19.8282 3.6108L20.9183 6.6154C20.9724 6.7645 21 6.9219 21 7.08045V8.2755C21 9.22395 20.2364 10 19.2857 10C18.8101 10 18.3812 9.80575 18.0714 9.4928Z" fill="#4A494B" />
                                    <path d="M7 12.75C7 12.6119 7.11195 12.5 7.25 12.5H8.75C8.88805 12.5 9 12.6119 9 12.75V13.75C9 13.8881 8.88805 14 8.75 14H7.25C7.11195 14 7 13.8881 7 13.75V12.75Z" fill="#4A494B" />
                                    <path d="M8 13.25C8 13.1119 8.11195 13 8.25 13H9.75C9.88805 13 10 13.1119 10 13.25V13.75C10 13.8881 9.88805 14 9.75 14H8.25C8.11195 14 8 13.8881 8 13.75V13.25ZM12 13.25C12 13.6642 11.6642 14 11.25 14C10.8358 14 10.5 13.6642 10.5 13.25C10.5 12.8358 10.8358 12.5 11.25 12.5C11.6642 12.5 12 12.8358 12 13.25Z" fill="#4A494B" />
                                    <path d="M2.16667 0L0 2.16667V6.5L6.5 0H2.16667Z" fill="#031B64" />
                                    <path d="M1.92842 2.82653C1.95835 2.85645 1.97711 2.88971 1.9847 2.92631C1.9923 2.96291 1.98815 3.00112 1.97227 3.04094C1.95662 3.08053 1.929 3.12012 1.88941 3.15971C1.87191 3.1772 1.85362 3.1932 1.83451 3.2077C1.81564 3.22197 1.7963 3.23463 1.77651 3.24568C1.75671 3.25627 1.73657 3.26513 1.71608 3.27227L1.61665 3.17283C1.65117 3.15948 1.68559 3.14417 1.71988 3.12691C1.75418 3.10965 1.78399 3.08836 1.80931 3.06304C1.8268 3.04554 1.83854 3.0292 1.84452 3.01401C1.85074 2.99859 1.85223 2.98443 1.84901 2.97154C1.84579 2.95865 1.839 2.94703 1.82864 2.93667C1.81598 2.92401 1.8009 2.91745 1.78341 2.91699C1.76592 2.91653 1.74578 2.91986 1.72299 2.927C1.70043 2.93391 1.67534 2.94219 1.64772 2.95186C1.63046 2.95807 1.61101 2.96417 1.58937 2.97016C1.5675 2.97591 1.5446 2.97925 1.52066 2.98017C1.49672 2.98109 1.47256 2.97741 1.44816 2.96912C1.42376 2.96038 1.40005 2.94449 1.37703 2.92148C1.34688 2.89132 1.328 2.85864 1.32041 2.82342C1.31281 2.7882 1.31615 2.75218 1.33042 2.71535C1.34469 2.67806 1.36932 2.64192 1.40431 2.60694C1.43055 2.5807 1.45863 2.55883 1.48855 2.54134C1.51848 2.52338 1.5522 2.50716 1.58972 2.49265L1.6384 2.61039C1.60571 2.6242 1.57763 2.63778 1.55415 2.65113C1.53045 2.66425 1.50904 2.68036 1.48993 2.69947C1.47658 2.71282 1.46738 2.7264 1.46231 2.74021C1.45702 2.75379 1.45587 2.76691 1.45886 2.77957C1.46162 2.792 1.46807 2.80328 1.47819 2.81341C1.49016 2.82538 1.50374 2.83205 1.51894 2.83343C1.53413 2.83435 1.55254 2.83159 1.57418 2.82515C1.59605 2.81847 1.62263 2.80961 1.65394 2.79856C1.69192 2.78498 1.72667 2.77577 1.75821 2.77094C1.78974 2.76565 1.81943 2.76703 1.84729 2.77508C1.87491 2.78291 1.90195 2.80006 1.92842 2.82653Z" fill="white" />
                                    <path d="M2.35483 2.68048L2.24779 2.78751L1.83209 2.37181L1.69502 2.50888L1.60594 2.4198L1.98712 2.03863L2.0762 2.12771L1.93913 2.26478L2.35483 2.68048Z" fill="white" />
                                    <path d="M2.8786 2.15671L2.72185 2.07316L2.53782 2.25718L2.62137 2.41393L2.50605 2.52925L2.17736 1.84424L2.30822 1.71339L2.99392 2.04139L2.8786 2.15671ZM2.60653 2.00894L2.45254 1.92814C2.44241 1.92262 2.42929 1.91571 2.41318 1.90743C2.39707 1.89868 2.38072 1.88993 2.36415 1.88119C2.34758 1.87198 2.33342 1.86381 2.32168 1.85667C2.32882 1.86841 2.33733 1.88337 2.34723 1.90156C2.35713 1.91928 2.36645 1.9362 2.3752 1.95231C2.38395 1.96842 2.39016 1.97993 2.39384 1.98684L2.47498 2.14048L2.60653 2.00894Z" fill="white" />
                                    <path d="M3.05779 1.97752L2.55301 1.47274L2.66004 1.3657L3.07644 1.78209L3.28118 1.57735L3.36957 1.66574L3.05779 1.97752Z" fill="white" />
                                    <path d="M3.45761 1.5777L2.95283 1.07292L3.05986 0.965884L3.47625 1.38228L3.681 1.17753L3.76939 1.26592L3.45761 1.5777Z" fill="white" />
                                </svg>
                                <?php echo $spaceType ?></span>
                            <span>•</span>
                            <span> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 9L5 5.70711C5 5.31658 5.31658 5 5.70711 5L9 5M15 5L18.2929 5C18.6834 5 19 5.31658 19 5.70711V9M15 19H18.2929C18.6834 19 19 18.6834 19 18.2929V15M5 15L5 18.2929C5 18.6834 5.31658 19 5.70711 19H9M14 10L18 6M10 10L6 6M14 14L18 18M10 14L6 18" stroke="#4A494B" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <?php echo   $spaceArea; ?> Sq.ft</span>
                            <span>•</span>
                            <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.9095 13.1718C2.56793 12.4286 2.56793 11.5714 2.9095 10.8282C4.4906 7.38843 7.96659 5 12.0004 5C16.0343 5 19.5102 7.38843 21.0913 10.8282C21.4329 11.5714 21.4329 12.4286 21.0913 13.1718C19.5102 16.6116 16.0343 19 12.0004 19C7.96659 19 4.4906 16.6116 2.9095 13.1718Z" stroke="#4A494B" stroke-width="1.5" />
                                    <path d="M15.0004 12C15.0004 13.6569 13.6573 15 12.0004 15C10.3436 15 9.00042 13.6569 9.00042 12C9.00042 10.3431 10.3436 9 12.0004 9C13.6573 9 15.0004 10.3431 15.0004 12Z" stroke="#4A494B" stroke-width="1.5" />
                                </svg>
                                <p> <?php echo $spaceDetails['click_count']; ?></p>
                            </span>
                        </div>
                        <hr class="hr">
                        <!-- <h2>Space use</h2>
                        <div class="space-use">
                            <div class="space-item">
                                <span>👜</span>
                                <p>Conference</p>
                            </div>
                            <div class="space-item">
                                <span>🎥</span>
                                <p>Production</p>
                            </div>
                            <div class="space-item">
                                <span>🎬</span>
                                <p>Film shoots</p>
                            </div>
                        </div> -->
                        <hr class="hr">
                        <div class="about">
                            <span class="abt">About space</span>
                            <div class="content-container">
                                <p id="content"><?php echo $spaceDes; ?></p>
                                <a href="#" id="read-more">Read more</a>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="avai_amin">
                            <span>Amenities</span>
                            <?php
                            // Define class names for amenities
                            $class_names = array();

                            // Assign 'amei_db' class to amenities retrieved from the database
                            foreach ($amenities_db as $amenity_db) {
                                $class_names[$amenity_db] = 'amei_db';
                            }

                            // Assign 'amei_array' class to amenities from the array
                            $array_amenities = array(
                                'Air Conditioning',
                                'CCTV',
                                'Chairs',
                                'Electricity',
                                'Elevator',
                                'Parking',
                                'Garden',
                                'Soundproof',
                                'Kitchen',
                                'Furniture',
                                'RestRooms',
                                'Security System',
                                'Terrace',
                                'Table',
                                'Water Access'
                            );

                            foreach ($array_amenities as $amenity) {
                                // If the class name is not already assigned (from the database), assign 'amei_array'
                                if (!isset($class_names[$amenity])) {
                                    $class_names[$amenity] = 'amei_array';
                                }
                            }

                            // Now $class_names array contains the class names for all amenities



                            // Merge database amenities and array amenities
                            $combined_amenities = array_unique(array_merge($amenities_db, $array_amenities));

                            // Shuffle the combined amenities
                            shuffle($combined_amenities);
                            ?>

                            <?php
                            // Sort the combined amenities array in ascending order
                            sort($combined_amenities);

                            // Remove duplicates from the combined amenities array
                            $combined_amenities = array_unique($combined_amenities);
                            ?>
                            <table border="0" class="responsive-table">
                                <tr>
                                    <?php
                                    $count_alternative = 0; // Counter for tracking amenities per row
                                    foreach ($combined_amenities as $amenity) {
                                        // Check if the amenity is from the database or the array
                                        $class = isset($class_names[$amenity]) ? $class_names[$amenity] : '';

                                        // Output the SVG icon only for amenities from the database
                                        $svg_icon = $class === 'amei_db' ? '<div class="svg"><svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.8333 6.14185L7.68475 14.2904C7.37559 14.5996 6.87433 14.5996 6.56517 14.2904L3.16663 10.8918" stroke="#031B64" stroke-width="2" stroke-linecap="round" /></svg></div>' : '';

                                        // Define class for amenities without SVG
                                        $amei_class = $class === 'amei_db' ? '' : 'amei_disabled';

                                        // Output the amenity
                                        echo "<td><div class='svg_amei'><div class='amei $class $amei_class'>$amenity $svg_icon</div></div></td>";

                                        // Increment the counter
                                        $count_alternative++;

                                        // Start a new row after every 5 amenities for mobile screens
                                        if ($count_alternative % 5 == 0) {
                                            echo '</tr><tr>';
                                        }
                                    }

                                    ?>
                                </tr>
                            </table>






                        </div>
                        <hr class="hr">

                        <div class="similar-spaces-section">
                            <h2>Similar spaces</h2>
                            <?php
                            function limitWords($string, $word_limit)
                            {
                                $words = explode(" ", $string);
                                if (count($words) > $word_limit) {
                                    $limitedString = implode(" ", array_splice($words, 0, $word_limit));
                                    return $limitedString . '...'; // Add ellipsis to indicate that the text has been truncated
                                } else {
                                    return $string;
                                }
                            }

                            // Establish database connection
                            // Assuming $conn is the database connection
                            $currentType =  $spaceType;
                            $query = "SELECT * FROM combined_list WHERE SpaceType = '$currentType' ORDER BY RAND() LIMIT 3";; // Update this query based on your table structure
                            $result = $conn->query($query);

                            // Loop through the data and display it in HTML
                            if ($result->num_rows > 0) {
                                echo '<div class="similar-spaces-list">';
                                while ($row = $result->fetch_assoc()) {
                                    $spaceId = $row['id'];
                                    $spaceName = limitWords($row['SpaceName'], 3);
                                    $spaceAddress1 = limitWords($row['SpaceAddress1'], 4);
                                    $spaceAddress2 = $row['SpaceAddress2'];
                                    $spaceArea = limitWords($row['SpaceArea'], 4) . ' Sq.ft';

                                    if ($row['images'] !== "N/A") {
                                        // Handle multiple images
                                        $imagePaths = explode(',', $row['images']);
                                        $imageUrl = 'http://spacekraft.in/' . $imagePaths[0];
                                    } else {
                                        $imageUrl = 'path/to/default/image.jpg'; // Default image path
                                    }

                                    echo '<div class="space-item" onclick="redirectToSpace(' . $spaceId . ')">';
                                    echo '<img class="similar_img " src="' . $imageUrl . '" alt="' . $spaceName . '">';
                                    echo '<div class = "similar_info">';
                                    echo '<h3>' . $spaceName . '</h3>';

                                    echo '<p>' . $spaceAddress1 . '</p>';
                                    echo '<p>' . $spaceArea . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                echo '</div>';
                            } else {
                                echo "No data available";
                            }
                            $conn->close();
                            ?>
                            <script>
                                function redirectToSpace(spaceId) {
                                    // Encode spaceId in Base64
                                    var encodedSpaceId = btoa(spaceId);
                                    // Redirect to the encoded URL
                                    window.location.href = 'ind_space_details.php?spaceId=' + encodedSpaceId;
                                }
                            </script>
                        </div>
                    </div>
                    <div class="mobile_price_fixed">
                        <div class="pricing-enquiry-container">
                            <div class="pricing-enquiry-title">
                                <p>Prices starting from</p>
                                <h1>
                                    <?php
                                    // Array to store prices with their types
                                    $prices = array();

                                    // Add prices to the array with their types if they exist
                                    if ($spaceDailyPrice) {
                                        $prices['Day'] = $spaceDailyPrice;
                                    }
                                    if ($spaceWeeklyPrice) {
                                        $prices['Week'] = $spaceWeeklyPrice;
                                    }
                                    if ($spaceMonthlyPrice) {
                                        $prices['Month'] = $spaceMonthlyPrice;
                                    }

                                    // Check if prices are available
                                    if (empty($prices)) {
                                        echo "No price available";
                                    } else {
                                        // Find the lowest price
                                        $lowestPrice = min($prices);

                                        // Find the type of pricing corresponding to the lowest price
                                        $lowestPriceType = array_search($lowestPrice, $prices);

                                        // Display the lowest price with its type
                                        echo '&#8377;' . number_format($lowestPrice) . ' /' . $lowestPriceType;
                                    }
                                    ?>
                                </h1>
                            </div>
                            <div class="date-picker-range">
                                <input type="text" id="start-date" class="date-picker-input" placeholder="Start date (y/m/d)" required>
                                <span class="date-picker-separator">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.5 4.5L11.4697 8.46967C11.7626 8.76256 11.7626 9.23744 11.4697 9.53033L7.5 13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <input type="text" id="end-date" class="date-picker-input" placeholder="End date (y/m/d)" required>
                            </div>
                            <a href="Enquiry_form.php" id="enquiry-link">
                                <button id="send-enquiry-btn" class="enquiry-button">Send Enquiry</button>
                            </a>
                        </div>
                    </div>
                    <div class="right-section">
                        <div class="enquiry-container" id="price-enquiry-container">
                            <p>Prices starting from</p>
                            <h1><?php
                                // Array to store prices with their types
                                $prices = array();

                                // Add prices to the array with their types if they exist
                                if ($spaceDailyPrice) {
                                    $prices['Day'] = $spaceDailyPrice;
                                }
                                if ($spaceWeeklyPrice) {
                                    $prices['Week'] = $spaceWeeklyPrice;
                                }
                                if ($spaceMonthlyPrice) {
                                    $prices['Month'] = $spaceMonthlyPrice;
                                }

                                // Check if prices are available
                                if (empty($prices)) {
                                    echo "No price available";
                                } else {
                                    // Find the lowest price
                                    $lowestPrice = min($prices);

                                    // Find the type of pricing corresponding to the lowest price
                                    $lowestPriceType = array_search($lowestPrice, $prices);

                                    // Display the lowest price with its type
                                    echo '&#8377;' . number_format($lowestPrice) . ' /' . $lowestPriceType;
                                }
                                ?></h1>
                            <div class="date-range">
                                <input type="text" id="start-date" class="date-input" placeholder="Start (y/m/d)" required>
                                <span class="separator">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.5 4.5L11.4697 8.46967C11.7626 8.76256 11.7626 9.23744 11.4697 9.53033L7.5 13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <input type="text" id="end-date" class="date-input" placeholder="End (y/m/d)" required>
                            </div>
                            <a href="Enquiry_form.php" id="enquiry-link">
                                <button id="send-enquiry-btn" class="enquiry-button">Send Enquiry</button>
                            </a>

                        </div>
                        <div class="sticky-container" id="sticky-container">
                            <div class="sticky-content">
                                <div class="pricing-enquiry-container">
                                    <div class="pricing-enquiry-title">
                                        <p>Prices starting from</p>
                                        <h1>
                                            <?php
                                            // Array to store prices with their types
                                            $prices = array();

                                            // Add prices to the array with their types if they exist
                                            if ($spaceDailyPrice) {
                                                $prices['Day'] = $spaceDailyPrice;
                                            }
                                            if ($spaceWeeklyPrice) {
                                                $prices['Week'] = $spaceWeeklyPrice;
                                            }
                                            if ($spaceMonthlyPrice) {
                                                $prices['Month'] = $spaceMonthlyPrice;
                                            }

                                            // Check if prices are available
                                            if (empty($prices)) {
                                                echo "No price available";
                                            } else {
                                                // Find the lowest price
                                                $lowestPrice = min($prices);

                                                // Find the type of pricing corresponding to the lowest price
                                                $lowestPriceType = array_search($lowestPrice, $prices);

                                                // Display the lowest price with its type
                                                echo '&#8377;' . number_format($lowestPrice) . ' /' . $lowestPriceType;
                                            }
                                            ?>
                                        </h1>
                                    </div>
                                    <div class="date-picker-range">
                                        <input type="text" id="start-date" class="date-picker-input" placeholder="Start date (y/m/d)" required>
                                        <span class="date-picker-separator">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.5 4.5L11.4697 8.46967C11.7626 8.76256 11.7626 9.23744 11.4697 9.53033L7.5 13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                        </span>
                                        <input type="text" id="end-date" class="date-picker-input" placeholder="End date (y/m/d)" required>
                                    </div>
                                    <a href="Enquiry_form.php" id="enquiry-link">
                                        <button id="send-enquiry-btn" class="enquiry-button">Send Enquiry</button>
                                    </a>
                                </div>
                            </div>
                            <script>
                                const priceEnquiryContainer = document.getElementById('price-enquiry-container');
                                const stickyContainer = document.getElementById('sticky-container');

                                // Set the specific height value after which the box should become sticky
                                const stickyHeight = 550; // Replace 300 with the height value you want

                                window.addEventListener('scroll', function() {
                                    if (window.pageYOffset > stickyHeight) {
                                        priceEnquiryContainer.style.display = "none";
                                        stickyContainer.classList.add('sticky');
                                    } else {
                                        priceEnquiryContainer.style.display = "block";
                                        stickyContainer.classList.remove('sticky');
                                    }
                                });
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Selecting the elements
                                    const startDateInput = document.getElementById('start-date');
                                    const endDateInput = document.getElementById('end-date');
                                    const sendEnquiryBtn = document.getElementById('send-enquiry-btn');
                                    const enquiryLink = document.getElementById('enquiry-link');

                                    
                                    // Adding click event listener to the button
                                    sendEnquiryBtn.addEventListener('click', function(event) {
                                        event.preventDefault(); // Prevent the default form submission behavior

                                        // Retrieve the values from input fields
                                        const startDate = startDateInput.value;
                                        const endDate = endDateInput.value;
                                        const referringUrl = window.location.href; // Get the current URL

                                        // Check if start date and end date are not empty
                                        if (startDate.trim() !== '' && endDate.trim() !== '') {
                                            // Store the dates and referring URL in local storage
                                            localStorage.setItem('startDate', startDate);
                                            localStorage.setItem('endDate', endDate);
                                            localStorage.setItem('referringUrl', referringUrl);

                                            // Redirect to the enquiry page
                                            window.location.href = enquiryLink.href;
                                        } else {
                                            alert('Please enter both start and end dates.');
                                        }
                                    });
                                });
                            </script>
                        </div>

                        

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const content = document.getElementById("content");
                                const readMoreLink = document.getElementById("read-more");

                                // Split the content into words
                                const fullText = content.innerHTML;
                                const words = fullText.split(' ');

                                // Determine the number of words to show initially
                                const initialWordCount = 30;
                                if (words.length > initialWordCount) {
                                    const initialText = words.slice(0, initialWordCount).join(' ');
                                    const remainingText = words.slice(initialWordCount).join(' ');

                                    // Set the initial text and hide the remaining text
                                    content.innerHTML = initialText + '<span id="dots">...</span><span id="more" style="display:none;"> ' + remainingText + '</span>';

                                    // Add event listener to the read more link
                                    readMoreLink.addEventListener("click", function(event) {
                                        event.preventDefault();
                                        const dots = document.getElementById("dots");
                                        const moreText = document.getElementById("more");

                                        if (dots.style.display === "none") {
                                            dots.style.display = "inline";
                                            readMoreLink.innerHTML = "Read more";
                                            moreText.style.display = "none";
                                        } else {
                                            dots.style.display = "none";
                                            readMoreLink.innerHTML = "Read less";
                                            moreText.style.display = "inline";
                                        }
                                    });
                                } else {
                                    readMoreLink.style.display = "none"; // Hide the link if content is less than or equal to initialWordCount
                                }
                            });
                        </script>
                    </div>
                </div>

                <?php include 'footer.php' ?>
                <script src="script.js"></script>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Simulate a delay to represent content loading
                    setTimeout(function() {
                        // Hide the loader
                        document.getElementById('loader').style.display = 'none';

                        // Show the main content
                        document.getElementById('main-content').style.display = 'block';
                    }, 2500); // Adjust the delay as needed
                });
            </script>
        </body>

        </html>
<?php
    } else {
        echo "Space not found";
    }
}



?>