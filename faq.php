<?php if (isset($_COOKIE['user_id'])) {
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
  <link rel="website icon " href="assets\img\Logo Icon 16_16.svg">
  <title>FAQ's</title>
  <link rel="stylesheet" href="assets\css\header_footer-css.php">
  <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
  <link rel="stylesheet" href="assets\css\faq-css.php">
  <style>
    #box1 {
      background-image: url('assets/img/faq1.png');
      background-size: cover;
      background-position: center;
    }

    #box2 {
      background-image: url('assets/img/faq2.png');
      background-size: cover;
      background-position: center;
    }

    #box3 {
      background-image: url('assets/img/faq3.png');
      background-position: center;
      background-size: cover;
    }
  </style>
</head>

<body>
  <?php include 'header.php' ?>
 
    <div class="faq-heading">
      <span class="heading1">Frequenty Asked Questions</span>
      <span class="heading2">Everything you need to know about SpaceKraft</span>
    </div>
  
  <div class="faq-center">
    <div class="faq">
      <div class="accordion">

        <div class="accordion-item">
          <input type="checkbox" id="accordion1">
          <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SpaceKraft?</label>
          <div class="accordion-item-desc">SpaceKraft is a short-term commercial rental platform that connects property owners with businesses and individuals seeking commercial spaces for short-term use, including kiosks, pop-up shops, storefronts, event stalls, and mobile vans.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion2">
          <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How does SpaceKraft work for property owners?</label>
          <div class="accordion-item-desc">Property owners can list their available commercial spaces on SpaceKraft. You specify rental terms, pricing, and other details. Interested renters can then discover your space, connect with you and close on the transaction. Visit How it works to know more.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion3">
          <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What types of commercial spaces can I list on SpaceKraft?</label>
          <div class="accordion-item-desc">You can list a variety of commercial spaces, including but not limited to kiosks, popup shops, storefronts, event stalls, and mobile vans. Space types may vary based on location and availability.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion4">
          <label for="accordion4" class="accordion-item-title"><span class="icon"></span>What are the benefits of using SpaceKraft for property owners?</label>
          <div class="accordion-item-desc">SpaceKraft offers property owners a platform to showcase their spaces to a broad audience, facilitating bookings, and maximizing the revenue potential of their properties.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion5">
          <label for="accordion5" class="accordion-item-title"><span class="icon"></span>Is it necessary to have insurance for my listed commercial space?</label>
          <div class="accordion-item-desc">While insurance isn't mandatory, it's advisable to have coverage for your space.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion6">
          <label for="accordion6" class="accordion-item-title"><span class="icon"></span>How can I set the rental price for my space on SpaceKraft?</label>
          <div class="accordion-item-desc">You can determine the rental price for your space based on factors like location, size, amenities, and duration.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion7">
          <label for="accordion7" class="accordion-item-title"><span class="icon"></span>What is the typical duration of short-term rentals on SpaceKraft?</label>
          <div class="accordion-item-desc">Short-term rentals on SpaceKraft can vary in duration, including daily, weekly, and monthly options, depending on your preferences and space availability.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion8">
          <label for="accordion8" class="accordion-item-title"><span class="icon"></span>How can I ensure the safety and security of my rental space on SpaceKraft?</label>
          <div class="accordion-item-desc">Property owners are encouraged to implement safety and security measures for their spaces. Communication with renters and clear guidelines can also help ensure a safe and secure rental experience.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion9">
          <label for="accordion9" class="accordion-item-title"><span class="icon"></span>Can I provide additional services or amenities with my space, such as utilities or internet access?</label>
          <div class="accordion-item-desc">Yes, you can offer additional services or amenities with your space. SpaceKraft allows you to specify what's included, such as utilities, internet access, furnishings, and more.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion10">
          <label for="accordion10" class="accordion-item-title"><span class="icon"></span>Is there a fee for listing my space on SpaceKraft?</label>
          <div class="accordion-item-desc">Listing your space on SpaceKraft is currently free of charge until further updates are introduced. You have the option to enhance your listing by paying a modest premium listing fee. For detailed information, we invite you to reach out to our sales team by completing the "Contact Us" form.</div>
        </div>

      </div>

    </div>
    <div class="faq-box3">
      <a href="find.php">
        <div class="faq-box" id="box1">Find a space</div>
      </a>
      <a href="Space_Details.php">
        <div class="faq-box" id="box2">List space</div>
      </a>
      <a href="resources.php">
        <div class="faq-box" id="box3">Resources</div>
      </a>
    </div>
  </div>
  <section class="trusted-by">
        <span> <img src="assets/trusted_logo/trust.png" alt="" width="40px" height="40px"> <h2> Trusted By</h2></span>
        <div class="logos">
        <a class="logo-container" href="https://hermoneytalks.com/" target="_blank" > <img  src="assets/trusted_logo/herm.png" alt="Company 3 Logo"></a>
            <a class="logo-container" href="https://www.linkedin.com/company/gold-leaf-hospitality-consulting/?originalSubdomain=in" target="_blank" > <img  src="assets/trusted_logo/gold_leaf.jpeg" alt="Company 2 Logo"></a>
            <a class="logo-container" href="https://anibee.in" target="_blank" > <img  src="assets/trusted_logo/anibee.jpg" alt="Company 1 Logo"></a>

            <a class="logo-container" href="https://raissa.in" target="_blank" > <img  src="assets/trusted_logo/raissa.jpg" alt="Company 4 Logo"></a> 
            
        </div>
    </section>
  <?php include 'footer.php' ?>
</body>

</html>