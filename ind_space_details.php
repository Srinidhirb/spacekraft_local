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
    <style>
        body {

margin: 0;
padding: 0;
}

* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

.gallery-container {
display: flex;
flex-wrap: wrap;
align-items: center;
justify-content: center;
gap: 10px;
padding: 20px;
}

.large-image {
position: relative;
}

.large-image img,
.small-images img {
border-radius: 4px;
border: 1px solid #ccc;
}

.small-images {
display: flex;
flex-direction: column;
gap: 10px;
}

@media (max-width: 768px) {
.gallery-container {
    flex-direction: column;
}

.large-image,
.small-images {
    flex: 1;
}

.small-images {
    flex-direction: row;
}

.small-images img {
    width: 50%;
}
}

.absolute {
position: absolute;
top: 16px;
left: 16px;
}

/* Slider Popup Styles */
.slider-popup {
display: none;
position: fixed;
z-index: 999;
left: 0;
top: 0;
width: 100%;
height: 100%;
overflow: auto;
background-color: rgba(0, 0, 0, 0.8);
}

.slider-content {
display: flex;
justify-content: center;
align-items: center;
height: 100%;
}

.slider-content img {
max-width: 80%;
max-height: 80%;
margin: 0 10px;
border-radius: 4px;
}

.close {
position: absolute;
top: 20px;
right: 35px;
color: #fff;
font-size: 40px;
font-weight: bold;
cursor: pointer;
}

.container {

display: flex;
flex-wrap: wrap;

justify-content: center;
gap: 10px;

max-width: 1180px;
margin: 0 auto;
}

.left-section {
flex: 3;

}

.space_name {
font-weight: 600;
font-size: 30px;
margin: 0;
margin: 0 0 8px 0;
}

.right-section {
flex: 1;
padding: 20px;
background-color: #fff;
border-radius: 8px;

}

.address {
font-size: 1.1em;
color: #555;
}

.details {
display: flex;
gap: 10px;
margin: 10px 0;
color: #666;
}

hr {
border: none;
border-top: 1px solid #ccc;
margin: 20px 0;
}

.space-use {
display: flex;
gap: 20px;
margin: 20px 0;
}

.space-item {
display: flex;
flex-direction: column;
align-items: center;
}

.space-item p {
margin-top: 5px;
color: #555;
}


@media (max-width: 768px) {
.container {
    flex-direction: column;
}

.right-section {
    margin-top: 20px;
}
}

.amenities-section,
.similar-spaces-section {
margin-bottom: 30px;
}

.amenities-section h2,
.similar-spaces-section h2 {
margin-bottom: 15px;
font-size: 1.5em;
}

.amenities-list {
display: flex;
flex-wrap: wrap;
gap: 10px;
}

.amenity-item {
padding: 5px 10px;
background-color: #f0f0f0;
border-radius: 4px;
}

.amenity-item.checked {
font-weight: bold;
}

.similar-spaces-list {
display: flex;
gap: 20px;
flex-wrap: wrap;
}

.space-item {
background-color: #fff;
border: 1px solid #ddd;
border-radius: 8px;
overflow: hidden;
width: calc(33.333% - 20px);
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.space-item img {
width: 100%;
height: 150px;
object-fit: cover;
}

.space-item h3 {
margin: 10px;
font-size: 1.2em;
}

.space-item p {
margin: 0 10px 10px;
color: #555;
}

@media (max-width: 768px) {
.space-item {
    width: calc(50% - 20px);
}
}

@media (max-width: 480px) {
.space-item {
    width: 100%;
}
}

.space_name_share_button {
display: flex;
justify-content: space-between;
align-items: center;
width: 80%;
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

.avai_amin span {
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
    </style>
</head>
<body>
<?php
            include 'header.php';
            ?>
    <div class="gallery-container">
        <div class="large-image">
            <img src="verified.svg" class="absolute" alt="">
            <img src="https://images.unsplash.com/photo-1684182309189-a1384f3d7d4c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" width="867px" height="500px" alt="Large Image">
        </div>
        <div class="small-images">
            <img src="https://plus.unsplash.com/premium_photo-1684348962314-64fa628992f0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" width="309px" height="244px" alt="Small Image 1">
            <img src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" width="309px" height="244px" alt="Small Image 2" onclick="openSlider()">
        </div>
    </div>

    <div id="slider-popup" class="slider-popup">
        <span class="close" onclick="closeSlider()">&times;</span>
        
    </div>
    <div class="container">
        <div class="left-section">
            <div class="space_name_share_button">
                <span class="space_name"><?php echo $spaceName;   ?></span>
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
            <p class="address"><span> <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.6665 9.16634C14.6665 11.1914 13.0249 12.833 10.9998 12.833C8.97479 12.833 7.33317 11.1914 7.33317 9.16634C7.33317 7.1413 8.97479 5.49967 10.9998 5.49967C13.0249 5.49967 14.6665 7.1413 14.6665 9.16634Z" stroke="#222222" stroke-width="2" />
                                    <path d="M18.3332 9.16634C18.3332 13.2164 12.8332 20.1663 10.9998 20.1663C9.1665 20.1663 3.6665 13.2164 3.6665 9.16634C3.6665 5.11625 6.94975 1.83301 10.9998 1.83301C15.0499 1.83301 18.3332 5.11625 18.3332 9.16634Z" stroke="#222222" stroke-width="2" />
                                </svg></span> <?php
                                    // Combine the address components
                                    $combinedAddress = $spaceAddress1 . ', ' . $spaceAddress2 . ', ' . $city;
                                    // Encode the address for the Google Maps URL
                                    $encodedAddress = urlencode($combinedAddress);
                                    // Generate the Google Maps link
                                    $mapsLink = "https://www.google.com/maps/search/?api=1&query={$encodedAddress}";
                                    ?> <a href="<?php echo $mapsLink; ?>" target="_blank">
                                        <p><?php echo " $spaceAddress1, $city - $pinCode"; ?></p>
                                    </a></p>
            <div class="details">
                <span><?php echo $spaceType ?></span>
                <span>•</span>
                <span><?php echo   $spaceArea; ?> Sq.ft</span>
                <span>•</span>
                <span>👁️ 1000</span>
            </div>
            <hr>
            <h2>Space use</h2>
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
            </div>
            <h2>About space</h2>
            <p>Lorem ipsum dolor sit amet consectetur. Porttitor fringilla dignissim consequat sed. Consectetur nec vel elementum malesuada in. Nisl aenean sodales cras tincidunt. Volutpat sagittis facilisis turpis id egestas lobortis at adipiscing.</p>
            <a href="#">Read more</a>

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
            <div class="similar-spaces-section">
                <h2>Similar spaces</h2>
                <div class="similar-spaces-list">
                    <div class="space-item">
                        <img src="https://via.placeholder.com/150" alt="Space 1">
                        <h3>Space name</h3>
                        <p>12, 2th cross, Hebbal, Bangalore 5600</p>
                        <p>800 Sq.ft</p>
                    </div>
                    <div class="space-item">
                        <img src="https://via.placeholder.com/150" alt="Space 2">
                        <h3>Space name</h3>
                        <p>12, 2th cross, Hebbal, Bangalore 5600</p>
                        <p>800 Sq.ft</p>
                    </div>
                    <div class="space-item">
                        <img src="https://via.placeholder.com/150" alt="Space 3">
                        <h3>Space name</h3>
                        <p>12, 2th cross, Hebbal, Bangalore 5600</p>
                        <p>800 Sq.ft</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-section">
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
    <script src="script.js"></script>
</body>
</html>
<?php
    } else {
        echo "Space not found";
    }
}



?>