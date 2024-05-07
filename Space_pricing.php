<?php
session_start();
include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process List2 Form data
    $spaceDailyPrice = $_POST["space_Daily_price"] ?? "";
    $spaceWeeklyPrice = $_POST["space_Weekly_price"] ?? "";
    $spaceMonthlyPrice = $_POST["space_Monthly_price"] ?? "";
    $spaceMain = $_POST["space_main"] ?? "";
    $spaceDeposit = !empty($_POST["space_Sercurity"]) ? $_POST["space_Sercurity"] : null;
    $minDuration = $_POST["space_min_duration"] ?? "";
    $minDurationUnit = $_POST["min_duration_unit"] ?? "";
    $maxDuration = $_POST["space_max_duration"] ?? "";
    if ($maxDuration === "") {
        $maxDuration = null; // Set to NULL if empty
    }
    $maxDurationUnit = $_POST["max_duration_unit"] ?? "";

    // Store data in session
    $_SESSION['spaceDailyPrice'] = $spaceDailyPrice;
    $_SESSION['spaceWeeklyPrice'] = $spaceWeeklyPrice;
    $_SESSION['spaceMonthlyPrice'] = $spaceMonthlyPrice;
    $_SESSION['spaceMain'] = $spaceMain;
    $_SESSION['spaceDeposit'] = $spaceDeposit;
    $_SESSION['minDuration'] = $minDuration;
    $_SESSION['minDurationUnit'] = $minDurationUnit;
    $_SESSION['maxDuration'] = $maxDuration;
    $_SESSION['maxDurationUnit'] = $maxDurationUnit;

    // Redirect to next step
    echo '<script>window.location.href = "personal_details.php";</script>';
    exit();
} else {
    echo "Form not submitted";
}
?>


<!-- Your HTML content for step 3 goes here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List a Space - Step 4</title>
    <!-- Include your stylesheets and scripts here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets\css\stylelist.php">
    <link rel="stylesheet" href="assets\css\header_footer-css.php">
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

</head>


