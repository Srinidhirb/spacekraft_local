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