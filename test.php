<?php
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Listing</title>
    <link rel="stylesheet" href="assets/css/header_footer-css.php">
    <style>
        .center_display {
            width: 100%;
            margin: 86px 0 51px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .center_display span {
            font-family: Lato;
            font-size: 32px;
            font-weight: 500;
            line-height: 38.4px;
            text-align: center;

        }

        .center_display p {
            max-width: 67.4%;
            width: 100%;
            font-family: Lato;
            font-size: 16px;
            font-weight: 400;
            line-height: 19.2px;
            text-align: center;

            margin: 19px auto;
        }

        @media screen and (max-width:900px) {
            .center_display p {
                max-width: 100%;
            }

            .center_display {
                width: 100%;
            }
        }


        .container {
            max-width: 1180px;
            width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            padding: 20px;
        }


        .card {


            border-radius: 5px;

            width: 25%;

            display: flex;
            flex-direction: column;
            transition: border 0.3s ease-in-out;
        }

        .card.highlighted {
            border: 2px solid black;
        }

        .sub-card {
            padding: 20px;
            border: 1px solid #dee2e6;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .sub-card-1 {

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .sub-card-2 {
            flex: 2;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .sub-card-2 span:nth-child(odd){
            background-color: #E1E9FF;
            width: 100%;
        }

        .sub-card:last-child {
            border-bottom: none;
        }


        .main_heading {
            display: block;
            margin: 0px 0px 0px 40px;
            font-family: Lato;
            font-size: 16px;
            font-weight: 400;
            line-height: 19.2px;
            text-align: left !important
        }

        .packages {
            font-family: Lato;
            font-size: 24px;
            font-weight: 600;
            line-height: 24px;
            text-align: left;
            color: #031B64;

        }

        .price .duration {
            font-family: Lato;
            font-size: 14px;
            font-weight: 400;
            line-height: 14px;
            text-align: center;
            color: #717579;
        }

        .plan_validity {
            font-family: Lato;
            font-size: 16px;
            font-weight: 400;
            line-height: 19.2px;
            text-align: left;
            color: #717579;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="center_display">
        <span>Unlock new revenue streams! </span>
        <p>Choose a plan and list your retail space.</p>
    </div>
    <div class="container">
        <div class="card">
            <div class="sub-card sub-card-1">

                <button style="opacity:0;" onclick="highlightCard(this)">Highlight</button>
            </div>
            <div class="sub-card sub-card-2">
                <span class="main_heading"> Plan validity </span>
                <span class="main_heading"> Visiblity </span>
                <span class="main_heading"> Social Media Promotion </span>
                <span class="main_heading"> Premium </span>
                <span class="main_heading"> Leads </span>
                <span class="main_heading"> Dedicated Relationship Manager </span>
                <span class="main_heading"> Verified Status </span>
                <span class="main_heading"> Property Photoshoot </span>

            </div>
        </div>

        <div class="card">
            <div class="sub-card sub-card-1">
                <span class="packages">Basic </span>

                <span class="price">Free</span>
                <!-- <a href="Space_listed.php"> -->
                <span class="button" onclick="highlightCard(this)"> Continue</span></a>

            </div>
            <div class="sub-card sub-card-2">
                <span class="plan_validity"> 1 Month </span>
                <span class="plan_validity"> Standard visiblity </span>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
        </div>

        <div class="card">
            <div class="sub-card sub-card-1">
                <span class="packages">Pro</span>

                <span class="price"><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.125 0.500043C0.125 0.500043 1.86764 0.500043 3.625 0.500043M8.125 16.5L1.125 9.50004C1.125 9.50004 2.625 9.50004 3.625 9.50004C4.625 9.50004 9.125 9.56183 9.125 5.00004C9.125 0.438253 4.625 0.500043 3.625 0.500043M12.125 0.500043C12.125 0.500043 6.55393 0.500043 3.625 0.500043M0.125 4.50004H12.125" stroke="#717579" stroke-width="1.5" />
                    </svg>
                    499 <span class="duration"> / month</span></span>
                <span class="button" onclick="highlightCard(this)"> Pay</span>

            </div>
            <div class="sub-card sub-card-2">
                <span class="plan_validity"> 1 Month</span>
                <span class="plan_validity"> 3x More visiblity</span>
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
                </svg>

                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span class="plan_validity"> Upto 5 Leads</span>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#A1AEBE" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
        </div>

        <div class="card">
            <div class="sub-card sub-card-1">
                <span class="packages">Plus</span>

                <span class="price">
                    Customisable</span>
                <a href="#"> <span class="button" onclick="highlightCard(this)"> Contact</span></a>

            </div>
            <div class="sub-card sub-card-2">
                <span class="plan_validity"> 1 year </span>
                <span class="plan_validity"> 10x More visiblity </span>
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span class="plan_validity"> Unlimited Leads </span>
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L5.28033 8.71967C4.98744 9.01256 4.51256 9.01256 4.21967 8.71967L1 5.5" stroke="#031B64" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
        </div>
    </div>






    <script>
        function highlightCard(button) {
            // Remove highlight from any currently highlighted card
            const highlightedCard = document.querySelector('.card.highlighted');
            if (highlightedCard) {
                highlightedCard.classList.remove('highlighted');
            }

            // Add highlight to the selected card
            const card = button.closest('.card');
            card.classList.add('highlighted');
        }
    </script>
</body>

</html>