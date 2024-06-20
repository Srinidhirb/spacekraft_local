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
flex-wrap: wrap;

justify-content: space-between;
gap: 10px;

max-width: 1180px;
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
flex: 1;
padding: 20px;
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
width: 330px;
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

.container {
    max-width: 880px;
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
font-size: 4rem;
font-family: sans-serif;
font-variant: small-caps;
font-weight: 900;
background: conic-gradient(#FE983B 0 25%,
        #031B64 25% 50%,
        #4AE9E9  50% 75%,
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