<?php
// Include your database connection file
@include 'connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

// Initialize the $result variable
$result = null;

// Set the number of listings to display per page
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

// Check if the 'City' parameter is set in the URL
if (isset($_GET['City'])) {
    // Get the value of the 'City' parameter
    $selectedCity = $_GET['City'];

    // Fetch listings based on the selected city
    $sql = "SELECT * FROM combined_list WHERE City LIKE '%$selectedCity%' ORDER BY id DESC";

    // Count the total number of rows for the given search criteria
    $sqlTotalRows = "SELECT COUNT(*) as total FROM combined_list WHERE City LIKE '%$selectedCity%'";
} else {
    // Check if search parameters are provided
    if (
        isset($_GET['location']) ||
        isset($_GET['type']) ||
        isset($_GET['duration']) ||
        isset($_GET['amenities']) ||
        isset($_GET['sort_by']) ||
        isset($_GET['search']) // Add this line for search functionality
    ) {
        $location = isset($_GET['location']) ? $_GET['location'] : "";
        $type = isset($_GET['type']) ? $_GET['type'] : "";
        $duration = isset($_GET['duration']) ? $_GET['duration'] : "";
        $search = isset($_GET['search']) ? $_GET['search'] : ""; // Add this line for search functionality

        // Modify your SQL query to include the search conditions for location and type
        $sql = "SELECT * FROM combined_list WHERE 1";

        if (!empty($location)) {
            $sql .= " AND City LIKE '%$location%'";
        }

        if (!empty($type)) {
            $sql .= " AND SpaceType LIKE '%$type%'";
        }

        if (!empty($search)) { // Add this block for search functionality
            $sql .= " AND (City LIKE '%$search%' OR SpaceType LIKE '%$search%' OR Amenities LIKE '%$search%')";
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

        // Check if amenities are provided
        if (isset($_GET['amenities']) && !empty($_GET['amenities'])) {
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
            $sql .= " AND ($amenitiesCondition)";
        }

        // Check if sort_by is provided
        if (isset($_GET['sort_submit']) && isset($_GET['sort_by'])) {
            $sortOption = $_GET['sort_by'];

            switch ($sortOption) {
                case 'space_area_desc':
                    $sortingSql = " ORDER BY CAST(SpaceArea AS DECIMAL(10,2)) DESC";
                    break;
                case 'space_area_asc':
                    $sortingSql = " ORDER BY CAST(SpaceArea AS DECIMAL(10,2)) ASC";
                    break;
                case 'recently_listed':
                    $sortingSql = " ORDER BY id DESC";
                    break;
                default:
                    $sortingSql = ""; // Handle other cases if needed
            }

            // Append the sorting condition to the main SQL query
            $sql .= $sortingSql;
        }

        // Count the total number of rows for the given search criteria
        $sqlTotalRows = "SELECT COUNT(*) as total FROM combined_list WHERE 1";

        if (!empty($location)) {
            $sqlTotalRows .= " AND City LIKE '%$location%'";
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

        if (!empty($search)) {
            $searchTerm = "$search%";
            $sqlTotalRows .= " AND (City LIKE '$searchTerm' OR SpaceType LIKE '$searchTerm' OR Amenities LIKE '$searchTerm')";
        }
        

        // ... (add conditions based on other search parameters)

    } else {
        // If no specific search parameters are provided, retrieve all listings
        $sql =  "SELECT * FROM combined_list ORDER BY id DESC ";
        $sqlTotalRows = "SELECT COUNT(*) as total FROM combined_list";
    }
}

// Append the LIMIT and OFFSET condition to the main SQL query
$sql .= " $limit";

// Execute the main SQL query to fetch listings
$result = $conn->query($sql);

// Handle the case where no listings are found for the search parameters
if (!$result) {
    echo "Error executing query: " . $conn->error;
}

// Fetch the total number of rows for pagination
$resultTotalRows = $conn->query($sqlTotalRows);
$rowTotal = $resultTotalRows->fetch_assoc();
$totalRows = $rowTotal['total'];

// Calculate the total number of pages based on the total number of rows for the current search criteria
$totalPages = ceil($totalRows / $perPage);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <title>View Listings</title>
    <link rel="stylesheet" href="assets\css\find-css.php">
    <link rel="stylesheet" href="assets\css\header_footer-css.php">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-WXVP8RTRY0');
    </script>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="content-div">
            <p>Discover New Spaces Around You</p>
        </div>
    </div>
    <?php include 'search_find.php'; ?>

    <div class="container">
        <?php
        // Check if there are any records
        if ($result->num_rows > 0) {
            // Loop through all records
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

                <script>
                    function redirectToSpace(spaceId) {
                        // Encode spaceId in Base64
                        var encodedSpaceId = btoa(spaceId);
                        // Redirect to the encoded URL
                        window.location.href = 'ind_space_details.php?spaceId=' + encodedSpaceId;
                    }
                </script>


        <?php
            }


            // Display pagination links

        } else {
            echo "<p class='center'>No listings found for the criteria.</p>";
        }
        ?>
    </div>
    <div class="pagination">
        <?php
        $queryString = $_SERVER['QUERY_STRING'];

        // Previous Page Arrow Icon
        $prevPage = $page - 1;
        if ($prevPage >= 1) {
            echo "<a href='?$queryString&page=$prevPage'><svg class='pagination-icon' width='18' height='16' viewBox='0 0 24 18' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15.41 7.41L14 6L8 12L14 18L15.41 16.59L10.83 12L15.41 7.41Z' fill='#333333'/></svg></a>";
        }

        // Pagination Numbers
        for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = $i === $page ? 'active' : '';
            echo "<a class='$activeClass' href='?$queryString&page=$i'>$i</a> ";
        }

        // Next Page Arrow Icon
        $nextPage = $page + 1;
        if ($nextPage <= $totalPages) {
            echo "<a href='?$queryString&page=$nextPage'><svg class='pagination-icon' width='16' height='16' viewBox='0 0 24 18' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M8.59 16.59L10 18L16 12L10 6L8.59 7.41L13.17 12L8.59 16.59Z' fill='#333333'/></svg></a>";
        }
        ?>
    </div>








    <!-- Add your styling and additional content as needed -->



    <?php include 'footer.php' ?>
</body>

</html>