<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>

.form-container {
         max-width: 400px;
         margin: 60px auto;
         padding: 20px;

         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      form {
         display: flex;
         flex-direction: column;

      }

      input {
         width: 380px;
         height: 46px;
         border-radius: 6px;
border: 1px solid var(--Input-Field, #828282);
background: var(--White, #FFF);
         background: var(--White, #FFF);
      }

      h1 {
         font-size: 24px;
         margin-bottom: 20px;
         text-align: center;
      }

      ::placeholder {
         color: #717579;
         font-family: Lato;
         font-size: 14px;
         font-style: normal;
         font-weight: 400;
         line-height: normal;
         letter-spacing: 0.36px;
      }

      .box {
         width: 100%;
         padding: 10px;
         margin: 0px 0 30px 0;
         box-sizing: border-box;
      }

      .p {
text-align: center;
         margin-top: 10px;
         color: var(--Brand-color, #031B64);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 600;
line-height: normal;
letter-spacing: 0.359px;
      }

      .btn {
         background-color: #031B64;
         display: flex;
         justify-content: center;
         align-items: center;
         color: #fff;
         padding: 10px;
         border: none;
         cursor: pointer;
         width: auto !important;
         border-radius: 5px;
         font-size: 16px;
         margin-top: 20px;
         margin-bottom: 20px;
      }

      /* Optional: Add hover effect to the button */
      .btn:hover {
         background-color: #4AE9E9;
      }

      h1 {
         color: #333;
         font-family: Lato;
         font-size: 32px;
         font-style: normal;
         font-weight: 600;
         line-height: normal;
         letter-spacing: 0.5px;
      }

      .custom-password-group {
         position: relative;
         width: 100%;
      }

      .custom-password-group .custom-eye-icon {
         position: absolute;
         top: 32%;
         right: 10px;
         transform: translateY(-50%);
         cursor: pointer;
         font-size: 1.2rem;
      }
      .custom-password-group .custom-eye-icon1 {
         position: absolute;
         top: 32%;
         right: 10px;
         transform: translateY(-50%);
         cursor: pointer;
         font-size: 1.2rem;
      }

      label {
         text-align: left;
         color: #333;
         font-family: Lato;
         font-size: 16px;
         font-style: normal;
         font-weight: 400;
         line-height: normal;
         letter-spacing: 0.36px;
         text-transform: capitalize;
         padding-bottom: 2px;
      }

      .red {
         color: red;
      }
      #t_and_c{
         color: #333;
font-family: Lato;
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.359px;
width: 15px; height:15px;
      }
      .block{
         display: none;
      }
      .no-block{
         display: block;
      }