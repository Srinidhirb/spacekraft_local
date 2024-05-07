<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
.wait {
      width: 70%;
      margin: 129px 0px;
      display: flex;
      flex-direction: column;

      align-items: center;
      text-align: center;
      height: auto;
    }

    .wait1 {
      display: flex;
      align-items: center;
      gap: 12px;
      font-family: Lato;
      font-size: 16px;
      font-weight: 400;
      line-height: 19px;
      letter-spacing: 0em;
      text-align: left;
      color: #222222;

    }

    .wait2 {
      margin: 36px 0px 0px 0px;
      font-family: Lato;
      font-size: 16px;
      font-weight: 400;
      line-height: 19px;
      letter-spacing: 0em;
      text-align: left;
      color: #222222;

    }

    .wait3 {
      margin: 168px 0px 0px 0px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-family: Lato;
      font-size: 24px;
      font-weight: 400;
      line-height: 29px;
      letter-spacing: 0em;
      text-align: left;
      color: #8C97B9;

    }

    a {
      color: #8C97B9;
    }

    .faq-box3 {
      display: flex;
      flex-direction: column;
      row-gap: 10px;
      margin: 0px 56px 44px 40px;
      align-items: center;
    }

    .faq-box {
      width: 280px;

      display: flex;

      align-items: center;
      color: #222222;
      font-size: 1rem;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    #box1,
    #box2 {
      font-family: Lato;
      font-size: 18px;
      font-weight: 500;
      line-height: 18px;
      letter-spacing: 0.5px;
      text-align: left;

    }

    #box1 img {
      width: 88px;
      height: 64px;

    }

    #box2 img {
      width: 88px;
      height: 64px;
    }




    .flex {

      display: flex;
      margin: 0px 0px 0px 260px;
      flex-wrap: wrap;

    }

    .right {
      margin: 149px 0px 0px 0px;
      width: 30%;
    }

    hr {
      color: #222222;
      width: 100%;
    }
    @media only screen and (max-width: 950px) {
        .flex {
          margin: 0px;
        }
        .right {
          width: 100%; /* Take full width on small screens */
          margin-top: 20px; /* Adjust margin */
        }
        hr{
          width: 50%;
        }
        .wait{
          width: 100%;
        }
        .wait3{
          margin: 100px 0 0 0;
        }
      }