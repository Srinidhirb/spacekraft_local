<?php

// $dotenv = parse_ini_file(__DIR__ . '/.env');
@include "connect.php";


// Function to generate a random OTP
function generateOTP()
{
    return rand(10000, 99999); // 5-digit OTP
}

// Function to insert OTP and email ID into the database
function insertOTP($email, $otp)
{
    // Connect to the database
    $conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete any existing OTPs for the same email address
    $stmt_delete = $conn->prepare("DELETE FROM codes WHERE email = ?");
    $stmt_delete->bind_param("s", $email);
    $stmt_delete->execute();
    $stmt_delete->close();

    // Prepare SQL statement
    $stmt_insert = $conn->prepare("INSERT INTO codes (email, code, expire) VALUES (?, ?, NOW() + INTERVAL 10 MINUTE)");
    $stmt_insert->bind_param("ss", $email, $otp);

    // Execute statement
    if ($stmt_insert->execute() === TRUE) {
        echo "OTP inserted successfully into the database!";
    } else {
        echo "Error inserting OTP: " . $conn->error;
    }

    // Close connection
    $stmt_insert->close();
    $conn->close();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["forgot_password"])) {
    // Get the recipient email address from the form
    $recipient_address = $_POST["email"];

    // Generate OTP
    $otp = generateOTP();

    // Insert OTP and email ID into the database
    insertOTP($recipient_address, $otp);

    // Email message content
    $message = "Dear User,<br><br>";
    $message .= "We hope this email finds you well. It seems like you've forgotten your password, but no worries – we're here to help you regain access to your account on SpaceKraft.<br><br>";
    $message .= "Here's the code to reset your password: $otp<br><br>";
    $message .= "If you did not request this password reset, please ignore this email, and your account will remain secure.<br><br>";
    $message .= "Thank you for choosing SpaceKraft!<br><br>";
    $message .= "Best regards,<br>";
    $message .= "SpaceKraft Support Team";

    // Execute JavaScript script
    $command = "node send-email.js $recipient_address \"$message\" 2>&1";
    $output = shell_exec($command);
    var_dump($output); // Add this line for debugging

    if ($output !== null) {
        echo "Failed to send password reset email. Error: $output";
    } else {
        echo "Email sent successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>

<body>
    <h2>Forgot Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="submit" name="forgot_password" value="Next">
    </form>
</body>

</html>
