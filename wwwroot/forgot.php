<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$error = array();

require "mail.php";

include "connect.php";

$mode = "enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

//something is posted
if (count($_POST) > 0) {

    switch ($mode) {
        case 'enter_email':
            $email = $_POST['email'];
            //validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "Please enter a valid email";
            } elseif (!valid_email($email)) {
                $error[] = "That email was not found";
            } else {
                $_SESSION['forgot']['email'] = $email;
                send_email($email);
                echo '<script>window.location.href = "forgot.php?mode=enter_code";</script>';
                die;
            }
            break;

        case 'enter_code':
            $code = $_POST['code'];
            $result = is_code_correct($code);

            if ($result == "the code is correct") {
                $_SESSION['forgot']['code'] = $code;
                echo '<script>window.location.href = "forgot.php?mode=enter_password";</script>';
                die;
            } else {
                $error[] = $result;
            }
            break;

        case 'enter_password':
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if ($password !== $password2) {
                $error[] = "Passwords do not match";
            } elseif (!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
                echo '<script>window.location.href = "forgot.php";</script>';
                die;
            } else {
                save_password($password);
                if (isset($_SESSION['forgot'])) {
                    unset($_SESSION['forgot']);
                }

                echo '<script>window.location.href = "login.php";</script>';
                die;
            }
            break;

        default:
            break;
    }
}

function send_email($email)
{
    global $conn;

    $expire = time() + (60 * 5);
    $code = rand(10000, 99999);
    $email = addslashes($email);

    $query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
    mysqli_query($conn, $query);

    // Send email with the corrected formatting
    $message = "Dear User,<br><br>";
    $message .= "We hope this email finds you well. It seems like you've forgotten your password, but no worries – we're here to help you regain access to your account on SpaceKraft.<br><br>";
    $message .= "Here's the code to reset your password: $code<br><br>";
    $message .= "If you did not request this password reset, please ignore this email, and your account will remain secure.<br><br>";
    $message .= "Thank you for choosing SpaceKraft!<br><br>";
    $message .= "Best regards,<br>";
    $message .= "SpaceKraft Support Team";

    send_mail($email, 'Reset Your Password on SpaceKraft!', $message, 'text/html');
}

function save_password($password)
{
    global $conn;

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "update users set password = '$password' where email = '$email' limit 1";
    mysqli_query($conn, $query);
}

function valid_email($email)
{
    global $conn;

    $email = addslashes($email);

    $query = "select * from users where email = '$email' limit 1";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            return true;
        }
    }

    return false;
}

function is_code_correct($code)
{
    global $conn;

    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['expire'] > $expire) {
                return "the code is correct";
            } else {
                return "the code is expired";
            }
        } else {
            return "the code is incorrect";
        }
    }

    return "the code is incorrect";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forgot</title>
</head>

<body>
    <style type="text/css">
        * {
            font-family: tahoma;
            font-size: 13px;
        }

        form {
            width: 100%;
            max-width: 200px;
            margin: auto;
            border: solid thin #ccc;
            padding: 10px;
        }

        .textbox {
            padding: 5px;
            width: 180px;
        }
    </style>

    <?php
    switch ($mode) {
        case 'enter_email':
    ?>
            <form method="post" action="forgot.php?mode=enter_email">
                <h1>Forgot Password</h1>
                <h3>Enter your email below</h3>
                <span style="font-size: 12px;color:red;">
                    <?php
                    foreach ($error as $err) {
                        echo $err . "<br>";
                    }
                    ?>
                </span>
                <input class="textbox" type="email" name="email" placeholder="Email"><br>
                <br style="clear: both;">
                <input type="submit" value="Next">
                <br><br>
                <div><a href="login.php">Login</a></div>
            </form>
        <?php
            break;

        case 'enter_code':
        ?>
            <form method="post" action="forgot.php?mode=enter_code">
                <h1>Forgot Password</h1>
                <h3>Enter the code sent to your email</h3>
                <span style="font-size: 12px;color:red;">
                    <?php
                    foreach ($error as $err) {
                        echo $err . "<br>";
                    }
                    ?>
                </span>

                <input class="textbox" type="text" name="code" placeholder="12345"><br>
                <br style="clear: both;">
                <input type="submit" value="Next" style="float: right;">
                <a href="forgot.php">
                    <input type="button" value="Start Over">
                </a>
                <br><br>
                <div><a href="login.php">Login</a></div>
            </form>
        <?php
            break;

        case 'enter_password':
        ?>
            <form method="post" action="forgot.php?mode=enter_password">
                <h1>Forgot Password</h1>
                <h3>Enter your new password</h3>
                <span style="font-size: 12px;color:red;">
                    <?php
                    foreach ($error as $err) {
                        echo $err . "<br>";
                    }
                    ?>
                </span>

                <input class="textbox" type="password" name="password" placeholder="Password"><br>
                <input class="textbox" type="password" name="password2" placeholder="Retype Password"><br>
                <br style="clear: both;">
                <input type="submit" value="Next" style="float: right;">
                <a href="forgot.php">
                    <input type="button" value="Start Over">
                </a>
                <br><br>
                <div><a href="login.php">Login</a></div>
            </form>
    <?php
            break;

        default:
            break;
    }

    ?>


</body>

</html>
