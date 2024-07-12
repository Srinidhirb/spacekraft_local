<?php
// Include your database connection file
@include 'connect.php';
?>

<button style="margin-left: 7%;" class="submit-button" id="display" onclick="toggleOptions()">Apply Filters</button>
<form method="get" action="">
  <div class="options">
    <div class="left-container">
      <div class="custom-select">
        <input type="hidden" name="City" value="<?php echo $cityName; ?>">
        <select id="type" class="select-style" name="type">

          <option value="" <?php if (isset($_GET['type']) && $_GET['type'] == '') echo 'selected'; ?>>Space Type</option>
          <option value="Art Gallery" <?php if (isset($_GET['type']) && $_GET['type'] == 'Art Gallery') echo 'selected'; ?>>Art Gallery</option>
          <option value="Banquet" <?php if (isset($_GET['type']) && $_GET['type'] == 'Banquet') echo 'selected'; ?>>Banquet</option>
          <option value="Kiosk" <?php if (isset($_GET['type']) && $_GET['type'] == 'Kiosk') echo 'selected'; ?>>Kiosk</option>
          <option value="Lifestyle Center" <?php if (isset($_GET['type']) && $_GET['type'] == 'Lifestyle Center') echo 'selected'; ?>>Lifestyle Center</option>
          <option value="Mobile Van" <?php if (isset($_GET['type']) && $_GET['type'] == 'Mobile Van') echo 'selected'; ?>>Mobile Van</option>
          <option value="Photo studio" <?php if (isset($_GET['type']) && $_GET['type'] == 'Photo studio') echo 'selected'; ?>>Photo studio</option>
          <option value="Restaurant" <?php if (isset($_GET['type']) && $_GET['type'] == 'Restaurant') echo 'selected'; ?>>Restaurant</option>
          <option value="Shopping Center" <?php if (isset($_GET['type']) && $_GET['type'] == 'Shopping Center') echo 'selected'; ?>>Shopping Center</option>
          <option value="Shopshare" <?php if (isset($_GET['type']) && $_GET['type'] == 'Shopshare') echo 'selected'; ?>>Shopshare</option>
          <option value="Stall" <?php if (isset($_GET['type']) && $_GET['type'] == 'Stall') echo 'selected'; ?>>Stall</option>
          <option value="Storefront" <?php if (isset($_GET['type']) && $_GET['type'] == 'Storefront') echo 'selected'; ?>>Storefront</option>
          <option value="Warehouse" <?php if (isset($_GET['type']) && $_GET['type'] == 'Warehouse') echo 'selected'; ?>>Warehouse</option>
          <option value="Window Display" <?php if (isset($_GET['type']) && $_GET['type'] == 'Window Display') echo 'selected'; ?>>Window Display</option>
        </select>
        <div class="custom-arrow"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 10L12.7071 15.2929C12.3166 15.6834 11.6834 15.6834 11.2929 15.2929L6 10" stroke="#222222" stroke-width="2" stroke-linecap="round" />
          </svg>
        </div>
      </div>

      <div class="custom-select">
        <select name="duration" class="select-style" id="durationInput">
          <option value="" <?php if (isset($_GET['duration']) && $_GET['duration'] == '') echo 'selected'; ?>>Duration</option>
          <option value="days" <?php if (isset($_GET['duration']) && $_GET['duration'] == 'days') echo 'selected'; ?>>Days</option>
          <option value="weeks" <?php if (isset($_GET['duration']) && $_GET['duration'] == 'weeks') echo 'selected'; ?>>Weeks</option>
          <option value="months" <?php if (isset($_GET['duration']) && $_GET['duration'] == 'months') echo 'selected'; ?>>Months</option>
        </select>
        <div class="custom-arrow"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 10L12.7071 15.2929C12.3166 15.6834 11.6834 15.6834 11.2929 15.2929L6 10" stroke="#222222" stroke-width="2" stroke-linecap="round" />
          </svg>
        </div>
      </div>
      <br />




      <div class="ami" onclick="toggleAmenitiesDropdown()">Amenities</div>

      <div class="amenities-container">

        <div id="amenitiesDropdown">
          <div onclick="closeAmenitiesDropdown()" class="close-cross">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 6L6 18" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M6 6L18 18" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <input type="checkbox" class="amenity-checkbox" id="airConditioning" name="amenities[]" value="Air Conditioning">
          <label for="airConditioning" class="amenity-label">Air Conditioning</label>

          <input type="checkbox" class="amenity-checkbox" id="chairs" name="amenities[]" value="Chairs">
          <label for="chairs" class="amenity-label">Chairs</label>

          <input type="checkbox" class="amenity-checkbox" id="electricity" name="amenities[]" value="Electricity">
          <label for="electricity" class="amenity-label">Electricity</label>

          <input type="checkbox" class="amenity-checkbox" id="elevator" name="amenities[]" value="Elevator">
          <label for="elevator" class="amenity-label">Elevator</label>

          <input type="checkbox" class="amenity-checkbox" id="furniture" name="amenities[]" value="Furniture">
          <label for="furniture" class="amenity-label">Furniture</label>

          <input type="checkbox" class="amenity-checkbox" id="garden" name="amenities[]" value="Garden">
          <label for="garden" class="amenity-label">Garden</label>

          <input type="checkbox" class="amenity-checkbox" id="kitchen" name="amenities[]" value="Kitchen">
          <label for="kitchen" class="amenity-label">Kitchen</label>

          <input type="checkbox" class="amenity-checkbox" id="multipleRooms" name="amenities[]" value="CCTV">
          <label for="multipleRooms" class="amenity-label">CCTV</label>

          <input type="checkbox" class="amenity-checkbox" id="parking" name="amenities[]" value="Parking">
          <label for="parking" class="amenity-label">Parking</label>

          <input type="checkbox" class="amenity-checkbox" id="bathrooms" name="amenities[]" value="RestRooms">
          <label for="bathrooms" class="amenity-label">RestRooms</label>

          <input type="checkbox" class="amenity-checkbox" id="securitySystem" name="amenities[]" value="Security System">
          <label for="securitySystem" class="amenity-label">Security System</label>

          <input type="checkbox" class="amenity-checkbox" id="soundproof" name="amenities[]" value="Soundproof">
          <label for="soundproof" class="amenity-label">Soundproof</label>

          <input type="checkbox" class="amenity-checkbox" id="terrace" name="amenities[]" value="Terrace">
          <label for="terrace" class="amenity-label">Terrace</label>
          <input type="checkbox" class="amenity-checkbox" id="Table" name="amenities[]" value="Table">
          <label for="Table" class="amenity-label">Table</label>

          <input type="checkbox" class="amenity-checkbox" id="waterAccess" name="amenities[]" value="Water Access">
          <label for="waterAccess" class="amenity-label">Water Access</label>


        </div>

      </div>


      <button type="submit" class="submit-button1">Search</button>
    </div>
</form>


</div>
<script>
  var dropdown = document.getElementById('amenitiesDropdown');

  function toggleAmenitiesDropdown() {
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
  }

  function closeAmenitiesDropdown() {
    dropdown.style.display = 'none';
  }
</script>