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



}
*{
            font-family: lato;
        }
        .footer {
            display: flex;
            flex-wrap: wrap;
            padding: 20px 40px 20px 30px;
            width: 98%;
            margin: 0 auto;
            justify-content: space-between;
        }

        .footer-section {
            flex: 1;
            margin: 10px;
            min-width: 200px;
        }
        .logo{
            flex: 1.6;
        }
        .footer-links{
            flex: 1.7;
        }
        .logo p{
            width: 80%;
        }
        .footer-section.logo img {
            max-width: 200px;

        }

        .footer-section h4 {
            margin-bottom: 20px;
            font-weight: 700;
        }

        .footer-section p,
        .footer-section ul,
        .footer-section form {
            margin: 0;
            padding: 0;
            text-align: justify;

        }

        .footer-contact p {
            display: flex;
            gap: 10px;
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

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 5px;
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

        .footer-links li {
            margin-bottom: 5px;
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

        .footer-section ul li a {
            text-decoration: none;
            color: #333;

        }

        .footer-section ul li a:hover {
            text-decoration: underline;
        }

        .footer-section .social-icons a {
            margin-right: 10px;
            color: #333;
            text-decoration: none;
            font-size: 20px;
        }

        .footer-section .social-icons a:hover {
            color: #007BFF;
        }

        .footer-section.newsletter input[type="email"] {
            padding: 10px;

          
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .footer-section.newsletter button {
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
            transition: all 0.4s ease;
        }

        .footer-section.newsletter button:hover {
            background-color: #4AE9E9;
            color: #222222;
        }
        .footer-links a{
            display: flex;
            gap: 10px;
        }
        @media (max-width: 1028px) {
            .logo p{
            width: 100%;
        }
        .footer{
            width: 100%;
            padding:5px 0;
        }
    }
        @media (max-width: 768px) {
            .footer-section {
                flex: 1 1 100%;
            }
        }

        @media (max-width: 480px) {
            .footer {
                flex-direction: column;

            }



            .footer-section.logo img {
                margin: 0 auto;
            }
        }
* {

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
margin:10px 0 0;
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

display: flex;
justify-content: space-evenly;
align-items: center;
gap:24px;
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

position: absolute;

padding: 20px;
gap: 30px;
top: 64px;
right: 0%;

max-width:100%;
width:100%;
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
gap: 30px;
}

.dropdown_display {
display: none;

position: absolute;
top: 39px;
right: 237px;
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

.dropdown:hover .dropdown-menu {
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
@media screen and (min-width:975px){
.open {
display: none !important;
cursor: pointer;
}

}
@media screen and (max-width:975px) {
.dropdown_listing {
display: none;
}
.logo_search .search_bar {
display: none;
}
.open {
display: block;
cursor: pointer;
}
}


@media screen and (max-width:680px) {




.header {
padding: 0 40px 0 20px;
}



}

header input[type=text] {
max-width:170px;
width: 100%;
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
.links a{
    width: 100%;
    display: flex;
    justify-content: start;
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


.trusted-by {
text-align: center;

margin:30px 0 50px;
}
.trusted-by span{
width: 100%;
display: flex;
<!-- flex-direction: column; -->
align-items: center;
justify-content: center;
flex-wrap: wrap;
margin-bottom: 20px;
gap:10px;


}
.trusted-by h2 {
font-size: 2em;
margin-bottom: 20px;
}

.logos {
display: flex;
justify-content: space-evenly;
flex-wrap: wrap;
gap: 20px;
width: 80%;
margin: 0 auto;
}

.logo-container {
display: flex;
align-items: center;
justify-content: center;
max-width: 200px;
max-height: 100px;
padding: 10px;

}

.logo-container img {
max-height: 100px;
width: auto;
max-width: 100%;
object-fit: contain;
transition: transform 0.5s ease;
}
.logo-container img:hover {
transform: scale(1.06);
}
@media (max-width: 600px) {
.logo-container {
max-width: 150px;
max-height: 75px;
}
.btn span {
    font-size: 11px;

}
.btn {
    padding:9px;
}
.logo-container img {
max-height: 75px;
}
.heading p{
font-size: 1.8rem;
}
.heading span{
font-size: 0.8rem;
}
}
#nav_right {
    position: absolute; /* Ensure nav_right is positioned absolutely */
    right: -10000px; /* Start off-screen */
    transition: right 0.5s ease-in-out; /* Animate the left property */
    /* Add other necessary styling */
    
}
@media (max-width: 980px) {
  #nav_right {
    right: -1000px; /* Move nav_right to the right */
    }
}
#open, #close {
    cursor: pointer;
}