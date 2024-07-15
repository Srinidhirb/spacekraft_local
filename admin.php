<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    // Redirect to the admin login page if not logged in
    echo '<script>window.location.href = "admin_login.php";</script>';
    exit();
}

// Include your database connection file
include 'connect.php';

// Set the number of entries to display per page
$entriesPerPage = 10;

// Get the current page number from the query string, default to 1 if not set
$pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the starting entry index for the current page
$startIndex = ($pageNumber - 1) * $entriesPerPage;

// Fetch data from the enquiries table with pagination
$sqlEnquiries = "SELECT * FROM enquiries LIMIT $startIndex, $entriesPerPage";
$resultEnquiries = $conn->query($sqlEnquiries);

if (!$resultEnquiries) {
    // Handle query execution error for enquiries
    echo "Error executing enquiries query: " . $conn->error;
    exit();
}

// Fetch data from the admin review table with pagination
$sqlAdminReview = "SELECT * FROM admin_review_table LIMIT $startIndex, $entriesPerPage";
$resultAdminReview = $conn->query($sqlAdminReview);

if (!$resultAdminReview) {
    // Handle query execution error for admin review
    echo "Error executing admin review query: " . $conn->error;
    exit();
}

// Fetch data from the offline listing table with pagination
$sqlOfflineListing = "SELECT * FROM offline_listing LIMIT $startIndex, $entriesPerPage";
$resultOfflineListing = $conn->query($sqlOfflineListing);

