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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$user_email = "";
$stmt = $conn->prepare("SELECT email FROM users WHERE id = ?");
$stmt->bind_param("s", $_COOKIE['user_id']);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();
if ($email) {
    $user_email = $email;
} else {
    // Handle the case where the user's email is not found
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process form data
    $spaceName = $_SESSION['spaceName'] ?? "";
    $projectType = $_SESSION["projectType"] ?? "";
    $spaceType = $_SESSION['spaceType'] ?? "";
    $spaceAddress1 = $_SESSION['spaceAddress1'] ?? "";
    $spaceAddress2 = $_SESSION['spaceAddress2'] ?? "";
    $city = $_SESSION['city'] ?? "";
    $pinCode = $_SESSION['pinCode'] ?? "";
    $spaceTypesString = $_SESSION['SpaceTypes'] ?? "";
    $spaceArea = $_SESSION['spaceArea'] ?? "";
    $spaceDes = $_SESSION['spaceDes'] ?? "";
    $spaceImg = $_SESSION['spaceImg'] ?? "";
    $Amenities = $_SESSION['Amenities'] ?? "";
    $selectedDates = $_SESSION['selectedDates'] ?? "";

    // Process List2 Form data
    $spaceDailyPrice = $_SESSION['spaceDailyPrice'] ?? "";
    $spaceWeeklyPrice = $_SESSION['spaceWeeklyPrice'] ?? "";
    $spaceMonthlyPrice = $_SESSION['spaceMonthlyPrice'] ?? "";
    $spaceMain = $_SESSION['spaceMain'] ?? "";
    $spaceDeposit = $_SESSION['spaceDeposit'] ?? "";
    $minDuration = $_SESSION['minDuration'] ?? "";
    $minDurationUnit = $_SESSION['minDurationUnit'] ?? "";
    $maxDuration = $_SESSION['maxDuration'] ?? "";
    $maxDurationUnit = $_SESSION['maxDurationUnit'] ?? "";
    $maxDuration = !empty($maxDuration) ? $maxDuration : 0;



    // Check if selected_year is empty and set a default value
    $selectedYear = !empty($selectedYear) ? $selectedYear : 0;

    // Check if selected_month is empty and set a default value
    $selectedMonth = !empty($selectedMonth) ? $selectedMonth : 0;

    // Check if SecurityDeposit is empty and set a default value
    $spaceDeposit = !empty($spaceDeposit) ? $spaceDeposit : 0;
    $spaceDailyPrice = !empty($spaceDailyPrice) ? $spaceDailyPrice : 0;
    $spaceWeeklyPrice = !empty($spaceWeeklyPrice) ? $spaceWeeklyPrice : 0;
    $spaceMonthlyPrice = !empty($spaceMonthlyPrice) ? $spaceMonthlyPrice : 0;
    $spaceMain = !empty($spaceMain) ? $spaceMain : 0;
    $spaceDeposit = !empty($spaceDeposit) ? $spaceDeposit : 0;
    $minDuration = !empty($minDuration) ? $minDuration : 0;
    $minDurationUnit = !empty($minDurationUnit) ? $minDurationUnit : 0;
    $maxDuration = !empty($maxDuration) ? $maxDuration : 0;
    $maxDurationUnit = !empty($maxDurationUnit) ? $maxDurationUnit : 0;
    $spaceName = !empty($spaceName) ? $spaceName : 0;
    $projectType = !empty($projectType) ? $projectType : 0;
    $spaceType = !empty($spaceType) ? $spaceType : 0;
    $spaceAddress1 = !empty($spaceAddress1) ? $spaceAddress1 : 0;
    $spaceAddress2 = !empty($spaceAddress2) ? $spaceAddress2 : 0;
    $city = !empty($city) ? $city : 0;
    $pinCode = !empty($pinCode) ? $pinCode : 0;
    $spaceArea = !empty($spaceArea) ? $spaceArea : 0;
    $spaceDes = !empty($spaceDes) ? $spaceDes : 0;
    $spaceImg = !empty($spaceImg) ? $spaceImg : 0;
    $Amenities = !empty($Amenities) ? $Amenities : 0;
    $selectedDates = !empty($selectedDates) ? $selectedDates : 0;

    // Personal Details
    $full_name = $_POST['full_name'] ?? "";
    $email = $_POST['email'] ?? "";
    $mobile_number = $_POST['number'] ?? "";
    $otp = $_POST['otp'] ?? "";

    // Send email
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // Set to 2 for debugging
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'klokeshj5@gmail.com';
        $mail->Password = 'qlaw ffcc ejng gfda';

        //Recipients
        $mail->setFrom('klokeshj5@gmail.com', 'Your Name');
        $mail->addAddress($user_email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Thank you for submitting your listing';
        $mail->Body = 'Dear ' . $user_email . ',<br><br>Thank you for submitting your listing. We have received your information and will review it shortly.<br><br>Best regards,<br>The XYZ Team';

        $mail->send();
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }
    function handleEmpty($value)
    {
        return $value !== '' ? $value : 'none';
    }

    // Insert data into the admin review table
    $sql = "INSERT INTO admin_review_table (
        user_id, SpaceName, projectType, SpaceType, SpaceAddress1, SpaceAddress2, City, PinCode,amen,
        SpaceArea, Description, images, Amenities,
        min_duration, min_duration_unit, max_duration, max_duration_unit,
        selected_year, selected_month, selected_dates,
        DailyPrice, WeeklyPrice, MonthlyPrice, Maintenance, SecurityDeposit, full_name, email, mobile_number, otp
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?,?,
            ?, ?, ?, ?,
            ?, ?, ?, ?,
            ?, ?, ?,
            ?, ?, ?, ?, ?,?,?,?,?
    )";



    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param(
            "sssssssssssssssssssssssssssss",
            $_COOKIE['user_id'],
            handleEmpty($spaceName),
            handleEmpty($projectType),
            handleEmpty($spaceType),
            handleEmpty($spaceAddress1),
            handleEmpty($spaceAddress2),
            handleEmpty($city),
            handleEmpty($pinCode),
            handleEmpty($spaceTypesString),
            handleEmpty($spaceArea),
            handleEmpty($spaceDes),
            $spaceImg,
            handleEmpty($Amenities),
            handleEmpty($minDuration),
            handleEmpty($minDurationUnit),
            handleEmpty($maxDuration),
            handleEmpty($maxDurationUnit),
            handleEmpty($selectedYear),
            handleEmpty($selectedMonth),
            handleEmpty($selectedDates),
            handleEmpty($spaceDailyPrice),
            handleEmpty($spaceWeeklyPrice),
            handleEmpty($spaceMonthlyPrice),
            handleEmpty($spaceMain),
            handleEmpty($spaceDeposit),
            $full_name,
            $email,
            $mobile_number,
            $otp
        );

        // Execute the statement
        if ($stmt->execute()) {
            // Insert successful
            echo '<script>window.location.href = "Space_listed.php";</script>';
            session_destroy();
            exit();
        } else {
            // Insert failed
            echo "Error inserting data into the database: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Statement preparation failed
        echo "Error preparing statement: " . $conn->error;
    }
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
                <span class=""> Availability Date<span>
            </div>
            <div class="diagram">
                <div class="circle-finished enabled "><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg></div>
                <span class=""> Space Pricing<span>
            </div>
            <div class="diagram">
                <div class="circle1 disabled">5</div>
                <span class="disabled"> Personal Details<span>
            </div>
        </div>
        <div class="heading-small">Personal Details</div>
        <form method="post">
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