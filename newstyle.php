<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
/* RESET */
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');

:root {
/========== Colors ==========/
/Color mode HSL(hue, saturation, lightness)/
--first-color: hsl(38, 92%, 58%);
--first-color-light: hsl(38, 100%, 78%);
--first-color-alt: hsl(32, 75%, 50%);
--second-color: hsl(195, 75%, 52%);
--dark-color: hsl(212, 40%, 12%);
--white-color: hsl(212, 4%, 95%);
--body-color: hsl(212, 42%, 15%);
--container-color: hsl(212, 42%, 20%);

/========== Font and typography ==========/
/.5rem = 8px | 1rem = 16px .../

--h2-font-size: 1.25rem;
--normal-font-size: 1rem;
}
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

ul {
list-style: none;
}

a {
text-decoration: none;
color: inherit;
}

button {
background: none;
border: none;
font: inherit;
color: inherit;
}
*{


font-family: Lato;
font-weight: 400;
}




.custom-popup-container {
display: flex;
flex-direction:row;
align-items: center;
justify-content: space-between;
max-width: 100%;
margin: 20px auto;
padding: 29px;
background-color: #ffffff;
padding-left: 3%;
border-radius: 10px;
}

.custom-popup-content {
width: 100%;
max-width: 800px;
}
.custom-popup-content h1{
color: var(--Text-color, #222);
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 600;
line-height: normal;
}

.custom-popup-heading,
.custom-popup-subheading,
.custom-popup-text {
margin-bottom: 2%;
color: #333;
}


.custom-popup-text {
color: #666;
color: var(--Text-color, #222);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 148%;
}

.custom-popup-img {
width: 100%;
max-width: 600px;
border-radius: 10px;
margin-top: 20px;
}

/* Existing styles remain the same */

/* New styles for the close button */

/* Desktop styles (unchanged) */
.main{

width: 100%;
height: 90vh;
flex-shrink: 0;
background: url('assets/img/landing.png');

background-color:black;
background-repeat:no-repeat;
background-size:cover;
background-position:center;

display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
}
@media (max-width: 768px) {
.main {
height:100vh;

}
.resent{

padding-left:0px!important;
padding-right:0px!important;
}
.city{
padding-left:0px!important;
padding-right:0px!important;
}
.wrapper i{
display:none;}

.heading {

font-size: 2rem;

}
.foter{
padding:0!important;
}
.popup-content {
font-size:20px!important;}
}
.center {
color: #FFF;
text-shadow: 0px 4px 8px rgba(26, 26, 26, 0.10);
font-family: Lato;
font-size: 3rem;
font-style: normal;
font-weight: 700;
line-height: 100%; /* 48px */
letter-spacing: 0.5px;
text-align: center;
margin:20px 0 0 0;
}

.center p {
padding:20px;
color: #FFF;
text-align: center;
text-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
-webkit-text-stroke-width: 0.5;
-webkit-text-stroke-color: #0B0B0B;
font-family: Lato;
font-size: 1.5rem;
font-style: normal;
font-weight: 300;
line-height: 140%; /* 33.6px */
}

.search{
display:flex;
justify-content:center;

}


.search-container {
display: flex;
background: #FFF;
justify-content: space-between;
border-radius:6px;
align-items: center;
width: 675px;
height: 64px;
padding: 6px 6px 3px 6px;
box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.8);

}


.search-input {
width:180px;

margin:20px 24px 20px 20px;
border:none;
color: #303131;
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 500;
line-height: 100%; /* 20px */
letter-spacing: 0.5px;
}

.search-input option{
width:24px;
height:24px;
}

/* Style for the dropdown container */


.hr{

height:35px
}
/* Style for the dropdown arrow */


/* Style for the dropdown options */

/* Style for the dropdown when it's open */


/* Style for the dropdown options when hovered */

.block{
display:none;
}



/* Media query for smaller screens */
@media (max-width: 740px) {
.center {
color: #FFF;
text-shadow: 0px 4px 8px rgba(26, 26, 26, 0.10);
font-family: Lato;
font-size: 1.5rem;
font-style: normal;
font-weight: 700;
line-height: 100%; /* 48px */
letter-spacing: 0.5px;
text-align: center;
}

.center p {
padding:20px;
color: #FFF;
text-align: center;
text-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
-webkit-text-stroke-width: 0.5;
-webkit-text-stroke-color: #0B0B0B;
font-family: Lato;
font-size: 0.9rem;
font-style: normal;
font-weight: 300;
line-height: 140%; /* 33.6px */
}
.search-container {
flex-direction: column;
width: 100%;

}
.search-container{
align-items: end;


background: none;

border: 0;
box-shadow: none;

}
.search-round{
display:none;
}
.block{
display:block;
}
.hr{
display:none;
}

.search-input,
.search-button {
appearence:none;
width: 35vh;
height: 42px!important;
padding:11px 5px ;
margin: 8px;
font-size: 13px;
border-radius: 6px;
box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.8);
}
}

