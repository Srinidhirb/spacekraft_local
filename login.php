<?php
ob_start(); // Start output buffering
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];

} else {
   $user_id = '';
}

if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $password = $_POST['pass'];

   $select_users = $conn->prepare("SELECT id, password FROM users WHERE email = ? LIMIT 1");
   $select_users->bind_param("s", $email);
   $select_users->execute();
   $select_users->store_result();

   $rowCount = $select_users->num_rows;

   if ($rowCount > 0) {
      $select_users->bind_result($id, $stored_hashed_password);
      $select_users->fetch();

      if (password_verify($password, $stored_hashed_password)) {
         setcookie('user_id', $id, time() + 60 * 60 * 24 * 30, '/');
         
         if (isset($_SESSION['redirect_url'])) {
            var_dump($_SESSION['redirect_url']);
            $redirect_url = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']); // Remove the stored redirect URL
            header('location: ' . $redirect_url);
            exit();
         } else {
            header('location: Space_Details.php');
            exit();
         }
         
        
      } else {
         $warning_msg[] = 'Incorrect username or password!';
      }
   } else {
      $warning_msg[] = 'Incorrect username or password!';
   }

   $select_users->close();
}

ob_end_flush(); // Flush output buffer
?>





<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets\css\login_logout-css.php">
   <link rel="stylesheet" href="assets\css\header_footer-css.php">
   
</head>

<body>


   <?php include 'header.php' ?>
   <!-- login section starts  -->

   <section class="form-container">

      <form action="" method="post">
         <h1>Login</h1>
         <label for="email">Email ID <spam class="red">*</spam></label>
         <input type="email" name="email" required maxlength="50" placeholder="Enter your Email ID" class="box">

         <label for="pass">Password <spam class="red">*</spam></label>
         <div class="custom-password-group">
            <input type="password" id="custom-password" class="box" name="pass" required maxlength="20" placeholder="Enter Password">

            <i class=" no-block custom-eye-icon" onclick="togglePasswordVisibility1('custom-password')"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.9095 10.8282L3.81811 11.2459L3.81811 11.2459L2.9095 10.8282ZM21.0913 13.1718L20.1827 12.7541L21.0913 13.1718ZM2.9095 13.1718L2.00089 13.5894H2.00089L2.9095 13.1718ZM21.0913 10.8282L20.1827 11.2459V11.2459L21.0913 10.8282ZM17.9678 5.75789C17.5041 5.45792 16.885 5.59066 16.585 6.05438C16.285 6.5181 16.4178 7.13719 16.8815 7.43716L17.9678 5.75789ZM7.1616 16.59C6.69622 16.2926 6.07787 16.4288 5.78049 16.8942C5.48311 17.3596 5.6193 17.9779 6.08469 18.2753L7.1616 16.59ZM3.20093 15.6017C3.53267 16.0432 4.15955 16.1322 4.6011 15.8005C5.04265 15.4687 5.13166 14.8418 4.79992 14.4003L3.20093 15.6017ZM13.8015 6.18005C14.3427 6.28992 14.8706 5.94022 14.9804 5.39897C15.0903 4.85772 14.7406 4.32989 14.1994 4.22002L13.8015 6.18005ZM20.7075 4.70711C21.098 4.31658 21.098 3.68342 20.7075 3.29289C20.317 2.90237 19.6838 2.90237 19.2933 3.29289L20.7075 4.70711ZM3.2933 19.2929C2.90278 19.6834 2.90278 20.3166 3.2933 20.7071C3.68383 21.0976 4.31699 21.0976 4.70752 20.7071L3.2933 19.2929ZM12.0004 4C7.56168 4 3.73907 6.62905 2.00089 10.4106L3.81811 11.2459C5.24213 8.14781 8.3715 6 12.0004 6V4ZM12.0004 20C16.4392 20 20.2618 17.371 22 13.5894L20.1827 12.7541C18.7587 15.8522 15.6293 18 12.0004 18V20ZM2.00089 10.4106C1.53746 11.4188 1.53746 12.5812 2.00089 13.5894L3.81811 12.7541C3.59839 12.2761 3.59839 11.7239 3.81811 11.2459L2.00089 10.4106ZM20.1827 11.2459C20.4025 11.7239 20.4025 12.2761 20.1827 12.7541L22 13.5894C22.4634 12.5812 22.4634 11.4188 22 10.4106L20.1827 11.2459ZM22 10.4106C21.1226 8.50182 19.7158 6.88861 17.9678 5.75789L16.8815 7.43716C18.3133 8.36336 19.4653 9.68497 20.1827 11.2459L22 10.4106ZM6.08469 18.2753C7.79347 19.3672 9.82458 20 12.0004 20V18C10.2174 18 8.55838 17.4826 7.1616 16.59L6.08469 18.2753ZM2.00089 13.5894C2.32986 14.3051 2.73322 14.9791 3.20093 15.6017L4.79992 14.4003C4.41693 13.8905 4.08699 13.3391 3.81811 12.7541L2.00089 13.5894ZM14.1994 4.22002C13.488 4.07563 12.7525 4 12.0004 4V6C12.6182 6 13.2204 6.06209 13.8015 6.18005L14.1994 4.22002ZM9.17199 14.8284C10.7341 16.3905 13.2667 16.3905 14.8288 14.8284L13.4146 13.4142C12.6336 14.1953 11.3673 14.1953 10.5862 13.4142L9.17199 14.8284ZM14.8288 14.8284C16.3909 13.2663 16.3909 10.7337 14.8288 9.17157L13.4146 10.5858C14.1957 11.3668 14.1957 12.6332 13.4146 13.4142L14.8288 14.8284ZM19.2933 3.29289L3.2933 19.2929L4.70752 20.7071L20.7075 4.70711L19.2933 3.29289Z" fill="#333333"/>
