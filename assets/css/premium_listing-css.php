<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>

* {
  font-family: Lato;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .center_display {
      width: 100%;
      margin: 86px 0 6px;
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
      width: 70.67%;
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

      height: 60px;
      /* Add some padding inside each cell */
      /* Center align text within cells */
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #E1E9FF;
      margin:0 0 10px;
      /* Alternate row background color for better readability */
    }

    tr:nth-child(odd) {
      background-color: #FDFDFD;
      margin:0 0 10px;
      /* Alternate row background color for better readability */
    }

    td .main_heading {
      display: block;
      margin: 0px 0px 0px 40px;
      font-family: Lato;
      font-size: 19px;
      font-weight: 400;
      line-height: 19.2px;
      text-align: left !important
    }

    .card {
      display: flex;
      flex-direction: column;
      align-items: center;

      padding: 34px;

    }

    .packages {
      font-family: Lato;
      font-size: 24px;
      font-weight: 500;
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
      font-size: 26px;
      font-weight: 500;
      line-height: 38.4px;
      text-align: center;
      color: #222222;
      margin: 20px 0;
    }

    .button {
      cursor: pointer;
      width: 116px;
      height: 40px;
      padding: 10px 44px 10px 44px;
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
      display: flex;
      align-items:center;
      justify-content:center;
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

    .rectangle {
      position: absolute;
      border: 2px solid black;
      display: block;
      content: "";
    }

    .mobile_pricing {
      display: none;
    }

    .custom-container {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
     
    }




    .custom-card-group {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
    }

    .custom-pricing-card {
      margin: 20px 30px;
      height: 450px;
      width: 305px;
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
      background: #031B64;
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

    @media screen and (max-width:700px) {
      .pricing {
        display: none;

      }

      .mobile_pricing {
        display: block;
      }

    }


    th:nth-child(3),
    td:nth-child(3) {
      display:none;
      border-left: 2px solid black;
      border-right: 2px solid black;
    }

    tr:first-child td:nth-child(3) {
      border-top: 2px solid #000;
      padding: 10px 0;
    }

    tr:nth-child(9) td:nth-child(3) {
      border-bottom: 2px solid #000;
      padding: 40px 0;
    }