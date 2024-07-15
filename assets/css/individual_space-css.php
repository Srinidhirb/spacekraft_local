<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>

body {

margin: 0;
padding: 0;
}

* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

.gallery-container {
display: flex;
flex-wrap: wrap;
width: 100%;
max-width: 1250px;

justify-content: center;
gap: 10px;
padding: 20px;
margin: 57px auto 0 auto;
}

.large-image {
max-width: 870px;
width: 100%;


}

.large-image img {
width: 100%;
max-height: 500px;
height: 100%;
}


.small-images img {
width: 100%;
max-height: 250px;
height: 100%;
border-radius: 4px;
border: 1px solid #ccc;
}



.small-images {
max-width: 309px;
width: 100%;

display: flex;
flex-direction: column;
gap: 10px;
}



.absolute {
position: absolute;
top: 16px;
left: 16px;
}


.container {

display: flex;
/* flex-wrap: wrap; */

justify-content: space-between;
gap: 10px;

max-width: 1195px;
margin: 0 auto;
}

.left-section {
flex: 3;

}

.space_name {
font-weight: 600;
font-size: 30px;
margin: 0;
margin: 0 0 8px 0;
}

.right-section {
flex: 0;

background-color: #fff;
border-radius: 8px;

}

.address {
display: flex;
gap: 6px;
font-weight: 600;
font-size: 1rem;
color: #6A6E7A;
}

.details {
display: flex;
align-items: center;
gap: 10px;
margin: 18px 0;
color: #4A494B;
}

.details span {
display: flex;
align-items: center;
gap: 8px;
color: #4A494B;
}

.hr {
border: none;
border-top: 1px solid #E9EBEF;
margin: 20px 0 !important;
}

.space-use {
display: flex;
gap: 20px;
margin: 20px 0;
}

.space-item {
display: flex;
flex-direction: column;
align-items: center;
}

.space-item p {
margin-top: 5px;
color: #555;
}


@media (max-width: 768px) {
.container {
flex-direction: column;
}

.right-section {
margin-top: 20px;
}
}

.amenities-section,
.similar-spaces-section {
margin-bottom: 30px;
}

.amenities-section h2,
.similar-spaces-section h2 {
margin-bottom: 15px;
font-size: 1.5em;
}

.amenities-list {
display: flex;
flex-wrap: wrap;
gap: 10px;
}

.amenity-item {
padding: 5px 10px;
background-color: #f0f0f0;
border-radius: 4px;
}

.amenity-item.checked {
font-weight: bold;
}

.similar-spaces-list {
display: flex;
gap: 20px;

}

.space-item {
background-color: #fff;
border: 1px solid #ddd;
border-radius: 8px;
overflow: hidden;
width: 100%;
max-width: 256px;
height: 100%;
cursor: pointer;

}

.similar_img {
height: 180px;
width: 100%;
}

.space-item img {
width: 100%;


object-fit: fill;

}

.similar_info {
display: flex;
flex-direction: column;

width: 100%;
padding: 12px 8px;
align-items: start;
justify-content: start;
}

.similar_info h3 {
font-size: 1rem;
color: #222222;
font-weight: 600;
}

@media (max-width: 768px) {
.space-item {
width: calc(50% - 20px);
}
}

@media (max-width: 480px) {
.space-item {
width: 100%;
}
}

.space_name_share_button {
display: flex;
justify-content: space-between;
align-items: center;
width: 100%;
gap:15px;
flex-wrap: wrap;
margin: 0 0 10px 0;
}

.share {
background-color: #ffffff;
border: none;
cursor: pointer;
}

.share:hover {
transform: scale(1.1);
}

.avai_amin span {
font-family: Lato;
font-weight: 600;
font-size: 20px;


line-height: 28.8px;
text-align: left;
color: #222222;
/* margin: 0px 0 0 40px; */
}

.avai_amin table td {

padding: 16px 48px 16px 0px;

}


.svg_amei {
display: flex;
align-items: center;

}

.svg_amei .svg svg {
margin: 0 0px 0 15px;
}

.amei_disabled {
color: #9A9A9A;

}

.amei {
display: flex;
align-items: center;

}

