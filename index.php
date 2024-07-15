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

// Check if the 'City' parameter is set in the URL
if (isset($_GET['City'])) {
  // Get the value of the 'City' parameter
  $selectedCity = $_GET['City'];

  // Fetch listings based on the selected city
  $sql = "SELECT * FROM combined_list WHERE City LIKE '%$selectedCity%'";
  $result = $conn->query($sql);

  // Handle the case where no listings are found for the selected city
  if (!$result) {
    echo "Error executing query: " . $conn->error;
  }
} else {
  // Check if search parameters are provided
  if (
    isset($_GET['location']) &&
    isset($_GET['type']) &&
    isset($_GET['duration'])
  ) {
    $location = $_GET['location'];
    $type = $_GET['type'];
    $duration = $_GET['duration'];

    // Check if the search terms are not empty

  }

  // If $result is still null or if no 'City' parameter and no search parameters are provided, retrieve all listings
  if (!$result) {
    $sql = "SELECT * FROM combined_list ORDER BY id DESC LIMIT 12";
    $result = $conn->query($sql);


    // Handle the case where no listings are found
    if (!$result) {
      echo "Error executing query: " . $conn->error;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
  <!-- ===== Link Swiper's CSS ===== -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap">


  <!-- ===== Fontawesome CDN Link ===== -->






  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
  <link rel="stylesheet" href="https://unpkg.com/@splidejs/splide/dist/css/splide.min.css">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

  <link rel="stylesheet" href="assets\css\header_footer-css.php" !important>
  <link rel="stylesheet" href="newstyle.php">
  <script defer src="script.js"></script>
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

  <title>SpaceKraft - List Your Retail Space for Short-Term Rental</title>
  <meta name="description" content="India’s first short term rental platform helps you generate new revenue streams renting your empty retail spaces. List your retail space now and grow!">
</head>

<body>

  <?php
  include 'header.php';
  ?>
  <div class="main">
    <div class="center">Find Short-Term Rental Spaces
      <p>Unleash your retail vision with Spacekraft! <br> Find the perfect short term retail space . </p>
    </div>
   
    <div class="search">
  <div class="search-container">
    <div class="custom-dropdown-location">
      <input type="text" id="locationInput" class="dropbtn-location" placeholder="Search for locations" onkeyup="filterLocations()" onclick="showDropdown('dropdownContentLocation')">
      <div id="dropdownContentLocation" class="dropdown-content-location">
        <?php
        // Combine and select distinct city names from both tables
        $sqlCombinedList = "SELECT DISTINCT City AS locationName FROM combined_list";
        $sqlLocations = "SELECT DISTINCT name AS locationName FROM locations";

        $sqlUnion = "($sqlCombinedList) UNION ($sqlLocations) ORDER BY locationName ASC";
        $resultUnion = $conn->query($sqlUnion);

        $locations = array();
        if ($resultUnion->num_rows > 0) {
          while ($rowUnion = $resultUnion->fetch_assoc()) {
            $locations[] = $rowUnion['locationName'];
          }
        }

        // Display all locations (hidden initially)
        foreach ($locations as $location) {
          echo "<div class='dropdown-item-location' onclick=\"selectLocation('$location')\" style='display: none;'>$location</div>";
        }
        ?>
      </div>
    </div>

    <hr class="hr">

    <div class="custom-dropdown-type">
      <input type="text" id="typeInput" class="dropbtn-type" placeholder="Search for space use" onkeyup="filterTypes()" onclick="showDropdown('dropdownContentType')">
      <div id="dropdownContentType" class="dropdown-content-type">
        <?php
        $spaceTypes = [
          "Kiosk", "Canopy", "FMCG Brands", "Fashion", "Photoshoot", "Video shoot", "Retail", "Showroom",
          "Event", "Party", "Art", "Food", "Conference", "Shopshare", "Newsroom", "Banquet", "Warehouse",
          "Workspace", "Boutique", "Office", "Pop Up", "Workshop", "Training", "Baby Shower", "Wedding",
          "Birthday Party", "Casting", "Audition", "Flex Space", "Celebration", "Patio", "Function",
          "Art Gallery", "Outdoor Event", "Dance Party", "Outdoor Party", "Restaurant", "Gathering",
          "Exhibit", "Product Release", "Launch Event", "Trad Show", "Exhibition", "Rooftop", "Company Party",
          "Auction", "Fundraising Event", "Product Demo", "Marketing Check", "Garage", "Art Studio", "Green Screen",
          "Garden", "Society Complex", "Mall Space", "Film Studio", "Cafe", "Salon", "House", "Film Shoot",
          "Presentation", "Convention", "Lecture", "Orientation", "Networking", "Meetup", "Loft", "Job Fair",
          "Influencer Event", "Career Expo", "Networking Event", "Theatre", "Live Music", "Auditorium", "Club",
          "Concert", "Performance", "Poetry Reading", "Stand up Events", "Art Show", "Retail Shop", "Storefront",
          "Retreat", "Co-retailing", "Short Term Rental", "Product Shoot", "Product Launch"
        ];

        foreach ($spaceTypes as $type) {
          echo "<div class='dropdown-item-type' onclick=\"selectType('$type')\" style='display: none;'>$type</div>";
        }
        ?>
      </div>
    </div>

    <script>
      function showDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        dropdown.classList.add("show");
      }

      function filterLocations() {
        var input, filter, dropdown, items, i, txtValue;
        input = document.getElementById("locationInput");
        filter = input.value.toUpperCase();
        dropdown = document.getElementById("dropdownContentLocation");
        items = dropdown.getElementsByClassName("dropdown-item-location");

        if (filter === "") {
          dropdown.classList.remove("show"); // Hide dropdown if input is empty
          for (i = 0; i < items.length; i++) {
            items[i].style.display = "none";
          }
        } else {
          dropdown.classList.add("show"); // Show dropdown if input is not empty
          for (i = 0; i < items.length; i++) {
            txtValue = items[i].textContent || items[i].innerText;
            items[i].style.display = (txtValue.toUpperCase().indexOf(filter) > -1) ? "" : "none";
          }
        }
      }

      function filterTypes() {
        var input, filter, dropdown, items, i, txtValue;
        input = document.getElementById("typeInput");
        filter = input.value.toUpperCase();
        dropdown = document.getElementById("dropdownContentType");
        items = dropdown.getElementsByClassName("dropdown-item-type");

        if (filter === "") {
          dropdown.classList.remove("show"); // Hide dropdown if input is empty
          for (i = 0; i < items.length; i++) {
            items[i].style.display = "none";
          }
        } else {
          dropdown.classList.add("show"); // Show dropdown if input is not empty
          for (i = 0; i < items.length; i++) {
            txtValue = items[i].textContent || items[i].innerText;
            items[i].style.display = (txtValue.toUpperCase().indexOf(filter) > -1) ? "" : "none";
          }
        }
      }

      function selectLocation(location) {
        var input = document.getElementById("locationInput");
        input.value = location;
        document.getElementById("dropdownContentLocation").classList.remove("show");
      }

      function selectType(type) {
        var input = document.getElementById("typeInput");
        input.value = type;
        document.getElementById("dropdownContentType").classList.remove("show");
      }

      document.addEventListener('click', function(event) {
        var locationDropdown = document.querySelector('.custom-dropdown-location');
        var typeDropdown = document.querySelector('.custom-dropdown-type');
        var durationDropdown = document.querySelector('.custom-dropdown-duration');

        if (!locationDropdown.contains(event.target) && event.target.id !== 'locationInput') {
          document.getElementById("dropdownContentLocation").classList.remove("show");
        }
        if (!typeDropdown.contains(event.target) && event.target.id !== 'typeInput') {
          document.getElementById("dropdownContentType").classList.remove("show");
        }
        if (!durationDropdown.contains(event.target) && event.target.id !== 'durationInput') {
          document.getElementById("dropdownContentDuration").classList.remove("show-duration");
        }
      });

      function filterDurations() {
        var input, filter, dropdown, items, i, txtValue;
        input = document.getElementById("durationInput");
        filter = input.value.toUpperCase();
        dropdown = document.getElementById("dropdownContentDuration");
        items = dropdown.getElementsByClassName("dropdown-item-duration");

        if (filter === "") {
          dropdown.classList.remove("show-duration"); // Hide dropdown if input is empty
          for (i = 0; i < items.length; i++) {
            items[i].style.display = "none";
          }
        } else {
          dropdown.classList.add("show-duration"); // Show dropdown if input is not empty
          for (i = 0; i < items.length; i++) {
            txtValue = items[i].textContent || items[i].innerText;
            items[i].style.display = (txtValue.toUpperCase().indexOf(filter) > -1) ? "" : "none";
          }
        }
      }

      function selectDuration(duration) {
        var input = document.getElementById("durationInput");
        input.value = duration;
        document.getElementById("dropdownContentDuration").classList.remove("show-duration");
      }
    </script>

    <hr class="hr">
    
    
    <div class="custom-dropdown-duration">
          <div id="durationInput" class="dropbtn-duration" onclick="toggleDropdown('dropdownContentDuration')">Choose Duration</div>
          <div id="dropdownContentDuration" class="dropdown-content-duration">
            <div class="dropdown-item-duration" onclick="selectDuration('days')">Days</div>
            <div class="dropdown-item-duration" onclick="selectDuration('weeks')">Weeks</div>
            <div class="dropdown-item-duration" onclick="selectDuration('months')">Months</div>
          </div>
          <div class="custom-arrow"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 10L12.7071 15.2929C12.3166 15.6834 11.6834 15.6834 11.2929 15.2929L6 10" stroke="#222222" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
        </div>
        <script>
          function toggleDropdown(dropdownId) {
            var dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle("show-duration");
          }

          document.addEventListener('click', function(event) {
            var durationDropdown = document.querySelector('.custom-dropdown-duration');

            if (!durationDropdown.contains(event.target)) {
              document.getElementById("dropdownContentDuration").classList.remove("show-duration");
            }
          });

          function selectDuration(duration) {
            var input = document.getElementById("durationInput");
            input.value = duration;
            input.textContent = duration.charAt(0).toUpperCase() + duration.slice(1).toLowerCase();
            document.getElementById("dropdownContentDuration").classList.remove("show-duration");
          }
          document.getElementById("durationInput").value = "";
          document.getElementById("durationInput").textContent = "Choose Duration";
        </script>


    <button class="btn right block" onclick="performSearch()">Search</button>
  </div>
  <button style="margin-left: 2%; cursor:pointer;" class='search-round' onclick="performSearch()">
    <svg width="64" height="65" viewBox="0 0 64 65" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect y="0.5" width="64" height="64" rx="6" fill="#031B64" />
      <g clip-path="url(#clip0_3259_17454)">
        <path d="M42.2929 44.2071C42.6834 44.5976 43.3166 44.5976 43.7071 44.2071C44.0976 43.8166 44.0976 43.1834 43.7071 42.7929L42.2929 44.2071ZM38.1176 30.5588C38.1176 35.0096 34.5096 38.6176 30.0588 38.6176V40.6176C35.6142 40.6176 40.1176 36.1142 40.1176 30.5588H38.1176ZM30.0588 38.6176C25.6081 38.6176 22 35.0096 22 30.5588H20C20 36.1142 24.5035 40.6176 30.0588 40.6176V38.6176ZM22 30.5588C22 26.1081 25.6081 22.5 30.0588 22.5V20.5C24.5035 20.5 20 25.0035 20 30.5588H22ZM30.0588 22.5C34.5096 22.5 38.1176 26.1081 38.1176 30.5588H40.1176C40.1176 25.0035 35.6142 20.5 30.0588 20.5V22.5ZM35.8223 37.7365L42.2929 44.2071L43.7071 42.7929L37.2365 36.3223L35.8223 37.7365Z" fill="#F0F0F0" />
      </g>
      <defs>
        <clipPath id="clip0_3259_17454">
          <rect width="24" height="24" fill="white" transform="translate(20 20.5)" />
        </clipPath>
      </defs>
    </svg>
  </button>

  <script>
    function performSearch() {
      // Get the selected values from the dropdowns and input
      var location = document.getElementById('locationInput').value;
      var type = document.getElementById('typeInput').value;
      var duration = document.getElementById('durationInput').value;

      // Redirect to city.php with the search parameters
      window.location.href = 'find.php?location=' + location + '&type=' + type + '&duration=' + duration;
    }
  </script>
</div>

  </div>
  <div class="heading">
    <p>Recently Listed Spaces</p>
  </div>

  <div class="unique-container">
    <div class="swiper card_slider">
      <div class="swiper-wrapper">
        <!-- PHP code to fetch data from the database -->
        <?php
        function limitWords($string, $word_limit)
        {
          $words = explode(" ", $string);
          if (count($words) > $word_limit) {
            $limitedString = implode(" ", array_splice($words, 0, $word_limit));
            return $limitedString . '...'; // Add ellipsis to indicate that the text has been truncated
          } else {
            return $string;
          }
        }
        // Establish database connection


        // Loop through the data and display it in swiper slides
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $spaceId = $row['id'];
        ?>
            <div class="swiper-slide">
              <div class="card" onclick="redirectToSpace('<?php echo $spaceId; ?>')">

                <div class="card-header">
                  <?php
                  if ($row['images'] !== "N/A") {
                    // Handle multiple images
                    $imagePaths = explode(',', $row['images']);
                    echo '<img  src="http://spacekraft.in/' . $imagePaths[0] . '"  alt="">';
                  } else {
                    echo '<img  src="path/to/default/image.jpg" " alt="Default Image">';
                  }
                  ?>
                </div>
                <div class="card-body">
                  <h2><?php echo limitWords($row['SpaceName'], 2); // Limit to 5 words 
                      ?></h2>
                  <p><?php echo limitWords($row['Description'], 4); // Limit to 10 words 
                      ?></p>

                  <h2><?php echo limitWords($row['SpaceArea'], 4); ?> sq.ft</h2>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo "No data available";
        }
        $conn->close();
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
  <script>
    function redirectToSpace(spaceId) {
      // Encode spaceId in Base64
      var encodedSpaceId = btoa(spaceId);
      // Redirect to the encoded URL
      window.location.href = 'ind_space_details.php?spaceId=' + encodedSpaceId;
    }
  </script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".card_slider", {
      slidesPerView: 4,
      loop: true,
      centeredSlides: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        176: {
          slidesPerView: 1,
          spaceBetween: 24,
          centeredSlides: true,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 24,
          centeredSlides: true,
        },
        972: {
          slidesPerView: 3,
          spaceBetween: 24,
          centeredSlides: true,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 24,
          centeredSlides: false,
        },
      },
    });

 
  </script>


  <div class="heading">
    <p style="padding-bottom:8px;">Discover Space Types </p>
    <span>Browse list of our favourite spaces below across India</span>
  </div>
  <div class="types-card">
    <div class="ty-cards type1" id="type1" onclick="redirectTo('Stall')"><span>Stalls</span></div>
    <div class="ty-cards type2" id="type2" onclick="redirectTo('Shopshare')"><span>Shopshare</span></div>
  </div>
  <br>
  <br>
  <div class="types-card">
    <div class="ty-cards type3" id="type3" onclick="redirectTo('Photo studio')"><span>Photo Studio</span></div>
    <div class="ty-cards type4" id="type4" onclick="redirectTo('Banquet')"><span>Banquet</span></div>
  </div>
  <script>
    function redirectTo(type) {
      window.location.href = "find.php?type=" + type;
    }
  </script>


  <div class="heading">
    <p>Know The City</p>
  </div>
  <div class="city">

    <div class="unique-container">
      <div class="swiper city_card_slider">
        <div class="swiper-wrapper" style="margin-bottom: 40px;">
          <div class="swiper-slide">
            <div class="city_card">
              <div class="city-card-header">
                <a href="city.php?City=Bangalore">

                  <img src="city_img\Bangalore.png" alt="img" draggable="false"></a>
              </div>
              <div class="city-card-body">
                <h2>Bangalore</h2>
              </div>
            </div>


          </div>
          <div class="swiper-slide">
            <div class="city_card">
              <div class="city-card-header">
                <a href="city.php?City=Chennai">

                  <img src="city_img\Chennai.png" alt="img" draggable="false"></a>
              </div>
              <div class="city-card-body">
                <h2>Chennai</h2>
              </div>
            </div>


          </div>
          <div class="swiper-slide">
            <div class="city_card">
              <div class="city-card-header">
                <a href="city.php?City=Delhi"><img src="city_img\Delhi.png" alt="img" draggable="false"></a>
              </div>
              <div class="city-card-body">
                <h2>Delhi</h2>
              </div>
            </div>


          </div>
          <div class="swiper-slide">
            <div class="city_card">
              <div class="city-card-header">
                <a href="city.php?City=Jaipur"><img src="city_img\Jaipur.png" alt="img" draggable="false"></a>
              </div>
              <div class="city-card-body">
                <h2>Jaipur</h2>
              </div>
            </div>


          </div>
          <div class="swiper-slide">
            <div class="city_card">
              <div class="city-card-header">
                <a href="city.php?City=Kolkata"><img src="city_img\Kolkata.png" alt="img" draggable="false"></a>
              </div>
              <div class="city-card-body">
                <h2>Kolkata</h2>
              </div>
            </div>


          </div>
          <div class="swiper-slide">
            <div class="city_card">
              <div class="city-card-header">
                <a href="city.php?City=Pune"><img src="city_img\Pune.png" alt=" img" draggable="false"></a>
              </div>
              <div class="city-card-body">
                <h2>Pune</h2>
              </div>
            </div>


          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".city_card_slider", {
      slidesPerView: 5,
      spaceBetween: 20,
      loop: true,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,

      },
      breakpoints: {
        176: {
          slidesPerView: 1,
          spaceBetween: 24,
          centeredSlides: true,
        },
        476: {
          slidesPerView: 2,
          spaceBetween: 24,
          centeredSlides: false,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 24,
          centeredSlides: false,
        },
        972: {
          slidesPerView: 4,
          spaceBetween: 24,
          centeredSlides: false,
        },
        1200: {
          slidesPerView: 5,
          spaceBetween: 20,
          centeredSlides: false,
        },
      },
    });
  </script>
  <!-- <div class="heading">
    <p>Testimonials</p>
    <p style="margin-top: 2%; font-size:20px; color: var(--Grey-primary, #CECECE);
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 500;
line-height: normal;">What Our Client Says</p>
  </div>
  <div class="Testimonials">
    <div class="testimonial-wrapper">

      <div class="testimonial-card">
        <div class="card-header">
          <div class="thumbnail-area">
            <img alt="customer1" src="bg.jpg">
          </div>
          <div class="user-info">
            <h4>John Doe</h4>
            <div class="card-footer">
              <div class="user-rating">
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
              </div>

            </div>

          </div>
        </div>
        <div class="user-review">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus!
            Minima, dolorum.</p>
        </div>

      </div>
      <div class="testimonial-card">
        <div class="card-header">
          <div class="thumbnail-area">
            <img alt="customer1" src="img/1.jpg">
          </div>
          <div class="user-info">
            <h4>John Doe</h4>
            <div class="card-footer">
              <div class="user-rating">
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="">★</span>
                <span class="">★</span>
              </div>

            </div>

          </div>
        </div>
        <div class="user-review">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus!
            Minima, dolorum.</p>
        </div>

      </div>
      <div class="testimonial-card">
        <div class="card-header">
          <div class="thumbnail-area">
            <img alt="customer1" src="img/1.jpg">
          </div>
          <div class="user-info">
            <h4>John Doe</h4>
            <div class="card-footer">
              <div class="user-rating">
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="">★</span>
                <span class="">★</span>
              </div>

            </div>

          </div>
        </div>
        <div class="user-review">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus!
            Minima, dolorum.</p>
        </div>

      </div>
      <div class="testimonial-card">
        <div class="card-header">
          <div class="thumbnail-area">
            <img alt="customer1" src="img/1.jpg">
          </div>
          <div class="user-info">
            <h4>John Doe</h4>
            <div class="card-footer">
              <div class="user-rating">
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="">★</span>
              </div>

            </div>

          </div>
        </div>
        <div class="user-review">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus!
            Minima, dolorum.</p>
        </div>

      </div>

   </div>

  </div> -->
  <div class="popup-wrapper">
    <div class="popup-content">
      Establish your pop-up shop for a day,
      a week, a month or even more to elevate
      your brand's visibility and drive sales
    </div>
    <div class="popup-actions">
      <a href="howitworks.php"><button class="btn"><span> How it works </span></button></a>
      <a href="Space_Details.php"><button class="btn"><span> List your space</span></button></a>
    </div>
  </div>
  <section class="trusted-by">
    <span> <img src="assets/trusted_logo/trust.png" alt="" width="40px" height="40px">
      <h2> Trusted By</h2>
    </span>
    <div class="logos">
      <a class="logo-container" href="https://hermoneytalks.com/" target="_blank"> <img src="assets/trusted_logo/herm.png" alt="Company 3 Logo"></a>
      <a class="logo-container" href="https://www.linkedin.com/company/gold-leaf-hospitality-consulting/?originalSubdomain=in" target="_blank"> <img src="assets/trusted_logo/gold_leaf.jpeg" alt="Company 2 Logo"></a>
      <a class="logo-container" href="https://anibee.in" target="_blank"> <img src="assets/trusted_logo/anibee.jpg" alt="Company 1 Logo"></a>

      <a class="logo-container" href="https://raissa.in" target="_blank"> <img src="assets/trusted_logo/raissa.jpg" alt="Company 4 Logo"></a>

    </div>
  </section>
  <?php
  include 'footer.php';
  ?>


  <!-- The overlay and pop-up container for login -->
  <script>
    function submitForm(spaceId) {
      document.getElementById('spaceForm_' + spaceId).submit();
    }
  </script>
  <script src="script.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>