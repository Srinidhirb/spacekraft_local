<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
 @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");


:root {
  --primary-clr: #6c00f9;
  --white: #fff;
  --text-clr: #464646;
  --tabs-list-bg-clr: #dfc8fd;
  --btn-hvr: #4e03b0;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  font-family: "Open Sans", sans-serif;
  scroll-behavior: smooth;
}

body {
    font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            text-align: justify;

  color: var(--text-clr);
}

.top {
  height: 8vh;
}

.flex_align_justify {

  display: flex;
  align-items: center;
  justify-content: center;
}

.wrapper {
  min-height: 100vh;
  padding: 0 20px;
}

.tc_wrap {
  width: 1000px;
  max-width: 100%;
  height: 600px;
  background: var(--white);
  display: flex;
  border-radius: 3px;
  overflow: hidden;
}

.tc_wrap .tabs_list {
  width: 180px;
  background: #4AE9E9;
  height: 100%;
  overflow-y: auto;
}

.tc_wrap .tabs_content {
  width: calc(100% - 200px);
  padding: 0 10px 0 20px;
  height: 100%;
}

.tc_wrap .tabs_content .tab_head,
.tc_wrap .tabs_content .tab_foot {
  color: var(--primary-clr);
  padding: 25px 0;
  height: 70px;
}

.tc_wrap .tabs_content .tab_head {
  text-align: center;
}

.tc_wrap .tabs_content .tab_body {
  height: calc(100% - 140px);
  overflow: auto;
}

.tc_wrap .tabs_list ul {
  padding: 70px 20px;
  text-align: right;
}

.tc_wrap .tabs_list ul li {
  padding: 10px 0;
  position: relative;
  margin-bottom: 3px;
  cursor: pointer;
  font-weight: bold;
  transition: all 0.5s ease;
}

.tc_wrap .tabs_list ul li:before {
  content: "";
  position: absolute;
  top: 0;
  right: -20px;
  width: 2px;
  height: 100%;
  background: #031B64;
  opacity: 0;
  transition: all 0.5s ease;
}

.tc_wrap .tabs_list ul li.active,
.tc_wrap .tabs_list ul li:hover {
  color: #031B64;
}

.tc_wrap .tabs_list ul li.active:before {
  opacity: 1;
}

.tc_wrap .tabs_content .tab_body .tab_item h3 {
  padding-top: 10px;
  margin-bottom: 10px;
  color: #031B64;
}

.tc_wrap .tabs_content .tab_body .tab_item p {
  margin-bottom: 20px;
}

.tc_wrap .tabs_content .tab_body .tab_item.active {
  display: block !important;
}

.tc_wrap .tabs_content .tab_foot button {
  width: 125px;
  padding: 5px 10px;
  background: transparent;
  border: 1px solid;
  border-radius: 25px;
  cursor: pointer;
  transition: all 0.5s ease;
}

.tc_wrap .tabs_content .tab_foot button.decline {
  margin-right: 15px;
  border-color: var(--tabs-list-bg-clr);
  color: var(--tabs-list-bg-clr);
}

.tc_wrap .tabs_content .tab_foot button.agree {
  background: var(--primary-clr);
  border-color: var(--primary-clr);
  color: var(--white);
}

.tc_wrap .tabs_content .tab_foot button.decline:hover {
  background: var(--tabs-list-bg-clr);
  color: var(--white);
}

.tc_wrap .tabs_content .tab_foot button.agree:hover {
  background: var(--btn-hvr);
  border-color: var(--btn-hvr);
}


        .section{
            padding-left: 95px;
            padding-right: 70px;
        }
        h1,
        h2 {
            color: #333;
        }

        h2 {
            margin-top: 20px;
        }

        p {
            margin-bottom: 15px;
        }



        a {
            color: #0066cc;
        }

        a{
    text-decoration: none;
 }

        .section {
            margin-top: 30px;
        }
        @media only screen and (max-width: 600px) {
            /* Adjust styles for screens larger than 600px */
            .section {
                padding-left: 20px;
                padding-right: 20px;
            }
        }