@media screen and (max-width: 576px) {
table.responsive-table tr {
display: block;

}

table.responsive-table tr:last-child {
margin-bottom: 0;
}

table.responsive-table td {
display: inline-block;

box-sizing: border-box;

vertical-align: top;
}

.svg_amei {
margin-bottom: 10px;
/* Add spacing between rows */
}
}

.price_box {
width: 342px;
height: 158px;
border: 1px solid #333333;
border-radius: 6px;
display: flex;
flex-direction: column;
justify-content: center;
row-gap: 40px;
align-items: center;
}

.price_text {
font-family: Lato;
font-size: 18px;
font-weight: 400;
line-height: 21.6px;
letter-spacing: 0.5px;
text-align: left;
text-align: left;
color: #222222;
}

.price_btn {
width: 292px;
margin: 0 20px;

}

.price_btn button {
padding: 10px 16px 10px 16px;
width: 100%;
border-radius: 4px;
text-align: center;
background-color: #031B64;
border: none;
color: #ffffff;
font-family: Lato;
font-size: 16px;
font-weight: 400;
line-height: 19.2px;
cursor: pointer;

}

.about {
margin: 18px 0 0 0;
display: flex;
flex-direction: column;
gap: 16px;
}

.content-container {
display: flex;
flex-direction: column;
gap: 10px;
}

.abt {
font-weight: 600;
font-size: 20px;
color: #222222;
}

.about p {
font-size: 1rem;
color: #4A494B;

}

#read-more {
margin: 4px 0 0 0;
cursor: pointer;
text-decoration: underline;
}

.enquiry-container {
border: 1px solid #999999;
border-radius: 5px;
padding: 20px;
max-width:314px;
width: 100%;
height: 210px;
font-family: Arial, sans-serif;
}

.enquiry-container p {
margin: 0 0 12px;
font-size: 20px;

}

.enquiry-container h1 {
margin: 0 0 16px;
font-size: 18px;
font-weight: 400;
}


.enquiry-button {
width: 100%;
padding: 10px;
background-color: #002366;
color: #fff;
border: none;
border-radius: 5px;
cursor: pointer;
font-size: 16px;
margin: 8px 0;
transition: all 0.4s ease-in-out;
}

.enquiry-button:hover {
background-color: #4AE9E9;
color: #222222;
}

.date-range {
display: flex;
align-items: center;
justify-content: center;
border: 1px solid #ccc;
border-radius: 5px;
padding: 0 8px;
margin: 8px 0;
box-sizing: border-box;
}

.date-input {
border: none;
outline: none;
font-size: 14px;
padding: 0 0 0 20px;
color: #999999;
background: none;
width: 120px;
height: 40px;
}

.date-input::placeholder {
color: #999999;
font-size: 14px;

}

.separator {
margin: 0 10px;
color: #999999;
}

.favorites-button {
display: flex;
align-items: center;
border: 1px solid #D1D5DB;
border-radius: 5px;
padding: 4px 8px;
gap: 6px;
cursor: pointer;


text-decoration: none;
transition: background-color 0.3s, border-color 0.3s;
}

.favorites-button:hover {
background-color: #f5f5f5;
border-color: #bbb;
}

.favorites-button span {
font-size: 14px;
color: #222222;
}


.share_fav {
display: flex;
gap: 16px;
align-items: center;
}

@media (max-width: 1238px) {
.large-image {
max-width: 770px;
width: 100%;


}

.container {
max-width: 1080px;
}
}

@media (max-width: 1138px) {
.large-image {
max-width: 670px;
width: 100%;


}

.container {
max-width: 980px;
}
}

@media (max-width: 1038px) {
.large-image {
max-width: 570px;
width: 100%;


}


}

@media (max-width: 938px) {
.large-image {
padding: 0 20px;
width: 100%;
max-width: 900px;


}

.container {
max-width: 880px;
width: 100%;
padding: 0 20px;
}

.small-images {
flex-direction: row;
}

.gallery-container {
justify-content: start;
}
}

@media (max-width: 768px) {
.gallery-container {
flex-direction: column;
}

.avai_amin table td {
padding: 16px 16px 10px 0px;
}

.large-image,
.small-images {
flex: 1;
}

.small-images {
flex-direction: row;
}

.small-images img {
width: 50%;
}
}



