<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
 body {
            
            line-height: 1.6;
            margin: 0;
            padding: 0;
            
        }

        .container {
            width: 80%;
            margin: 60px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1{
            text-align: center;
        }
        h1,
        h2,
        h3 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        ul {
            margin-left: 20px;
        }

        em {
            font-style: italic;
        }

        strong {
            font-weight: bold;
        }