<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$error = array();

require "mail.php";

include "connect.php";
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

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
    <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <title>Forgot</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f7f7f7;
        }

        form {
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            width: 30%;
            max-width: 400px;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
        }

        form h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .textbox {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .textbox:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .button {
            border: none;
            color: #fff;
            background-color: #031B64;
            padding: 16px 24px;
            border-radius: 6px;
            text-transform: capitalize;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            -webkit-transition: all 0.2s;
            -o-transition: all 0.2s;
            transition: all 0.2s;
            width: auto;
        }

        .button:hover {
            color: #222222 !important;
            background-color: #4AE9E9;
        }

        .actions {
            margin-top: 20px;
            text-align: right;
        }

        .actions a {
            color: #007bff;
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
        }
        .flex{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .small-button {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    color: #fff;
            background-color: #031B64;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
    
}

.small-button:hover {
    color: #222222 !important;
            background-color: #4AE9E9;
}



    </style>
</head>

<body>


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
                <input class="button" type="submit" value="Next">
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

                <input class="button" type="submit" value="Next"> <br>
                <div class="flex">
                    <a href="forgot.php">
                        <input class="small-button" type="button" value="Back">
                    </a>

                    <div><a href="login.php">Login</a></div>
                </div>
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

                <input class="textbox" type="password" name="password" placeholder="Password">
                <input class="textbox" type="password" name="password2" placeholder="Retype Password">
                
                <input class="button" type="submit" value="Next" > <br>
                <div class="flex">
                <a href="forgot.php">
                    <input class="small-button" type="button" value="Start Over">
                </a>
                
                <div><a href="login.php">Login</a></div>
                </div>
            </form>
    <?php
            break;

        default:
            break;
    }

    ?>


</body>

</html>