.loader {
display: flex;
justify-content: center;
align-items: center;

height: 100vh;
font-size: 3rem;
font-family: sans-serif;
font-variant: small-caps;
font-weight: 900;
background: conic-gradient(#FE983B 0 25%,
#031B64 25% 50%,
#4AE9E9 50% 75%,
#FE983B 75%);
background-size: 200% 200%;
animation: animateBackground 4.5s ease-in-out infinite;
color: transparent;
background-clip: text;
-webkit-background-clip: text;
}

@keyframes animateBackground {
25% {
background-position: 0 100%;
}

50% {
background-position: 100% 100%;
}

75% {
background-position: 100% 0%;
}

100% {
background-position: 0 0;
}
}

@media screen and (max-width:1141px){
.left-section {
flex: 0.5;

}
.enquiry-container{
max-width:280px;
}
}
@media screen and (max-width:1038px){
.left-section {
flex: 3;

}
}
@media screen and (max-width:508px){
.share_fav {
width:100%;
justify-content:end;
}
}
@media screen and (min-width:950px) {
.swiper {
width: 100%;
height: 100%;
}

.swiper-slide {
text-align: center;
font-size: 18px;

display: flex;
justify-content: center;
align-items: center;
}

.swiper-slide img {
display: block;
width: 100%;
height: 100%;
object-fit: fill;
}



.swiper {
width: 100%;
height: 300px;
margin-left: auto;
margin-right: auto;
}

.swiper-slide {
background-size: cover;
background-position: center;
}

.mySwiper2 {
height: 70%;
width: 100%;
}

.mySwiper {
height: 20%;
box-sizing: border-box;
padding: 10px 0;
}

.mySwiper .swiper-slide {
width: 25%;
height: 100%;
opacity: 0.4;
}

.mySwiper .swiper-slide-thumb-active {
opacity: 1;
}

.swiper-slide img {
display: block;
width: 100%;
height: 100%;

}
}

.image {
max-width: 1100px;
transition: all 0.9s ease-in-out !important;
width: 100%;
height: 100vh;
display: flex;
flex-direction: column;
justify-content: center;
margin: 0 auto;
z-index: 1000000;
}

.more_image {
position: fixed;
top: 0;
background: rgba(0, 0, 0, 0.75);
box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
backdrop-filter: blur(16px);
-webkit-backdrop-filter: blur(16px);
border-radius: 10px;
border: 1px solid rgba(255, 255, 255, 0.18);
width: 100%;
margin: 0 auto;
z-index: 1000000;
transition: all 0.5s ease-in-out !important;

}

@media screen and (max-width:1200px) {
.image {
max-width: 1000px;
}
}

.mobile_image_gallary {
display: none;
}

@media screen and (max-width:938px) {
.mobile_image_gallary {
display: flex;
}

.gallery-container {
display: none;
}

}
@media screen and (max-width:950px) {
.swiper {
width: 714px;
height: 430px;

margin: 5px;
}

.swiper img {
width: 100%;
height: 430px;

}

.image_details {
display: flex;
column-gap: 40px;

}

}


.absolute-container {
position: relative;
width: auto;
/* Adjust as needed */
height: 100%;
/* Adjust as needed */
cursor: pointer;
display: flex;
justify-content: center;
align-items: center;

}

.absolute-container img {
filter: brightness(0.5);
}


.absolute-container svg {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

.more_img_close_icon {
position: absolute;
top: 20px;
right: 20px;
cursor: pointer;
z-index: 99999999999999999;
}

.contain img {
object-fit: contain;
background-color: transparent;
}

.pricing-enquiry-container {
padding: 5px 10px;
background: #ffffff;

display: flex;
box-shadow: 14px 1px 50px rgba(0, 0, 0, 0.1);
justify-content: space-evenly;
align-items: center;
width: 100%;

}

.pricing-enquiry-container p {
margin: 0;
font-size: 16px;
color: #333;
}

.pricing-enquiry-container h1 {

font-size: 18px;
color: #333;
}

.date-picker-range {
display: flex;
align-items: center;

}

.date-picker-input {
padding: 10px;
border: 1px solid #ccc;
border-radius: 4px;

flex: 1;
width: 100%;
}

.date-picker-separator {
display: flex;
align-items: center;
margin: 0 10px;
}

.submit-enquiry-button {
padding: 10px 20px;
background-color: #007BFF;
color: #fff;
border: none;
border-radius: 4px;
cursor: pointer;
transition: background-color 0.3s ease;
}

.submit-enquiry-button:hover {
background-color: #0056b3;
}








@media screen and (max-width:1038px) {




footer{
margin: 0 0 60px 0 !important;
}

}
@media screen and (max-width:600px) {
.similar-spaces-list {
flex-direction: column;
}
.lap{
display: none;
}
.space-item {
max-width: 80%;
margin: 0 auto;
}
.pricing-enquiry-container {
flex-direction: column;
align-items: start;
gap: 10px;
padding: 20px 10px;

}
.pricing-enquiry-title{
display: flex;
gap: 10px;
}
}
#mobile_share{
display: none;
}
.large-image {
position: relative;
}

#premium {
position: absolute;
top: 0;
left: 0;
}