</svg>
</i>
            <i class=" block custom-eye-icon" onclick="togglePasswordVisibility1('custom-password')"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.90852 13.1718C2.56695 12.4286 2.56695 11.5714 2.90852 10.8282C4.48962 7.38843 7.96561 5 11.9994 5C16.0333 5 19.5093 7.38843 21.0904 10.8282C21.4319 11.5714 21.4319 12.4286 21.0904 13.1718C19.5093 16.6116 16.0333 19 11.9994 19C7.96561 19 4.48962 16.6116 2.90852 13.1718Z" stroke="#222222" stroke-width="2"/>
<path d="M14.9994 12C14.9994 13.6569 13.6563 15 11.9994 15C10.3426 15 8.99945 13.6569 8.99945 12C8.99945 10.3431 10.3426 9 11.9994 9C13.6563 9 14.9994 10.3431 14.9994 12Z" stroke="#222222" stroke-width="2"/>
</svg>

</i>
         </div>
         <div class="form" >
          
            <a href="forgot.php" style="text-align: end;">
               <a href="forgot.php"><p class="p hover"  >Forgot a password?</p></a>
            </a>
            <p class="p1">Mandatory Field are marked with <spam class="red">*</spam></p>
         </div>
         
         <input type="submit" value="login now" name="submit" class="btn">
         <p class="p">Don't have an account? <a href="register.php" class="hover" >Register new</a></p>
      </form>

   </section>

   <!-- login section ends -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



   <!-- custom js file link  -->
   <script src="script.js"></script>
   <script>
      if (window.history.replaceState) {
         window.history.replaceState(null, null, window.location.href);
      }

      function togglePasswordVisibility1(inputId) {
         var input = document.getElementById(inputId);
         var eyeIcons = document.querySelectorAll('.custom-eye-icon');

         if (input.type === "password") {
            input.type = "text";
            eyeIcons.forEach(icon => {
               if (icon.classList.contains('block')) {
                  icon.classList.remove('block');
                  icon.classList.add('no-block');
               } else {
                  icon.classList.remove('no-block');
                  icon.classList.add('block');
               }
            });
         } else {
            input.type = "password";
            eyeIcons.forEach(icon => {
               if (icon.classList.contains('block')) {
                  icon.classList.remove('block');
                  icon.classList.add('no-block');
               } else {
                  icon.classList.remove('no-block');
                  icon.classList.add('block');
               }
            });
         }
      }
   </script>

   <?php include 'message.php'; ?>
   <?php include 'footer.php'; ?>


</body>

</html>