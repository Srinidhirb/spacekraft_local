<?php
session_start();

// Include your database connection file


include 'connect.php';

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

if ($_SERVER["REQUEST_METHOD"] === "POST" && (isset($_POST['submit_free']) || isset($_POST['pay']) || isset($_POST['customisable']))) {
  // Your code here
  if (isset($_POST['submit_free'])) {
    $paymentType = 1; // Free
  } elseif (isset($_POST['pay'])) {
    $paymentType = 2; // Pay
  } elseif (isset($_POST['customisable'])) {
    $paymentType = 3; // Customisable
  } else {
    $paymentType = 0; // Default to Free if none of the expected POST variables are set
  }
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

  $full_name = $_SESSION['full_name'] ?? "";
  $email = $_SESSION['email'] ?? "";
  $mobile_number = $_SESSION['number'] ?? "";
  $otp = $_SESSION['otp'] ?? "";
  $you = $_SESSION['you_are'] ?? "";
  $user_id = $_SESSION['id'] ?? "";



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
    $mail->Password = 'nquz wzni txie rpwz';

    //Recipients
    $mail->setFrom('support@spacekraft.in', 'Spacekraft');
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Thank you for submitting your listing';
    $mail->Body = 'Dear ' . $email. ',<br><br>Thank you for submitting your listing. We have received your information and will review it shortly.<br><br>Best regards,<br>The Spacekrfat Team';

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
        DailyPrice, WeeklyPrice, MonthlyPrice, Maintenance, SecurityDeposit,you, full_name, email, mobile_number, otp,payment_type
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?,?,
            ?, ?, ?, ?,
            ?, ?, ?, ?,
            ?, ?, ?,
            ?, ?, ?,?, ?, ?,?,?,?,?,?
    )";



  $stmt = $conn->prepare($sql);

  if ($stmt) {
    $otp=0;
    // Bind parameters
    $stmt->bind_param(
      "sssssssssssssssssssssssssssssss",
      $user_id,
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
      $you,
      $full_name,
      $email,
      $mobile_number,
      $otp,
      $paymentType
    );
    

    // Execute the statement
    if ($stmt->execute()) {
      // Insert successful
      echo '<script>window.location.href = "space_listed.php";</script>';
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
} 


// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Listing</title>

  <link rel="stylesheet" href="assets/css/premium_listing-css.php">
</head>

<body>
   <div class="center_display">
    <span>Unlock new revenue streams! </span>
    <p>Choose a plan and list your retail space.</p>
    </div>

    <div class="pricing">
      <table>
        <tr>
          <td> </td>
          <td>
            <div class="card">

              <span class="packages">Basic </span>

              <span class="price">Free</span>
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <button type="submit" name="submit_free" class="button">Continue</button>
              </form>
            </div>
          </td>
          <td>
            <div class="card border_no_bottom">

              <span class="packages">Pro</span>

              <span class="price"><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.125 0.500043C0.125 0.500043 1.86764 0.500043 3.625 0.500043M8.125 16.5L1.125 9.50004C1.125 9.50004 2.625 9.50004 3.625 9.50004C4.625 9.50004 9.125 9.56183 9.125 5.00004C9.125 0.438253 4.625 0.500043 3.625 0.500043M12.125 0.500043C12.125 0.500043 6.55393 0.500043 3.625 0.500043M0.125 4.50004H12.125" stroke="#717579" stroke-width="1.5" />
                </svg>
                499 <span class="duration"> / month</span></span>
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <button type="submit" name="pay" class="button">Pay</button>
              </form>
            </div>
          </td>
          <td>
            <div class="card card">

              <span class="packages">Plus</span>

              <span class="price">
                Customisable</span>
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <button type="submit" name="customisable" class="button">Contact</button>
              </form>
            </div>
          </td>

        </tr>
        <tr>
          <td> <span class="main_heading"> Plan validity </span></td>
          <td> <span class="plan_validity"> 1 Month </span></td>
          <td class="border_no_left_right"> <span class="plan_validity"> 1 Month </span></td>
          <td> <span class="plan_validity"> 1 Year </span></td>

        </tr>
        <tr>
          <td> <span class="main_heading"> Visiblity </span></td>
          <td> <span class="plan_validity"> Standard visiblity </span></td>
          <td class="border_no_left_right"> <span class="plan_validity">3x More visiblity </span></td>
          <td> <span class="plan_validity"> 10x More visiblity </span></td>

        </tr>
        <tr>
          <td> <span class="main_heading"> Social Media Promotion </span></td>
          <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
            </svg>
          </td>
          <td class="border_no_left_right"><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
            </svg></td>
          <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
            </svg></td>

        </tr>
        <tr>
          <td> <span class="main_heading"> Premium </span></td>
          <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
            </svg>
          </td>
          <td class="border_no_left_right"><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
            </svg></td>
          <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
            </svg></td>

        </tr>
        <tr>
          <td> <span class="main_heading"> Leads </span></td>
          <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
            </svg>
          </td>
          <td> <span class="plan_validity"> Upto 5 Leads </span></td>
          <td> <span class="plan_validity"> Unlimited Leads </span></td>

        </tr>
        <tr>
          <td class="width"> <span class="main_heading"> Dedicated Relationship Manager </span></td>
          <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
            </svg>
          </td>
          <td class="border_no_left_right"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
            </svg>
          </td>
          <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
            </svg></td>

        </tr>
        <tr>
          <td class="width"> <span class="main_heading"> Verified Status </span></td>
          <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
            </svg>
          </td>
          <td class="border_no_left_right"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
            </svg>
          </td>
          <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
            </svg></td>

        </tr>
        <tr>
          <td class="width"> <span class="main_heading"> Property Photoshoot </span></td>
          <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
            </svg>
          </td>
          <td class="border_no_left_right"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
            </svg>
          </td>
          <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
            </svg></td>


      </table>
    </div>
    <div class="mobile_pricing">
      <div class="custom-container">

        <div class="custom-card-group">
          <div class="custom-pricing-card">

            <span>Basic</span>
            <h4 class="custom-price">Free</h4>
            <ul class="custom-package-list">
              <li> Basic Features
              </li>
              <li>Plan Validity - Free Lifetime</li>
              <li> <strike> Visiblity in top slots</strike></li>
              <li><strike>Invoice based billing</strike></li>
              <li><strike>24/7 Support</strike></li>
              <li><strike>Social Media promotion</strike></li>

            </ul>
            <a href="Space_listed.php" class="custom-get-started-btn">Get Started</a>
          </div>
          <div class="custom-pricing-card">
            <span>Pro</span>
            <h4 class="custom-price">₹ 1000 / month</h4>
            <ul class="custom-package-list">
              <li>Basic Features</li>
              <li>Plan Validity - 30 days free</li>
              <li><strike> Visiblity in top slots</strike></li>
              <li>Invoice based billing</li>
              <li>24/7 Support</li>
              <li>Social Media promotion</li>
            </ul>
            <a href="#" class="custom-get-started-btn">Choose Plan</a>
          </div>
          <div class="custom-pricing-card">
            <span>Plus</span>
            <h4 class="custom-price">₹ 2000 / month</h4>
            <ul class="custom-package-list">
              <li>Basic Features</li>
              <li>Plan Validity - 60 days free</li>
              <li>Visiblity in top slots</li>
              <li>Invoice based billing</li>
              <li>24/7 Support</li>
              <li>Social Media promotion</li>
            </ul>
            <a href="#" class="custom-get-started-btn">Choose Plan</a>
          </div>
          <div class="custom-pricing-card">
            <span>Enterprise</span>
            <h4 class="custom-price">Let's Chat</h4>
            <ul class="custom-package-list">
              <li>Basic Features</li>
              <li>Plan Validity - 90 days free</li>
              <li>Visiblity in top slots</li>
              <li>Invoice based billing</li>
              <li>24/7 Support</li>
              <li>Social Media promotion</li>
            </ul>
            <a href="#" class="custom-get-started-btn">Get Started</a>
          </div>
        </div>
      </div>
    </div>

    <script>
      const cards = document.querySelectorAll('.card');
      const rows = document.querySelectorAll('tr');

      cards.forEach((card, index) => {
        card.addEventListener('mouseenter', () => {
          rows[index + 1].classList.add('hovered');
        });

        card.addEventListener('mouseleave', () => {
          rows[index + 1].classList.remove('hovered');
        });
      });
    </script>


</body>

</html>