#verified {
position: absolute;
bottom: 10px;
right: 200px;
}

#managed {
position: absolute;
bottom: 12px;
right: 10px;
width: 20%;
height: 30px;

}

#managed img {
border-radius: 6px;
}

.initial-image {
margin-bottom: 10px;
width: 90%;
height: auto;
}

.listing-image {
width: 100%;
height: 100%;
}

/* Button to view all photos */
#viewAllPhotosButton {

width: 90%;
text-align: right;
display: flex;
align-items: center;
justify-content: flex-end;

border-radius: 5px;
padding: 4px 8px;
gap: 6px;
cursor: pointer;
padding: 0 0 10px 0;
position: relative;
transition: background-color 0.3s, border-color 0.3s;
}

#viewAllPhotosButton::after {
content: '';
position: absolute;
right: 0;
bottom: 0;
height: 2px;
background-color: currentColor;
width: 111px;
}

/* Modal styling */
.modal {
display: none;
/* Hidden by default */
position: fixed;
/* Stay in place */
z-index: 1;
/* Sit on top */
left: 0;
top: 0;
width: 100%;
height: 100%;
overflow: auto;
/* Enable scroll if needed */
background-color: rgb(0, 0, 0);
/* Fallback color */
background-color: rgba(0, 0, 0, 0.4);
/* Black w/ opacity */
}

.modal-content {
background-color: #fefefe;
margin: 15% auto;
/* 15% from the top and centered */
padding: 30px;
border: 1px solid #888;
width: 90%;
background: rgba( 255, 255, 255, 0.55 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 6.5px );
-webkit-backdrop-filter: blur( 6.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
/* Could be more or less, depending on screen size */
}

.close_gallary {
position: fixed;
top: 5px;
right: 10px;
color: #222222;
float: right;
font-size: 28px;
font-weight: bold;
}

.close_gallary:hover,
.close_gallary:focus {
color: black;
text-decoration: none;
cursor: pointer;
}

/* Gallery styling inside modal */
.gallery {
position:relative;
display: flex;
flex-direction: column;
/* Display images one below the other */
gap: 10px;
/* Space between images */
}

.gallery-item {
width: 100%;
/* Full width */
box-sizing: border-box;
}

.gallery-item img {
width: 100%;
height: auto;
display: block;
}

.mobile_image_gallary {

align-items: center;
justify-content: center;
flex-direction: column;
margin: 70px 0 20px 0;

}

@media screen and (max-width:500px){
#mobile_share{
display:flex;
}
}
@media (min-width: 600px) {
.enquiry-container.sticky {
    position: -webkit-sticky; 
    position: sticky;
    top: 10%;
    left: 0;

    background-color:white;
}
}
@media (max-width: 600px) {
    .enquiry-container {
        max-width: 100%; /* Make sure it takes the full width */
        left: 0; /* Align to the left */
        padding: 10px; /* Adjust padding */
        box-shadow: none; /* Remove shadow for a simpler look */
        background-color:white;
        height:auto;
    }

    .enquiry-container.sticky {
        bottom: 5px;
         /* Adjust the top position if needed */
        left: 0;
        position: -webkit-sticky; 
        position: fixed;
      
        width: 100%; /* Ensure it remains full width */
    }

    /* Additional adjustments for mobile responsiveness */
    .date-range {
        display: flex;
       
        gap: 10px;
    }

    .date-input {
        width: 100%; /* Ensure date inputs are full width */
    }

    #send-enquiry-btn {
        width: 100%; /* Make the button full width */
    }
}