.right{


margin: 13px 0;
font-size: 1rem;

box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.8);
}
/* Add additional styles as needed */

/* resent */
.resent{

padding-left:20px;
padding-right:20px;
}
/* Your existing CSS styles */
.unique-container {
width: 90%;
margin:0 auto;
}

.card_slider {
display: flex;
justify-content: center;
align-items: center;
width: 90%;

}

.swiper-slide {
display: flex;
justify-content: center;
/* Center-align slides */
}

.card {
width: 260px;
border-radius: 8px;
background: #fff;
border: 1px solid #EEEEEE;
margin-bottom: 50px;
transition: 0.3s;
cursor: pointer;
transition:all 0.5s ease;
}

.card-header img {
border-radius: 8px 8px 0px 0px;
width: 100%;
height:190px;
}

.card-body {
padding: 10px 20px;
text-align: justify;
font-size: 18px;
}

.card-body h2 {
font-size:16px; padding:2px;
color:#222222;
}
.card-body p{
padding:2px;
font-size:14px;
color:#717579;
}
.card:hover {
transform: scale(1.00199);
box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.25);
}
.swiper-wrapper{
margin-bottom:30px;
}
/* cityr */
.city_card_slider {
display: flex;
justify-content: center;
align-items: center;
width: 90%;

}
.city_card{
width:220px;
height:253px;
border-radius:6px;
transition: 0.3s;
cursor: pointer;
border:2px solid #EEEEEE;
}
.city-card-body {
display:flex;
justify-content:center;
align-items:center;
}
.city-card-header img {

border-radius: 8px 8px 0px 0px;
width: 100%;
height:190px;
}
.city-card-body h2 {

font-size:16px;
font-weight:600;
padding:20px;
color:#222222;
}
.city_card:hover {
transform: scale(1.00199);
box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.25);
}
@media screen and (max-width: 767px) {
.city_card{
width:85%;
height:253px;
border-radius:6px;
transition: 0.3s;
cursor: pointer;
border:2px solid #EEEEEE;
}
}
/* Testimonials */

.Testimonials{
height: 55vh;

}
.testimonial-wrapper {
display: flex;
flex-wrap: wrap;
justify-content: center;
gap: 20px;
padding: 3% 0;
}

.testimonial-card {
background-color: #ffffff;
border-radius: 10px;
padding: 20px;
width: 300px;
height: 35vh;
box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
}

.thumbnail-area {
width: 80px;
height: 80px;
overflow: hidden;
border-radius: 50%;
margin-right: 25px;
}

.thumbnail-area img {
width: 100%;
}

.card-header {
display: flex;
align-items: center;

}

.user-info h4 {
margin: 0;
font-size: 26px;
font-weight: 600;
}

.user-info p {
margin: 5px 0 0;
font-size: 14px;
font-weight: 400;
color: #666;
}

.user-review p {
margin: 0;
font-size: 18px;
font-weight: 400;
line-height: 1.7;
color: #333;
}

.card-footer {
display: flex;
justify-content: space-between;
align-items: center;
margin-top: 10px;
font-size: 14px;
color: #666;
}

.user-rating {
display: flex;
}

.user-rating span {
color: #000;
font-size: 18px;
}

.user-rating span.active {
color: #fbc02d;
}

@media screen and (max-width: 767px) {
.testimonial-wrapper {
flex-direction: column;
align-items: center;
}

.testimonial-card {
width: 85%;
}
}



/* content */
content {
display: flex;
flex-direction: column;
align-items: center;
text-align: center;
color: #a4a3a3;
font-size: 30px;
font-family: Lato;
font-weight: 400;
}

