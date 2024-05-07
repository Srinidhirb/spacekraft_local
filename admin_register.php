<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Details</title>
    <style>
        .calendar {
            width: 300px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .calendar-body {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .calendar-day {
            padding: 5px;
            text-align: center;
            border-radius: 50%;
        }

        .prev-month,
        .next-month {
            color: #999;
        }

        .selected-date {
            background-color: #66bb6a;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="calendar">
        <div class="calendar-header">
            <button id="prevMonth">Previous</button>
            <h2 id="currentMonthYear"></h2>
            <button id="nextMonth">Next</button>
        </div>
        <div class="calendar-body" id="calendarBody">
            <?php
            // Example PHP code to retrieve selected dates from the database
            // Replace this with your actual PHP code to fetch selected dates
            $selectedDates = array("2024-04-15", "2024-04-22"); // Example selected dates
            foreach ($selectedDates as $date) {
                echo "<div class='calendar-day selected-date'>$date</div>";
            }
            ?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();
            let selectedDate = null;
            let selectedDates = []; // Array to store selected dates retrieved from PHP

            const prevMonthBtn = document.getElementById("prevMonth");
            const nextMonthBtn = document.getElementById("nextMonth");
            const currentMonthYear = document.getElementById("currentMonthYear");
            const calendarBody = document.getElementById("calendarBody");

            // Modify generateCalendar function to mark selected dates
            function generateCalendar(month, year) {
                calendarBody.innerHTML = "";

                const firstDay = new Date(year, month, 1);
                const lastDay = new Date(year, month + 1, 0);
                const startingDay = firstDay.getDay();

                currentMonthYear.textContent = new Intl.DateTimeFormat("en-US", {
                    month: "long",
                    year: "numeric",
                }).format(firstDay);

                for (let i = 0; i < startingDay; i++) {
                    const prevMonthDate = new Date(year, month, -startingDay + i + 1);
                    const dayDiv = document.createElement("div");
                    dayDiv.textContent = prevMonthDate.getDate();
                    dayDiv.classList.add("calendar-day", "prev-month");
                    calendarBody.appendChild(dayDiv);
                }

                for (let i = 1; i <= lastDay.getDate(); i++) {
                    const dayDiv = document.createElement("div");
                    dayDiv.textContent = i;
                    dayDiv.classList.add("calendar-day");

                    // Check if the current date is in the selectedDates array
                    const currentDate = new Date(year, month, i);
                    if (selectedDates.includes(currentDate.toLocaleDateString())) {
                        dayDiv.classList.add("selected-date");
                    }

                    calendarBody.appendChild(dayDiv);
                }
            }

            generateCalendar(currentMonth, currentYear);

            function setSelectedDate(date) {
                selectedDate = date;
                generateCalendar(currentMonth, currentYear);
            }

            prevMonthBtn.addEventListener("click", function() {
                if (currentMonth === 0) {
                    currentMonth = 11;
                    currentYear--;
                } else {
                    currentMonth--;
                }
                generateCalendar(currentMonth, currentYear);
            });

            nextMonthBtn.addEventListener("click", function() {
                if (currentMonth === 11) {
                    currentMonth = 0;
                    currentYear++;
                } else {
                    currentMonth++;
                }
                generateCalendar(currentMonth, currentYear);
            });

            calendarBody.addEventListener("click", function(event) {
                const dayDiv = event.target;
                if (!dayDiv.classList.contains("calendar-day")) return;

                const day = parseInt(dayDiv.textContent);
                const selectedDay = new Date(currentYear, currentMonth, day);
                setSelectedDate(selectedDay);
            });
        });
    </script>

</body>

</html>