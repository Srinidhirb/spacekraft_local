<?php
session_start();
// Include your database connection file
@include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

// Process the form data for step 2
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process List1 Form data
    $spaceArea = isset($_POST["space_area"]) ? $_POST["space_area"] : "";
    $spaceDes = isset($_POST["space_des"]) ? $_POST["space_des"] : "";

    // Function to handle file uploads
    function handleFileUpload($fileKey)
    {
        $spaceImages = array();
        $imageUploaded = false; // Flag to check if at least one image is uploaded

        // Loop through uploaded files
        foreach ($_FILES[$fileKey]['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES[$fileKey]['name'][$key];
            $file_size = $_FILES[$fileKey]['size'][$key];
            $file_tmp = $_FILES[$fileKey]['tmp_name'][$key];
            $file_type = $_FILES[$fileKey]['type'][$key];
            $file_ext = strtolower(end(explode('.', $file_name)));

            $extensions = array("jpeg", "jpg", "png", "gif");



            if ($file_size > 10485760) {
                echo 'File size exceeds limit of 10 MB';
                exit();
            }

            // Generate a unique identifier for each image
            $imageIdentifier = uniqid();
            $target_dir = "uploaded_img/";
            $target_file = $target_dir . $imageIdentifier . "_" . basename($file_name);

            if (!is_dir($target_dir)) {
                // Create the directory if it doesn't exist
                mkdir($target_dir, 0755, true);
            }

            if (move_uploaded_file($file_tmp, $target_file)) {

                // Set $spaceImg to the relative path
                $spaceImages[] = $target_file;
                $imageUploaded = true; // Set flag to true as at least one image is uploaded
            } else {
            }
        }

        return array($imageUploaded, $spaceImages);
    }

    // Call function to handle file uploads
    list($imageUploaded, $spaceImages) = handleFileUpload("space_img");

    // If no image uploaded, handle default image based on space type
    if (!$imageUploaded) {
        $spaceType = $_SESSION['spaceType'];

        switch ($spaceType) {
            case 'stall':
                $defaultImage = "path/to/Stall.svg";
                break;
            case 'storefront':
                $defaultImage = "path/to/Storefront.svg";
                break;
            case 'Mobile Van':
                $defaultImage = "path/to/mobile van.svg";
                break;
            case 'shopping center':
                $defaultImage = "path/to/Shopping.svg";
                break;
            case 'Kiosk':
                $defaultImage = "path/to/Kiosk.svg";
                break;
            case 'Restaurant':
                $defaultImage = "path/to/Restaurant.svg";
                break;
            case 'Lifestyle Center':
                $defaultImage = "path/to/lifestyle.svg";
                break;
            case 'Banquet':
                $defaultImage = "path/to/Banquet.svg";
                break;
            default:
                // Default image for unknown space type
                $defaultImage = "path/to/default_image.jpg";
                break;
        }

        $defaultImageName = basename($defaultImage);
        $target_dir = "uploaded_img/";
        $target_file = $target_dir . $defaultImageName;

        // Copy the default image to the uploaded_img directory
        copy($defaultImage, $target_file);

        // Set $spaceImg to the relative path
        $spaceImages[] = $target_file;
    }

    // Process other form data
    $amenities = isset($_POST["amenities"]) ? $_POST["amenities"] : array();
    $amenitiesString = implode(',', $amenities);

    $spaceTypes = isset($_POST["spacetype"]) ? $_POST["spacetype"] : array();
    $spaceTypesString = implode(',', $spaceTypes);

    // Continue with the rest of your code...
    // Retrieve data stored in session from previous forms
    $spaceName = $_SESSION['spaceName'];
    $spaceType = $_SESSION['spaceType'];
    $spaceAddress1 = $_SESSION['spaceAddress1'];
    $spaceAddress2 = $_SESSION['spaceAddress2'];
    $city = $_SESSION['city'];
    $pinCode = $_SESSION['pinCode'];
    $avail = $_SESSION['avail'];
    $avail_time = $_SESSION['avail_time'];

    // Store these values in session for later use in List2 Form
    $_SESSION['spaceArea'] = $spaceArea;
    $_SESSION['spaceDes'] = $spaceDes;
    $_SESSION['spaceImg'] = implode(',', $spaceImages); // Convert array to comma-separated string
    $_SESSION['Amenities'] = $amenitiesString;
    $_SESSION['SpaceTypes'] = $spaceTypesString;

    // Set the next step
    echo '<script>window.location.href = "space_pricing.php";</script>';
    exit();
}
?>

