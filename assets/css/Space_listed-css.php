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