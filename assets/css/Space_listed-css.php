<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>


    a {
      color: #8C97B9;
    }

    .faq-box3 {
      display: flex;
      flex-direction: column;
      row-gap: 20px;
     
      align-items: center;
    }

    .faq-box {
      width: 280px;

      display: flex;

      align-items: center;
      color: #989797;
      font-size: 1rem;
      font-weight: bold;
      
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




    

   

    hr {
      color: #989797;
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

      .container {
      margin: 80px 0;
      width: 100%;
   
      padding: 20px;
      display: flex;
      justify-content: space-around;
      align-items: center;
      height: 50vh;
    }

    .confirmation {
      text-align: center;
      background-color: #fff;
      padding: 20px;
      height: 100%;
      border-radius: 10px;
      max-width: 730px;
      margin-bottom: 20px;
    }

    .checkmark {
      font-size: 50px;
      color: green;
    }

    .confirmation h1 {
      margin: 20px 0;
      font-size: 24px;
    }

    .confirmation p.subtitle {
      font-size: 16px;
    padding: 0 41px;

    width: 70%;
    margin: 0 auto;
    }

    .confirmation p {
      margin: 16px 0;
      font-size: 14px;
      color: #717579;
    }
    .right{
      height: 100%;
    }
   @media screen and (max-width:1024px) {
    .container {
      flex-direction: column;
      height: auto;
      padding:0;
      }
    
   }
   @media screen and (max-width:524px) {
    .confirmation {
      text-align:start;
    }
    .confirmation p.subtitle{
      width:100%;
      padding:0;
    }
    .checkmark {
      text-align:center;
    }
    }
    @media (max-width: 480px) {
  /* For mobile devices */
  .nav_right {
    width:98%!important;
    padding:20px 0 20px 40px !important;
    

  }
}