<?php
session_start();

// Include your database connection file
include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    

    // Personal Details
    $you_are = $_POST['you_are'] ?? []; // Retrieve the array of selected values or an empty array if none are selected
    $you = implode(',', $you_are); // Convert the array to a comma-separated string

    $full_name = $_POST['full_name'] ?? "";
    $email = $_POST['email'] ?? "";
    $mobile_number = $_POST['number'] ?? "";
    $otp = $_POST['otp'] ?? "";

    $_SESSION['you_are'] = $you;
    $_SESSION['full_name'] = $full_name;
    $_SESSION['number'] = $mobile_number;
    $_SESSION['otp'] = $otp;
    echo '<script>window.location.href = "premium_listing.php";</script>';
    exit();
} else {
    echo "Form not submitted";
}



// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List a space -Step 5</title>
    <link rel="website icon" href="assets/img/Logo Icon 16_16.svg">
    <link rel="stylesheet" href="assets/css/header_footer-css.php">
    <link rel="stylesheet" href="assets/css/stylelist.php">
    <style>

    </style>
</head>

<body>
    <?php include "header.php" ?>
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
                <span class=""> Space Pricing<span>
            </div>
            <div class="diagram">
                <div class="circle1 disabled">4</div>
                <span class="disabled"> Personal Details<span>
            </div>
        </div>
        <div class="heading-small">Personal Details</div>
        <form method="post" id="form">
            <label for="you_are">You are <span class="red">*</span></label>
            <div class="you_are" id="you">
                <label>
                    <input type="checkbox" name="you_are[]" value="Owner">
                    <span>Owner</span>
                </label>
                <label>
                    <input type="checkbox" name="you_are[]" value="Agent">
                    <span>Agent</span>
                </label>
            </div>

            <label for="full_name">Full Name <span class="red">*</span> </label>
            <input type="text" name="full_name" id="full_name" placeholder="Enter your full name" value="<?php echo isset($_SESSION['full_name']) ? $_SESSION['full_name'] : ''; ?>" required>

            <label for="email">Email Address <span class="red">*</span> </label>
            <input type="email" name="email" id="email" placeholder="Enter your email address" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>

            <label for="number">Mobile Number <span class="red">*</span> </label>
            <input type="text" name="number" id="number" placeholder="Enter your mobile number" maxlength="10" minlength="10" value="<?php echo isset($_SESSION['number']) ? $_SESSION['number'] : ''; ?>" required>

            <label for="otp">Enter Verification Code (OTP) <span class="red">*</span> </label>
            <input type="text" name="otp" id="otp" placeholder="Enter the OTP" maxlength="4" required>

            <span class="left">OTP will be sent to your mobile number for verification</span>
            <a class="resend" href="#">Resend code</a>
            <span class="space">Mandatory fields are marked with &nbsp;<span class="red">*</span></span>
            <div class="button-container">
                <button type="button" class="back-btn" onclick="goToStep1()">Back</button>
                <button type="submit" class="next-btn" name="submit_list2">Submit</button>
            </div>
        </form>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('form');

            // Reset sessionStorage when the form is submitted
            form.addEventListener('submit', function() {
                sessionStorage.clear();
            });

            var inputs = document.querySelectorAll('input');

            // Load input values from sessionStorage
            inputs.forEach(function(input) {
                var storedValue = sessionStorage.getItem(input.id);
                if (storedValue) {
                    input.value = storedValue;
                }
            });

            // Save input values to sessionStorage when they change
            inputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    sessionStorage.setItem(input.id, input.value);
                });
            });
        });
    </script>

    <script>
        function goToStep1() {
            window.location.href = 'space_pricing.php'; // Replace 'Space_Details.php' with the actual URL of step 1
        }
        document.getElementById('submit_button').addEventListener('click', function() {
            // Dispatch custom event
            const event = new Event('clearLocalStorage');
            document.dispatchEvent(event);
        });
    </script>

    <script>
        // Clear the localStorage
        localStorage.clear();
    </script>
    <?php include "footer.php" ?>
</body>

</html>