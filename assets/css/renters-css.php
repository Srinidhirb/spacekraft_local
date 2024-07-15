<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
body {

margin: 0;
padding: 0;
box-sizing: border-box;
}

.container {
padding: 20px;
max-width: 1200px;
margin: auto;
}

.container_header,
.features,
.main-content {
text-align: center;
}

.container_header h1 {
font-size: 2.4rem;
font-weight: 600;
}

.features {
display: flex;
flex-wrap: wrap;
justify-content: space-around;
margin-top: 56px;
align-items: center;
}

.feature {
flex: 1 1 200px;

padding: 20px;
display: flex;
flex-direction: column;
align-items: center;
gap: 16px;
border-radius: 8px;
max-width: 300px;
box-sizing: border-box;
}

.feature img {
width: 50px;
height: 50px;
}

.feature h3 {
font-size: 1rem;
font-weight: bold;
color: #222222;
}

.feature p {
color: #8B8B8B;
font-size: 1rem;
font-weight: normal;
}

.main-content {
margin: 60px 0;
display: flex;
flex-direction: column;
align-items: center;
}

.main-content .text {
display: flex;
max-width: 460px;
flex-direction: column;
align-items: start;
text-align: start;
gap: 24px;

}

.text h2 {
font-size: 2.4rem;
font-weight: 600;
letter-spacing: 0.3px;
color: #222222;
}

.text p {
font-size: 1rem;
font-weight: normal;
color: #8B8B8B;
}

.main-content img {
max-width: 100%;
border-radius: 8px;
margin-top: 20px;
}

.button {
display: inline-block;
margin-top: 20px;
padding: 10px 20px;
background-color: #031B64;
color: white;
text-decoration: none;
border-radius: 5px;
transition: all 0.5s ease;
}

.button:hover {
background-color: #4AE9E9;
color: #000;
}

@media (min-width: 768px) {
.main-content {
    flex-direction: row;
    justify-content: space-between;
}

.main-content .text {
    flex: 1;
    padding-right: 20px;
}

}


.banner-content {

text-align: center;
position: absolute;
top: 60%;
padding: 0 10px;
color: white;
}

.banner-content h1 {
font-size: 2.86vw;
margin: 0;
font-weight: bold;
}

.banner-content .button {
display: inline-block;
text-transform: uppercase;
padding: 10px 20px;
font-weight: 600;
background-color: #031B64;
color: white;
text-decoration: none;
border-radius: 5px;
font-size: 1rem;
transition: all 0.5s ease;
}

.banner-content .button:hover {
background-color: #4AE9E9;
color: #000;
}



.content {
display: flex;
flex-direction: column;
align-items: center;

padding: 20px;
border-radius: 10px;
}

.content h1 {
font-size: 2.5em;
color: #fdfdfd;
font-weight: bold;
margin: 0;
}

.content p {
font-size: 1.2em;
margin: 24px auto;
color: #FBFBFB;
font-weight: normal;
position: relative;
max-width: 360px;


}

.content p::after {
content: "";

position: absolute;


max-width: 340px;

width: 100%;
background-color: #FBFBFB;

top: 30px;
height: 1px;
left: 0;

}

@media (max-width: 768px) {
.banner-content h1 {
    font-size: 1.6rem;
}

.banner-content .button {
    padding: 8px 16px;
    font-size: 0.9rem;
}

.container_header h1 {
    font-size: 1.7rem;
}

.text h2 {
    font-size: 1.8rem;
}

.main-content .text {
    gap: 14px;
}

.content h1 {
    font-size: 1.7rem;
}
}

@media (max-width: 395px) {
.content p {
    font-size: 0.9rem;
}
}
@media (max-width: 480px) {
  /* For mobile devices */
  .nav_right {
    width:98%!important;
    padding:20px 0 20px 40px !important;
    

  }
}