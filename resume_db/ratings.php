<?php
session_start();

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contact_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $category = ($rating >= 4) ? 'positive' : 'negative';

    $stmt = $conn->prepare("INSERT INTO ratings (email, rating, category) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $email, $rating, $category);

    if ($stmt->execute()) {
        $success_message = "Rating successfully submitted!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Form</title>
    <style>
        body {
            background-color: black;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .rating-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .rating-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .stars {
            position: relative;
            display: inline-block;
            direction: rtl;
        }

        .stars input[type="radio"] {
            display: none;
        }

        .stars label {
            font-size: 40px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        .stars input[type="radio"]:checked ~ label {
            color: gold;
        }

        .stars label:hover,
        .stars label:hover ~ label {
            color: gold;
        }

        input[type="email"] {
            padding: 10px;
            width: calc(100% - 22px);
            margin-top: 15px;
            border: none;
            border-radius: 5px;
        }

        button {
            background-color: #0077b6;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #005f87;
        }

        p.error {
            color: red;
        }

        span.error {
            color: red;
            font-size: 14px;
        }

        p.description {
            margin-bottom: 10px;
            font-size: 16px;
        }
    </style>
    <script>
        function validateEmail() {
            var email = document.forms[0].email.value;
            var emailPattern = /^[a-zA-Z][a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            var errorSpan = document.getElementById("emailError");
            if (!emailPattern.test(email)) {
                errorSpan.innerText = "Please enter a valid email address.";
                return false;
            } else {
                errorSpan.innerText = "";
                return true;
            }
        }

        function displayMessage(message, isError) {
            var messageContainer = document.getElementById("messageContainer");
            messageContainer.innerHTML = message;
            messageContainer.style.color = isError ? "red" : "green";
        }

        window.onload = function() {
            <?php if (!empty($success_message)): ?>
                displayMessage("<?php echo $success_message; ?>", false);
            <?php elseif (!empty($error_message)): ?>
                displayMessage("<?php echo $error_message; ?>", true);
            <?php endif; ?>
        };
    </script>
</head>

<body>

    <div class="rating-container">
        <div id="messageContainer"></div>
        <h2>Rate My Resume</h2>
        <p class="description">Please enter your email and select a rating from 1 to 5 stars.</p>
        <form method="POST" action="" onsubmit="return validateEmail()">
            <input type="email" name="email" placeholder="Enter your email" required>
            <span id="emailError" class="error"></span><br>
            <div class="stars">
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1">&#9733;</label>
            </div>

            <br>
            <button type="submit" name="submit">Submit Rating</button>
        </form>
    </div>

</body>

</html>
