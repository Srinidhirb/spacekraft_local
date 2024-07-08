<?php
// Include your database connection file
include 'connect.php';

// Function to sanitize inputs
function sanitize($conn, $input)
{
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
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

        * {
            font-family: "Lato", sans-serif;
            margin: 0;
            padding: 0;

        }

        .popup {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .thank-you-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .thank-you-card {
            background: #fff;
            padding: 70px 80px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 700px;
            width: 100%;
        }


        .thank-you-card h2 {
            font-size: 2rem;
            margin: 20px 0 10px;
        }

        .thank-you-card p {
            font-size: 1.2rem;
            color: #6c757d;
            padding: 0 70px;

        }

        .resources-button {
            display: flex;

            justify-content: center;
            max-width: 80px;
            width: 100%;
            gap: 10px;
            margin-top: 20px;
            padding: 10px 20px;
            border: #031B64 1px solid;
            color: #031B64;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .resources-button:hover {
            background-color: #4AE9E9;
        }

        .bold {
            font-weight: bold;
            color: #222222 !important;
            margin: 16px 0 0 0;
        }
        .share_button{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            gap: 30px;
        }
    </style>
</head>

<body>
    <div class="popup">
        <div class="thank-you-container">
            <div class="thank-you-card">
                <div class="checkmark">
                    <svg width="65" height="64" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32.5 64C50.1731 64 64.5 49.6731 64.5 32C64.5 14.3269 50.1731 0 32.5 0C14.8269 0 0.5 14.3269 0.5 32C0.5 49.6731 14.8269 64 32.5 64Z" fill="#1EC98B" />
                        <path d="M28.8677 52.795L14.6112 37.9755L19.8961 32.8903L27.7599 41.0629L44.6861 15.0742L50.8428 19.0878L28.8677 52.795Z" fill="white" />
                    </svg>
                </div>
                <h2>Thank you for retail space enquiry</h2>
                <p>Sales team will be in touch shortly</p>
                <p>In the meantime, you can head to our resources page for some great ideas on how to get the best of your short-term retail space.</p>
                <p class="bold">Stay tuned!</p>
                <div class="share_button">
                    <a href="resources.php" class="resources-button"> <span> Blogs</span> <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 12H18.5M13.5 6L18.7929 11.2929C19.1834 11.6834 19.1834 12.3166 18.7929 12.7071L13.5 18" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </a>
                    <a href="index.php" class="resources-button"> <span> Home</span> <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 12H18.5M13.5 6L18.7929 11.2929C19.1834 11.6834 19.1834 12.3166 18.7929 12.7071L13.5 18" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>