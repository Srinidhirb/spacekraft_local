<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Enquiry</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 70px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            background-color: #003399;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #002266;
        }

        .red {
            color: red;
        }

        .referrer-info {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Your Enquiry</h1>
        <p>Please complete the below form to submit your enquiry</p>
        <form id="enquiryForm" method="post" action="process_enquiry.php">
            <label for="fullName">Full Name <span class="red">*</span></label>
            <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>

            <label for="mobileNumber">Mobile Number <span class="red">*</span></label>
            <input type="text" id="mobileNumber" name="mobileNumber" placeholder="+91 Enter Mobile Number" required>

            <label for="projectDescription">Describe your project <span class="red">*</span></label>
            <textarea id="projectDescription" name="projectDescription" placeholder="Tell the owner about your project. Be specific" required></textarea>

            <label for="ownerQuestions">Any Questions for the owner?</label>
            <textarea id="ownerQuestions" name="ownerQuestions" placeholder="Enter here"></textarea>

            <!-- Date range inputs -->
            <div class="date-range">
                <input type="hidden" class="date-input" id="startDate" name="startDate" placeholder="Start Date" required>
                <span class="separator"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 4.5L11.4697 8.46967C11.7626 8.76256 11.7626 9.23744 11.4697 9.53033L7.5 13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </span>
                <input type="hidden" class="date-input" id="endDate" name="endDate" placeholder="End Date" required>
                <input type="hidden" id="referringUrl" name="referringUrl">
            </div>

            <p>Mandatory Fields are marked with <span class="red">*</span></p>
            <button type="submit">Send Request</button>

            <!-- Placeholder for referrer URL -->
           
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Retrieve dates from local storage if available
            const startDate = localStorage.getItem('startDate');
            const endDate = localStorage.getItem('endDate');
            const referringUrl = localStorage.getItem('referringUrl');

            // Populate form fields with local storage values
            if (startDate && endDate) {
                document.getElementById('startDate').value = startDate;
                document.getElementById('endDate').value = endDate;
            }

            // Set referring URL in hidden input field
            if (referringUrl) {
                document.getElementById('referringUrl').value = referringUrl;
            }

            // Optional: Clear local storage after populating fields
            localStorage.removeItem('startDate');
            localStorage.removeItem('endDate');
            localStorage.removeItem('referringUrl');

            // Form submission handling
            const enquiryForm = document.getElementById('enquiryForm');
            enquiryForm.addEventListener('submit', function(event) {
                // Store dates in local storage before form submission (in case of validation errors)
                localStorage.setItem('startDate', document.getElementById('startDate').value);
                localStorage.setItem('endDate', document.getElementById('endDate').value);
                localStorage.setItem('referringUrl', document.referrer);
            });
        });
    </script>
</body>

</html>