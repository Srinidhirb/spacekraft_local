<?php
session_start();
$user_id = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedYear = isset($_POST['year']) ? $_POST['year'] : '';
    $selectedMonth = isset($_POST['month']) ? $_POST['month'] : '';
    $selectedDates = isset($_POST['calendar']) ? $_POST['calendar'] : '';

    $_SESSION['selectedYear'] = $selectedYear;
    $_SESSION['selectedMonth'] = $selectedMonth;
    $_SESSION['selectedDates'] = $selectedDates;
    $_SESSION['user_id'] = $user_id;

    echo '<script>window.location.href = "Space_pricing.php";</script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List a Space - Step 3</title>
    <!-- Include your stylesheets and scripts here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets\css\stylelist.php">
    <link rel="stylesheet" href="assets\css\header_footer-css.php">
    <!-- Include flatpickr library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <style>
        #calendar {
            display: none; /* Hide the input box */
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="add-listing">
        <h1 class="name-center">List a Space</h1>

        <div class="step-diagram">
            <!-- Step diagram HTML here -->
            <div class="diagram ">
                <div class="circle-finished enabled"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg>
                </div>
                <span> Space details<span>
            </div>
            <div class="diagram">
                <div class="circle-finished enabled "><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg></div>
                <span> Space Showcase<span>
            </div>
            <div class="diagram">
                <div class="circle ">3</div>
                <span class=""> Availability Date<span>
            </div>
            <div class="diagram">
                <div class="circle disabled">4</div>
                <span class="disabled"> Space Pricing<span>
            </div>
            <div class="diagram">
                <div class="circle1 disabled">5</div>
                <span class="disabled"> Personal Details<span>
            </div>
        </div>
        <div class="heading-small">Availability Date</div>
        <form action="" method="post" enctype="multipart/form-data" id="form">
            <div class="label-container">
                <label for="calendar">Select Dates&nbsp;<span class="red">*</span></label>
            </div>
            <div class="container">
                <input type="text" id="calendar" name="calendar" pattern="\d{4}-\d{2}-\d{2}" title="Please enter a date in the format YYYY-MM-DD" required value="<?php echo isset($_SESSION['selectedDates']) ? $_SESSION['selectedDates'] : ''; ?>">
            </div>
            <span class="space">Mandatory fields are marked with&nbsp;<span class="red">*</span></span>
            <div class="button-container">
                <button type="button" class="back-btn" onclick="goToStep2()">Back</button>
                <button type="submit" class="next-btn">Next</button>
            </div>
        </form>
    </div>
    <?php include 'footer.php'?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#calendar", {
                mode: "multiple",
                dateFormat: "Y-m-d",
                minDate: "today",
                disable: [new Date()],
                inline: true, // Show calendar inline
                showMonths: 2, // Show two months in the calendar
            });
        });

        function goToStep2() {
            window.location.href = 'Space_showcase.php';
        }
    </script>
</body>

</html>