<?php
// Connection to your MySQL database
include 'connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // Initialize an empty message variable

// Process the submitted email
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    // Insert the email into the database using prepared statement
    $stmt = $conn->prepare("INSERT INTO email (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $message = "Thanks for submitting!";
    } else {
        $message = "Sorry, something went wrong. Please try again later.";
        // Log the detailed error for debugging purposes:
        error_log("Error: " . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
</head>

<body>


    <footer class="footer">
        <div class="footer-section logo">
            <img src="assets/img/SpaceKraft_Logoo.svg" alt="Spacekraft Logo">
            <p>we connect brands, e-commerce businesses, and artists seeking short-term rentals space with property owners nationwide. we make creating pop-up shops and exciting events a breeze.</p>
        </div>
        <div class="footer-section footer-links">
            <h4>Helpful Links</h4>
            <ul>
                <li> <a href="terms.php"> <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.24951 1.5L6.74951 7L1.24951 12.5" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Terms of use </li></a>
                <li> <a href="privacy.php"> <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.24951 1.5L6.74951 7L1.24951 12.5" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Privacy Policy </li></a>
                <li> <a href="resources.php"> <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.24951 1.5L6.74951 7L1.24951 12.5" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Resources</li></a>
            </ul>
        </div>
        <div class="footer-section footer-contact">
            <h4>Contact info</h4>
            <p> <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.74992 2.58366L9.87436 8.12489C10.5364 8.63981 11.4634 8.63981 12.1255 8.12489L19.2499 2.58366M4.76659 16.3337H17.2333C18.26 16.3337 18.7734 16.3337 19.1656 16.1338C19.5105 15.9581 19.791 15.6776 19.9668 15.3326C20.1666 14.9405 20.1666 14.4271 20.1666 13.4003V4.60033C20.1666 3.57356 20.1666 3.06018 19.9668 2.66801C19.791 2.32305 19.5105 2.04258 19.1656 1.86681C18.7734 1.66699 18.26 1.66699 17.2333 1.66699H4.76658C3.73982 1.66699 3.22644 1.66699 2.83427 1.86681C2.48931 2.04258 2.20884 2.32305 2.03307 2.66801C1.83325 3.06018 1.83325 3.57356 1.83325 4.60033V13.4003C1.83325 14.4271 1.83325 14.9405 2.03307 15.3326C2.20884 15.6776 2.48931 15.9581 2.83427 16.1338C3.22644 16.3337 3.73982 16.3337 4.76659 16.3337Z" stroke="#333333" stroke-width="2" />
                </svg> Mail: info@spacekraft.in</p>

            <p><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.98026 9.75516C9.6162 11.0797 10.4831 12.3211 11.581 13.419C12.6789 14.5169 13.9203 15.3838 15.2448 16.0197C15.3588 16.0744 15.4157 16.1018 15.4878 16.1228C15.744 16.1975 16.0585 16.1438 16.2755 15.9885C16.3365 15.9448 16.3888 15.8926 16.4932 15.7881C16.8126 15.4687 16.9724 15.309 17.133 15.2045C17.7387 14.8107 18.5195 14.8107 19.1252 15.2045C19.2858 15.309 19.4455 15.4687 19.765 15.7881L19.943 15.9662C20.4286 16.4518 20.6714 16.6945 20.8033 16.9553C21.0656 17.4739 21.0656 18.0863 20.8033 18.6049C20.6714 18.8657 20.4286 19.1084 19.943 19.594L19.799 19.7381C19.3151 20.222 19.0731 20.4639 18.7441 20.6487C18.3791 20.8538 17.8121 21.0012 17.3935 21C17.0162 20.9989 16.7583 20.9257 16.2425 20.7793C13.4709 19.9926 10.8555 18.5083 8.6736 16.3264C6.49168 14.1445 5.00738 11.5291 4.22071 8.75746C4.07432 8.24172 4.00113 7.98385 4.00001 7.60653C3.99876 7.18785 4.1462 6.6209 4.35126 6.25587C4.53605 5.92691 4.77801 5.68494 5.26193 5.20102L5.40597 5.05699C5.89155 4.57141 6.13434 4.32861 6.3951 4.19672C6.91369 3.93443 7.52611 3.93443 8.0447 4.19672C8.30546 4.32861 8.54825 4.5714 9.03383 5.05699L9.21189 5.23504C9.53133 5.55448 9.69104 5.7142 9.79547 5.87481C10.1893 6.4805 10.1893 7.26134 9.79547 7.86703C9.69105 8.02764 9.53133 8.18736 9.21189 8.5068C9.10744 8.61125 9.05521 8.66347 9.0115 8.72452C8.85616 8.94146 8.80252 9.25601 8.8772 9.51218C8.89821 9.58426 8.92556 9.64123 8.98026 9.75516Z" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg> Phone: +91 9740854665</p>
            <div class="social-icons">
                
                    <a href="https://www.facebook.com/profile.php?id=61557713832453&mibextid=ZbWKwL" target="_blank"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" rx="2" fill="#031B64" />
                            <path d="M10.2297 7.292V9.6326H8.5V12.4945H10.2297V21H13.7801V12.4953H16.1633C16.1633 12.4953 16.3866 11.1232 16.4948 9.62238H13.7947V7.66506C13.7947 7.37291 14.1812 6.97941 14.5642 6.97941H16.5V4H13.8685C10.1412 4 10.2297 6.86442 10.2297 7.292Z" fill="white" />
                        </svg>
                    </a>
                    <a href="https://instagram.com/spacekraft.rentals?igshid=OGQ5ZDc2ODk2ZA" target="_blank"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" rx="2" fill="#031B64" />
                            <path d="M15.0312 5H8.96807C7.78336 5.00139 6.64758 5.47268 5.80994 6.31047C4.97229 7.14826 4.50119 8.28411 4.5 9.46882V15.5319C4.50139 16.7166 4.97268 17.8524 5.81047 18.6901C6.64826 19.5277 7.78411 19.9988 8.96882 20H15.0319C16.2166 19.9986 17.3524 19.5273 18.1901 18.6895C19.0277 17.8517 19.4988 16.7159 19.5 15.5312V9.46807C19.4986 8.28336 19.0273 7.14758 18.1895 6.30994C17.3517 5.47229 16.2159 5.00119 15.0312 5ZM17.9914 15.5312C17.9914 15.9199 17.9148 16.3048 17.766 16.664C17.6173 17.0231 17.3992 17.3495 17.1243 17.6243C16.8495 17.8992 16.5231 18.1173 16.164 18.266C15.8048 18.4148 15.4199 18.4914 15.0312 18.4914H8.96807C8.18311 18.4912 7.43037 18.1792 6.87539 17.6241C6.32041 17.069 6.00864 16.3161 6.00864 15.5312V9.46807C6.00884 8.68311 6.3208 7.93037 6.87592 7.37539C7.43104 6.82041 8.18386 6.50864 8.96882 6.50864H15.0319C15.8169 6.50884 16.5696 6.8208 17.1246 7.37592C17.6796 7.93104 17.9914 8.68386 17.9914 9.46882V15.5312Z" fill="white" />
                            <path d="M11.9996 8.62059C10.9714 8.62218 9.98575 9.03139 9.25875 9.75853C8.53175 10.4857 8.12273 11.4714 8.12134 12.4996C8.12253 13.5281 8.53157 14.5141 9.25875 15.2415C9.98593 15.9688 10.9719 16.378 12.0004 16.3794C13.029 16.3782 14.0151 15.9691 14.7425 15.2417C15.4698 14.5144 15.879 13.5282 15.8802 12.4996C15.8786 11.4711 15.4691 10.4853 14.7417 9.75822C14.0142 9.03118 13.0281 8.62233 11.9996 8.62134V8.62059ZM11.9996 14.8708C11.371 14.8708 10.768 14.621 10.3235 14.1765C9.87896 13.732 9.62923 13.129 9.62923 12.5004C9.62923 11.8717 9.87896 11.2688 10.3235 10.8243C10.768 10.3797 11.371 10.13 11.9996 10.13C12.6283 10.13 13.2312 10.3797 13.6757 10.8243C14.1203 11.2688 14.37 11.8717 14.37 12.5004C14.37 13.129 14.1203 13.732 13.6757 14.1765C13.2312 14.621 12.6283 14.8708 11.9996 14.8708Z" fill="white" />
                            <path d="M15.8869 9.57926C16.4002 9.57926 16.8163 9.16317 16.8163 8.64989C16.8163 8.13661 16.4002 7.72051 15.8869 7.72051C15.3736 7.72051 14.9576 8.13661 14.9576 8.64989C14.9576 9.16317 15.3736 9.57926 15.8869 9.57926Z" fill="white" />
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/company/spacekraft-rentals/" target="_blank"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" rx="2" fill="#031B64" />
                            <path d="M20.5 13.3736V19.2889H17.0706V13.7696C17.0706 12.3828 16.5744 11.4368 15.3334 11.4368C14.3859 11.4368 13.8215 12.075 13.5738 12.6914C13.4832 12.9119 13.46 13.2189 13.46 13.5275V19.2889H10.0289C10.0289 19.2889 10.0754 9.94178 10.0289 8.97259H13.46V10.4348L13.4375 10.4685H13.46V10.4348C13.9153 9.73335 14.729 8.7305 16.5511 8.7305C18.8077 8.7305 20.5 10.2055 20.5 13.3736ZM6.44078 4C5.26797 4 4.5 4.76958 4.5 5.78205C4.5 6.77208 5.24553 7.56491 6.39589 7.56491H6.41833C7.61519 7.56491 8.35831 6.77208 8.35831 5.78205C8.33747 4.76958 7.61599 4 6.44158 4H6.44078ZM4.70362 19.2889H8.13305V8.97259H4.70362V19.2889Z" fill="white" />
                        </svg>
                    </a>
               
            </div>
        </div>
        <div class="footer-section newsletter">
            <h4>Newsletter</h4>
            <form id="newsletterForm" method="post" style='margin-left: 0; display:block;'>
                        <ul class="nav__ul">
                            <li>Enter Your mail</li>
                            <li>
                                <input style="width: 169px; height: 23px;" class="mail" type="email" name="email" required>
                            </li>
                            <li>
                                <button class="sub_button" type="submit">Submit</button>
                            </li>
                        </ul>
                    </form>
            <?php
                    if (!empty($message)) {
                        echo "<div class='message'>$message</div>";
                    }
                    ?>
        </div>
    </footer>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
    </script>
</body>

</html>'