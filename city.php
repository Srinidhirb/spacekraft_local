<?php
// Include your database connection file
@include 'connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

$perPage = 12;

// Get the current page number from the URL parameter
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $perPage;

// Add the LIMIT and OFFSET clauses to the SQL query
$limit = "LIMIT $offset, $perPage";

// Initialize the total number of rows and pages
$totalRows = 0;
$totalPages = 0;

// Initialize the $result variable
$result = null;
$cityName = '';
$cityDes = '';
$cityImg = '';

// Initialize $selectedCity to an empty string or any default value
$selectedCity = '';

// Fetch data for the city information
if (isset($_GET['City'])) {
    // Get the value of the 'City' parameter
    $selectedCity = $_GET['City'];

    $cityInfoSql = "SELECT City, city_image, city_description FROM city WHERE City LIKE '%$selectedCity%'";
    $cityInfoResult = $conn->query($cityInfoSql);

    // Check if there are any records for the city information
    if ($cityInfoResult->num_rows > 0) {
        // Fetch data from the first record
        $cityInfoRow = $cityInfoResult->fetch_assoc();
        $cityName = $cityInfoRow['City'];
        $cityDes = $cityInfoRow['city_description'];
        $cityImg = $cityInfoRow['city_image'];
    }
}

// Check if the 'City' parameter is set in the URL
if (isset($_GET['City'])) {
    // Fetch listings based on the selected city
    $sql = "SELECT combined_list.*, city.City, city.city_image, city.city_description
    FROM combined_list
    JOIN city ON combined_list.City = city.City
    WHERE combined_list.City LIKE '%$selectedCity%'
    AND city.City LIKE '%$selectedCity%'";

    // Check if search parameters are provided
    if (isset($_GET['type']) || isset($_GET['duration']) || (isset($_GET['amenities']) && !empty($_GET['amenities']))) {
        $type = isset($_GET['type']) ? $_GET['type'] : "";
        $duration = isset($_GET['duration']) ? $_GET['duration'] : "";

        // Modify your SQL query to include the search conditions for location and type
        $sql .= " AND 1"; // Start a new condition block

        // Use $cityName as the default value for location
        $location = isset($_GET['location']) ? $_GET['location'] : $cityName;
        $sql .= " AND combined_list.City LIKE '%$location%'";

        if (!empty($type)) {
            $sql .= " AND combined_list.SpaceType LIKE '%$type%'";
        }

        // Add conditions based on the provided duration parameter
        if (!empty($duration)) {
            if ($duration === 'days') {
                $sql .= " AND min_duration_unit LIKE 'days%'";
            } elseif ($duration === 'weeks') {
                $sql .= " AND min_duration_unit LIKE 'weeks%'";
            } elseif ($duration === 'months') {
                $sql .= " AND min_duration_unit LIKE 'months%'";
            } else {
                echo "Error: Invalid duration parameter.";
                exit;
            }
        }

        // Add conditions for amenities only if provided
        if (isset($_GET['amenities']) && !empty($_GET['amenities'])) {
            $selectedAmenities = $_GET['amenities'];

            // Create an array to store individual conditions for amenities
            $amenityConditions = [];

            // Loop through selected amenities and add conditions to the array
            foreach ($selectedAmenities as $amenity) {
                $amenityConditions[] = "combined_list.Amenities LIKE '%$amenity%'";
            }

            // Combine individual conditions using AND
            $amenitiesCondition = implode(' AND ', $amenityConditions);

            // Add the combined condition to the main SQL query
            $sql .= " AND ($amenitiesCondition)";
        }
    }

    // Calculate the total number of rows based on the search conditions
    $sqlTotalRows = "SELECT COUNT(*) as total FROM combined_list WHERE 1";

    if (!empty($selectedCity)) {
        $sqlTotalRows .= " AND City LIKE '%$selectedCity%'";
    }

    if (!empty($type)) {
        $sqlTotalRows .= " AND SpaceType LIKE '%$type%'";
    }

    if (isset($_GET['amenities']) && !empty($_GET['amenities'])) {
        // Check if amenities are provided
        $selectedAmenities = $_GET['amenities'];

        // Create an array to store individual conditions for amenities
        $amenityConditions = [];

        // Loop through selected amenities and add conditions to the array
        foreach ($selectedAmenities as $amenity) {
            $amenityConditions[] = "Amenities LIKE '%$amenity%'";
        }

        // Combine individual conditions using OR
        $amenitiesCondition = implode(' OR ', $amenityConditions);

        // Add the combined condition to the main SQL query
        $sqlTotalRows .= " AND ($amenitiesCondition)";
    }

    if (!empty($duration)) {
        // Add conditions based on the provided duration parameter
        if ($duration === 'days') {
            $sqlTotalRows .= " AND min_duration_unit LIKE 'days%'";
        } elseif ($duration === 'weeks') {
            $sqlTotalRows .= " AND min_duration_unit LIKE 'weeks%'";
        } elseif ($duration === 'months') {
            $sqlTotalRows .= " AND min_duration_unit LIKE 'months%'";
        } else {
            echo "Error: Invalid duration parameter.";
            exit;
        }
    }

    // Execute the query to get the total number of rows
    $resultTotalRows = $conn->query($sqlTotalRows);

    // Check for errors in executing the query
    if (!$resultTotalRows) {
        echo "Error executing total rows query: " . $conn->error;
        exit;
    }

    // Fetch the total number of rows
    $rowTotal = $resultTotalRows->fetch_assoc();
    $totalRows = $rowTotal['total'];
    $totalPages = ceil($totalRows / $perPage);

    // Add LIMIT and OFFSET to the main SQL query
    $sql .= " LIMIT $offset, $perPage";
    $result = $conn->query($sql);

    // Handle the case where no listings are found for the search parameters
    if (!$result) {
        echo "Error executing query: " . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <title>City</title>
    <link rel="stylesheet" href="assets\css\find-css.php">
    <link rel="stylesheet" href="assets\css\header_footer-css.php">
    <link rel="stylesheet" href="assets\css\find-css.php">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
    <style>
       
       

        .bg {
            width: 100%;
            height: 60vh;
            background-image: url('<?php echo "city_img/$cityName.png"; ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
           

        }
    </style>
    <link rel="stylesheet" href="assets\css\faq-css.php">
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="size"></div>
    <?php
    // Display the city information or other content based on your logic
    echo "<div class='city-title'>Discover Spaces In and Around $cityName</div>";
    echo "<div class='bg'></div>";
    echo "<div class='Abt'>About $cityName: <p>$cityDes</p></div>";

    // Include the search bar outside of the conditional block
    include 'search.php';
    


    // Check if there are any records for listings
    if ($result && $result->num_rows > 0) {

        // Loop through all records and display listings
        echo "<div class='container'>";
        while ($row = $result->fetch_assoc()) {
            $spaceId = $row['id'];
            $spaceName = $row['SpaceName'];
            $spaceType = $row['SpaceType'];
            $spaceAddress1 = $row['SpaceAddress1'];
            $spaceAddress2 = $row['SpaceAddress2'];
            $city = $row['City'];
            $pinCode = $row['PinCode'];

            $spaceArea = $row['SpaceArea'];
            $spaceDes = $row['Description'];
            $spaceImg = $row['images'];

            $spaceDailyPrice = $row['DailyPrice'];
            $spaceWeeklyPrice = $row['WeeklyPrice'];
            $spaceMonthlyPrice = $row['MonthlyPrice'];
            $spaceMain = $row['Maintenance'];
            $spaceDeposit = $row['SecurityDeposit'];
            $amenities = explode(',', $row['Amenities']);
    ?>
            <div class="listing-container" onclick="redirectToSpace('<?php echo $spaceId; ?>')">
                <?php if ($spaceImg !== "N/A") : ?>
                    <?php
                    $imagePaths = explode(',', $spaceImg);
                    ?>
                    <img class="listing-image" src="http://spacekraft.in/<?php echo $imagePaths[0]; ?>" height="200" alt="">
                <?php else : ?>
                    <img class="listing-image" src="path/to/default/image.jpg" height="200" alt="Default Image">
                <?php endif; ?>

                <p class="info"> <?php echo substr($spaceName, 0, 20); ?> <?php echo strlen($spaceName) > 20 ? "..." : ""; ?></p>
                <p class="info1 "><?php echo " $city - $pinCode"; ?></p>
                <p class="info2"> <?php echo substr($spaceArea, 0, 20); ?> <?php echo strlen($spaceArea) > 20 ? "..." : ""; ?>sq ft.</p>
            </div>
    <?php
        } // End of the while loop

    } else {
        // Handle the case where no listings are found
        echo "<p class='center'>No listings found for the selected criteria.</p>";
    }
    ?>
    
    </div>
    <div class="pagination">
        <?php
        $queryString = $_SERVER['QUERY_STRING'];



        for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = $i === $page ? 'active' : '';
            echo "<a class='$activeClass' href='?$queryString&page=$i'>$i</a> ";
        }


        ?>
    </div>
    <?php include 'footer.php'; ?>
    <!-- Include your additional scripts or JavaScript code here -->
    <script>
   function redirectToSpace(spaceId) {
      // Encode spaceId in Base64
      var encodedSpaceId = btoa(spaceId);
      // Redirect to the encoded URL
      window.location.href = 'ind_space_details.php?spaceId=' + encodedSpaceId;
    }
</script>
</body>

</html>