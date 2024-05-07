<style>
  * {
    padding: 0;
    margin: 0;
  }

  header {
    height: 64px;
    background-color: #ffffff;

    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    /* Adjust the z-index as needed */

  }

  .header {
    height: 64px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 40px;
  }

  .logo_search {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
  }

  .logo_search img {
    width: 198px;
    height: 23px;
  }

  .search_bar {
    display: flex;
    cursor: pointer;
    justify-content: space-between;
    align-items: center;
    margin: 0 0 0 24px;

  }

  .search_bar span {
    font-family: Lato;
    font-size: 16px;
    font-weight: 400;
    line-height: 19.2px;
    text-align: left;
    color: #222222;
    margin: 0 0 0 12px;
  }

  .dropdown_listing {
    width: 296px;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    transition: all 0.2s ease-in-out;
  }

  .dropdown {
    cursor: pointer;
    width: 94px;
    display: flex;
    align-items: center;
  }

  .dropdown span {
    font-family: Lato;
    font-size: 16px;
    font-weight: 500;
    line-height: 16px;
    text-align: left;

    color: #222222;
  }

  .btn {
    width: auto;

    padding: 9px 16px 9px 16px;
    gap: 8px;
    border-radius: 6px;
    opacity: 0px;
    background-color: #031B64;
    color: #ffffff;
    cursor: pointer;
  }

  .btn:hover {
    color: #222222 !important;
    background-color: #4AE9E9;
  }

  .login {
    font-family: Lato;
    font-size: 16px;
    font-weight: 400;
    line-height: 16px;
    text-align: left;
    color: #222222;
    margin: 0 24px 0 0;
    cursor: pointer;
  }

  .btn span {

    font-family: Lato;
    font-size: 16px;
    font-weight: 400;
    line-height: 19.2px;
    text-align: left;

  }

  .nav_right {
    display: none;
    position: absolute;

    padding: 20px;
    gap: 30px;
    top: 64px;
    right: 0%;
    width: 80%;
    height: 90vh;
    background-color: #ffffff;
    transition: all 3s ease-in-out;
  }

  .open,
  .close {
    display: none;
  }

  .nav_flex {
    display: flex;
    flex-direction: column;
    gap: 40px;
  }

  .dropdown_display {
    display: none;
    width: 140px;
    /* display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; */
    height: 180px;
    background-color: #FBFBFB;
    position: absolute;
    top: 43px;
    right: 217px;
  }

  .dropdown_display a {
    width: 100%;
    height: 37px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .dropdown_display a:hover {
    background-color: #E7E7E7;
  }

  .dropdown:hover .dropdown_display {
    display: block;
  }

  .dropdown-login {
    position: relative;
  }

  .dropdown-menu {
    display: none;
    position: absolute;
    top: 87%;
    right: 0;
    width: 100px !important;
    height: 106px;
    background-color: #fff;
    -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    padding: 0px;
    z-index: 100;
  }

  .dropdown-menu hr {

    width: 92%;
  }

  .dropdown-login:hover .dropdown-menu {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    text-align: center;
  }

  .login li {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none !important;
    /* Remove default list item marker */
  }

  .dropdown-menu li:hover {
    background-color: #E7E7E7;
  }

  .nav-flex {
    display: flex;
    justify-content: center;

    
  }

  @media (max-width: 890px) {
    .dropdown-menu {
      top: 0;
      left: 100%;
      min-width: 150px;
      /* Adjust as needed */
    }
  }

  @media screen and (max-width:680px) {

    .dropdown_listing {
      display: none;
    }

    .open {
      display: block;
      cursor: pointer;
    }

    .header {
      padding: 0 40px 0 20px;
    }

    .logo_search .search_bar {
      display: none;
    }


  }

  header input[type=text] {
    width: 170px;
    padding: 10px;

    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
  }

  /* When the input field gets focus, change its width to 100% */
  header input[type=text]:focus {
    width: 70%;
  }

  .search_bar_input {
    display: none;

    gap: 20px;
    position: absolute;
    top: 20%;
    width: 20%;
  }

  .search_bar_input.visible {
    display: flex;

  }

  #find_button {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .mobile_search{
    display: flex;
    gap: 15px;
  }
  .nav_flex .links{
    display: flex;
    flex-direction: column;
    align-items: start;
    gap: 28px;
  }
  .nav_flex .login li{
    justify-content: start;
  }
  .nav_flex .btn{
    width: 130px;
    text-align: center;
  }
  /* CSS for hamburger icon */