<!-- Your HTML content for step 2 goes here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
    <title>List a Space - Step 2</title>
    <!-- Include your stylesheets and scripts here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets\css\stylelist.php">
    <link rel="stylesheet" href="assets\css\header_footer-css.php">
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
    <?php
    include 'header.php';
    ?>
    <div class="add-listing">
        <h1 class="name-center">List a Space</h1>

        <div class="step-diagram">

            <div class="diagram ">
                <div class="circle-finished enabled"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6667 9.3335L12.9429 23.0574C12.4222 23.5781 11.5779 23.5781 11.0572 23.0574L5.33337 17.3335" stroke="#FBFBFB" stroke-width="3" stroke-linecap="round" />
                    </svg>
                </div>
                <span> Space details<span>
            </div>
            <div class="diagram">
                <div class="circle ">2</div>
                <span> Space Showcase<span>
            </div>

            <div class="diagram">
                <div class="circle disabled">3</div>
                <span class="disabled"> Space Pricing<span>
            </div>
            <div class="diagram">
                <div class="circle1 disabled">4</div>
                <span class="disabled"> Personal Details<span>
            </div>
        </div>
        <div class="heading-small">Space showcase</div>
        <form action="" method="post" enctype="multipart/form-data" id="form">
            <label for="spacetypes">Space Use</label>
            <div class="spacetype-container" id="spacetypes">
                <div class="spacetype-options">
                    <input type="checkbox" class="spacetype-checkbox" id="LaunchEvents" name="spacetype[]" value="LaunchEvents">
                    <label for="LaunchEvents" class="spacetype-label">Launch Events</label>

                    <input type="checkbox" class="spacetype-checkbox" id="Workspaces" name="spacetype[]" value="Workspaces">
                    <label for="Workspaces" class="spacetype-label">Workspaces</label>

                    <input type="checkbox" class="spacetype-checkbox" id="Productions" name="spacetype[]" value="Productions">
                    <label for="Productions" class="spacetype-label">Productions</label>

                    <input type="checkbox" class="spacetype-checkbox" id="Dinnerparty" name="spacetype[]" value="Dinnerparty">
                    <label for="Dinnerparty" class="spacetype-label">Dinner party</label>

                    <input type="checkbox" class="spacetype-checkbox" id="FilmShoots" name="spacetype[]" value="FilmShoots">
                    <label for="FilmShoots" class="spacetype-label">Film Shoots</label>

                    <input type="checkbox" class="spacetype-checkbox" id="Birthdayparty" name="spacetype[]" value="Birthdayparty">
                    <label for="Birthdayparty" class="spacetype-label">Birthday party</label>



                    <input type="checkbox" class="spacetype-checkbox" id="Conference" name="spacetype[]" value="Conference">
                    <label for="Conference" class="spacetype-label">Conference</label>

                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var checkboxes = document.querySelectorAll('.spacetype-checkbox');

                    checkboxes.forEach(function(checkbox) {
                        checkbox.addEventListener('change', function() {
                            localStorage.setItem(checkbox.id, checkbox.checked);
                        });
                    });

                    // Load checkbox states from localStorage
                    checkboxes.forEach(function(checkbox) {
                        var isChecked = localStorage.getItem(checkbox.id) === 'true';
                        checkbox.checked = isChecked;
                    });
                });
            </script>

            <label for="space_area">Space Area <span class="red">*</span> (in Sq.ft)</label>

            <input type="text" name="space_area" id="space_area" placeholder="Enter Space Area in Sq.ft" required value="<?php echo isset($_SESSION['spaceArea']) ? $_SESSION['spaceArea'] : ''; ?>">

            <label for="space_des">Description<span class="red">*</span></label>
            <textarea class="des" type="text" name="space_des" placeholder="Enter Description" id="space_des" required><?php echo isset($_SESSION['spaceDes']) ? $_SESSION['spaceDes'] : ''; ?></textarea>
            <h5 class="right">max of 150 words</h5>
            <label for="space_img">Space Images</label>

            <label id="label" for="space_img" class="file-label">
                <div class="image_label">
                    <img src="assets/img/upload_img.jpg" alt="Upload Image">
                    <p>Accepted formats are .jpg, .gif, .png and Maximum size allowed 10 MB</p>
                </div>
            </label>
            <input type="file" name="space_img[]" id="space_img" class="file-input" accept=".jpg, .jpeg, .gif, .png" multiple onchange="updateLabel(this)">
            <div id="file-list" class="file-list"></div>

            <p class="right">Min of 4 Images to be uploaded</p>

            <script>
                function updateLabel(input) {
                    const fileList = document.getElementById('file-list');
                    const storedFiles = JSON.parse(localStorage.getItem('selectedFiles')) || [];

                    Array.from(input.files).forEach(file => {
                        const fileReader = new FileReader();
                        fileReader.onload = function(event) {
                            const fileItem = document.createElement('div');
                            fileItem.classList.add('file-item');

                            // Image preview
                            const imageContainer = document.createElement('div');
                            imageContainer.classList.add('image-container');
                            const image = document.createElement('img');
                            image.src = event.target.result;
                            imageContainer.appendChild(image);
                            fileItem.appendChild(imageContainer);

                            // File name
                            const nameLabel = document.createElement('span');
                            nameLabel.textContent = file.name;
                            fileItem.appendChild(nameLabel);

                            // Delete button
                            const deleteButton = document.createElement('button');
                            deleteButton.textContent = 'Remove';
                            deleteButton.classList.add('delete-button');
                            deleteButton.addEventListener('click', () => removeFile(file));
                            fileItem.appendChild(deleteButton);

                            fileList.appendChild(fileItem);

                            // Store file data in selectedFiles array
                            storedFiles.push({
                                name: file.name,
                                data: event.target.result
                            });

                            // Store selected files in localStorage
                            localStorage.setItem('selectedFiles', JSON.stringify(storedFiles));
                        };
                        fileReader.readAsDataURL(file); // Read image as DataURL
                    });

                    // Clear input value if no files are selected
                    if (input.files.length === 0) {
                        input.value = '';
                    }
                }

                function removeFile(fileToRemove) {
                    const storedFiles = JSON.parse(localStorage.getItem('selectedFiles')) || [];

                    // Filter out the file to remove
                    const updatedFiles = storedFiles.filter(file => file.name !== fileToRemove.name);

                    // Update localStorage with the modified list of selected files
                    localStorage.setItem('selectedFiles', JSON.stringify(updatedFiles));

                    // Update the display
                    const fileList = document.getElementById('file-list');
                    fileList.innerHTML = ''; // Clear previous list
                    updatedFiles.forEach(file => {
                        const fileItem = document.createElement('div');
                        fileItem.classList.add('file-item');

                        // Image preview
                        const imageContainer = document.createElement('div');
                        imageContainer.classList.add('image-container');
                        const image = document.createElement('img');
                        image.src = file.data;
                        imageContainer.appendChild(image);
                        fileItem.appendChild(imageContainer);

                        // File name
                        const nameLabel = document.createElement('span');
                        nameLabel.textContent = file.name;
                        fileItem.appendChild(nameLabel);

                        // Delete button
                        const deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Remove';
                        deleteButton.classList.add('delete-button');
                        deleteButton.addEventListener('click', () => removeFile(file));
                        fileItem.appendChild(deleteButton);

                        fileList.appendChild(fileItem);
                    });
                }

                document.addEventListener('DOMContentLoaded', function() {
                    const storedFiles = JSON.parse(localStorage.getItem('selectedFiles')) || [];
                    const fileList = document.getElementById('file-list');

                    storedFiles.forEach(file => {
                        const fileItem = document.createElement('div');
                        fileItem.classList.add('file-item');

                        // Image preview
                        const imageContainer = document.createElement('div');
                        imageContainer.classList.add('image-container');
                        const image = document.createElement('img');
                        image.src = file.data;
                        imageContainer.appendChild(image);
                        fileItem.appendChild(imageContainer);

                        // File name
                        const nameLabel = document.createElement('span');
                        nameLabel.textContent = file.name;
                        fileItem.appendChild(nameLabel);

                        // Delete button
                        const deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Remove';
                        deleteButton.classList.add('delete-button');
                        deleteButton.addEventListener('click', () => removeFile(file));
                        fileItem.appendChild(deleteButton);

                        fileList.appendChild(fileItem);
                    });
                });

                document.addEventListener('clearLocalStorage', function() {
                    localStorage.removeItem('selectedFiles');
                });
            </script>





            <label for="Amenities">Amenities</label>
            <div class="amenities-container" id="Amenities">
                <div class="amenities-options">
                    <input type="checkbox" class="amenity-checkbox" id="airConditioning" name="amenities[]" value="Air Conditioning">
                    <label for="airConditioning" class="amenity-label">Air Conditioning</label>

                    <input type="checkbox" class="amenity-checkbox" id="multipleRooms" name="amenities[]" value="CCTV">
                    <label for="multipleRooms" class="amenity-label">CCTV</label>

                    <input type="checkbox" class="amenity-checkbox" id="chairs" name="amenities[]" value="Chairs">
                    <label for="chairs" class="amenity-label">Chairs</label>

                    <input type="checkbox" class="amenity-checkbox" id="electricity" name="amenities[]" value="Electricity">
                    <label for="electricity" class="amenity-label">Electricity</label>

                    <input type="checkbox" class="amenity-checkbox" id="elevator" name="amenities[]" value="Elevator">
                    <label for="elevator" class="amenity-label">Elevator</label>

                    <input type="checkbox" class="amenity-checkbox" id="parking" name="amenities[]" value="Parking">
                    <label for="parking" class="amenity-label">Parking</label>

                    <input type="checkbox" class="amenity-checkbox" id="garden" name="amenities[]" value="Garden">
                    <label for="garden" class="amenity-label">Garden</label>

                    <input type="checkbox" class="amenity-checkbox" id="soundproof" name="amenities[]" value="Soundproof">
                    <label for="soundproof" class="amenity-label">Soundproof</label>

                    <input type="checkbox" class="amenity-checkbox" id="kitchen" name="amenities[]" value="Kitchen">
                    <label for="kitchen" class="amenity-label">Kitchen</label>

                    <input type="checkbox" class="amenity-checkbox" id="furniture" name="amenities[]" value="Furniture">
                    <label for="furniture" class="amenity-label">Furniture</label>

                    <input type="checkbox" class="amenity-checkbox" id="bathrooms" name="amenities[]" value="RestRooms">
                    <label for="bathrooms" class="amenity-label">RestRooms</label>

                    <input type="checkbox" class="amenity-checkbox" id="securitySystem" name="amenities[]" value="Security System">
                    <label for="securitySystem" class="amenity-label">Security System</label>

                    <input type="checkbox" class="amenity-checkbox" id="terrace" name="amenities[]" value="Terrace">
                    <label for="terrace" class="amenity-label">Terrace</label>
                    <input type="checkbox" class="amenity-checkbox" id="Table" name="amenities[]" value="Table">
                    <label for="Table" class="amenity-label">Table</label>

                    <input type="checkbox" class="amenity-checkbox" id="waterAccess" name="amenities[]" value="Water Access">
                    <label for="waterAccess" class="amenity-label">Water Access</label>




                </div>
            </div>
            <script>
                // Restore checked checkboxes from local storage
                document.addEventListener('DOMContentLoaded', function() {
                    const checkboxes = document.querySelectorAll('.amenity-checkbox');
                    checkboxes.forEach(function(checkbox) {
                        const isChecked = localStorage.getItem(checkbox.id) === 'true';
                        checkbox.checked = isChecked;
                    });
                });

                // Update local storage when checkboxes are clicked
                document.querySelectorAll('.amenity-checkbox').forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        localStorage.setItem(checkbox.id, checkbox.checked);
                    });
                });
            </script>

            <!-- Add other form fields for step 2 -->
            <br>
            <span class="space">Mandatory fields are marked with &nbsp;<span class="red">*</span></span>

            <div class="button-container">
                <button type="button" class="back-btn" onclick="goToStep1()">Back</button>
                <button type="submit" class="next-btn" value="Submit" id="submitBtn">Next</button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            const amenities = document.querySelectorAll('input[name="amenities[]"]:checked');
            if (amenities.length === 0) {
                alert("Please select at least one amenity.");
                event.preventDefault(); // Prevent form submission

            }

        });
    </script>


    <script>
        function goToStep1() {

            window.location.href = 'Space_Details.php'; // Replace 'Space_Details.php' with the actual URL of step 1
        }
    </script>


    </div>
    <?php
    include 'footer.php';
    ?>
    <script>
        const navEl = document.querySelector('.nav');
        const hamburgerEl = document.querySelector('.hamburger');
        const navItemEls = document.querySelectorAll('.nav__item');

        hamburgerEl.addEventListener('click', () => {
            navEl.classList.toggle('nav--open');
            hamburgerEl.classList.toggle('hamburger--open');
        });

        navItemEls.forEach(navItemEl => {
            navItemEl.addEventListener('click', () => {
                navEl.classList.remove('nav--open');
                hamburgerEl.classList.remove('hamburger--open');
            });
        });
    </script>
    <script>
        function displayFileName(input) {
            const fileName = input.files[0].name;
            const fileId = input.id.replace('space_img', '');
            const fileNameElement = document.getElementById('file-name' + fileId);
            fileNameElement.textContent = 'File Name: ' + fileName;
        }
    </script>
    <script>
        function validateFile(input, fileNumber) {
            const allowedFormats = ["image/jpeg", "image/jpg", "image/gif", "image/png"];
            const maxFileSize = 10 * 1024 * 1024; // 10 MB in bytes

            const file = input.files[0];

            // Check if file format is allowed
            if (!allowedFormats.includes(file.type.toLowerCase())) {
                alert("Please select a valid image format (.jpg, .jpeg, .gif, .png).");
                input.value = ""; // Clear the file input
                return;
            }

            // Check if file size exceeds the limit
            if (file.size > maxFileSize) {
                alert("File size exceeds the maximum allowed (10 MB).");
                input.value = ""; // Clear the file input
                return;
            }
        }

        // Display the file name
    </script>

</body>

</html>

<?php
// Include the common HTML footer

?>