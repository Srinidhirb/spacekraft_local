<?php
// Include your database connection file
include 'connect.php';

// Function to sanitize inputs
function sanitize($conn, $input) {
    return mysqli_real_escape_string($conn, htmlspecialchars($input));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
   
    $fullName = sanitize($conn, $_POST['fullName']);
    $mobileNumber = sanitize($conn, $_POST['mobileNumber']);
    $projectDescription = sanitize($conn, $_POST['projectDescription']);
    $ownerQuestions = sanitize($conn, $_POST['ownerQuestions']);
    $startDate = sanitize($conn, $_POST['startDate']);
    $endDate = sanitize($conn, $_POST['endDate']);

    // Capture the referring URL
    $referringUrl = sanitize($conn, $_POST['referringUrl']);

    // Example SQL query to insert data into your database table
    $query = "INSERT INTO enquiries (full_name, mobile_number, project_description, owner_questions, start_date, end_date, referring_url)
              VALUES ( '$fullName', '$mobileNumber', '$projectDescription', '$ownerQuestions', '$startDate', '$endDate', '$referringUrl')";

    // Execute query (make sure to use prepared statements for real applications)
    if (mysqli_query($conn, $query)) {
        // Insertion successful
        echo "";
    } else {
        // Error in insertion
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            height: 95vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .thank-you-container {
            text-align: center;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
        }
        .thank-you-container img {
            width: 50px;
            height: 50px;
        }
        .thank-you-container h1 {
            font-size: 1.5em;
            margin: 20px 0 10px;
        }
        .thank-you-container p {
            color: #666;
            margin: 10px 0;
        }
        .thank-you-container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #0056b3;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .thank-you-container a:hover {
            background: #003d80;
        }
    </style>
</head>
<body>
    
        <div class="thank-you-container">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_370_6017)">
                    <path d="M12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21509 0.913451 7.4078C0.00519943 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.8071 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0866C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6935 24 14.3734 24 12C24 8.8174 22.7357 5.76516 20.4853 3.51472C18.2348 1.26428 15.1826 0 12 0V0ZM12 22C10.0222 22 8.08879 21.4135 6.4443 20.3147C4.79981 19.2159 3.51809 17.6541 2.76121 15.8268C2.00433 13.9996 1.8063 11.9889 2.19215 10.0491C2.578 8.10929 3.53041 6.32746 4.92894 4.92893C6.32746 3.53041 8.10929 2.578 10.0491 2.19215C11.9889 1.8063 13.9996 2.00433 15.8268 2.7612C17.6541 3.51808 19.2159 4.79981 20.3147 6.4443C21.4135 8.08879 22 10.0222 22 12C22 14.6522 20.9464 17.1957 19.0711 19.0711C17.1957 20.9464 14.6522 22 12 22Z" fill="#34C759" />
                </g>
                <path d="M10.4928 16.9494C10.2298 16.9496 9.96942 16.898 9.72645 16.7974C9.48347 16.6969 9.26271 16.5494 9.0768 16.3634L5.2928 12.6644C5.10317 12.4788 4.99506 12.2254 4.99224 11.96C4.98943 11.6947 5.09215 11.4391 5.2778 11.2494C5.46345 11.0598 5.71683 10.9517 5.98219 10.9489C6.24756 10.9461 6.50317 11.0488 6.6928 11.2344L10.4858 14.9414L17.2918 8.24143C17.4837 8.07256 17.733 7.9836 17.9885 7.99284C18.244 8.00208 18.4862 8.10882 18.6655 8.29112C18.8447 8.47342 18.9473 8.71743 18.9522 8.97303C18.9571 9.22863 18.8639 9.4764 18.6918 9.66543L11.8988 16.3724C11.7139 16.5563 11.4945 16.702 11.2533 16.801C11.012 16.9 10.7536 16.9504 10.4928 16.9494Z" fill="#34C759" />
                <defs>
                    <clipPath id="clip0_370_6017">
                        <rect width="24" height="24" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        <h1>Thank you for retail space enquiry</h1>
        <p>Sales team will be in touch shortly</p>
        <p>In the meantime, you can head to our resources page for some great ideas on how to get the best of your short-term retail space.</p>
        <p>Stay tuned!</p>
        <a href="#">Resources page →</a>
    </div>
</body>
</html>