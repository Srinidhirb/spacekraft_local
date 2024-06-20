<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>


a {
            color: #222222;
        }

        .res-cont {
            margin: 112px 0 0 80px;
        }

        .gray-calendar {
            color: #888;
            /* Gray color */
        }

        .res-cont .span {


            font-family: Lato;
            font-size: 32px;
            font-weight: 700;
            line-height: 77px;
            letter-spacing: 0.5px;
            text-align: left;
            color: #222222;
        }

        .main-res {
            margin-top: 22px;
            display: flex;
            flex-direction: row;
            border-radius: 8px;
        }

        .img img {
            width: 496px;
            height: 247px;
            border-radius: 6px;
        }

        .cont {
            position: relative;
            padding-left: 65px;
            /* Adjust padding instead of left */
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .cont h2 {
            font-family: Lato;
            font-size: 24px;
            font-weight: 400;
            line-height: 24px;
            letter-spacing: 0px;
            text-align: left;
            margin: 8px 0 0 0;
            /* Remove default margin */
        }

        .cont h6 {
            font-family: Lato;
            font-size: 20px;
            font-weight: 400;
            line-height: 24px;
            letter-spacing: 0px;
            text-align: left;
            margin: 24px 144px 71px 0px;
            /* Add margin for spacing */
        }

        .details {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-top: 10px;
            /* Add margin for spacing */
            justify-content: space-between;
            width: 80%;
        }

        .det1,
        .det2 {
            display: flex;
            align-items: center;
        }

        .det1 {
            margin-right: 32px;
            /* Adjust margin for spacing */
        }

        .det2 a {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid;
        }

        /* Media queries for responsiveness */
        @media screen and (max-width: 950px) {
            .res-cont {
                margin: 0;
                margin-top: 102px;
            }

            .main-res {
                width: 100%;

                flex-direction: column;

            }

            .img img {
                width: 100%;
                height: auto;
            }

            .cont {
                padding: 20px 0px 0px 0px;
            }

            .cont h6 {
                margin: 10px 0px 10px 2px;
            }

            .det1,
            .det2 {

                padding: 0px;
            }

            .details {
                width: 100%;
                gap: 0px;
            }

        }

        @media screen and (max-width: 768px) {
            .res-cont .span {
                margin: 10px;
                font-size: 30px;
                line-height: 0px;
            }


        }

        .res-below {
            margin: 56px 1198px 72px 0px;
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .res-below .related {
            width: 15%;
        }

        .res-below .other-res {
            width: 80%;
        }

        .related span {
            font-family: Lato;
            font-size: 24px;
            font-weight: 500;
            line-height: 24px;
            letter-spacing: 0px;
            text-align: left;
            color: #222222;

        }

        .hr {
            margin: 10px;
            height: 363.5px;
            color: #CECECE;
            width: 0.5px;

        }

        .search-options {
            margin: 16px 4px 0px 0px;
            padding: 0%;
            line-height: 10px;
            width: 100%;
        }

        .search-options li {
            margin: 8px 0px 0px 0px;
            font-family: Lato;
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            letter-spacing: 0px;
            text-align: left;

        }

        .card {
            width: 100%;
            /* Adjusts based on the parent container */
            max-width: 328px;
            /* Limits the maximum width */
            height: auto;
            border-radius: 8px;
            background-color: #fff;

            padding: 5%;
            /* Use percentage for padding */
            transition: 0.3s;
            box-sizing: border-box;
            /* Includes padding in the width calculation */
        }



        .card img {
            width: 100%;
            /* Make the image responsive within its container */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 8px;
        }

        .card h2 {
            font-family: Lato;
            font-size: 1.5rem;
            /* Responsive font size */
            font-weight: 400;
            line-height: 1.2;
            text-align: left;
            color: #222222;
            margin-top: 22px;
            /* Adjust spacing */
        }

        .card p {
            font-family: Lato;
            font-size: 1rem;
            /* Responsive font size */
            font-weight: 400;
            line-height: 1.5;

            text-align: left;
            color: #717579;
            margin-top: 10px;
            /* Adjust spacing */
        }

        .details {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            /* Adjust spacing */
        }

        .date,
        .counter {
            font-size: 1rem;
            /* Responsive font size */
        }

        .date i,
        .counter i {
            margin-right: 5px;
        }

        #card {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            flex-wrap: wrap;
            row-gap: 20px;
            /* Allows cards to wrap on smaller screens */
        }

        @media screen and (max-width: 1000px) {
            .res-below {
                flex-direction: column;
            }

            .related {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .search-options {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
        }


        @media screen and (max-width: 1240px) {

            .card {
                max-width: 300px;
            }

            .hr {
                display: none;
            }

            .res-cont {
                margin: 112px 0 0 20px;

            }
        }

        @media screen and (max-width: 1071px) {

            .card {
                max-width: 286px;
            }
        }

        @media screen and (max-width: 1000px) {


            .res-below .related {
                width: 95%;
                text-align: center;
                margin-right: 20px;
            }

            .res-below .other-res {
                width: 85%;
            }




            .card img {
                width: 100%;
                height: auto;
            }
        }

        @media screen and (max-width: 670px) {
            .card {
                max-width: 100%;
            }

            .res-cont {
                margin: 112px 0 0 0px;

            }
        }
        .card_row{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
        }