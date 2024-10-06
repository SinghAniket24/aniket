<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer files
require 'C:/xampp/htdocs/resume_db/phpmailer/src/Exception.php';
require 'C:/xampp/htdocs/resume_db/phpmailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/resume_db/phpmailer/src/SMTP.php';

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "Contact_Db";

$conn = new mysqli($servername, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$meet_date = $_POST['meet_date'];
$preferred_time = $_POST['preferred_time'];
$message = $_POST['message'];

echo "<h1>Hello, $name!</h1>";
echo "<p>Thank you for reaching out. I will contact you soon.</p>";

$insert_stmt = $conn->prepare("INSERT INTO contact_details (name, email, meet_date, preferred_time, message) VALUES (?, ?, ?, ?, ?)");
$insert_stmt->bind_param("sssss", $name, $email, $meet_date, $preferred_time, $message);

if ($insert_stmt->execute()) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'aniket.singh.st1@gmail.com';
        $mail->Password   = 'pmxh ueeb wnxv eofc'; // app pass from play store
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
        $mail->Port       = 587;

       
        $mail->setFrom('aniket.singh.st1@gmail.com', 'Aniket Singh'); 
        $mail->addAddress($email, $name); // user's email

        // mail content
        $mail->isHTML(true);                                     
        $mail->Subject = 'Thank You for Reaching Out!';         
        $mail->Body    = "
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        margin: 0;
                        padding: 0;
                        background-color: #f4f4f4;
                    }
                    .container {
                        max-width: 600px;
                        margin: auto;
                        background: #fff;
                        padding: 20px;
                        border-radius: 5px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #333;
                    }
                    p {
                        color: #555;
                    }
                    .footer {
                        font-size: 0.9em;
                        color: #aaa;
                        margin-top: 20px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1>Hello, $name!</h1>
                    <p>Thank you for reaching out to me through my resume webpage. I have received your message and appreciate your interest.</p>
                    <p>Here’s a summary of your submitted details:</p>
                    <ul>
                        <li><strong>Name:</strong> $name</li>
                        <li><strong>Email:</strong> $email</li>
                        <li><strong>Meeting Date:</strong> $meet_date</li>
                        <li><strong>Preferred Time:</strong> $preferred_time</li>
                        <li><strong>Message:</strong> $message</li>
                    </ul>
                    <p>I will get back to you soon to discuss further!</p>
                    <p>Best regards,<br>Aniket Singh</p>
                </div>
                <div class='footer'>
                    <p>This is an automated message, please do not reply.</p>
                </div>
            </body>
            </html>
        ";

        // Send email
        $mail->send();
        echo "<p>An Email confirmation has been sent to you.</p>";
    } catch (Exception $e) {
        echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
    }
} else {
    echo "<p>Error sending message: " . $insert_stmt->error . "</p>";
}

$insert_stmt->close();
$conn->close();
?>

<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #ffffff, #f0f0f0);
    padding: 20px;
    color: #333333;
}

h1 {
    color: #00509e;
}

p {
    font-size: 1.1em;
    color: #444444;
}

a {
    color: #0073e6;
    background-color:wheat;
    padding:5px;
    border:1px solid black;
}

a:hover {
    text-decoration: underline;
    color: #00509e;
}

</style>

<br><br>
<h2><a href="form_resume.html">Return to Resume page</a></h2>
