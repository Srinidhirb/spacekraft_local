<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>/*
* Prefixed by https://autoprefixer.github.io
* PostCSS: v8.4.14,
* Autoprefixer: v10.4.7
* Browsers: last 4 version
*/


@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap') format('woff2'); /* WOFF2 format */
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap') format('woff'); /* WOFF format */
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap') format('truetype'); /* TTF format */
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');
.nav__link.active1 {
color: #031B64!important;
font-weight:1000!important;
}
body {

font-family: 'Lato', sans-serif;

}

* {
font-family: 'Lato', sans-serif;
}
a{
text-decoration: none;
color: inherit;
}

ul{
list-style: none;
padding:0;
margin: 4px 0;
}
/* NORMAL STYLES */

.heading{
text-align: center;
padding:64px 0 40px 0px ;
}
.nav-flex{
display:flex;
align-items:center;
}
.heading span{


color: #717579;
font-family: Lato;
font-size: 1rem;
font-style: normal;
font-weight: 500;
line-height: normal;

}
.heading p{

color: #131313;
font-family: Lato;
font-size: 2.5rem;
font-style: normal;
font-weight: 500;
line-height: normal;
text-align: center;
}






.btn {
border:none;
color: #fff;
background-color: #031B64;
padding: 16px 24px;
border-radius:6px;
text-transform: capitalize;
font-size: 1rem;
font-weight: 500;
cursor: pointer;
-webkit-transition: all 0.2s;
-o-transition: all 0.2s;
transition: all 0.2s;
width:auto;
}
.submit-button1 {
padding: 10px 20px;
background-color: #031B64;
color: #fff;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
/* Initially hide the button */
}
.submit-button1:hover {
color:#222222;
background-color: #4AE9E9;
}

.btn:hover {
color:#222222!important;
background-color: #4AE9E9;
}



@media (max-width: 891px) {

.btn {
width:auto;
font-size: 0.688rem;

}



}





.size{
height: 10vh;
}



footer {
width: 93%;
padding: 0 40px 0px 30px;
height:184px;
margin:10px auto;

}

.footer {
display: flex;
flex-direction: row;
justify-content: space-between;

margin: 10px;
flex-wrap: wrap;
}

.first-div {

width: 480px;
display: flex;
flex-direction: row;
justify-content: space-between;
align-items: center;
flex-wrap: wrap;
height: 163px;
}

.sec-div {
width: 510px;

height:209px;
display: flex;
flex-direction: row;
justify-content: space-between;
align-items: center;
flex-wrap: wrap;
}

.f-details {
width: 300px;

display: flex;
flex-direction: column;
flex-wrap: wrap;

height: 163px;
}

.helpfull {
width: 140px;
display: flex;
flex-direction: column;


height: 163px;
}

.f-contact {
width: 261px;
height:209px;

}

.news {
width: 169px;
height:209px;

}

.f-details img {
width: 224px;
height: 31px;
margin: 0px 0px 8px 0px;
}

.f-details span {
display: block;
width: 264px;
color: #222222;
font-family: Arimo;
font-size: 14px;
font-weight: 400;
line-height: 19.6px;
text-align: justify;

}

.footer-heading {
display: flex;
flex-direction: row;

align-items: center;
font-family: Lato;
font-size: 18px;
font-weight: 700;
line-height: 19.8px;
text-align: left;
color: #222222;
margin: 0px 0 0px 0;1
}

footer li {
display: flex;
flex-direction: row;
align-items: center;
list-style-type: none;
margin: 16px 0px;
font-family: Lato;
font-size: 1rem;
font-weight: 500;
line-height: 16px;
text-align: left;
color: #222222;
}

footer li svg {
margin: 0 10px 0 0px;
}

.sub_button {

width: 71px;
height: 29px;
border: none;
padding: 6px 14px;
border-radius: 6px;
color: white;
font: Lato;
display: flex;
font-weight: 500;
background-color: #031B64;
justify-content: center;
align-items: center;

}

.sub_button:hover {
background-color: #4AE9E9;
color: #222222;
}
@media screen and (max-width: 1380px) {
footer{
width:100%
}
}
@media screen and (max-width: 1080px) {
footer{
padding:0;
}
.footer{
margin:0;
}
}
@media screen and (max-width: 768px) {

.first-div,.f-contact {
height:auto;
}
.f-details,.helpfull{
height:143px;
}
.footer{
padding:0 20px ;
}
}

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
    height: auto;
    margin: 0;
    border: none;
    background-color: #F4F1F1;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
  }

  
  .search_bar_input {
    

    gap: 20px;
    position: absolute;
    top: 100%;
    right: -100%;
    width: 100%;
    background-color: #F4F1F1;
    transition: right 0.4s ease-in-out;
  }

  .search_bar_input.visible {
    display: flex;

  }

  #find_button {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .mobile_search {
    display: flex;
    gap: 15px;
    align-items: center;
    justify-content: center;
  }

  .mobile_search form {
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: center;
  }

  .nav_flex .links {
    display: flex;
    flex-direction: column;
    align-items: start;
    gap: 28px;
  }

  .nav_flex .login li {
    justify-content: start;
  }

  .nav_flex .btn {
    width: 130px;
    text-align: center;
  }
  .quick_search{
    padding: 10px;
    display: flex;
    align-items: center;
    gap: 20px;
    justify-content: center;
    width: 100%;
    height: 50px;
  }
  .btn_flex{
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: center;
  }
  .quick_search span{
    font-size: 1rem;
    color: #000000;
    font-weight: bold;
  }