<body>
    <?php
    include 'header.php';
    ?>
    <div class="add-listing">
        <h1 class="name-center">List a Space</h1>

        <div class="step-diagram">

            <div class="diagram ">
                <div class="circle-finished enabled"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg>
                </div>
                <span> Space details<span>
            </div>
            <div class="diagram">
                <div class="circle-finished enabled "><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg></div>
                <span> Space Showcase<span>
            </div>
            <div class="diagram">
                <div class="circle-finished enabled "><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg></div>
                <span class=""> Availability Date<span>
            </div>
            <div class="diagram">
                <div class="circle ">4</div>
                <span class=""> Space Pricing<span>
            </div>
            <div class="diagram">
                <div class="circle1 disabled">5</div>
                <span class="disabled"> Personal Details<span>
            </div>
        </div>
        <div class="heading-small">Space pricing</div>
        <form action="" method="post" id="list2" onsubmit="return validateDurationSelection();">
            <!-- List2 Form -->
            <!-- ... (your existing List2 Form content) ... -->
            <div class="duration-container">
                <div class="duration-input">
                    <label for="space_min_duration"> Min Duration <span class="red">*</span></label>
                    <div class="input-group">
                        <input type="text" pattern="[0-9]*" name="space_min_duration" placeholder="Enter duration" id="space_min_duration" required style="width: 60%;" value="<?php echo isset($_SESSION['minDuration']) ? $_SESSION['minDuration'] : ''; ?>">
                        <select name="min_duration_unit" style="width: 38%;" onchange="updateRequiredFields()">
                            <option value="days" <?php echo isset($_SESSION['minDurationUnit']) && $_SESSION['minDurationUnit'] === 'days' ? 'selected' : ''; ?>>Days</option>
                            <option value="weeks" <?php echo isset($_SESSION['minDurationUnit']) && $_SESSION['minDurationUnit'] === 'weeks' ? 'selected' : ''; ?>>Weeks</option>
                            <option value="months" <?php echo isset($_SESSION['minDurationUnit']) && $_SESSION['minDurationUnit'] === 'months' ? 'selected' : ''; ?>>Months</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="duration-container">
                <div class="duration-input">
                    <label for="space_max_duration"> Max Duration </label>
                    <div class="input-group">
                        <input type="text" pattern="[0-9]*" name="space_max_duration" placeholder="Enter duration" id="space_max_duration" style="width: 60%;" value="<?php echo isset($_SESSION['maxDuration']) ? $_SESSION['maxDuration'] : ''; ?>">
                        <select name="max_duration_unit" style="width: 38%;">
                            <option value="days" <?php echo isset($_SESSION['maxDurationUnit']) && $_SESSION['maxDurationUnit'] === 'days' ? 'selected' : ''; ?>>Days</option>
                            <option value="weeks" <?php echo isset($_SESSION['maxDurationUnit']) && $_SESSION['maxDurationUnit'] === 'weeks' ? 'selected' : ''; ?>>Weeks</option>
                            <option value="months" <?php echo isset($_SESSION['maxDurationUnit']) && $_SESSION['maxDurationUnit'] === 'months' ? 'selected' : ''; ?>>Months</option>
                        </select>
                    </div>
                </div>
            </div>

            <label for="space_Daily_price">Daily Price </label>
            <input type="text" pattern="[0-9]*" min="0" name="space_Daily_price" placeholder="Enter Daily price" id="space_Daily_price" value="<?php echo isset($_SESSION['spaceDailyPrice']) ? $_SESSION['spaceDailyPrice'] : ''; ?>">
            <h5 class="right1">&#x20B9; / Daily</h5>

            <label for="space_Weekly_price">Weekly Price </label>
            <input type="text" pattern="[0-9]*" min="0" name="space_Weekly_price" placeholder="Enter Weekly Price" id="space_Weekly_price" value="<?php echo isset($_SESSION['spaceWeeklyPrice']) ? $_SESSION['spaceWeeklyPrice'] : ''; ?>">
            <h5 class="right2">&#x20B9; / Weekly</h5>

            <label for="space_Monthly_price">Monthly Price </label>
            <input type="text" pattern="[0-9]*" min="0" name="space_Monthly_price" placeholder="Enter Monthly Price" id="space_Monthly_price" value="<?php echo isset($_SESSION['spaceMonthlyPrice']) ? $_SESSION['spaceMonthlyPrice'] : ''; ?>">
            <h5 class="right3">&#x20B9; / Monthly </h5>

            <label for="space_main">Maintenance </label>
            <input type="text" pattern="[0-9]*" min="0" name="space_main" placeholder="Enter maintenance amount in rupees " id="space_main" value="<?php echo isset($_SESSION['spaceMain']) ? $_SESSION['spaceMain'] : ''; ?>">

            <label for="space_Sercurity">Security Deposit </label>
            <input type="text" pattern="[0-9]*" name="space_Sercurity" placeholder="Enter security deposit in rupees " id="space_Sercurity" value="<?php echo isset($_SESSION['spaceDeposit']) ? $_SESSION['spaceDeposit'] : ''; ?>">
            <br>
            <span class="space">Mandatory Field are marked with &nbsp;<span class="red">*</span></span>

            <div class="button-container">
                <button type="button" class="back-btn" onclick="goToStep()">Back</button>
                <button type="submit" class="next-btn" name="submit_list2">Next</button>
            </div>
        </form>

    </div>

    <?php
    include 'footer.php';
    ?>
    <script>
        const navEl = document.querySelector('.nav');
        const hamburgerEl = document.querySelector('.hamburger');
        const navItemEls = document.querySelectorAll('.nav__item');

        hamburgerEl.addEventListener('click', () => {
            navEl.classList.toggle('nav--open');
            hamburgerEl.classList.toggle('hamburger--open');
        });

        navItemEls.forEach(navItemEl => {
            navItemEl.addEventListener('click', () => {
                navEl.classList.remove('nav--open');
                hamburgerEl.classList.remove('hamburger--open');
            });
        });
    </script>
    <script>
        function goToStep() {
            window.location.href = 'Availability_Date.php';
        }

        function validateDurationSelection() {
            console.log("validateDurationSelection called");

            const minDurationSelect = document.querySelector('select[name="min_duration_unit"]');
            const minDurationUnit = minDurationSelect.value;

            // Enable or disable required attribute for price fields based on the selected minimum duration unit
            const dailyPriceField = document.getElementById('space_Daily_price');
            const weeklyPriceField = document.getElementById('space_Weekly_price');
            const monthlyPriceField = document.getElementById('space_Monthly_price');

            // Reset required attribute for all price fields
            dailyPriceField.required = false;
            weeklyPriceField.required = false;
            monthlyPriceField.required = false;

            if (minDurationUnit === 'days') {
                dailyPriceField.required = true;
            } else if (minDurationUnit === 'weeks') {
                weeklyPriceField.required = true;
            } else if (minDurationUnit === 'months') {
                monthlyPriceField.required = true;
            }

            // Check if the required fields are filled
            if ((dailyPriceField.required && dailyPriceField.value === "") ||
                (weeklyPriceField.required && weeklyPriceField.value === "") ||
                (monthlyPriceField.required && monthlyPriceField.value === "")) {

                return false;
            }

            return true;
        }
    </script>

</body>

</html>