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

       
        .center_forgot{
        
           width: 100%;
           height: 65vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
           
        }
        .center_forgot h1{
            text-align: center;
        }
        /* General Styles */
        .forgot {
            width: 100%;
            max-width: 500px;
            margin: 30px auto;
            padding: 60px;
            border: 1px solid #ddd;
            border-radius: 8px;
            position: relative;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .back-arrow {
            position: absolute;
            top: 0px;
            left: 10px;
            font-size: 16px;
            color: #4CAF50;
            text-decoration: none;
        }

        .forgot h3 {
            font-size: 16px;
            color: #333;
            font-weight: normal;
            text-align: left;
            display: flex;
            gap: 5px;
            margin: 0 0 10px 0;
        }

        .forgot span {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        .forgot .textbox {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .forgot .button {

            padding: 10px;
            background-color: #031B64;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .forgot .button:hover {
            background-color: #4AE9E9;
        }

        .forgot a {
            display: block;
            margin-top: 15px;
            color: #222222;
            text-decoration: none;
            font-size: 1.2rem;
        }



        /* Responsive Styles */
        @media (max-width: 480px) {
            .forgot {
                padding: 15px;
                max-width: 300px;
            }

            .forgot h3 {
                font-size: 20px;
            }

            .forgot .textbox {
                font-size: 14px;
            }

            .forgot .button {
                font-size: 14px;
            }
            .back-arrow {
    position: absolute;
    top: 65%;
    left: 10px;
            }
        }

        .red {
            color: #E62134;
        }

        .forgot_button_div {
            display: flex;
            flex-direction: row-reverse;
            align-items: end;
            justify-content: space-between;
        }
    </style>
    <link rel="stylesheet" href="assets\css\header_footer-css.php">
</head>

<body>\
   
        <?php include 'header.php'; ?>
        <div class="center_forgot">
        <h1>Forgot Password</h1>

        <?php
        switch ($mode) {
            case 'enter_email':
        ?> <div class="forgot">
                    <form method="post" action="forgot.php?mode=enter_email">
                        <a href="login.php" class="back-arrow">&larr; Back</a>
                        <h3>Enter your email below<span class="red">*</span></h3>

                        </span>
                        <input class="textbox" type="email" name="email" placeholder="Email"><br>
                        <span style="font-size: 12px;color:red;">
                            <?php
                            foreach ($error as $err) {
                                echo $err . "<br>";
                            }
                            ?>
                            <br style="clear: both;">
                            <div class="forgot_button_div">
                                <input class="button" type="submit" value="Next">


                            </div>
                    </form>
                </div>
            <?php
                break;

            case 'enter_code':
            ?><div class="forgot">
                    <form method="post" action="forgot.php?mode=enter_code">
                        <a href="forgot.php" class="back-arrow">&larr; Back</a>
                        <h3>Enter the code sent to your email<span class="red">*</span></h3>


                        <input class="textbox" type="number" maxlength="5" name="code" placeholder="12345"><br>
                        <span style="font-size: 12px;color:red;">
                            <?php
                            foreach ($error as $err) {
                                echo $err . "<br>";
                            }
                            ?>
                        </span>
                        <div class="forgot_button_div">
                            <input class="button" type="submit" value="Next"> <br>


                           
                        </div>
                    </form>
                </div>
            <?php
                break;

            case 'enter_password':
            ?><div class="forgot">
                    <form method="post" action="forgot.php?mode=enter_password">

                        <h3>Enter your new password<span class="red">*</span></h3>


                        <input class="textbox" type="password" name="password" placeholder="Password">
                        <input class="textbox" type="password" name="password2" placeholder="Retype Password">
                        <span style="font-size: 12px;color:red;">
                            <?php
                            foreach ($error as $err) {
                                echo $err . "<br>";
                            }
                            ?>
                        </span>
                        <div class="forgot_button_div">
                            <input class="button" type="submit" value="Next"> <br>

                            <a href="forgot.php">
                                <input class="button" type="button" value="Start Over">
                            </a>

                        </div>

                    </form>
                </div>
        <?php
                break;

            default:
                break;
        }

        ?>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>