h4 {
margin: 0; /* Remove default margin to prevent unwanted spacing */
}

button {
margin-top: 0px; /* Adjust the top margin for spacing between the h4 and buttons */
}


/* end */
/* Default styles */

.end {

display: flex;
width: 100%;

flex-direction: column;
justify-content: center;
align-items: center;
gap: 40px;
}
.button-container{

}


.btn1{
border-radius: 31px;
border: 1px solid rgba(41, 177, 229, 0.40);
background: var(--Brand-color, #031B64);
padding: 7px;
justify-content: center;
align-items: flex-end;
gap: 8px;
width: 93%;
color: #F9F9F9;
font-family: Lato;
font-size: 19px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
}
.btn span{
color: #F9F9F9;
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.text{

color: #ADACAC;
text-align: center;
font-family: Lato;
font-size: 36px;
font-style: normal;
font-weight: 600;
line-height: normal;
letter-spacing: 0.36px;
}

.button-container {
width:60%;
display:flex;
flex-direction:coloum;
justify-content:space-around;
}
.button-container span{
color: #F9F9F9;
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.popup-wrapper {
max-width: 900px;
margin: 50px auto;
background-color: #fff;
padding: 10px;
text-align: center;

}

.popup-content {
color: #222222;
text-align: center;
font-family: Lato;
font-size: 32px;
font-style: normal;
font-weight: 500;
line-height: normal;
letter-spacing: 0.32px;
}

.popup-actions {
padding:20px;
display: flex;
justify-content: center;
column-gap: 50px;
width:100%;
}

.popup-button {
display: flex;
padding: 16px;
justify-content: center;
align-items: flex-end;
gap: 8px;
border-radius: 6px;
background: var(--Brand-color, #031B64);
}
.popup-button span{
color: #F9F9F9;
font-family: Lato;
font-size: 1rem;
font-style: normal;
font-weight: 400;
line-height: normal;
}

.popup-button:hover {
background-color: #2980b9;
}

@media (max-width: 768px) {
.popup-wrapper {
max-width: 90%;
}
}


/* Responsive styles */

@media screen and (max-width: 768px) {
.Testimonials {
height: 82vh;}
.end{
margin-top: 10%;
}
.card__data{
font-size: 18px;
height: 30vh;
}
.end{
padding:0%;
}

.button-container button{
width: 10%;
}

.button-container button {
width: 100%; /* Make buttons take full width on smaller screens */
}
}


/* how it works */




/* FAQS */


.rightside {
width: 48%;
box-sizing: border-box;
margin-top: 3%;
height: 62vh;
}

.image-text-container {
background-color: #fff;
border-radius: 10px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
padding: 20px;
}

.image-text-item {
display: flex;
align-items: center;
margin-bottom: 10px;
}

.image-container {
width: 35%;
margin-right: 10px;
}

.image-container img {
width: 100%;
height: 100%;

}

.text-container {
font-size: 16px;
color: #333;
}

.line {
width: 80%;
height: 2px;
background-color: #ccc;
margin-top: 10px;
margin-bottom: 10px;
}
@media screen and (max-width: 768px) {


.image-container {
width: 50%;
margin-bottom: 10px;
}
.rightside {
width: 100%;
margin-bottom: 70px; /* Adjust the margin as needed */
}


}

.active{
font-weight:bolder;
color: #ff5757;
}


.contact {
margin: 0 auto;
width: 80%;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a box shadow */
}

.title {
padding: 30px;
padding-bottom: 10px;
color: #222;
font-family: Lato;
font-size: 2.25rem;
font-style: normal;
font-weight: 700;
line-height: normal;
}

.title-below {
color: #222;
font-family: Lato;
font-size: 1rem;
font-style: normal;
font-weight: 400;
line-height: 100%;
/* 16px */
}

.info {
padding: 50px;
display: inline-flex;
flex-direction: row;
justify-content: space-between;
align-items: center;
gap: 48px;
color: #222;
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 600;
line-height: 100%;

letter-spacing: 0.48px;
}
/* Responsive styles for smaller screens */
@media screen and (max-width: 768px) {
.title {
font-size: 1.5rem;
padding: 20px;
}

.title-below {
font-size: 0.9rem;
}

.info {
padding: 30px;
text-align: center;
flex-direction: column;
align-items: center;
gap: 20px;
}
}


.types-card{
display: flex;
justify-content: center;
width:100%;
height:auto;
display: flex;
flex-direction: row;
justify-content: center;
flex-flow: wrap;
column-gap: 45px;
row-gap: 30px;
}

.types-card .ty-cards{
width: 38.17%;
display: flex;


height: 310px;
flex-direction: row;
}
.types-card .ty-cards span{
font-size: 2rem;
font-weight: bolder;
font: Lato;
color:#fdfdfd;
text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.type1{
background-image: url('assets/img/lptypes1.jpg');
background-position: center;
background-size: cover;
display: flex;
align-items: center;
justify-content: center;
cursor:pointer;


}
.type2{
background-image: url('assets/img/lptypes2.png');
background-position: center;
background-size: cover;
display: flex;
align-items: center;
justify-content: center;

cursor:pointer;

}
.type3{
background-image: url('assets/img/lptypes3.png');
cursor:pointer;

background-position: center;
background-size: cover;
display: flex;
align-items: center;
justify-content: center;

}
.type4{
background-image: url('assets/img/lptypes4.png');
cursor:pointer;

background-position: center;
background-size: cover;
display: flex;
align-items: center;
justify-content: center;

}

@media screen and (max-width: 1250px){
.types-card .ty-cards{
width: 38%;
display: flex;


height: 310px;
flex-direction: row;
}
}
@media screen and (max-width: 1050px){
.types-card .ty-cards{
width: 38.17%;
display: flex;


height: 310px;
flex-direction: row;
}
}

@media screen and (max-width: 768px){
.types-card .ty-cards {
width: 70%;
height: 212px;
}
}
.dropbtn-location,
.dropbtn-type {
width: 100%;
padding: 16px;
font-size: 16px;
border: none;
border-radius: 4px;
box-sizing: border-box;
cursor: text;

}
input::placeholder{
      color:#222222;
    }
.custom-arrow {
position: absolute;
top: 19%;
right: 25px;

pointer-events: none; /* Ensures arrow doesn't interfere with select input */
}
.custom-dropdown-location,
.custom-dropdown-type {
position: relative;
display: inline-block;


}

.dropdown-content-location,
.dropdown-content-type {
display: none;
position: absolute;
background-color: #ffffff;
box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
z-index: 1;
width: 100%;
box-sizing: border-box;
border-radius: 4px;
margin-top: 8px;
max-height: 300px;
overflow-y: auto;
}

.dropdown-content-location .dropdown-item-location,
.dropdown-content-type .dropdown-item-type {
color: black;
padding: 8px 12px;
text-decoration: none;
display: block;
transition: background-color 0.3s ease;
cursor: pointer;
}

.dropdown-content-location .dropdown-item-location:hover,
.dropdown-content-type .dropdown-item-type:hover {
background-color: #ddd;
}

.show {
display: block;
}


@media screen and (max-width:600px) {
.custom-dropdown-location, .custom-dropdown-type{
margin-bottom: 10px;
width: 100%;

}
.custom-dropdown-duration{
width: 100%;

}
.search{
width: 70%;
}
.logos{
flex-direction:column;
align-items:center;
}
.dropbtn-location, .dropbtn-type{
padding:10px;
box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.8);
}

}
.custom-dropdown-duration {
position: relative;
display: inline-block;
width: 200px;
}

input:focus {
outline: none;
}

.dropbtn-duration {
width: 100%;
padding: 10px;
font-size: 16px;
border: none;
cursor: pointer;

appearance: none;
-webkit-appearance: none;
-moz-appearance: none;

background-size: 12px;
}

.dropdown-content-duration {
display: none;
position: absolute;
background-color: #f9f9f9;
width: 100%;
box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
z-index: 1;
}

.dropdown-content-duration .dropdown-item-duration {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
cursor: pointer;
}

.dropdown-content-duration .dropdown-item-duration:hover {
background-color: #f1f1f1;
}

.show-duration {
display: block;
}
@media screen and (max-width:598px){
.custom-dropdown-duration{
width:100%;
background-color:#ffffff;
padding:auto;
border-radius:4px;
}
.dropbtn-duration{
padding:10px;
}
.custom-arrow {

top: 19%;
right: 15px;

pointer-events: none; /* Ensures arrow doesn't interfere with select input */
}

}