<?php

@include 'connect.php';

// Function to get the current URL
function getCurrentURL()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $url = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $url;
}

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
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
    $spaceId = $_GET['spaceId'];

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
        $selectedDays = [];
        $selectedDatesString = implode(', ', $selectedDates);

        // Explode the comma-separated string into an array of dates
        $datesArray = explode(', ', $selectedDatesString);

        // Loop through each date and extract the day part
        foreach ($datesArray as $dateString) {
            $parts = explode('-', $dateString); // Split the date into parts
            $day = intval($parts[0]); // Extract the day part
            $selectedDays[] = $day; // Add the extracted day to the array
            $month = intval($parts[1]); // Extract the month part
            $year = intval($parts[2]); // Extract the year part
            $selectedMonths[] = $month; // Add the extracted month to the array
            $selectedYears[] = $year;
        }
        $uniqueMonths = array_unique($selectedMonths);
        $uniqueYears = array_unique($selectedYears);

        // Assuming you only want to display the first month and year
        $firstMonth = reset($uniqueMonths); // Get the first month
        $firstYear = reset($uniqueYears); // Get the first year

        // Convert the array of selected days into a comma-separated string
        $selectedDaysString = implode(',', $selectedDays);

        // Encode the array of selected days into JSON format
        $selectedDaysJSON = json_encode($selectedDays);

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
            <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
            <title>Space Details</title>

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

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
            <!-- Add your styling and additional content as needed -->
            <style>
                .ind_listing {
                    margin: 96px 40px;
                }

                .swiper {
                    width: 714px;
                    height: 430px;

                    margin: 5px;
                }

                .swiper img {
                    width: 100%;
                    height: 430px;

                }

                .image_details {
                    display: flex;
                    column-gap: 40px;

                }

                .image_details .space_details {
                    width: 537px;
                    margin: 48px 0 0 0;
                }

                /*
                .swiper-slide {
                    text-align: center;
                    font-size: 18px;
                    background: #fff;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .swiper-slide img {
                    display: block;
                    width: 714px;
                    height: 330px;
                    
                } */

                /* .image_details {
                    display: flex;
                    flex-direction: row;
                    column-gap: 40px;

                } */

                /* .image_details .space_details {
                    width: 31%;
                    margin: 48px 0 0 0;
                } */

                .space_details span {
                    display: flex;

                    align-items: center;
                }

                .space_details span p {
                    font-family: Lato;
                    font-size: 16px;
                    font-weight: 400;
                    line-height: 16px;
                    text-align: left;
                    color: #222222;
                }

                .space_details span svg,
                i {
                    margin: 0 24px 0 0;
                }

                .flex_details {
                    display: flex;
                    width: 100%;
                    justify-content: space-between;
                    align-items: center;
                    flex-wrap: wrap;
                }

                .flex_details span {
                    margin: 0 0 24px 0;
                }


                .space_name {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin: 70px 0 0 0px;
                    width: 80%;
                }

                .space_name .s_name {
                    font-family: Lato;
                    font-size: 24px;
                    font-weight: 700;
                    line-height: 28.8px;
                    text-align: left;
                    color: #222222;
                }

                .buttons {
                    position: relative;
                    display: grid;
                    place-items: center;
                    height: fit-content;
                    width: fit-content;
                    transition: 0.3s;
                    border-radius: 50%;
                }



                .buttons:hover .button {
                    box-shadow: 5px 5px 12px #cacaca, -5px -5px 12px #ffffff;
                }

                .main-button {
                    position: relative;
                    display: grid;
                    place-items: center;
                    padding: 10px;
                    border: none;
                    background: #ffffff;

                    border-radius: 50%;
                    transition: 0.2s;
                    z-index: 100;
                }

                .button {
                    position: absolute;
                    display: grid;
                    place-items: center;
                    padding: 10px;
                    border: none;
                    background: #ffffff;

                    transition: 0.3s;
                    border-radius: 50%;
                }



                .twitter-button:hover {
                    background: #1CA1F1;
                }

                .buttons:hover .twitter-button {
                    translate: 0px -55px;
                    box-shadow: 5px 5px 12px #cacaca, -5px -5px 12px #ffffff;
                }



                .messenger-button:hover {
                    background: #0093FF;
                }

                .buttons:hover .messenger-button {
                    translate: -55px 0px;
                    box-shadow: 5px 5px 12px #cacaca, -5px -5px 12px #ffffff;
                }


                .instagram-button:hover {
                    background: #F914AF;
                }

                .buttons:hover .instagram-button {
                    translate: 0px 55px;
                    box-shadow: 5px 5px 12px #cacaca, -5px -5px 12px #ffffff;
                }



                .whatsapp-button:hover {
                    background: #25D366;
                }

                .buttons:hover .whatsapp-button {
                    translate: 57px 0px;

                    box-shadow: 5px 5px 12px #cacaca, -5px -5px 12px #ffffff;
                }

                @media screen and (max-width:1200px) {

                    .image_details .details {
                        padding: 0;
                    }

                }

                .float hr {
                    width: 85%;


                    color: #CECECE;
                    margin: 40px 0 32px 0px;

                }

                .calendar1 span,
                .avai_amin span,
                .abt span {
                    font-family: Lato;
                    font-size: 24px;
                    font-weight: 600;
                    line-height: 28.8px;
                    text-align: left;
                    color: #222222;
                    /* margin: 0px 0 0 40px; */
                }



                .avai_amin table td {
                    width: auto;
                    padding: 15px 25px 15px 0px;

                }

                .svg_amei {
                    display: flex;
                    align-items: center;

                }

                .svg_amei .svg svg {
                    margin: 0 10px 0 0;
                }

                .amei_disabled {
                    color: #9A9A9A;

                }

                .amei {
                    display: flex;
                    align-items: center;
                }

                @media screen and (max-width: 576px) {
                    table.responsive-table tr {
                        display: block;

                    }

                    table.responsive-table tr:last-child {
                        margin-bottom: 0;
                    }

                    table.responsive-table td {
                        display: inline-block;

                        box-sizing: border-box;

                        vertical-align: top;
                    }

                    .svg_amei {
                        margin-bottom: 10px;
                        /* Add spacing between rows */
                    }
                }

                .calendar {
                    width: 300px;
                    margin: 24px 0px;
                    font-family: Arial, sans-serif;
                    background-color: #FBFBFB;
                    padding: 10px 20px;
                }



                .abt p {

                    margin: 24px 0 0 0px;
                    font-family: Lato;
                    font-size: 16px;
                    font-weight: 400;
                    line-height: 24px;
                    letter-spacing: 0.02em;
                    text-align: justify;
                    color: #4A494B;

                }

                .price_box {
                    width: 342px;
                    height: 158px;
                    border: 1px solid #333333;
                    border-radius: 6px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    row-gap: 40px;
                    align-items: center;
                }

                .float {
                    display: flex;

                }

                .float_left {
                    width: 70%;
                }

                .float_right {
                    margin: 78px 0;
                    width: 332px;
                }

                .price_text {
                    font-family: Lato;
                    font-size: 18px;
                    font-weight: 400;
                    line-height: 21.6px;
                    letter-spacing: 0.5px;
                    text-align: left;
                    color: #222222;
                }

                .price_btn {
                    width: 292px;
                    margin: 0 20px;

                }

                .price_btn button {
                    padding: 10px 16px 10px 16px;
                    width: 100%;
                    border-radius: 4px;
                    text-align: center;
                    background-color: #031B64;
                    border: none;
                    color: #ffffff;
                    font-family: Lato;
                    font-size: 16px;
                    font-weight: 400;
                    line-height: 19.2px;
                    cursor: pointer;

                }

                @media screen and (max-width:1000px) {

                    .image_details,
                    .float {
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                    }

                    .image_details .space_details {
                        width: 100%;
                    }

                    .swiper,
                    .float_left,
                    .space_name {
                        width: 100%;
                    }

                    .ind_listing {
                        margin: 96px 20px;
                    }

                    .buttons:hover .messenger-button {
                        translate: -55px -31px;
                    }

                    .buttons:hover .whatsapp-button {
                        translate: -55px 33px;
                    }

                    .float hr {
                        width: 100%;
                    }


                }

                @media screen and (max-width:400px) {
                    .calendar {
                        padding: 0;
                    }

                }

                @media screen and (max-width:600px) {
                    .swiper {
                        height: 300px;

                    }

                    .swiper img {
                        height: 300px;
                    }

                    .price_box {
                        width: 300px;

                    }

                    .price_text {
                        text-align: center;
                    }

                    .float_right {
                        width: auto;
                    }

                    .price_btn button {
                      
                        margin: 0 auto;
                    }


                }

                #calendar {
                    width: 300px;
                    margin: 20px auto;
                }

                #calendar table {
                    border-collapse: collapse;
                }

                .calendar-th,
                .calendar-td {
                    padding: 10px;
                    text-align: center;

                }



                .calendar-td {
                    cursor: pointer;
                }

                .calendar-td.selected {
                    background-color: #007bff;
                    color: #fff;
                }

                .special-date {
                    background-color: #031B64;
                    color: #ffffff;
                    border-radius: 50%;
                }
            </style>
        </head>

        <body>
            <?php
            include 'header.php';
            ?>
            <div class="ind_listing">
                <div class="image_details">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            // Check if there are images available
                            if ($spaceImg !== "N/A") {
                                // Handle multiple images
                                $imagePaths = explode(',', $spaceImg);

                                // Display each image in the slideshow
                                for ($i = 0; $i < min(4, count($imagePaths)); $i++) {
                                    echo '<div class="swiper-slide">';
                                    echo '<img class="listing-image" src="http://spacekraft.in/' . $imagePaths[$i] . '" height="200" alt="">';
                                    echo '</div>';
                                }
                            }
                            ?>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="space_details">
                        <div class="flex_details">
                            <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.075" y="0.075" width="23.85" height="23.85" rx="3.925" stroke="#CECECE" stroke-width="0.15" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 9H6V14H18V9H19V14H20.25C20.3881 14 20.5 14.1119 20.5 14.25V14.75C20.5 14.8881 20.3881 15 20.25 15H3.75C3.61193 15 3.5 14.8881 3.5 14.75V14.25C3.5 14.1119 3.61193 14 3.75 14H5V9ZM5 17V20H19V17H5ZM4.5 16C4.22386 16 4 16.2239 4 16.5V20.5C4 20.7761 4.22386 21 4.5 21H19.5C19.7761 21 20 20.7761 20 20.5V16.5C20 16.2239 19.7761 16 19.5 16H4.5Z" fill="#222222" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.0944 4L4.02177 6.95645C4.00739 6.9961 4 7.03805 4 7.08045V8.2755C4 8.6796 4.32373 9 4.71428 9C5.10485 9 5.42855 8.6796 5.42855 8.2755C5.42855 7.99935 5.65245 7.7755 5.92855 7.7755C6.2047 7.7755 6.42855 7.99935 6.42855 8.2755C6.42855 8.6796 6.7523 9 7.14285 9C7.5334 9 7.85715 8.6796 7.85715 8.2755C7.85715 7.99935 8.081 7.7755 8.35715 7.7755C8.6333 7.7755 8.85715 7.99935 8.85715 8.2755C8.85715 8.6796 9.1809 9 9.57145 9C9.9618 9 10.2854 8.6799 10.2857 8.2761C10.2859 8.00015 10.5097 7.7765 10.7857 7.7765C11.0617 7.7765 11.2855 8.00015 11.2857 8.2761C11.286 8.6799 11.6096 9 12 9C12.3905 9 12.7143 8.6796 12.7143 8.2755C12.7143 7.99935 12.9382 7.7755 13.2143 7.7755C13.4904 7.7755 13.7143 7.99935 13.7143 8.2755C13.7143 8.6796 14.038 9 14.4285 9C14.8189 9 15.1425 8.6799 15.1428 8.2761C15.1431 8.00015 15.3668 7.7765 15.6428 7.7765C15.9188 7.7765 16.1427 8.00015 16.1429 8.2761C16.1432 8.6799 16.4668 9 16.8571 9C17.2477 9 17.5714 8.6796 17.5714 8.2755C17.5714 7.99935 17.7953 7.7755 18.0714 7.7755C18.3475 7.7755 18.5714 7.99935 18.5714 8.2755C18.5714 8.6796 18.8952 9 19.2857 9C19.6763 9 20 8.6796 20 8.2755V7.08045C20 7.03805 19.9926 6.9961 19.9783 6.95645L18.9056 4H5.0944ZM18.0714 9.4928C17.7616 9.80575 17.3328 10 16.8571 10C16.3814 10 15.9527 9.80575 15.6428 9.4928C15.3331 9.80575 14.9043 10 14.4285 10C13.9529 10 13.524 9.80575 13.2143 9.4928C12.9045 9.80575 12.4757 10 12 10C11.5243 10 11.0955 9.80575 10.7857 9.4928C10.4759 9.80575 10.0471 10 9.57145 10C9.09575 10 8.6669 9.80575 8.35715 9.4928C8.04735 9.80575 7.61855 10 7.14285 10C6.6672 10 6.23835 9.80575 5.92855 9.4928C5.6188 9.80575 5.18995 10 4.71428 10C3.76357 10 3 9.22395 3 8.2755V7.08045C3 6.9219 3.02764 6.7645 3.08172 6.6154L4.17181 3.6108C4.30414 3.24605 4.65006 3 5.04095 3H18.959C19.3499 3 19.6958 3.24605 19.8282 3.6108L20.9183 6.6154C20.9724 6.7645 21 6.9219 21 7.08045V8.2755C21 9.22395 20.2364 10 19.2857 10C18.8101 10 18.3812 9.80575 18.0714 9.4928Z" fill="#222222" />
                                    <path d="M7 12.75C7 12.6119 7.11195 12.5 7.25 12.5H8.75C8.88805 12.5 9 12.6119 9 12.75V13.75C9 13.8881 8.88805 14 8.75 14H7.25C7.11195 14 7 13.8881 7 13.75V12.75Z" fill="#222222" />
                                    <path d="M8 13.25C8 13.1119 8.11195 13 8.25 13H9.75C9.88805 13 10 13.1119 10 13.25V13.75C10 13.8881 9.88805 14 9.75 14H8.25C8.11195 14 8 13.8881 8 13.75V13.25ZM12 13.25C12 13.6642 11.6642 14 11.25 14C10.8358 14 10.5 13.6642 10.5 13.25C10.5 12.8358 10.8358 12.5 11.25 12.5C11.6642 12.5 12 12.8358 12 13.25Z" fill="#222222" />
                                    <path d="M2.16667 0L0 2.16667V6.5L6.5 0H2.16667Z" fill="#031B64" />
                                    <path d="M1.92842 2.82653C1.95835 2.85645 1.97711 2.88971 1.9847 2.92631C1.9923 2.96291 1.98815 3.00112 1.97227 3.04094C1.95662 3.08053 1.929 3.12012 1.88941 3.15971C1.87191 3.1772 1.85362 3.1932 1.83451 3.2077C1.81564 3.22197 1.7963 3.23463 1.77651 3.24568C1.75671 3.25627 1.73657 3.26513 1.71608 3.27227L1.61665 3.17283C1.65117 3.15948 1.68559 3.14417 1.71988 3.12691C1.75418 3.10965 1.78399 3.08836 1.80931 3.06304C1.8268 3.04554 1.83854 3.0292 1.84452 3.01401C1.85074 2.99859 1.85223 2.98443 1.84901 2.97154C1.84579 2.95865 1.839 2.94703 1.82864 2.93667C1.81598 2.92401 1.8009 2.91745 1.78341 2.91699C1.76592 2.91653 1.74578 2.91986 1.72299 2.927C1.70043 2.93391 1.67534 2.94219 1.64772 2.95186C1.63046 2.95807 1.61101 2.96417 1.58937 2.97016C1.5675 2.97591 1.5446 2.97925 1.52066 2.98017C1.49672 2.98109 1.47256 2.97741 1.44816 2.96912C1.42376 2.96038 1.40005 2.94449 1.37703 2.92148C1.34688 2.89132 1.328 2.85864 1.32041 2.82342C1.31281 2.7882 1.31615 2.75218 1.33042 2.71535C1.34469 2.67806 1.36932 2.64192 1.40431 2.60694C1.43055 2.5807 1.45863 2.55883 1.48855 2.54134C1.51848 2.52338 1.5522 2.50716 1.58972 2.49265L1.6384 2.61039C1.60571 2.6242 1.57763 2.63778 1.55415 2.65113C1.53045 2.66425 1.50904 2.68036 1.48993 2.69947C1.47658 2.71282 1.46738 2.7264 1.46231 2.74021C1.45702 2.75379 1.45587 2.76691 1.45886 2.77957C1.46162 2.792 1.46807 2.80328 1.47819 2.81341C1.49016 2.82538 1.50374 2.83205 1.51894 2.83343C1.53413 2.83435 1.55254 2.83159 1.57418 2.82515C1.59605 2.81847 1.62263 2.80961 1.65394 2.79856C1.69192 2.78498 1.72667 2.77577 1.75821 2.77094C1.78974 2.76565 1.81943 2.76703 1.84729 2.77508C1.87491 2.78291 1.90195 2.80006 1.92842 2.82653Z" fill="white" />
                                    <path d="M2.35483 2.68048L2.24779 2.78751L1.83209 2.37181L1.69502 2.50888L1.60594 2.4198L1.98712 2.03863L2.0762 2.12771L1.93913 2.26478L2.35483 2.68048Z" fill="white" />
                                    <path d="M2.8786 2.15671L2.72185 2.07316L2.53782 2.25718L2.62137 2.41393L2.50605 2.52925L2.17736 1.84424L2.30822 1.71339L2.99392 2.04139L2.8786 2.15671ZM2.60653 2.00894L2.45254 1.92814C2.44241 1.92262 2.42929 1.91571 2.41318 1.90743C2.39707 1.89868 2.38072 1.88993 2.36415 1.88119C2.34758 1.87198 2.33342 1.86381 2.32168 1.85667C2.32882 1.86841 2.33733 1.88337 2.34723 1.90156C2.35713 1.91928 2.36645 1.9362 2.3752 1.95231C2.38395 1.96842 2.39016 1.97993 2.39384 1.98684L2.47498 2.14048L2.60653 2.00894Z" fill="white" />
                                    <path d="M3.05779 1.97752L2.55301 1.47274L2.66004 1.3657L3.07644 1.78209L3.28118 1.57735L3.36957 1.66574L3.05779 1.97752Z" fill="white" />
                                    <path d="M3.45761 1.5777L2.95283 1.07292L3.05986 0.965884L3.47625 1.38228L3.681 1.17753L3.76939 1.26592L3.45761 1.5777Z" fill="white" />
                                </svg>
                                <p> <?php echo $spaceType ?></p>
                            </span>
                            <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.90852 13.1718C2.56695 12.4286 2.56695 11.5714 2.90852 10.8282C4.48962 7.38843 7.96561 5 11.9994 5C16.0333 5 19.5093 7.38843 21.0904 10.8282C21.4319 11.5714 21.4319 12.4286 21.0904 13.1718C19.5093 16.6116 16.0333 19 11.9994 19C7.96561 19 4.48962 16.6116 2.90852 13.1718Z" stroke="#222222" stroke-width="2" />
                                    <path d="M14.9994 12C14.9994 13.6569 13.6563 15 11.9994 15C10.3426 15 8.99945 13.6569 8.99945 12C8.99945 10.3431 10.3426 9 11.9994 9C13.6563 9 14.9994 10.3431 14.9994 12Z" stroke="#222222" stroke-width="2" />
                                </svg>
                                <p> <?php echo $spaceType ?></p>
                            </span>
                        </div>
                        <div class="flex_details">
                            <span><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.6665 9.16634C14.6665 11.1914 13.0249 12.833 10.9998 12.833C8.97479 12.833 7.33317 11.1914 7.33317 9.16634C7.33317 7.1413 8.97479 5.49967 10.9998 5.49967C13.0249 5.49967 14.6665 7.1413 14.6665 9.16634Z" stroke="#222222" stroke-width="2" />
                                    <path d="M18.3332 9.16634C18.3332 13.2164 12.8332 20.1663 10.9998 20.1663C9.1665 20.1663 3.6665 13.2164 3.6665 9.16634C3.6665 5.11625 6.94975 1.83301 10.9998 1.83301C15.0499 1.83301 18.3332 5.11625 18.3332 9.16634Z" stroke="#222222" stroke-width="2" />
                                </svg>

                                <p> <?php
                                    // Combine the address components
                                    $combinedAddress = $spaceAddress1 . ', ' . $spaceAddress2 . ', ' . $city;
                                    // Encode the address for the Google Maps URL
                                    $encodedAddress = urlencode($combinedAddress);
                                    // Generate the Google Maps link
                                    $mapsLink = "https://www.google.com/maps/search/?api=1&query={$encodedAddress}";
                                    ?> <a href="<?php echo $mapsLink; ?>" target="_blank">
                                        <p><?php echo " $spaceAddress1, $city - $pinCode"; ?></p>
                                    </a></p>
                            </span>
                            <span> <i class="fas fa-expand-arrows-alt"></i>
                                <?php echo   $spaceArea; ?> Sq.ft</p>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Swiper JS -->
                <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

                <!-- Initialize Swiper -->
                <script>
                    var swiper = new Swiper(".mySwiper", {
                        loop: true,
                        pagination: {
                            clickable: true,
                            el: ".swiper-pagination",
                        },
                    });
                </script>
                <div class="float">
                    <div class="float_left">
                        <div class="space_name">
                            <div class="s_name"><?php echo $spaceName;   ?></div>
                            <div class="s_share">
                                <div class="buttons">
                                    <button class="main-button">
                                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M27.9129 17.3603C28.2384 17.0813 28.4011 16.9418 28.4607 16.7758C28.5131 16.6301 28.5131 16.4708 28.4607 16.3251C28.4011 16.1591 28.2384 16.0196 27.9129 15.7406L16.6186 6.05973C16.0583 5.57947 15.7781 5.33934 15.5409 5.33346C15.3348 5.32834 15.1379 5.41891 15.0076 5.57874C14.8577 5.76266 14.8577 6.13164 14.8577 6.8696V12.5966C12.0115 13.0946 9.40652 14.5368 7.47067 16.7023C5.36016 19.0631 4.19271 22.1184 4.19106 25.2851V26.1011C5.59018 24.4156 7.33707 23.0525 9.31207 22.105C11.0533 21.2697 12.9356 20.7749 14.8577 20.6445V26.2313C14.8577 26.9692 14.8577 27.3382 15.0076 27.5221C15.1379 27.682 15.3348 27.7725 15.5409 27.7674C15.7781 27.7615 16.0583 27.5214 16.6186 27.0411L27.9129 17.3603Z" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                    <button class="whatsapp-button button" style="transition-delay: 0s, 0s, 0s; transition-property: translate, background, box-shadow;">
                                        <a href="whatsapp://send?text=<?php echo urlencode($current_url); ?>" data-action="share/whatsapp/share">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" height="30" width="30">
                                                <path d="M19.001 4.908A9.817 9.817 0 0 0 11.992 2C6.534 2 2.085 6.448 2.08 11.908c0 1.748.458 3.45 1.321 4.956L2 22l5.255-1.377a9.916 9.916 0 0 0 4.737 1.206h.005c5.46 0 9.908-4.448 9.913-9.913A9.872 9.872 0 0 0 19 4.908h.001ZM11.992 20.15A8.216 8.216 0 0 1 7.797 19l-.3-.18-3.117.818.833-3.041-.196-.314a8.2 8.2 0 0 1-1.258-4.381c0-4.533 3.696-8.23 8.239-8.23a8.2 8.2 0 0 1 5.825 2.413 8.196 8.196 0 0 1 2.41 5.825c-.006 4.55-3.702 8.24-8.24 8.24Zm4.52-6.167c-.247-.124-1.463-.723-1.692-.808-.228-.08-.394-.123-.556.124-.166.246-.641.808-.784.969-.143.166-.29.185-.537.062-.247-.125-1.045-.385-1.99-1.23-.738-.657-1.232-1.47-1.38-1.716-.142-.247-.013-.38.11-.504.11-.11.247-.29.37-.432.126-.143.167-.248.248-.413.082-.167.043-.31-.018-.433-.063-.124-.557-1.345-.765-1.838-.2-.486-.404-.419-.557-.425-.142-.009-.309-.009-.475-.009a.911.911 0 0 0-.661.31c-.228.247-.864.845-.864 2.067 0 1.22.888 2.395 1.013 2.56.122.167 1.742 2.666 4.229 3.74.587.257 1.05.408 1.41.523.595.19 1.13.162 1.558.1.475-.072 1.464-.6 1.673-1.178.205-.58.205-1.075.142-1.18-.061-.104-.227-.165-.475-.29Z"></path>
                                            </svg>
                                        </a>
                                    </button>

                                    <button class="twitter-button button" style="transition-delay: 0.2s, 0s, 0.2s; transition-property: translate, background, box-shadow;">
                                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($current_url); ?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" height="30" width="30">
                                                <path d="M8.432 19.8c7.245 0 11.209-6.005 11.209-11.202 0-.168 0-.338-.007-.506A8.023 8.023 0 0 0 21.6 6.049a7.99 7.99 0 0 1-2.266.622 3.961 3.961 0 0 0 1.736-2.18 7.84 7.84 0 0 1-2.505.951 3.943 3.943 0 0 0-6.715 3.593A11.19 11.19 0 0 1 3.73 4.92a3.947 3.947 0 0 0 1.222 5.259 3.989 3.989 0 0 1-1.784-.49v.054a3.946 3.946 0 0 0 3.159 3.862 3.964 3.964 0 0 1-1.775.069 3.939 3.939 0 0 0 3.68 2.733 7.907 7.907 0 0 1-4.896 1.688 7.585 7.585 0 0 1-.936-.054A11.213 11.213 0 0 0 8.432 19.8Z"></path>
                                            </svg>
                                        </a>
                                    </button>

                                    <button class="messenger-button button" style="transition-delay: 0.4s, 0s, 0.4s; transition-property: translate, background, box-shadow;">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>" target="_blank">
                                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 11.7C2 6.126 6.366 2 12 2s10 4.126 10 9.7c0 5.574-4.366 9.7-10 9.7-1.012 0-1.982-.134-2.895-.384a.799.799 0 0 0-.534.038l-1.985.877a.8.8 0 0 1-1.122-.707l-.055-1.779a.799.799 0 0 0-.269-.57C3.195 17.135 2 14.615 2 11.7Zm6.932-1.824-2.937 4.66c-.281.448.268.952.689.633l3.156-2.395a.6.6 0 0 1 .723-.003l2.336 1.753a1.501 1.501 0 0 0 2.169-.4l2.937-4.66c.283-.448-.267-.952-.689-.633l-3.156 2.395a.6.6 0 0 1-.723.003l-2.336-1.754a1.5 1.5 0 0 0-2.169.4v.001Z"></path>
                                            </svg>
                                        </a>
                                    </button>

                                    <button class="instagram-button button" style="transition-delay: 0.6s, 0s, 0.6s; transition-property: translate, background, box-shadow;">
                                        <a href="https://www.instagram.com/?url=<?php echo urlencode($current_url); ?>" target="_blank">
                                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2c-2.714 0-3.055.013-4.121.06-1.066.05-1.793.217-2.429.465a4.896 4.896 0 0 0-1.771 1.154A4.909 4.909 0 0 0 2.525 5.45c-.248.635-.416 1.362-.465 2.425C2.013 8.944 2 9.284 2 12.001c0 2.715.013 3.055.06 4.121.05 1.066.217 1.792.465 2.428a4.91 4.91 0 0 0 1.154 1.771 4.88 4.88 0 0 0 1.77 1.154c.637.247 1.362.416 2.427.465 1.068.047 1.408.06 4.124.06 2.716 0 3.055-.012 4.122-.06 1.064-.05 1.793-.218 2.43-.465a4.893 4.893 0 0 0 1.77-1.154 4.91 4.91 0 0 0 1.153-1.771c.246-.636.415-1.363.465-2.428.047-1.066.06-1.406.06-4.122s-.012-3.056-.06-4.124c-.05-1.064-.219-1.791-.465-2.426a4.907 4.907 0 0 0-1.154-1.771 4.888 4.888 0 0 0-1.771-1.154c-.637-.248-1.365-.416-2.429-.465-1.067-.047-1.406-.06-4.123-.06H12Zm-.896 1.803H12c2.67 0 2.987.008 4.04.057.975.044 1.505.208 1.858.344.466.181.8.399 1.15.748.35.35.566.683.747 1.15.138.352.3.882.344 1.857.049 1.053.059 1.37.059 4.039 0 2.668-.01 2.986-.059 4.04-.044.974-.207 1.503-.344 1.856a3.09 3.09 0 0 1-.748 1.149 3.09 3.09 0 0 1-1.15.747c-.35.137-.88.3-1.857.345-1.053.047-1.37.059-4.04.059s-2.987-.011-4.041-.059c-.975-.045-1.504-.208-1.856-.345a3.097 3.097 0 0 1-1.15-.748 3.1 3.1 0 0 1-.75-1.15c-.136-.352-.3-.882-.344-1.857-.047-1.054-.057-1.37-.057-4.041 0-2.67.01-2.985.057-4.039.045-.975.208-1.505.345-1.857.181-.466.399-.8.749-1.15a3.09 3.09 0 0 1 1.15-.748c.352-.137.881-.3 1.856-.345.923-.042 1.28-.055 3.144-.056v.003Zm6.235 1.66a1.2 1.2 0 1 0 0 2.4 1.2 1.2 0 0 0 0-2.4ZM12 6.865a5.136 5.136 0 1 0-.16 10.272A5.136 5.136 0 0 0 12 6.865Zm0 1.801a3.334 3.334 0 1 1 0 6.668 3.334 3.334 0 0 1 0-6.668Z"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="all_details">
                            <div class="calendar1">
                                <span>Availability</span>
                                <div class="calendar">
                                    <div id="calendar"></div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const calendar = document.getElementById('calendar');

                                            function generateCalendar() {
                                                const today = new Date();
                                                const year = today.getFullYear();
                                                const month = today.getMonth();
                                                const daysInMonth = new Date(year, month + 1, 0).getDate();
                                                const firstDayOfMonth = new Date(year, month, 1).getDay();
                                                const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                                                // Extracted dates from the database
                                                const selectedDays = <?php echo $selectedDaysJSON; ?>;

                                                let html = `<table>`;
                                                html += `<tr><th colspan="7" class="calendar-th">${monthNames[month]} ${year}</th></tr>`;

                                                html += `<tr>`;

                                                let dayCounter = 0;
                                                for (let i = 0; i < firstDayOfMonth; i++) {
                                                    html += `<td class="calendar-td"></td>`;
                                                    dayCounter++;
                                                }

                                                for (let day = 1; day <= daysInMonth; day++) {
                                                    if (dayCounter % 7 === 0) {
                                                        html += `</tr><tr>`;
                                                    }

                                                    // Check if the current day is a special date
                                                    const isSpecialDate = selectedDays.includes(day);

                                                    // Add different background color for special dates
                                                    if (isSpecialDate) {
                                                        html += `<td class="calendar-td special-date">${day}</td>`;
                                                    } else {
                                                        html += `<td class="calendar-td">${day}</td>`;
                                                    }

                                                    dayCounter++;
                                                }

                                                html += `</tr></table>`;
                                                calendar.innerHTML = html;

                                                const cells = document.querySelectorAll('#calendar .calendar-td');
                                                cells.forEach(cell => {
                                                    cell.addEventListener('click', function() {
                                                        cells.forEach(cell => cell.classList.remove('selected'));
                                                        this.classList.add('selected');
                                                    });
                                                });
                                            }

                                            generateCalendar();
                                        });
                                    </script>
                                </div>
                            </div>
                            <hr>
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
                                            echo "<td><div class='svg_amei'><div class='amei $class $amei_class'>$svg_icon $amenity</div></div></td>";

                                            // Increment the counter
                                            $count_alternative++;

                                            // Start a new row after every 3 amenities for mobile screens
                                            if ($count_alternative % 5 == 0) {
                                                echo '</tr><tr>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                </table>






                            </div>
                            <hr>
                            <div class="abt">
                                <span>About Space</span>
                                <p><?php echo  $spaceDes; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="float_right">
                        <div class="price_box">
                            <div class="price_text"> Prices starting from :
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
                            </div>

                            <div class="price_btn " onclick="contactOwner('<?php echo $row['user_id']; ?>')" > <button> Send Enquiry </button></div>
                        </div>
                        <script>
                function contactOwner(userId) {
                    // Fetch contact information of the owner based on the user ID
                    console.log('Contact Owner button clicked for user ID:', userId);
                    window.location.href = 'contact-owner.php?userId=' + userId;
                }

                async function fetchContactInfo(userId) {
                    try {
                        // Use AJAX or fetch API to make a request to a server-side script
                        const response = await fetch(`get_owner_info.php?userId=${userId}`);

                        const data = await response.json();

                        // Display the contact information
                        if (data.success) {
                            alert(`Owner Name: ${data.ownerName}\nOwner Email: ${data.ownerEmail}\nOwner Number: ${data.ownerNumber}`);
                        } else {
                            alert(data.message);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                }
            </script>
                    </div>
                </div>
            </div>
            <?php
            include 'footer.php';
            ?>



        </body>

        </html>
<?php
    } else {
        echo "Space not found";
    }
}



?>