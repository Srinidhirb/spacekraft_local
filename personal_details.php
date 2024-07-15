<?php


ob_start();
session_start();


// Include your database connection file
include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

$user_email = "";

// Check if user_id cookie is set
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];

    // Retrieve email from database using prepared statement
    $stmt = $conn->prepare("SELECT email FROM users WHERE id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->fetch();
    $stmt->close();

    if ($email) {
        $user_email = $email;
    } else {
        // Handle the case where the user's email is not found
        // You may want to redirect or handle this scenario appropriately
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Personal Details
    $you_are = isset($_POST['you_are']) ? implode(',', $_POST['you_are']) : "";
    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $mobile_number = isset($_POST['number']) ? $_POST['number'] : "";

    // Store values in session
    $_SESSION['you_are'] = $you_are;
    $_SESSION['full_name'] = $full_name;
    $_SESSION['email'] = $email;
    $_SESSION['number'] = $mobile_number;
    $_SESSION['mode'] = $_POST['mode'];

    // Check if email exists in the database
    // Prepare the statement to check if the email exists and retrieve the user ID
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    if ($user_id) {
        // Email exists in the database, set user_id cookie and redirect to premium_listing.php
        setcookie('user_id', $user_id, time() + (86400 * 30), "/");
        echo '<script>window.location.href="premium_listing.php";</script>';
        exit();
    } else {
        // Email does not exist, show alert and then password input for user registration
        echo '<script>';
        echo 'function showAlert() {';
        echo '    alert("Since you are a new user, please fill in the password.");';
        echo '    togglePasswordInput(true);';
        echo '}';
        echo 'document.addEventListener("DOMContentLoaded", showAlert);';
        echo '</script>';
    }


    // Proceed with inserting user into the database if necessary
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];

        // Validate and hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Generate a unique user_id
        $user_id = uniqid();

        // Insert user into database
        $insert_user = $conn->prepare("INSERT INTO users (id,number, email, password, first_name,last_name) VALUES (?,?,?,?,?,?)");
        $insert_user->bind_param("ssssss", $user_id, $mobile_number, $email, $hashed_password, $full_name, $full_name);
        $insert_user->execute();
        $insert_user->close();

        // Set cookie for user_id
        setcookie('user_id', $user_id, time() + (86400 * 30), "/");
        // 86400 = 1 day
        echo '<script>window.location.href="premium_listing.php";</script>';
        exit();
    }

    // Redirect to next step

}

// Close the database connection
$conn->close();
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details</title>
    <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <link rel="stylesheet" href="assets/css/header_footer-css.php">
    <link rel="stylesheet" href="assets/css/stylelist.php">
    <style>
        /* Your additional styles here */
    </style>
</head>

<body>
    <?php include "header.php"; ?>
    <div class="add-listing">
        <h1 class="name-center">List a Space</h1>

        <div class="step-diagram">
            <div class="diagram">
                <div class="circle-finished enabled"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg>
                </div>
                <span> Space details</span>
            </div>
            <div class="diagram">
                <div class="circle-finished enabled "><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg></div>
                <span> Space Showcase</span>
            </div>

            <div class="diagram">
                <div class="circle-finished enabled "><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg></div>
                <span class=""> Space Pricing</span>
            </div>
            <div class="diagram">
                <div class="circle1">4</div>
                <span> Personal Details</span>
            </div>
        </div>

        <div class="heading-small">Personal Details</div>

        <form method="post" id="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm()">
            <label for="you_are">You are <span class="red">*</span></label>
            <div class="you_are" id="you">
                <label>
                    <input type="checkbox" name="you_are[]" value="Owner" onclick="selectOnlyThis(this)">
                    <span>Owner</span>
                </label>
                <label>
                    <input type="checkbox" name="you_are[]" value="Agent" onclick="selectOnlyThis(this)">
                    <span>Agent</span>
                </label>
            </div>

            <script>
                function selectOnlyThis(checkbox) {
                    var checkboxes = document.getElementsByName('you_are[]');
                    checkboxes.forEach((item) => {
                        if (item !== checkbox) item.checked = false;
                    });
                }

                function validateForm() {
                    var checkboxes = document.getElementsByName('you_are[]');
                    var isChecked = false;

                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].checked) {
                            isChecked = true;
                            break;
                        }
                    }

                    if (!isChecked) {
                        alert("Please select either 'Owner' or 'Agent'");
                        return false;
                    }

                    return true;
                }

                // Function to toggle password input visibility
                function togglePasswordInput(show) {
                    var passwordLabel = document.getElementById('password_label');
                    var passwordInput = document.getElementById('password');

                    if (show) {
                        passwordLabel.style.display = 'block';
                        passwordInput.style.display = 'block';
                    } else {
                        passwordLabel.style.display = 'none';
                        passwordInput.style.display = 'none';
                    }
                }

                document.addEventListener('DOMContentLoaded', function() {
                    var form = document.getElementById('form');

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

                function goToStep1() {
                    window.location.href = 'space_pricing.php'; // Replace 'Space_Details.php' with the actual URL of step 1
                }
            </script>

            <label for="full_name">Full Name <span class="red">*</span> </label>
            <input type="text" name="full_name" id="full_name" placeholder="Enter your full name" value="<?php echo htmlspecialchars($_SESSION['full_name'] ?? ''); ?>" required>

            <label for="email">Email Address <span class="red">*</span> </label>
            <input type="email" name="email" id="email" placeholder="Enter your email address" value="<?php echo htmlspecialchars($_SESSION['email'] ?? $user_email); ?>" required>

            <label for="number">Mobile Number <span class="red">*</span></label>
            <input type="text" name="number" id="number" placeholder="Enter your mobile number" value="<?php echo htmlspecialchars($_SESSION['number'] ?? ''); ?>" required pattern="[0-9]{10}" title="Please enter a 10-digit mobile number">
            <label id="password_label" style="display: none;">Password <span class="red">*</span> </label>
            <input type="password" name="password" id="password" placeholder="Enter your password" style="display: none;">

            <style>

            </style>
            <label for="number">Listing visibility <span class="red">*</span></label>
            <div class="radio-group">
                <input type="radio" id="offline" name="mode" value="offline">
                <label for="offline" class="radio-label">Offline</label>

                <input type="radio" id="online" name="mode" value="online" checked>
                <label for="online" class="radio-label">Online</label>
            </div>




            <div class="submitbutton">

                <script>
                    if (document.cookie === 'user_id=') {
                        // no user id cookie found
                    } else {
                        document.write('<div class="button-container">');
                        document.write('<button type="button" class="back-btn" onclick="goToStep1()">Back</button>');
                        document.write('<button type="submit" class="next-btn" name="submit_list2">Submit</button>');
                        document.write('</div>');
                    }
                </script>


            </div>

        </form>

    </div>

    <?php include "footer.php"; ?>

</body>

</html>