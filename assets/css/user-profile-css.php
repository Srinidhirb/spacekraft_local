<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>

.top {
height: 10vh;
}

.menu {


height: 500px;
padding: 44px 24px 32px 64px;
flex-direction: column;
justify-content: space-between;
align-items: flex-start;
flex-shrink: 0;

}

#hr {
padding: 0;
margin: 0%;
display: block;
}

.profile-menu {
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
gap: 24px;
}

.details {
display: flex;
flex-direction: row;
}

.info {
display: flex;
align-items: center;
gap: 12px;
font-size: 18px!important;
}

.my-profile {
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
gap: 54px;
}

.my-profile p {
color: var(--Text-title, #222222);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 140%;
/* 22.4px */
letter-spacing: 1px;
}

.edit,
.listing {
display: flex;
margin: 12px 0 24px 0;
flex-direction: column;
align-items: flex-start;
gap: 10px;
}
.edit svg{
margin:0 16px;
}
.listing svg{
margin:0 16px;
}


.edit p {
color: var(--Text-title, #222222);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 140%;
cursor:pointer;
display:flex;
justify-content:center;
align-items:center;
/* 22.4px */
}

.listing p {
cursor:pointer;
color: var(--Text-body-1, #222222);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 140%;
display:flex;
justify-content:center;
align-items:center;
/* 22.4px */
}

.log {
display: flex;
padding-bottom: 0;
flex-direction: column;
width: 50%;
margin: 88px 0;
align-items: center;
}

#toggleMenuBtn{
display:none;
}

.log a {
display:flex;

color: var(--Text-body-1, #222222);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 140%;
/* 22.4px */
}



.hr {
width: 218px;
height: 0px;
}

.hr hr {
stroke-width: 1px;
stroke: #EFEFEF;
}


.flex {
margin: 0 auto;
/* padding: 0px 24px 32px 5px; */
display: flex;
flex-direction: row;


width: 99%;

}

#editProfileDiv {
width: 100%;
padding: 40px;

display: flex;

flex-direction: column;
gap: 24px;
justify-content: center;
    align-items: center;
    
}



#editProfileDiv p {
color: var(--Text-title, #222222);
font-family: Lato;

font-size: 36px;
font-style: normal;
font-weight: 400;
line-height: 140%;
padding: 5px;
text-align:center;
/* 33.6px */
}

#viewlisting {
width: 100%;
padding: 40px;

}

#listing {
padding: 40px;
}

#viewlisting p {
color: var(--Text-title, #989797);
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: 140%;
padding: 23px;
/* 33.6px */
}



form {
display: flex;
flex-direction: column;

}

.name {
width: 100%;
display: flex;
flex-direction: row;

}


label {
display: block;
margin-bottom: 5px;
font-size:20px;
}

input {
width: 280px;
height: 48px;
border-radius:6px;
padding-left:12px;
border: 1px solid #B8C0C2;
}
::placeholder{

}
.first .custom-eye-icon {
position: absolute;
top: 0;
margin-top:53px;
margin-right:30px;
right: 0px;
transform: translateY(-50%);
cursor: pointer;
font-size: 1.2rem;
}
.last .custom-eye-icon {
position: absolute;
top: 0;
margin-top:53px;
margin-right:10px;
right: 0px;
transform: translateY(-50%);
cursor: pointer;
font-size: 1.2rem;
}

.first {
position: relative;
padding-right: 24px;
padding-bottom: 40px;
}
.last{
position: relative;
}

.red {
color: red;
}

.button {
display: flex;
width: 171px;
height: 53px;
padding: 12px 40px;
background-color: #031B64;
justify-content: center;
align-items: center;
gap: 8px;
flex-shrink: 0;
color: #FFF;
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 22px;
/* 122.222% */
}

