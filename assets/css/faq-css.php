<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
*{
margin:0;
padding:0;
}
.faq-heading {
margin: 85px auto 20px;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
text-align:center;

width:85%;
background-image: linear-gradient(to right, #F5F7FA,#F2F5F9, #E7ECF3,#C3CFE2);
height: 220px;


}

.faq-heading .heading1 {
font-size: 36px;
font-weight: bold;
color: #222222;
}

.faq-heading .heading2 {
font-size: 1rem;
margin: 16px 0px 0px 0px;
color: #222222;
}

.faq-center {
display: flex;
margin: 32px 0 0 56px;
flex-direction: row;
column-gap: 188px;
justify-content: center;

}



@import url("https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700&display=swap");

.accordion {
display: flex;
flex-direction: column;
font-family: "Sora", sans-serif;
max-width: 800px;
width: 100%;
min-width: 320px;

padding: 0 0px;
}



.accordion-item {
margin-top: 16px;
border: 2px solid #dfdfdf;
border-radius: 6px;
background: #ffffff;

box-shadow: rgba(0, 0, 0, 0.05) 1px 1px 2px 0px;
transition: 0.3s;

}

.accordion-item .accordion-item-title {
position: relative;
margin: 0;
display: flex;
height:56px;
font-size: 18px;
font-weight: bold;
cursor: pointer;
justify-content: space-between;
flex-direction: row-reverse;
padding: 16px 20px;
box-sizing: border-box;
align-items: center;
}

.accordion-item .accordion-item-desc {
display: none;
font-size: 16px;

line-height: 22px;
font-weight: 300;
color: #222222;

padding: 10px 20px 20px;
box-sizing: border-box;
overflow: hidden;
}

.accordion-item input[type="checkbox"] {
position: absolute;
height: 0;
width: 0;
opacity: 0;
}

.accordion-item input[type="checkbox"]:checked~.accordion-item-desc {
display: block;
}

/* Default state */
.accordion-item input[type="checkbox"]~.accordion-item-title .icon:after {
content: "+";

font-size: 26px;
color: #222222;
transition: transform 0.3s ease;

}

/* Checked state */
.accordion-item input[type="checkbox"]:checked~.accordion-item-title .icon:after {
content: "×";

transform: rotate(45deg);

}


.accordion-item:first-child {
margin-top: 0;
}

.accordion-item .icon {
margin-left: 14px;
}

@media screen and (max-width: 767px) {
.accordion {
padding: 0 0px;
}

.accordion h1 {
font-size: 22px;
}
.accordion-item .accordion-item-title {
height:auto;
}
.faq-heading{
width:auto;
}
}

.faq-box3 {
display: flex;
flex-direction: column;
row-gap: 16px;
margin: 0px 56px 44px 40px;
align-items: center;
}

.faq-box {
width: 240px;
height: 104px;
display: flex;
justify-content: center;
align-items: center;
color: #ffffff;
border-radius:6px;
font-size: 1rem;
font-weight: bold;
text-shadow: 2px 2px 4px #DFDFDF;
}

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
background-image: url('assetsimg/faq3.png');
background-position: center;
background-size: cover;
}

@media (max-width: 1024px) {
.faq-center {
flex-direction: column;
justify-content: center;
margin: 0;
row-gap: 30px;
}

.faq-heading {
margin-left: 0;
padding: 10px 20px;
}
.faq-box3 {

margin: 0px 0px 44px 0px;

}
}
.city {

display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
}

.city-title {

padding: 20px;
color: var(--Text-title, #222222);
font-family: Lato;
font-size: 36px;
font-style: normal;
font-weight: 700;
line-height: normal;
text-align: center;
}

.Abt {
padding: 24px 48px;
color: var(--Text-title, #222222);
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: 22px;
/* 91.667% */
}

.Abt p {
padding: 24px 48px 10px 88px;

color: #222222;
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 28.8px;

/* 120% */

}

@media (max-width: 768px) {
/* Adjust styles for smaller screens */

.city-title {
font-size: 28px;
}

.Abt {
font-size: 18px;
}

.Abt p {
font-size: 18px;
line-height: 24px;
padding: 10px;
}
}

@media (max-width: 480px) {
/* Further adjust styles for even smaller screens */

.city-title {
font-size: 24px;
}

.Abt {
font-size: 16px;
}

.Abt p {
font-size: 16px;
line-height: 20px;
}
}

