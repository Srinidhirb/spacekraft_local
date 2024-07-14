<?php if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
  <title>Waiting Page</title>

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
  <link rel="stylesheet" href="assets\css\Space_listed-css.php">
  <link rel="stylesheet" href="assets\css\header_footer-css.php">
  
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <div class="confirmation">
      <div class="checkmark"><svg width="65" height="64" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M32.5 64C50.1731 64 64.5 49.6731 64.5 32C64.5 14.3269 50.1731 0 32.5 0C14.8269 0 0.5 14.3269 0.5 32C0.5 49.6731 14.8269 64 32.5 64Z" fill="#1EC98B" />
          <path d="M28.8677 52.795L14.6112 37.9755L19.8961 32.8903L27.7599 41.0629L44.6861 15.0742L50.8428 19.0878L28.8677 52.795Z" fill="white" />
        </svg>
      </div>
      <h1>Thanks for listing your amazing space on Spacekraft</h1>
      <p class="subtitle">We're thrilled to receive it to the Spacekraft universe, for brands seeking co-retailing, pop-up shops, or short-term marketing activations.</p>
      <p>Your listing is under review. It will be live within 48hrs on Spacekraft</p>
      <span>Stay tuned!</span>
    </div>
    <div class="right">
      <div class="faq-box3">
        <a href="resources.php">
          <div class="faq-box" id="box1"><img src="assets\img\Space_listed1.jpg" alt=""> &nbsp; Resources</div>
        </a>
        <hr>
        <a href="Space_Details.php">
          <div class="faq-box" id="box2"><img src="assets\img\Space_listed2.png" alt=""> &nbsp; List Another space</div>
        </a>

      </div>
    </div>
  </div>


<div class="resources">
  
</div>







 

  <?php include 'footer.php' ?>
</body>

</html>