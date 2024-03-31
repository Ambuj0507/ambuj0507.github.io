<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['comment']; // Changed from 'message' to 'comment'

    // Instantiate PHPMailer
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your@example.com'; // SMTP username
        $mail->Password   = 'yourpassword'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port       = 587; // TCP port to connect to
        
        //Recipients
        $mail->setFrom('your@example.com', 'Your Name'); // Sender's email and name
        $mail->addAddress('ambuj1402@gmail.com'); // Recipient's email
        
        // Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = "New message from $name: $subject";
        $mail->Body    = "Name: $name\nEmail: $email\nMessage: $message";
        
        $mail->send();
        echo "Your message has been sent successfully.";
    } catch (Exception $e) {
        echo "Sorry, there was a problem sending your message. Error: {$mail->ErrorInfo}";
    }
} else {
    // If the request method is not POST, redirect back to the form page
    header("Location: index.html");
}
?>