</style>
<header>

  <div class="header">
    <div class="logo_search">
      <a href="index.php"> <img src="assets/img/SpaceKraft_Logo.svg" alt=""></a>
      <div class="search_bar">
        <div id="find_button" onclick="display()">
          <div class="svg">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_3259_17744)">
                <path d="M14.8036 15.8637C15.0965 16.1566 15.5713 16.1566 15.8642 15.8637C16.1571 15.5709 16.1571 15.096 15.8642 14.8031L14.8036 15.8637ZM11.9957 6.70596C11.9957 9.62712 9.62761 11.9952 6.70645 11.9952V13.4952C10.456 13.4952 13.4957 10.4555 13.4957 6.70596H11.9957ZM6.70645 11.9952C3.7853 11.9952 1.41724 9.62712 1.41724 6.70596H-0.0827637C-0.0827637 10.4555 2.95687 13.4952 6.70645 13.4952V11.9952ZM1.41724 6.70596C1.41724 3.78481 3.7853 1.41675 6.70645 1.41675V-0.083252C2.95687 -0.083252 -0.0827637 2.95638 -0.0827637 6.70596H1.41724ZM6.70645 1.41675C9.62761 1.41675 11.9957 3.78481 11.9957 6.70596H13.4957C13.4957 2.95638 10.456 -0.083252 6.70645 -0.083252V1.41675ZM10.4898 11.55L14.8036 15.8637L15.8642 14.8031L11.5505 10.4894L10.4898 11.55Z" fill="#222222" />
              </g>
              <defs>
                <clipPath id="clip0_3259_17744">
                  <rect width="16" height="16" fill="white" transform="translate(0.000488281)" />
                </clipPath>
              </defs>
            </svg>
          </div>
          <div class="span">
            <span class="find_span">Find</span>
          </div>
        </div>
        <div class="search_bar_input" id="search_bar_input">
          <input type="text" name="search" placeholder="Search..">
          <button class="btn">Find</button>
          <div class="close-icon" onclick="closeSearch()">&#10005;</div>
        </div>

      </div>

      <script>
        function display() {
          document.getElementById("find_button");
          {
            document.getElementById('search_bar_input').style.display = "flex";
          }
        }

        function closeSearch() {
          document.getElementById('search_bar_input').style.display = "none";
        }
      </script>



    </div>




    <div class="dropdown_listing">
      <div class="dropdown"> <span> About us</span> &nbsp; <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 10L12.7071 15.2929C12.3166 15.6834 11.6834 15.6834 11.2929 15.2929L6 10" stroke="#222222" stroke-width="2" stroke-linecap="round" />
        </svg>
        <div class="dropdown_display">
          <a href="#">Renters</a>
          <a href="#">Hosts</a>
          <a href="faq.php">FAQ</a>
          <a href="resources.php">Resources</a>
          <a href="contactus.php">Contact Us</a>
        </div>
      </div>

      <div class="login"><?php if ($user_id != '') { ?>
          <li class=" dropdown-login">
            <a href="user-profile.php"><svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="17.5" cy="17.5" r="17" stroke="#222222" />
                <path d="M18 19C20.7614 19 23 16.7614 23 14C23 11.2386 20.7614 9 18 9C15.2386 9 13 11.2386 13 14C13 16.7614 15.2386 19 18 19ZM18 19C13.5817 19 10 21.6863 10 25M18 19C22.4183 19 26 21.6863 26 25" stroke="#222222" stroke-width="1.5" stroke-linecap="round" />
              </svg>
            </a>
            <ul class="dropdown-menu">
              <li><a href="user-profile.php">My profile</a></li>
              <hr>
              <li><a class="nav-flex" href="user_logout.php" onclick="return confirm('logout from this website?');">Logout <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09202 21.782L6.86502 22.2275H6.86502L7.09202 21.782ZM6.21799 20.908L5.77248 21.135H5.77248L6.21799 20.908ZM18.5 18.8C18.5 18.5239 18.2761 18.3 18 18.3C17.7239 18.3 17.5 18.5239 17.5 18.8H18.5ZM17.782 20.908L18.2275 21.135L17.782 20.908ZM16.908 21.782L17.135 22.2275H17.135L16.908 21.782ZM16.908 2.21799L17.135 1.77248V1.77248L16.908 2.21799ZM17.5 5.2C17.5 5.47614 17.7239 5.7 18 5.7C18.2761 5.7 18.5 5.47614 18.5 5.2H17.5ZM17.782 3.09202L17.3365 3.31901V3.31901L17.782 3.09202ZM7.09202 2.21799L7.31901 2.66349H7.31901L7.09202 2.21799ZM6.21799 3.09202L6.66349 3.31901V3.31901L6.21799 3.09202ZM11 4.5C10.7239 4.5 10.5 4.72386 10.5 5C10.5 5.27614 10.7239 5.5 11 5.5V4.5ZM13 5.5C13.2761 5.5 13.5 5.27614 13.5 5C13.5 4.72386 13.2761 4.5 13 4.5V5.5ZM21 12.5C21.2761 12.5 21.5 12.2761 21.5 12C21.5 11.7239 21.2761 11.5 21 11.5V12.5ZM12 11.5C11.7239 11.5 11.5 11.7239 11.5 12C11.5 12.2761 11.7239 12.5 12 12.5V11.5ZM18.6464 14.6464C18.4512 14.8417 18.4512 15.1583 18.6464 15.3536C18.8417 15.5488 19.1583 15.5488 19.3536 15.3536L18.6464 14.6464ZM20.8686 13.1314L21.2222 13.4849L20.8686 13.1314ZM20.8686 10.8686L21.2222 10.5151L21.2222 10.5151L20.8686 10.8686ZM19.3536 8.64645C19.1583 8.45118 18.8417 8.45118 18.6464 8.64645C18.4512 8.84171 18.4512 9.15829 18.6464 9.35355L19.3536 8.64645ZM21.5368 12.309L21.0613 12.1545H21.0613L21.5368 12.309ZM21.5368 11.691L21.0613 11.8455L21.5368 11.691ZM9.2 2.5H14.8V1.5H9.2V2.5ZM14.8 21.5H9.2V22.5H14.8V21.5ZM6.5 18.8V5.2H5.5V18.8H6.5ZM9.2 21.5C8.6317 21.5 8.23554 21.4996 7.92712 21.4744C7.62454 21.4497 7.45069 21.4036 7.31901 21.3365L6.86502 22.2275C7.16117 22.3784 7.48126 22.4413 7.84569 22.4711C8.20428 22.5004 8.6482 22.5 9.2 22.5V21.5ZM5.5 18.8C5.5 19.3518 5.49961 19.7957 5.52891 20.1543C5.55868 20.5187 5.62159 20.8388 5.77248 21.135L6.66349 20.681C6.5964 20.5493 6.55031 20.3755 6.52559 20.0729C6.50039 19.7645 6.5 19.3683 6.5 18.8H5.5ZM7.31902 21.3365C7.03677 21.1927 6.8073 20.9632 6.66349 20.681L5.77248 21.135C6.01217 21.6054 6.39462 21.9878 6.86502 22.2275L7.31902 21.3365ZM17.5 18.8C17.5 19.3683 17.4996 19.7645 17.4744 20.0729C17.4497 20.3755 17.4036 20.5493 17.3365 20.681L18.2275 21.135C18.3784 20.8388 18.4413 20.5187 18.4711 20.1543C18.5004 19.7957 18.5 19.3518 18.5 18.8H17.5ZM14.8 22.5C15.3518 22.5 15.7957 22.5004 16.1543 22.4711C16.5187 22.4413 16.8388 22.3784 17.135 22.2275L16.681 21.3365C16.5493 21.4036 16.3755 21.4497 16.0729 21.4744C15.7645 21.4996 15.3683 21.5 14.8 21.5V22.5ZM17.3365 20.681C17.1927 20.9632 16.9632 21.1927 16.681 21.3365L17.135 22.2275C17.6054 21.9878 17.9878 21.6054 18.2275 21.135L17.3365 20.681ZM14.8 2.5C15.3683 2.5 15.7645 2.50039 16.0729 2.52559C16.3755 2.55031 16.5493 2.5964 16.681 2.66349L17.135 1.77248C16.8388 1.62159 16.5187 1.55868 16.1543 1.52891C15.7957 1.49961 15.3518 1.5 14.8 1.5V2.5ZM18.5 5.2C18.5 4.6482 18.5004 4.20428 18.4711 3.84569C18.4413 3.48126 18.3784 3.16117 18.2275 2.86502L17.3365 3.31901C17.4036 3.45069 17.4497 3.62454 17.4744 3.92712C17.4996 4.23554 17.5 4.6317 17.5 5.2H18.5ZM16.681 2.66349C16.9632 2.8073 17.1927 3.03677 17.3365 3.31901L18.2275 2.86502C17.9878 2.39462 17.6054 2.01217 17.135 1.77248L16.681 2.66349ZM9.2 1.5C8.6482 1.5 8.20428 1.49961 7.84569 1.52891C7.48126 1.55868 7.16117 1.62159 6.86502 1.77248L7.31901 2.66349C7.45069 2.5964 7.62454 2.55031 7.92712 2.52559C8.23554 2.50039 8.6317 2.5 9.2 2.5V1.5ZM6.5 5.2C6.5 4.6317 6.50039 4.23554 6.52559 3.92712C6.55031 3.62454 6.5964 3.45069 6.66349 3.31901L5.77248 2.86502C5.62159 3.16117 5.55868 3.48126 5.52891 3.84569C5.49961 4.20428 5.5 4.6482 5.5 5.2H6.5ZM6.86502 1.77248C6.39462 2.01217 6.01217 2.39462 5.77248 2.86502L6.66349 3.31901C6.8073 3.03677 7.03677 2.8073 7.31901 2.66349L6.86502 1.77248ZM11 5.5H13V4.5H11V5.5ZM21 11.5H12V12.5H21V11.5ZM19.3536 15.3536L21.2222 13.4849L20.5151 12.7778L18.6464 14.6464L19.3536 15.3536ZM21.2222 10.5151L19.3536 8.64645L18.6464 9.35355L20.5151 11.2222L21.2222 10.5151ZM21.2222 13.4849C21.4144 13.2928 21.58 13.1276 21.7046 12.9809C21.8329 12.8297 21.9468 12.6655 22.0124 12.4635L21.0613 12.1545C21.0527 12.1809 21.0305 12.2298 20.9423 12.3337C20.8503 12.4421 20.7189 12.574 20.5151 12.7778L21.2222 13.4849ZM20.5151 11.2222C20.7189 11.426 20.8503 11.5579 20.9422 11.6663C21.0305 11.7702 21.0527 11.8191 21.0613 11.8455L22.0124 11.5365C21.9468 11.3345 21.8329 11.1703 21.7046 11.0191C21.58 10.8724 21.4144 10.7072 21.2222 10.5151L20.5151 11.2222ZM22.0124 12.4635C22.1103 12.1623 22.1103 11.8377 22.0124 11.5365L21.0613 11.8455C21.0939 11.9459 21.0939 12.0541 21.0613 12.1545L22.0124 12.4635Z" fill="#637381" />
                  </svg>
                </a></li>
            </ul>
          </li>
        <?php } else { ?>
          <li class="login">
            <a href="login.php">Login </a>
          </li>
        <?php } ?>
      </div>
      <a href="Space_Details.php">
        <div class="btn"> <span>Add Listing </span></div>
      </a>
    </div>
    <div class="open" id="open" onclick="display_nav_right()"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M3 18H21V16H3V18ZM3 13H21V11H3V13ZM3 6H21V4H3V6Z" fill="#222222" />
