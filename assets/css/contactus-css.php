<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
 .center {

width: 546px;
height: auto;




margin: 80px 2px 60px 0;
display: flex;


flex-direction: row;
box-shadow: 0px 4px 8px 0px #00000040;
border-radius: 20px;

}

h3 {
color: #222222;
text-align: center;
margin-bottom: 3%;
}

h1 {

margin-bottom: 1%;
}

.top {
height: 10vh;
}

.name {
display: flex;
flex-direction: row;
justify-content: space-between;
}

input {
width: 100%;
height: 48px;
padding: 0 0 0 16px;
top: 32px;
gap: 12px;

border: 1px solid var(--Hover-pimary, #B8C0C2);
border-radius: 6px;

margin-bottom: 24px;
}

input[type=email] {
width: 100%;
padding: 0 0 0 16px;
border: 1px solid var(--Hover-pimary, #B8C0C2);
height: 48px;
margin-bottom: 3%;

}

textarea {
border: 1px solid var(--Hover-pimary, #B8C0C2);
border-radius: 6px;

width: 100%;
resize: none;
height:110px;
}

.first,
.last,
.email {
width: 48%;
display: flex;
flex-direction: column;
text-align: left;

}

.left {
color: #222222;
text-align: left;
margin: 24px 0 0 0;
font-size: 1rem;

}

::placeholder{
    color:#CECECE;
    font-size:18px;
    padding-left:12px;
}
.red {
margin-left: 3px;
color: #e62134;
}

.right {
color: var(--Text-body-1, #717579);
font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 22px;
text-align:right;
}

.btn {
color: #fff;
background-color: #031B64;
padding: 17px 20px;

text-transform: capitalize;
font-size: 1rem;
font-weight: 500;
cursor: pointer;
transition: all 0.2s;
width: auto;

text-align: center;
}


.btn:hover {

background-color: #4AE9E9;
}

label {
color: #222222;
font-size: 1rem;
font-weight: bold;
text-align: left;
padding-bottom: 8px;
}

.inp {
    width: 78%;
    margin: 44px auto;
}

.button {
margin: 40px 0px 20px 0px;
width: 435px;
height: 48px;
top: 633px;
left: 731px;
padding: 12px 40px 12px 40px;
border-radius: 8px;
border: none;
gap: 8px;
background: #031B64;
font-family: Lato;
font-size: 18px;
font-weight: 400;
line-height: 22px;
letter-spacing: 0em;

color: #FFFFFF;

}

.button:hover {
background-color: #4AE9E9;
font-size: 18px;
font-weight: 400;
line-height: 22px;
letter-spacing: 0em;
color: #222222;
}

@media screen and (max-width: 960px) {

.first,
.last,
.email {
    width: 100%;
}

input,
input[type=email] {
    margin-bottom: 5%;
}

.btn {
    margin-bottom: 5%;
}

.center {
    margin: 48px 0px 0px;
    width: 90%;

    padding: 20px;
    display: block;

}

.inp {
    margin: 10px;
    width: 90%;
}

.left {
    margin-top: 2%;
    margin-bottom: 2%;

}

.right {
    text-align: end;
    margin: auto;
}

.name {
    flex-direction: column;
}

.button {
    width: auto;
}
}

/* Add these styles to your existing CSS or create a new CSS file */




.flex-box {
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;

justify-content: space-evenly;
}

.talk-to-us {
height: auto;
margin: 0px 0px 0px 2px;
padding-bottom: 20px;
}

.talk-to-us p {
margin: 16px 0px 0px 0px;
font-family: Lato;
font-size: 36px;
font-weight: 700;
line-height: 43px;
letter-spacing: 0em;
text-align: left;
}

.talk-to-us h2 {
display: flex;
justify-content: center;
align-items: center;
margin: 103px 0px 0px 0px;
width: 90px;
height: 30px;
top: 157px;
left: 172px;
padding: 8px 6px 8px 6px;
border-radius: 12px;
gap: 8px;
font-family: Lato;
font-size: 14px;
font-weight: 500;
line-height: 17px;
letter-spacing: 0em;
text-align: left;
background: #D2ECFF;

}

.talk-to-us h6 {
margin: 32px 0px 0px 0px;
font-family: Lato;
font-size: 16px;
font-weight: 500;
line-height: 19px;
letter-spacing: 0em;
text-align: left;


}

.ticks {
margin: 18.5px 0px 0px 0px;
display: flex;
flex-direction: row;
}

.px {
margin: 0px 0px 0px 10px;
font-family: Lato;
font-size: 16px;
font-weight: 500;
line-height: 19px;
letter-spacing: 0em;
text-align: left;

}

.talk-to-us h5 {
font-family: Lato;
font-size: 16px;
font-weight: 500;
line-height: 19px;
letter-spacing: 0em;
text-align: left;
margin: 80px 0px 0px 0px;
}



.l-s {
font-family: Lato;
font-size: 24px;
font-weight: 700;
line-height: 29px;
letter-spacing: 0em;
text-align: center;
margin: 8px 60.5px 0px;
display: inline-block;
overflow: hidden;
border-right: .15em solid #031B64;
/* Adjust the color and size of the cursor */
white-space: nowrap;
color: #031B64;
/* Prevent text from wrapping */
margin-right: .2em;
/* Adjust the distance between text and cursor */

display: inline-block;
}
.hideCursor {
            border-right: none !important; /* Hide the cursor line */
        }


textarea {
padding: 10px 0 0 10px;
/* Adjust the padding value as needed */
}

.popup {
display: none;
/* Hide popup by default */
position: fixed;
z-index: 9999;
left: 0;
top: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.5);
/* Semi-transparent background */
overflow: auto;
}

.popup-content {
background-color: #fefefe;
margin: 15% auto;
padding: 20px;
border: 1px solid #888;
width: 80%;
height: 12vh;
max-width: 250px;
}

.close-popup {
color: #aaa;
float: right;
font-size: 28px;
font-weight: bold;
}

.close-popup:hover,
.close-popup:focus {
color: black;
text-decoration: none;
cursor: pointer;
}
.popup-buttons button {
padding: 10px 20px;
margin: 0 10px;
border: none;
background: #031B64;
color: white;
border-radius: 5px;
cursor: pointer;
transition: background-color 0.3s;
}

.popup-buttons button:hover {
background-color: #4AE9E9;
}