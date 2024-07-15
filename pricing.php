<?php
if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
} else {
  $user_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Listing</title>
  <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
  <link rel="stylesheet" href="assets/css/header_footer-css.php">
  <link rel="stylesheet" href="assets/css/premium_listing-css.php">
</head>

<body>
  <?php include 'header.php' ?>
  <div class="center_display">
    <span>Unlock new revenue streams! </span>
    <p>Choose a plan and list your retail space.</p>
  </div>

  <div class="pricing">
    <table>
      <tr>
        <td> </td>
        <td>
          <div class="card">

            <span class="packages">Basic </span>

            <span class="price">Free</span>
            <a href="#"> <span class="button"> Continue</span></a>
          </div>
        </td>
        <td  >
          <div class="card border_no_bottom">

            <span class="packages">Pro</span>

            <span class="price"><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.125 0.500043C0.125 0.500043 1.86764 0.500043 3.625 0.500043M8.125 16.5L1.125 9.50004C1.125 9.50004 2.625 9.50004 3.625 9.50004C4.625 9.50004 9.125 9.56183 9.125 5.00004C9.125 0.438253 4.625 0.500043 3.625 0.500043M12.125 0.500043C12.125 0.500043 6.55393 0.500043 3.625 0.500043M0.125 4.50004H12.125" stroke="#717579" stroke-width="1.5" />
              </svg>
              499 <span class="duration"> / month</span></span>
            <a href="#"> <span class="button"> Pay</span></a>
          </div>
        </td>
        <td>
          <div class="card card">

            <span class="packages">Plus</span>

            <span class="price">
            Custom </span>
            <a href="#"> <span class="button"> Contact</span></a>
          </div>
        </td>

      </tr>
      <tr>
        <td> <span class="main_heading"> Plan validity </span></td>
        <td> <span class="plan_validity"> 1 Month </span></td>
        <td class="border_no_left_right"> <span class="plan_validity"> 1 Month </span></td>
        <td> <span class="plan_validity"> 1 Year </span></td>

      </tr>
      <tr>
        <td> <span class="main_heading"> Visiblity </span></td>
        <td> <span class="plan_validity"> Standard visiblity </span></td>
        <td class="border_no_left_right"> <span class="plan_validity">3x More visiblity </span></td>
        <td> <span class="plan_validity"> 10x More visiblity </span></td>

      </tr>
      <tr>
        <td> <span class="main_heading"> Social Media Promotion </span></td>
        <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td class="border_no_left_right"><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>

      </tr>
      <tr>
        <td> <span class="main_heading"> Premium </span></td>
        <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td class="border_no_left_right"><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>

      </tr>
      <tr>
        <td> <span class="main_heading"> Leads </span></td>
        <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td> <span class="plan_validity"> Upto 5 Leads </span></td>
        <td> <span class="plan_validity"> Unlimited Leads </span></td>

      </tr>
      <tr>
        <td class="width"> <span class="main_heading"> Dedicated Relationship Manager </span></td>
        <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td class="border_no_left_right"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>

      </tr>
      <tr>
        <td class="width"> <span class="main_heading"> Verified Status </span></td>
        <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td class="border_no_left_right"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>

      </tr>
      <tr>
        <td class="width"> <span class="main_heading"> Property Photoshoot </span></td>
        <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td class="border_no_left_right"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>


    </table>
  </div>
  <div class="mobile_pricing">
      <div class="custom-container">

        <div class="custom-card-group">
          <div class="custom-pricing-card">

            <span>Basic</span>
            <h4 class="custom-price">Free</h4>
            <ul class="custom-package-list">
              <li> Basic Features
              </li>
              <li>Plan Validity - 1 Month</li>
              <li>  Visiblity- Standard visiblity</li>
              <li><strike>Social Media Promotion</strike></li>
              <li><strike>Premium</strike></li>
              <li><strike>Leads</strike></li>
              <li><strike>Dedicated Relationship Manager</strike></li>
              <li><strike>Verified Status</strike></li>
              <li><strike>Property Photoshoot</strike></li>

            </ul>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <button type="submit" name="pay" class="button">Pay</button>
              </form>
          </div>
          <div class="custom-pricing-card">
            <span>Plus</span>
            <h4 class="custom-price">Custom</h4>
            <ul class="custom-package-list">
              <li>Basic Features</li>
              <li>Plan Validity - 1 Year</li>
              <li> Visiblity - 10x More visiblity</li>
              <li>Social Media Promotion</li>
              <li>Premium</li>
              <li>Leads - Unlimited Leads</li>
              <li>Dedicated Relationship Manager</li>
              <li>Verified Status</li>
              <li>Property Photoshoot</li>
            </ul>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <button type="submit" name="customisable" class="button">Contact</button>
              </form>
          </div>
          <!-- <div class="custom-pricing-card">
            <span>Plus</span>
            <h4 class="custom-price">₹ 2000 / month</h4>
            <ul class="custom-package-list">
              <li>Basic Features</li>
              <li>Plan Validity - 60 days free</li>
              <li>Visiblity in top slots</li>
              <li>Invoice based billing</li>
              <li>24/7 Support</li>
              <li>Social Media promotion</li>
            </ul>
            <a href="#" class="custom-get-started-btn">Choose Plan</a>
          </div>
          <div class="custom-pricing-card">
            <span>Enterprise</span>
            <h4 class="custom-price">Let's Chat</h4>
            <ul class="custom-package-list">
              <li>Basic Features</li>
              <li>Plan Validity - 90 days free</li>
              <li>Visiblity in top slots</li>
              <li>Invoice based billing</li>
              <li>24/7 Support</li>
              <li>Social Media promotion</li>
            </ul>
            <a href="#" class="custom-get-started-btn">Get Started</a>
          </div> -->
        </div>
      </div>
    </div>
  <?php include 'footer.php' ?>
  <script>
    const cards = document.querySelectorAll('.card');
    const rows = document.querySelectorAll('tr');

    cards.forEach((card, index) => {
      card.addEventListener('mouseenter', () => {
        rows[index + 1].classList.add('hovered');
      });

      card.addEventListener('mouseleave', () => {
        rows[index + 1].classList.remove('hovered');
      });
    });
  </script>


</body>

</html>