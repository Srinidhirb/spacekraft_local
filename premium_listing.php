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
  <link rel="stylesheet" href="assets/css/header_footer-css.php">
  <style>
    .center_display {
      width: 100%;
      margin: 86px 0 76px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .center_display span {
      font-family: Lato;
      font-size: 32px;
      font-weight: 500;
      line-height: 38.4px;
      text-align: center;

    }

    .center_display p {
      max-width: 67.4%;
      width: 100%;
      font-family: Lato;
      font-size: 16px;
      font-weight: 400;
      line-height: 19.2px;
      text-align: center;

      margin: 19px auto;
    }

    @media screen and (max-width:900px) {
      .center_display p {
        max-width: 100%;
      }

      .center_display {
        width: 100%;
      }
    }

    table {
      margin: 0 auto;
      width: 78.67%;
      /* Ensure the table takes up full width of its container */
      border-collapse: collapse;
      /* Collapse the borders between cells */
    }

    .cards {
      margin: 0 auto;
      width: 78.67%;
      display: flex;
      justify-content: center;

    }

    .cards .card {
      width: 168px;
    }

    td,
    th {
      /* Add a solid border around each cell */
      padding: 16px;
      /* Add some padding inside each cell */
      /* Center align text within cells */
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #E1E9FF;
      /* Alternate row background color for better readability */
    }

    tr:nth-child(odd) {
      background-color: #FDFDFD;
      /* Alternate row background color for better readability */
    }

    td .main_heading {
      display: block;
      margin: 0px 0px 0px 40px;
      font-family: Lato;
      font-size: 16px;
      font-weight: 400;
      line-height: 19.2px;
      text-align: left !important
    }

    .card {
      display: flex;
      flex-direction: column;
      align-items: center;

      padding: 0 0 32px 0;
    }

    .packages {
      font-family: Lato;
      font-size: 24px;
      font-weight: 600;
      line-height: 24px;
      text-align: left;
      color: #031B64;

    }

    .package-des {
      margin: 16px 0 0 0;
      width: 167px;
      font-family: Lato;
      font-size: 16px;
      font-weight: 400;
      line-height: 19.2px;
      text-align: center;
      color: #717579;
    }

    .price {
      font-family: Lato;
      font-size: 32px;
      font-weight: 600;
      line-height: 38.4px;
      text-align: center;
      color: #222222;
      margin: 40px 0;
    }

    .button {
      cursor: pointer;
      width: 136px;
      height: 40px;
      padding: 10px 24px 10px 24px;
      gap: 8px;
      border-radius: 6px;
      opacity: 0px;
      background-color: #031B64;
      font-family: Lato;
      font-size: 16px;
      font-weight: 400;
      line-height: 19.2px;
      text-align: left;
      color: #ffffff;
    }

    .button:hover {
      color: #222222;
      background-color: #4AE9E9;


    }

    .price .duration {
      font-family: Lato;
      font-size: 14px;
      font-weight: 400;
      line-height: 14px;
      text-align: center;
      color: #717579;
    }

    .pricing {
      margin: 0 0 48px 0;
    }

    .plan_validity {
      font-family: Lato;
      font-size: 16px;
      font-weight: 400;
      line-height: 19.2px;
      text-align: left;
      color: #717579;
    }

    @media screen and (max-width:1320px) {
      table {
        width: 98%;
      }
    }
    .rectangle{
      position: absolute;
      border: 2px solid black;
      display: block;
      content: "";
    }
    .mobile_pricing{
      display: none;
    }
    .custom-container {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      margin: 5rem 0rem;
    }




    .custom-card-group {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
    }

    .custom-pricing-card {
      margin: 20px 30px;
      height: 400px;
      width: 275px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-around;
      transition: 0.5s ease-in-out;
      padding: 16px 14px;
      border-radius: 10px;
      border: 2px solid #031B64;
    }

    .custom-pricing-card i {
      color: #031B64;
      height: 60px;
      width: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      border-radius: 50%;
      box-shadow: 0 0 34px -12px gray;
    }

    .custom-pricing-card span {
      color: #031B64;
      margin: -10px 0;
      font-weight: bold;
      font-size: 29px;
    }

    .custom-price {
      font-size: 30px;
      font-family: "Baloo 2";
    }

    .custom-package-list {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 0 20px;
    }

    .custom-package-list li {
      list-style: none;
      margin: 6px 0;
      color: gray;
      font-size: 16px;
    }

    .custom-get-started-btn {
      border: 2px solid #031B64;
      color: white;
      background:  #031B64;
      padding: 8px 25px;
      border-radius: 20px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s ease-in-out;
    }

    .custom-get-started-btn:hover {
      background: transparent;
      color: #031B64;
    }
    @media screen and (max-width:1000px) {
      .pricing{
        display: none;

      }
      .mobile_pricing{
        display: block;
      }
      
    }
  </style>
</head>

<body>
  <?php include 'header.php' ?>
  <div class="center_display">
    <span>Choose a plan and start your listing</span>
    <p>Lorem ipsum dolor sit amet consectetur. In vitae condimentum placerat aliquet adipiscing nec ut
      amet. A arcu</p>
  </div>

  <div class="pricing">
    <table>
      <tr>
        <td> </td>
        <td>
          <div class="card">
           <div class="rectangle"></div>
            <span class="packages">Basic </span>
            <span class="package-des">Lorem ipsum dolor sit amet consectetur.</span>
            <span class="price">Free</span>
            <a href="#"> <span class="button"> Get Started</span></a>
          </div>
        </td>
        <td>
          <div class="card ">
            
            <span class="packages">Pro</span>
            <span class="package-des">Lorem ipsum dolor sit amet consectetur.</span>
            <span class="price"><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.125 0.500043C0.125 0.500043 1.86764 0.500043 3.625 0.500043M8.125 16.5L1.125 9.50004C1.125 9.50004 2.625 9.50004 3.625 9.50004C4.625 9.50004 9.125 9.56183 9.125 5.00004C9.125 0.438253 4.625 0.500043 3.625 0.500043M12.125 0.500043C12.125 0.500043 6.55393 0.500043 3.625 0.500043M0.125 4.50004H12.125" stroke="#717579" stroke-width="1.5" />
              </svg>
              1000 <span class="duration"> / month</span></span>
            <a href="#"> <span class="button"> Choose Plan</span></a>
          </div>
        </td>
        <td>
          <div class="card card">
           
            <span class="packages">Plus</span>
            <span class="package-des">Lorem ipsum dolor sit amet consectetur.</span>
            <span class="price"><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.125 0.500043C0.125 0.500043 1.86764 0.500043 3.625 0.500043M8.125 16.5L1.125 9.50004C1.125 9.50004 2.625 9.50004 3.625 9.50004C4.625 9.50004 9.125 9.56183 9.125 5.00004C9.125 0.438253 4.625 0.500043 3.625 0.500043M12.125 0.500043C12.125 0.500043 6.55393 0.500043 3.625 0.500043M0.125 4.50004H12.125" stroke="#717579" stroke-width="1.5" />
              </svg>
              2000 <span class="duration"> / month</span></span>
            <a href="#"> <span class="button"> Choose Plan</span></a>
          </div>
        </td>
        <td>
          <div class="card card ">
           
            <span class="packages">Enterprise</span>
            <span class="package-des">Lorem ipsum dolor sit amet consectetur.</span>
            <span class="price">Let's chat</span>
            <a href="#"> <span class="button"> Contact us </span></a>
          </div>
        </td>
      </tr>
      <tr>
        <td> <span class="main_heading">Basic Features</span>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
      </tr>
      <tr>
        <td> <span class="main_heading"> Plan validity </span></td>
        <td> <span class="plan_validity"> Free Lifetime </span></td>
        <td> <span class="plan_validity"> 30 days free </span></td>
        <td> <span class="plan_validity"> 60 days free </span></td>
        <td> <span class="plan_validity"> 90 days free </span></td>
      </tr>
      <tr>
        <td class="width"> <span class="main_heading"> Visiblity in top slots </span></td>
        <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
      </tr>
      <tr>
        <td> <span class="main_heading"> Invoice based billing </span></td>
        <td><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
      </tr>
      <tr>
        <td> <span class="main_heading"> 24/7 Support </span></td>
        <td> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
      </tr>
      <tr>
        <td> <span class="main_heading"> Social Media promotion </span></td>
        <td> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
          </svg>
        </td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
        <td><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
          </svg></td>
      </tr>
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
      <li>Plan Validity - Free Lifetime</li>
      <li> <strike> Visiblity in top slots</strike></li>
      <li><strike>Invoice based billing</strike></li>
      <li><strike>24/7 Support</strike></li>
      <li><strike>Social Media promotion</strike></li>

    </ul>
    <a href="#" class="custom-get-started-btn">Get Started</a>
  </div>
  <div class="custom-pricing-card">
    <span>Pro</span>
    <h4 class="custom-price">₹ 1000 / month</h4>
    <ul class="custom-package-list">
      <li>Basic Features</li>
      <li>Plan Validity - 30 days free</li>
      <li><strike> Visiblity in top slots</strike></li>
      <li>Invoice based billing</li>
      <li>24/7 Support</li>
      <li>Social Media promotion</li>
    </ul>
    <a href="#" class="custom-get-started-btn">Choose Plan</a>
  </div>
  <div class="custom-pricing-card">
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
  </div>
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