</svg> </div>
    <div class="close" id="close" onclick="close_nav_right()"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M6 6L18 18M6 18L18 6" stroke="#222222" stroke-width="2" stroke-linecap="round" />
</svg></div>


    <div class="nav_right" id="nav_right">
      <div class="nav_flex">
        <div class="mobile_search">
          <input type="text" name="search" placeholder="Search..">
          <button class="btn">Find</button>
        </div>
        <div class="links"> 
          <a href="">About us</a>
            <a href="#">Renters</a>
            <a href="#">Hosts</a>
            <a href="faq.php">FAQ</a>
            <a href="resources.php">Resources</a>
            <a href="contactus.php">Contact Us</a>
          </div>
        

        <div class="login"><?php if ($user_id != '') { ?>
            <li class=" dropdown-login">
              <a href="user-profile.php"><svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="17.5" cy="17.5" r="17" stroke="#222222" />
                  <path d="M18 19C20.7614 19 23 16.7614 23 14C23 11.2386 20.7614 9 18 9C15.2386 9 13 11.2386 13 14C13 16.7614 15.2386 19 18 19ZM18 19C13.5817 19 10 21.6863 10 25M18 19C22.4183 19 26 21.6863 26 25" stroke="#222222" stroke-width="1.5" stroke-linecap="round" />
                </svg>
              </a>
              <ul class="dropdown-menu">
                <li><a href="user-profile.php">My profile</a></li>
                <hr>
                <li><a class="nav-flex" href="user_logout.php" onclick="return confirm('logout from this website?');">Logout <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.09202 21.782L6.86502 22.2275H6.86502L7.09202 21.782ZM6.21799 20.908L5.77248 21.135H5.77248L6.21799 20.908ZM18.5 18.8C18.5 18.5239 18.2761 18.3 18 18.3C17.7239 18.3 17.5 18.5239 17.5 18.8H18.5ZM17.782 20.908L18.2275 21.135L17.782 20.908ZM16.908 21.782L17.135 22.2275H17.135L16.908 21.782ZM16.908 2.21799L17.135 1.77248V1.77248L16.908 2.21799ZM17.5 5.2C17.5 5.47614 17.7239 5.7 18 5.7C18.2761 5.7 18.5 5.47614 18.5 5.2H17.5ZM17.782 3.09202L17.3365 3.31901V3.31901L17.782 3.09202ZM7.09202 2.21799L7.31901 2.66349H7.31901L7.09202 2.21799ZM6.21799 3.09202L6.66349 3.31901V3.31901L6.21799 3.09202ZM11 4.5C10.7239 4.5 10.5 4.72386 10.5 5C10.5 5.27614 10.7239 5.5 11 5.5V4.5ZM13 5.5C13.2761 5.5 13.5 5.27614 13.5 5C13.5 4.72386 13.2761 4.5 13 4.5V5.5ZM21 12.5C21.2761 12.5 21.5 12.2761 21.5 12C21.5 11.7239 21.2761 11.5 21 11.5V12.5ZM12 11.5C11.7239 11.5 11.5 11.7239 11.5 12C11.5 12.2761 11.7239 12.5 12 12.5V11.5ZM18.6464 14.6464C18.4512 14.8417 18.4512 15.1583 18.6464 15.3536C18.8417 15.5488 19.1583 15.5488 19.3536 15.3536L18.6464 14.6464ZM20.8686 13.1314L21.2222 13.4849L20.8686 13.1314ZM20.8686 10.8686L21.2222 10.5151L21.2222 10.5151L20.8686 10.8686ZM19.3536 8.64645C19.1583 8.45118 18.8417 8.45118 18.6464 8.64645C18.4512 8.84171 18.4512 9.15829 18.6464 9.35355L19.3536 8.64645ZM21.5368 12.309L21.0613 12.1545H21.0613L21.5368 12.309ZM21.5368 11.691L21.0613 11.8455L21.5368 11.691ZM9.2 2.5H14.8V1.5H9.2V2.5ZM14.8 21.5H9.2V22.5H14.8V21.5ZM6.5 18.8V5.2H5.5V18.8H6.5ZM9.2 21.5C8.6317 21.5 8.23554 21.4996 7.92712 21.4744C7.62454 21.4497 7.45069 21.4036 7.31901 21.3365L6.86502 22.2275C7.16117 22.3784 7.48126 22.4413 7.84569 22.4711C8.20428 22.5004 8.6482 22.5 9.2 22.5V21.5ZM5.5 18.8C5.5 19.3518 5.49961 19.7957 5.52891 20.1543C5.55868 20.5187 5.62159 20.8388 5.77248 21.135L6.66349 20.681C6.5964 20.5493 6.55031 20.3755 6.52559 20.0729C6.50039 19.7645 6.5 19.3683 6.5 18.8H5.5ZM7.31902 21.3365C7.03677 21.1927 6.8073 20.9632 6.66349 20.681L5.77248 21.135C6.01217 21.6054 6.39462 21.9878 6.86502 22.2275L7.31902 21.3365ZM17.5 18.8C17.5 19.3683 17.4996 19.7645 17.4744 20.0729C17.4497 20.3755 17.4036 20.5493 17.3365 20.681L18.2275 21.135C18.3784 20.8388 18.4413 20.5187 18.4711 20.1543C18.5004 19.7957 18.5 19.3518 18.5 18.8H17.5ZM14.8 22.5C15.3518 22.5 15.7957 22.5004 16.1543 22.4711C16.5187 22.4413 16.8388 22.3784 17.135 22.2275L16.681 21.3365C16.5493 21.4036 16.3755 21.4497 16.0729 21.4744C15.7645 21.4996 15.3683 21.5 14.8 21.5V22.5ZM17.3365 20.681C17.1927 20.9632 16.9632 21.1927 16.681 21.3365L17.135 22.2275C17.6054 21.9878 17.9878 21.6054 18.2275 21.135L17.3365 20.681ZM14.8 2.5C15.3683 2.5 15.7645 2.50039 16.0729 2.52559C16.3755 2.55031 16.5493 2.5964 16.681 2.66349L17.135 1.77248C16.8388 1.62159 16.5187 1.55868 16.1543 1.52891C15.7957 1.49961 15.3518 1.5 14.8 1.5V2.5ZM18.5 5.2C18.5 4.6482 18.5004 4.20428 18.4711 3.84569C18.4413 3.48126 18.3784 3.16117 18.2275 2.86502L17.3365 3.31901C17.4036 3.45069 17.4497 3.62454 17.4744 3.92712C17.4996 4.23554 17.5 4.6317 17.5 5.2H18.5ZM16.681 2.66349C16.9632 2.8073 17.1927 3.03677 17.3365 3.31901L18.2275 2.86502C17.9878 2.39462 17.6054 2.01217 17.135 1.77248L16.681 2.66349ZM9.2 1.5C8.6482 1.5 8.20428 1.49961 7.84569 1.52891C7.48126 1.55868 7.16117 1.62159 6.86502 1.77248L7.31901 2.66349C7.45069 2.5964 7.62454 2.55031 7.92712 2.52559C8.23554 2.50039 8.6317 2.5 9.2 2.5V1.5ZM6.5 5.2C6.5 4.6317 6.50039 4.23554 6.52559 3.92712C6.55031 3.62454 6.5964 3.45069 6.66349 3.31901L5.77248 2.86502C5.62159 3.16117 5.55868 3.48126 5.52891 3.84569C5.49961 4.20428 5.5 4.6482 5.5 5.2H6.5ZM6.86502 1.77248C6.39462 2.01217 6.01217 2.39462 5.77248 2.86502L6.66349 3.31901C6.8073 3.03677 7.03677 2.8073 7.31901 2.66349L6.86502 1.77248ZM11 5.5H13V4.5H11V5.5ZM21 11.5H12V12.5H21V11.5ZM19.3536 15.3536L21.2222 13.4849L20.5151 12.7778L18.6464 14.6464L19.3536 15.3536ZM21.2222 10.5151L19.3536 8.64645L18.6464 9.35355L20.5151 11.2222L21.2222 10.5151ZM21.2222 13.4849C21.4144 13.2928 21.58 13.1276 21.7046 12.9809C21.8329 12.8297 21.9468 12.6655 22.0124 12.4635L21.0613 12.1545C21.0527 12.1809 21.0305 12.2298 20.9423 12.3337C20.8503 12.4421 20.7189 12.574 20.5151 12.7778L21.2222 13.4849ZM20.5151 11.2222C20.7189 11.426 20.8503 11.5579 20.9422 11.6663C21.0305 11.7702 21.0527 11.8191 21.0613 11.8455L22.0124 11.5365C21.9468 11.3345 21.8329 11.1703 21.7046 11.0191C21.58 10.8724 21.4144 10.7072 21.2222 10.5151L20.5151 11.2222ZM22.0124 12.4635C22.1103 12.1623 22.1103 11.8377 22.0124 11.5365L21.0613 11.8455C21.0939 11.9459 21.0939 12.0541 21.0613 12.1545L22.0124 12.4635Z" fill="#637381" />
                    </svg>
                  </a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="login">
              <a href="login.php">Login </a>
            </li>
          <?php } ?>
        </div>
        <a href="Space_Details.php">
          <div class="btn"> <span>Add Listing </span></div>
        </a>
      </div>
    </div>
  </div>
  </div>
</header>
<script>
  function display_nav_right() {
    document.getElementById("nav_right").style.display = "block"
    document.getElementById("open").style.display = "none"
    document.getElementById("close").style.display = "block"
  }

  function close_nav_right() {
    document.getElementById("nav_right").style.display = "none"
    document.getElementById("open").style.display = "block"
    document.getElementById("close").style.display = "none"
  }
</script>