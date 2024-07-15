<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>

* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

/* General styling */
body,
html {
margin: 0;
padding: 0;

box-sizing: border-box;
}

.host_section {
display: flex;
gap: 64px;
flex-direction: column;
margin-bottom:40px;
}

/* Host header styling */
.host_header {

margin: 120px auto 0;
max-width: 1200px;
width: 100%;
padding: 0 20px;
}

.host_header h1 {
font-size: 1.9rem;
font-weight: bold;
margin-bottom: 40px;
}

.host_header span {
font-size: 1.4rem;
color: #222222;
}

.host_header span b {
text-transform: capitalize;
font-size: 24px;
color: #031B64;

}

/* Flexbox container for host section */
.host_flex {
display: flex;
flex-wrap: wrap;
justify-content: center;
align-items: center;

max-width: 1200px;
width: 100%;
margin: 0 auto;
position: relative;
}

.host_right {
flex: 1;

max-width: 622px;

}

.host_right span {
position: absolute;
top: 20%;
left: 0%;
font-size: 60px;
font-weight: bold;
display: block;

}

.host_right p {
margin-top: 15%;
font-size: 24PX;
color: #8B8B8B;
}

.host_left {
flex: 1;

max-width: 600px;
}

.host_left img {
max-width: 620px;
max-height: 600px;
width: 100%;
height: 100%;
height: auto;
border-radius: 10px;
}

/* Host black background section */
.host_black_bg {
background-color: #222222;
color: #fff;


display: flex;
padding: 80px 30px;
flex-wrap: wrap;
gap: 87px;
justify-content: center;

}

.host_black_left,
.host_black_right {
flex: 1;

max-width: 576px;
width: 100%;
max-height: 340px;
height: 100%;
}

.host_black_left img {

width: 100%;
border-radius: 4px;
}

.host_black_right .host_black_span {
font-size: 24px;
font-weight: bold;
display: block;

}

.host_black_right p {
font-size: 18px;
word-spacing: 8px;
margin-bottom: 24px;
}

.host_black_span b {
font-size: 40px;
font-weight: bold;
margin-top: 40px;
}

.host_black_span {
margin-bottom: 32px;
}

.host_black_right button {
background-color: #fff;
color: #222;
border: none;
padding: 10px 20px;
font-size: 1rem;
cursor: pointer;
border-radius: 5px;
display: flex;
align-items: center;
gap: 10px;
transition: background-color 0.3s;
}

.host_black_right button svg {
width: 24px;
height: 24px;
}

.host_black_right button:hover {
background-color: #ccc;
}

/* Offers section styling */


.offers-section h2 {
font-size: 2rem;
text-align: center;
font-weight: 600;
margin-bottom: 40px;
}

.offers-content {
display: flex;
flex-wrap: wrap;
gap: 64px;
padding: 0 20px;
justify-content: center;
align-items: center;
}

.offers-list {
flex: 1;
max-width: 392px;
display: flex;
flex-direction: column;
gap: 32px;
}

.offer-item {
display: flex;
align-items: start;
gap: 16px;

}
.offer-text{
max-width: 320px;
width: 100%;
display: flex;
gap: 12px;
align-items: start;
flex-direction: column;
}
.offer-text h3{
font-size: 24px;
font-weight: bold;
color: #222222;
}
.offer-text p{
font-size: 16px;
color: #717579;
font-weight: 300;
line-height: 22px;
}

.offers-image {
flex: 1;
max-width: 724px;
max-height: 389px;
}

.offers-image img {
width: 100%;
height: 100%;
border-radius: 10px;
}

/* Hero section styling */


.host-overlay {

padding: 20px 40px;
border-radius: 10px;
text-align: center;
}

.host-overlay h1 {
margin-bottom: 20px;
font-size: 2rem;
}

.host-overlay button {
background-color: #002366;
color: #fff;
border: none;
padding: 10px 20px;
font-size: 1rem;
cursor: pointer;
border-radius: 5px;
transition: background-color 0.3s;
}

.host-overlay button:hover {
background-color: #001244;
}

/* Responsive adjustments */
@media (max-width: 1000px) {

.host_right p {
margin: 0;
}
.host_right span{

position: static;
font-size: 2rem;
}
.offers-content {
gap: 20px;
}

}
@media (max-width: 508px) {
.host_black_bg {
gap: 30px;
}
}
@media (max-width: 768px) {

.host_flex,
.host_black_bg,
.offers-content {
flex-direction: column;
align-items: center;
}

.host_right,
.host_left,
.host_black_left,
.host_black_right,
.offers-list,
.offers-image {
max-width: 100%;
padding: 10px;
}



.offer-item {
flex-direction: column;
align-items: center;
}
.offer-text p
{
text-align: center;
}
.offer-text {
align-items: center;
}

.host-hero-section {
height: 60vh;
}

.host-overlay h1 {
font-size: 1.5rem;
}

.host-overlay button {
padding: 8px 16px;
font-size: 0.9rem;
}
}
@media (max-width: 508px) {
.host_black_bg {
gap: 30px;
}

.host_section {
gap: 30px;
}

.host_header span {
font-size: 1.2rem;

}

.host_header h1 {
margin-bottom: 10px;
}

.host_flex {
padding: 0 10px;
}

.host_right span {
font-size: 1.5rem;
margin: 0 0 20px;
}

.host_right p {
font-size: 1.2rem;
}

.host_black_right .host_black_span {
font-size: 1.3rem;
}

.host_black_bg {
padding: 50px 15px;
}

.offers-section h2 {
font-size: 1.5rem;
padding: 0 10px;
}

.offer-text h3 {
font-size: 1.2rem;
}

.offer-item {
gap: 10px;
}

}