@media screen and (max-width: 768px) {
.menu {
position: fixed;
display:flex;
top: 5%;
left: 0;
align-items: center;
justify-content: space-around;
background-color: white;
z-index: 7;
/* padding: 44px 24px 34px 34px; */
width: 100%;
height: 96vh;
padding:0;
}
#toggleMenuBtn{
display:block;
position: fixed;
top: 10%;
left: 10px;
z-index: 1000;

}
#hr {
padding: 0;
margin: 0%;
display: none;
}
.features{
width: 100%;
}
#editProfileDiv {
width: 92%;
margin: 0 auto;
padding: 0px !important;
}


}
.update_btn{
    display:flex;
    align-items:center;
    justify-content:end;
}
@media screen and (max-width: 968px) {
form {
width: 100%;
}

input {
width: 100%;
}

.name {
flex-direction: column;
}

.first,
.last {
width: 100%;

padding-bottom: 20px;
/* Adjust spacing between fields if needed */
}
}

.button {
display: inline-flex;
align-items: center;
gap: 20px;

}

.button button {

background-color: #FFF;
color: black;
}

.select {
background-color: #031B64;
}

.options {

display:flex;
justify-content: center;
align-items:center;
flex-wrap:wrap;
align-items: center;
position:relative;
gap: 20px;
padding: 0 0 20px 0;
}

.width {
display: flex;
width: 106px;
height: 40px;

justify-content: center;
align-items: center;
gap: 8px;
color: #2A2A2A;
font-family: Lato;
font-size: 16px;
border:2px solid #222222;
font-style: normal;
font-weight: 500;
line-height: normal;
background-color:#ffffff;
}

.selected1 {
color: #EFEFEF;
background: #031B64;
}

#listing {
display: none;
}

.profile-menu .edit.selected p::after,
.profile-menu .listing.selected p::after {
content: '';
position: absolute;
top: -7px;
right: 130px;
display: block;
width: 2.5%;
height: 36px;
background-color: #031B64;

}

.profile-menu .edit p,
.profile-menu .listing p {
position: relative;
}

@media screen and (max-width: 768px) {


.width {
width: 100%;
margin-bottom: 10px;
}
}



#listing:after {
content: "";
display: table;
clear: both;
}

.viewlisting {
width: 100%;
display:flex;
flex-wrap:wrap;
justify-content:space-between;
}

.buttons-container {
position: absolute;
top: 10px;
right: 10px;
}

.small-btn {

color: #fff;
border: none;
padding: 5px 10px;
border-radius: 3px;
cursor: pointer;
text-decoration: none;
}

.delete-form {
display: inline;
margin: 0;
}





.width {
cursor:pointer;
width: 110px;
/* Adjust the width as needed */
margin: 0 5px;
display: inline-block;
border-radius: 8px;
border: 2px solid #222222;
}
.width:hover{
background-color: #e9e8e8;
color: #222222;
}

.all,
.expired,
.active,
.pending {
width: 100%;
padding: 30px 0 0 0;

}
.image-container {
position: relative;
}
.listing-container {
float: left;
cursor: pointer;
background-color: #fff;
padding: 20px 20px 10px 20px;
width:calc(1004);
text-align:center;

border-radius: 5px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
margin-right: 20px;
/* Adjust the spacing between containers */
margin-bottom: 20px;
position: relative;
display: inline-block;
}


@media only screen and (max-width: 800px) {
.listing-container {
width: calc(50% - 20px);
/* Adjust width for two items per row */
}
}
@media only screen and (max-width: 460px) {
.listing-container {
width: 95%;

}
}

.listing-image {
max-width: 100%;

border-radius: 5px;
box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.info,
.info1 {
margin: 0;
/* Remove default margin for better alignment */
}

.list{
width:0%

}

@media screen and (max-width: 687px) {
.list{
width:100%;
display: flex;
justify-content: center;
align-items:center;
}
.width{
width:90px;
}
}

@media screen and (max-width: 907px) {
.flex{
margin: 0 auto;
/* padding: 0px 24px 32px 5px; */
display: flex;
flex-direction: row;

justify-content: center;
width: 99%;

}
}
@media (max-width: 480px) {
  /* For mobile devices */
  .nav_right {
    width:98%!important;
    padding:20px 0 20px 40px !important;
 

  }
  #nav_right{
    z-index:2000;
  }
}