if (!$resultOfflineListing) {
    // Handle query execution error for offline listing
    echo "Error executing offline listing query: " . $conn->error;
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* Your CSS styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .pagination {
            display: inline-block;
            margin-top: 20px;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        .button-container {
            margin-bottom: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="button-container">
        <button onclick="showEnquiries()">Enquiries</button>
        <button onclick="showAdminReview()">Admin Review</button>
        <button onclick="showOfflineListing()">Offline Listings</button>
    </div>

    <div id="enquiries-table" style="display: none;">
        <h2>Enquiries</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>Project Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Referring URL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each row in the enquiries result set
                while ($row = $resultEnquiries->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['full_name']}</td>";
                    echo "<td>{$row['mobile_number']}</td>";
                    echo "<td>{$row['project_description']}</td>";
                    echo "<td>{$row['start_date']}</td>";
                    echo "<td>{$row['end_date']}</td>";
                    echo "<td><a href='{$row['referring_url']}' target='_blank'>{$row['referring_url']}</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination for Enquiries -->
        <div class="pagination">
            <?php
            // Calculate the total number of pages for enquiries
            $sqlTotalEnquiries = "SELECT COUNT(*) AS total FROM enquiries";
            $resultTotalEnquiries = $conn->query($sqlTotalEnquiries);
            $rowTotalEnquiries = $resultTotalEnquiries->fetch_assoc();
            $totalPagesEnquiries = ceil($rowTotalEnquiries['total'] / $entriesPerPage);

            // Generate pagination links for enquiries
            for ($i = 1; $i <= $totalPagesEnquiries; $i++) {
                $activeClassEnquiries = ($i == $pageNumber) ? 'active' : '';
                echo "<a href='admin.php?page={$i}' class='{$activeClassEnquiries}'>Enquiries Page {$i}</a>";
            }
            ?>
        </div>
    </div>

    <div id="admin-review-table" style="display: none;">
        <h2>Admin Review</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Space Name</th>
                    <th>Project Type</th>
                    <th>Space Type</th>
                    <th>Space Address 1</th>
                    <th>Space Address 2</th>
                    <th>City</th>
                    <th>Pin Code</th>
                    <th>Space Area</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Amenities</th>
                    <th>Min Duration</th>
                    <th>Min Duration Unit</th>
                    <th>Max Duration</th>
                    <th>Max Duration Unit</th>
                    <th>Selected Year</th>
                    <th>Selected Month</th>
                    <th>Selected Dates</th>
                    <th>Daily Price</th>
                    <th>Weekly Price</th>
                    <th>Monthly Price</th>
                    <th>Maintenance</th>
                    <th>Security Deposit</th>
                    <th>payment_type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each row in the admin review result set
                while ($row = $resultAdminReview->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['SpaceName']}</td>";
                    echo "<td>{$row['projectType']}</td>";
                    echo "<td>{$row['SpaceType']}</td>";
                    echo "<td>{$row['SpaceAddress1']}</td>";
                    echo "<td>{$row['SpaceAddress2']}</td>";
                    echo "<td>{$row['City']}</td>";
                    echo "<td>{$row['PinCode']}</td>";
                    echo "<td>{$row['SpaceArea']}</td>";
                    echo "<td>{$row['Description']}</td>";
                    echo "<td>";

                    // Display images without slider
                    $imagePaths = explode(',', $row['images']);
                    foreach ($imagePaths as $imagePath) {
                        $imageSrc = "http://spacekraft.in/{$imagePath}";
                        echo "<img src='{$imageSrc}' alt='Space Image' style='max-width: 100px; max-height: 100px;'>";
                        echo "<br>";
                        echo "Image Source: {$imageSrc}";
                        echo "<br>";
                    }

                    echo "</td>";
                    echo "<td>{$row['Amenities']}</td>";
                    echo "<td>{$row['min_duration']}</td>";
                    echo "<td>{$row['min_duration_unit']}</td>";
                    echo "<td>{$row['max_duration']}</td>";
                    echo "<td>{$row['max_duration_unit']}</td>";
                    echo "<td>{$row['selected_year']}</td>";
                    echo "<td>{$row['selected_month']}</td>";
                    echo "<td>{$row['selected_dates']}</td>";
                    echo "<td>{$row['DailyPrice']}</td>";
                    echo "<td>{$row['WeeklyPrice']}</td>";
                    echo "<td>{$row['MonthlyPrice']}</td>";
                    echo "<td>{$row['Maintenance']}</td>";
                    echo "<td>{$row['SecurityDeposit']}</td>";
                    echo "<td>{$row['payment_type']}</td>";

                    echo "<td>
                            <a href='approve.php?id={$row['id']}&action=approve'>Approve</a>
                            <a href='approve.php?id={$row['id']}&action=reject'>Reject</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination for Admin Review -->
        <div class="pagination">
            <?php
            // Calculate the total number of pages for admin review
            $sqlTotalAdminReview = "SELECT COUNT(*) AS total FROM admin_review_table";
            $resultTotalAdminReview = $conn->query($sqlTotalAdminReview);
            $rowTotalAdminReview = $resultTotalAdminReview->fetch_assoc();
            $totalPagesAdminReview = ceil($rowTotalAdminReview['total'] / $entriesPerPage);

            // Generate pagination links for admin review
            for ($i = 1; $i <= $totalPagesAdminReview; $i++) {
                $activeClassAdminReview = ($i == $pageNumber) ? 'active' : '';
                echo "<a href='admin.php?page={$i}' class='{$activeClassAdminReview}'>Admin Review Page {$i}</a>";
            }
            ?>
        </div>
    </div>

    <div id="offline-listing-table" style="display: none;">
        <h2>Offline Listings</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Space Name</th>
                    <th>Space Address 1</th>
                    <th>Space Address 2</th>
                    <th>City</th>
                    <th>Pin Code</th>
                    <th>Space Area</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Amenities</th>
                    <th>Min Duration</th>
                    <th>Min Duration Unit</th>
                    <th>Max Duration</th>
                    <th>Max Duration Unit</th>
                    <th>Selected Year</th>
                    <th>Selected Month</th>
                    <th>Selected Dates</th>
                    <th>Daily Price</th>
                    <th>Weekly Price</th>
                    <th>Monthly Price</th>
                    <th>Maintenance</th>
                    <th>Security Deposit</th>
                    <th>payment_type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each row in the offline listing result set
                while ($row = $resultOfflineListing->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['SpaceName']}</td>";
                    echo "<td>{$row['SpaceAddress1']}</td>";
                    echo "<td>{$row['SpaceAddress2']}</td>";
                    echo "<td>{$row['City']}</td>";
                    echo "<td>{$row['PinCode']}</td>";
                    echo "<td>{$row['SpaceArea']}</td>";
                    echo "<td>{$row['Description']}</td>";
                    echo "<td>";

                    // Display images without slider
                    $imagePaths = explode(',', $row['images']);
                    foreach ($imagePaths as $imagePath) {
                        $imageSrc = "http://spacekraft.in/{$imagePath}";
                        echo "<img src='{$imageSrc}' alt='Space Image' style='max-width: 100px; max-height: 100px;'>";
                        echo "<br>";
                        echo "Image Source: {$imageSrc}";
                        echo "<br>";
                    }

                    echo "</td>";
                    echo "<td>{$row['Amenities']}</td>";
                    echo "<td>{$row['min_duration']}</td>";
                    echo "<td>{$row['min_duration_unit']}</td>";
                    echo "<td>{$row['max_duration']}</td>";
                    echo "<td>{$row['max_duration_unit']}</td>";
                    echo "<td>{$row['selected_year']}</td>";
                    echo "<td>{$row['selected_month']}</td>";
                    echo "<td>{$row['selected_dates']}</td>";
                    echo "<td>{$row['DailyPrice']}</td>";
                    echo "<td>{$row['WeeklyPrice']}</td>";
                    echo "<td>{$row['MonthlyPrice']}</td>";
                    echo "<td>{$row['Maintenance']}</td>";
                    echo "<td>{$row['SecurityDeposit']}</td>";
                    echo "<td>{$row['payment_type']}</td>";

                    echo "<td>
                            <a href='approve.php?id={$row['id']}&action=approve'>Approve</a>
                            <a href='approve.php?id={$row['id']}&action=reject'>Reject</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination for Offline Listings -->
        <div class="pagination">
            <?php
            // Calculate the total number of pages for offline listing
            $sqlTotalOfflineListing = "SELECT COUNT(*) AS total FROM offline_listing";
            $resultTotalOfflineListing = $conn->query($sqlTotalOfflineListing);
            $rowTotalOfflineListing = $resultTotalOfflineListing->fetch_assoc();
            $totalPagesOfflineListing = ceil($rowTotalOfflineListing['total'] / $entriesPerPage);

            // Generate pagination links for offline listing
            for ($i = 1; $i <= $totalPagesOfflineListing; $i++) {
                $activeClassOfflineListing = ($i == $pageNumber) ? 'active' : '';
                echo "<a href='admin.php?page={$i}' class='{$activeClassOfflineListing}'>Offline Listings Page {$i}</a>";
            }
            ?>
        </div>
    </div>

    <script>
        // JavaScript function to show Enquiries table and hide others
        function showEnquiries() {
            document.getElementById('enquiries-table').style.display = 'block';
            document.getElementById('admin-review-table').style.display = 'none';
            document.getElementById('offline-listing-table').style.display = 'none';
        }

        // JavaScript function to show Admin Review table and hide others
        function showAdminReview() {
            document.getElementById('enquiries-table').style.display = 'none';
            document.getElementById('admin-review-table').style.display = 'block';
            document.getElementById('offline-listing-table').style.display = 'none';
        }

        // JavaScript function to show Offline Listing table and hide others
        function showOfflineListing() {
            document.getElementById('enquiries-table').style.display = 'none';
            document.getElementById('admin-review-table').style.display = 'none';
            document.getElementById('offline-listing-table').style.display = 'block';
        }
    </script>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
