<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Construct email message
    $to = "ambuj1402@gmail.com";
    $subject = "New message from $name: $subject";
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message: $message";

    // Send email
    $success = mail($to, $subject, $body);

    // Check if email was sent successfully
    if ($success) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Sorry, there was a problem sending your message.";
    }
} else {
    // If the request method is not POST, redirect back to the form page
    header("Location: index.html");
}
?>
