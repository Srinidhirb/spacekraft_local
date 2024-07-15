<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');
* {
margin: 0;
padding: 0;
}

ul {
list-style: none;
}
.file-item {
                    margin-bottom: 5px;
                }

                .delete-button {
                    margin-left: 10px;
                    cursor: pointer;
                }
                .image_label{
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }
                .image_label p{
                    font-size: 12px;
                }
                .file-list {
                    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    justify-content: center;
    width: 60%;
    }

    .file-item {
        position: relative;
        width: 110px;
        border: 1px solid #ccc;
        padding: 5px;
        text-align: center;
    }

    .file-item .image-container {
        height: 100px;
        overflow: hidden;
        margin-bottom: 5px;
    }

    .file-item img {
        max-width: 100%;
        height: auto;
    }

    .file-item span {
        display: block;
        margin-bottom: 5px;
        font-size: 12px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .delete-button {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: #f44336;
        color: white;
        border: none;
        padding: 2px 8px;
        font-size: 12px;
        cursor: pointer;
        border-radius: 3px;
    }

    .delete-button:hover {
        background-color: #da190b;
    }

    .file-input {
        display: none;
    }

    .file-label {
        cursor: pointer;
        display: inline-block;
        border: 1px dashed #ccc;
        padding: 10px;
        text-align: center;
        margin: 0;
    }

    .file-label img {
        max-width: 100%;
        height: auto;
        margin-bottom: 5px;
    }

    .file-label p {
        font-size: 12px;
        color: #666;
        margin-bottom: 0;
    }
            

    .radio-group {
                    display: flex;
                    gap: 10px;
                    max-width: 446px;
                    width: 100%;
                }

                input[type="radio"] {
                    display: none;
                }

                .radio-label {
                    padding: 0px 20px;
                    background-color: #ffffff;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                    width: 8%;
                    font-size: 14px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 5px 0;
                }

                input[type="radio"]:checked+.radio-label {
                    background-color: #7CAFD5;
                    color: #222222;
                    border-color: #007BFF;
                }

                .radio-label:hover {
                    background-color: #4AE9E9;
                }
a {
text-decoration: none;
color: inherit;
}


select{
                    background-color: #ffffff;
                }


/* Replace "input" with the actual selector for your input elements if needed */
::placeholder {
color: var(--Grey-primary, #CECECE);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;


line-height: 22px; /* 122.222% */
}
option{
color: var(--Text-title, #989797);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;

line-height: 22px; /* 122.222% */
}

/* Add these styles to your existing styles or create a new CSS file */

/* Flatpickr calendar styles */
.flatpickr-calendar {
background-color: #fff; /* Calendar background color */
border: 1px solid #ddd; /* Calendar border */
box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Calendar box shadow */
}

/* Header styles */
.flatpickr-months {
background-color: #f5f5f5; /* Header background color */
color: #333; /* Header text color */
padding: 8px;
border-bottom: 1px solid #ddd; /* Header border */
}

/* Days styles */
.flatpickr-days {
display: flex;
flex-wrap: wrap;
margin: 0;
padding: 8px;
}

/* Day styles */
.flatpickr-day {
width: 32px; /* Adjust day width as needed */
height: 32px; /* Adjust day height as needed */
margin: 2px;
line-height: 32px;
text-align: center;
cursor: pointer;
transition: background-color 0.3s ease;
}

.flatpickr-day:hover {
background-color: #f5f5f5; /* Day hover background color */
}


/* Selected day styles */
.selected.flatpickr-day {
background-color: #031B64 !important; /* Selected day background color */
color: #fff; /* Selected day text color */
}

/* Disabled day styles */
.flatpickr-disabled {
color: #ccc; /* Disabled day text color */
cursor: not-allowed;
}

/* Close button styles */
.flatpickr-close {
color: #4285f4; /* Close button color */
cursor: pointer;
font-weight: bold;
}

/* Add your existing styles for other elements */


body {
font-family: 'Lato', sans-serif;
display: flex;
flex-direction: column;

margin: 0;
padding: 0;
}

.add-listing {
width: 90%;
max-width: 800px;
margin: 127px auto;
}

.name-center {
text-align: center;
color: var(--Text-title, #222222);
font-family: Lato;
font-size: 36px;
font-style: normal;
font-weight: 700;
line-height: normal;
}






.form {
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
padding: 20px;
margin-left: 8%;
margin-top: 10%;
margin-right: 5%; /* Add margin-right for better spacing on small screens */
}

#form {
width: 100%;
display: flex;
flex-direction:column;
justify-content: center;
align-items: center;
}

label {
width:452px;
text-align:left;
display: block;
margin: 24px 0 8px;
color: var(--Text-title, #222222);
font-family: Lato;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: 24px; /* 120% */
}

input {
width: 452px; /* Adjust width to 100% for better responsiveness */
padding:5px;
padding-left:12px ;
height: 48px;

box-sizing: border-box;
border-radius: 6px;
border: 1px solid var(--Hover-pimary, #B8C0C2);

height: 40px;
margin-bottom:5px;
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 122.222% */
}
textarea {
resize: none;
width: 452px; /* Adjust width to 100% for better responsiveness */
padding:5px;
padding-left:12px ;
height: 78px;

box-sizing: border-box;
border-radius: 6px;
border: 1px solid var(--Hover-pimary, #B8C0C2);

height: 40px;

font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 122.222% */
}
select {
width: 452px; /* Adjust width to 100% for better responsiveness */
padding:5px;

height: 48px;
margin-bottom: 10px;
box-sizing: border-box;
border-radius: 6px;
border: 1px solid var(--Hover-pimary, #B8C0C2);

height: 40px;

font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 122.222% */
}
.input{
width: 50%; /* Adjust width to 100% for better responsiveness */
padding: 8px;
margin-bottom: 10px;
box-sizing: border-box;
border: 1px solid #000000; /* Set the border size and color */
border-radius: 2px;
height: 25px;
}


.button-container {
    display: flex;
    justify-content: right;
    width: 63%;
    margin-top: 40px;
}




.next-btn{
width: auto;
margin-right: 5%;
padding: 12px 40px;
cursor: pointer;
background-color: #031B64;
color: #fff;
border: none;
border-radius: 6px;
/* margin-bottom: 10px; */
font-size: 1rem;
font-weight: 400;
}
.back-btn{

width: auto;
margin-right: 5%;
padding: 12px 40px;
cursor: pointer;
background-color:white;
color: #222222;
border: 1px solid #828282;
border-radius: 6px;
/* margin-bottom: 10px; */
font-size: 1rem;
font-weight: 400;
}


.back-btn:hover {
background-color: #e9e8e8;
}
.next-btn:hover{
background-color: #4AE9E9;
color:#222222
}


.space{
    width:456px;
    font-family: Lato;
font-size: 16px;
font-weight: 400;
line-height: 22px;
letter-spacing: 0.5px;
text-align: left;

margin-top: 24px;
font-family: 'Lato', sans-serif;
}

.below{
width: 100%;
margin-top: 3%;
display: flex;
flex-direction: row;
justify-content:space-between;
color: #222222;
flex-wrap: nowrap;
}
.below h5{

font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
@media screen and (max-width: 768px) {
.below {
flex-direction: row;
width:100%;
}
}



.you_are{
    display:flex;
    gap:15px;
    align-self: center;
    width: 452px;

}


.you_are label {
    display: block;
    width:22%;
}

.you_are label input[type="checkbox"] {
    display: none;
}

.you_are label input[type="checkbox"] + span {
    display: inline-block;
    padding: 8px 16px; /* Adjust padding as needed */
    background-color: #e0e0e0; /* Default button background color */
    border: 1px solid #ccc;
    border-radius: 20px;
    cursor: pointer;
}

.you_are label input[type="checkbox"]:checked + span {
    background-color: #031B64; /* Background color when checked */
    color: white; /* Text color when checked */
}

/* Style the file input */
.file-input {
display: none; /* Hide the file input */
}

/* Style the file input label */
.file-label {
width:416px;
padding: 8px 16px;
border-radius: 6px;
border: 1px solid var(--Hover-pimary, #B8C0C2);

cursor: pointer;

font-size: 14px;
margin-bottom: 10px;
}

/* Style the file input label on hover */




.box{

border: #000000 0.5px solid;
width: 90%;
display: flex;
margin-bottom: 7%;
flex-direction: column;
justify-content: space-between;
flex-wrap: wrap;
}
.right{
width:456px;
text-align:right;
color: #CECECE ;
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.right1{
color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 129.412% */
width:456px;
text-align:right;
}
.right2{
color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 129.412% */
width:456px;
text-align:right;
}
.right3{
color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 129.412% */
width:456px;
text-align:right;
}

.amenities-container {
margin-top: 10px;
width: 73.1%;
    margin: 0 auto;
}

.amenities-options {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin:0 0 0 20px;
}

.amenity-checkbox {
display: none; /* Hide the actual checkboxes */

}

.amenity-label:hover {
background-color: #e9e8e8;
color: #222222;
}
.amenity-label {
    margin-bottom: 10px; /* Adjust spacing between labels */
    width: 130px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-right: 10px;

  color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 122.222% */
  padding: 8px;
  cursor: pointer;
  user-select: none;

  transition: background-color 0.3s;
}

.amenity-checkbox:checked + .amenity-label {
background-color: #031B64; /* Highlight the selected labels */
color: #ffffff;
}
@media screen and (max-width: 768px) {
    .amenity-label {
        width: calc(50% - 10px)!important; /* Two amenities in one row */
        flex: 1 0 calc(26.33% - 4px);
    }
    .amenities-container{
        width:100%;
    }
}
.spacetype-container {
                margin-top: 10px;
                width: 73.1%;
                margin: 0 auto;
            }

            .spacetype-options {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                margin: 0 0 0 20px;
            }

            .spacetype-checkbox {
                display: none;
                /* Hide the actual checkboxes */

            }

            .spacetype-label:hover {
                background-color: #e9e8e8;
                color: #222222;
            }

            .spacetype-label {
                margin-bottom: 10px;
                /* Adjust spacing between labels */
                width: 130px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-right: 10px;

                color: var(--Text-body-1, #A4A3A3);
                font-family: Lato;
                font-size: 18px;
                font-style: normal;
                font-weight: 400;
                line-height: 22px;
                /* 122.222% */
                padding: 8px;
                cursor: pointer;
                user-select: none;

                transition: background-color 0.3s;
            }

            .spacetype-checkbox:checked+.spacetype-label {
                background-color: #031B64;
                /* Highlight the selected labels */
                color: #ffffff;
            }

            @media screen and (max-width: 768px) {
                .spacetype-label {
                    width: calc(50% - 10px) !important;
                    /* Two amenities in one row */
                    flex: 1 0 calc(26.33% - 4px);
                }

                .spacetype-container {
                    width: 100%;
                }
            }
/* Optional: Style for the required span */
.red {
color: #E62134;
}



.active1{
background-color:#080157;

}


.active1 h3{
color: white;
}
.com{
background-color: rgb(128, 128, 128);
}



.small{
color: var(--Grey-primary, #CECECE);

font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 20.4px; /* 120% */
}

.heading-small{
padding:56px 0px 30px 0px ;
text-align:center;
font-family: Lato;
font-size: 24px;
font-weight: 500;
line-height: 28.8px;
letter-spacing: 0em;
color: #222222;



}
.des{
height:78px;
}
.left{
    font-family: Lato;
font-size: 14px;
font-weight: 400;
line-height: 16.8px;
text-align: left;
color:#828282;
width:456px;
}
.resend{
    font-family: Lato;
font-size: 14px;
font-weight: 500;
line-height: 16.8px;
text-align: left;
color:#031B64;
width:456px;
margin:4px 0 0  4px;
}


.step-diagram {
width: 100%;
margin: 48px auto 0 0;
display: flex;
justify-content: space-evenly;
align-items: center;
position: relative;
/* Needed for positioning the lines */
}

.circle,
.circle1,.circle-finished {
margin: 0;
padding: 0;
width: 72px;
height: 72px;
background-color: #ffffff;
border: 2px solid #031B64;
border-radius: 50%;
display: flex;
justify-content: center;
align-items: center;
position: relative;
/* Needed for positioning the lines */
font-family: Lato;
font-size: 18px;
font-weight: 500;
line-height: 21.6px;
text-align: left;


}

.diagram {
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;

}

.multi-select-container {
            position: relative;
            width: 450px;
        }

        .multi-select-input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .multi-select-dropdown {
            position: absolute;
            width: 100%;
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            background-color: white;
            z-index: 1000;
            display: none;
        }

        .multi-select-item {
            padding: 10px;
            cursor: pointer;
        }

        .multi-select-item:hover {
            background-color: #f0f0f0;
        }

        .multi-select-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            padding: 5px 0;
        }

        .tag {
            background-color: #e0e0e0;
            border-radius: 5px;
            padding: 5px 10px;
            display: flex;
            align-items: center;
        }

        .tag span {
            margin-left: 5px;
            cursor: pointer;
            color: red;
        }
.diagram span {
margin: 8px 0;
display: block;
text-align: center;
font-family: Lato;
font-size: 16px;
font-weight: 500;
line-height: 19.2px;

color:#031B64;

}
.disabled{
    color:#A1AEBE!important;
    border-color: #A1AEBE!important;
}
.enabled{
    background-color:#031B64;
    
}

/* Add lines */
.circle::after {
    content: '';
    position: absolute;
    width: 112px;
    height: 2px;
    background-color: #A1AEBE;
    top: 50%;
    left: calc(100% + 0px);
    transform: translateY(-1px);
}
.circle-finished::after {
content: '';
position: absolute;

width: 116px;
/* Width of the line */
height: 2px;
/* Height of the line */
background-color: #031B64;
top: 50%;
/* Position the line in the middle vertically */
left: calc(100% + 0px);
/* Adjust based on the spacing between circles */
transform: translateY(-1px);
/* Adjust based on the line thickness */
}

@media screen and (max-width:720px) {

.circle,
.circle1,.circle-finished {
width: 60px;
height: 60px;
}
.diagram span {
    font-size:14px;
}
/*
} */
.add-listing
{
max-width: 100%;
width: 100%;
margin: 127px 0px;
}


@media screen and (max-width:470px) {
.circle::after,.circle-finished::after {
width: 60px;

height: 2px;
}
}
@media screen and (max-width:400px) {
.circle,
.circle1,.circle-finished {
width: 45px;
height: 45px;
}
}
@media screen and (max-width:500px) {

    .button-container{
        width:100%;
    }
}

@media (max-width: 650px) {
.form {
margin-left: 2%;
margin-right: 2%;
}
input,label,select,textarea,.right,.label-container,.container,.right1,.right2,.right3,.left,.resend,.space,.multi-select-container {
width:90%;
}
.duration-container{
    width:90%;
   
}
.file-label,.file-name{
    width:80%
}
.you_are{
    width:90%;
    gap: 40px;
}
}

.calendar_container{
    display:flex;
    width:100%;
}
@media (max-width: 880px) {
    .file-list {
        width:90%;
    }

}
@media (max-width: 480px) {
  /* For mobile devices */
  .nav_right {
    width:98%!important;
    padding:20px 0 20px 40px !important;
    

  }
}