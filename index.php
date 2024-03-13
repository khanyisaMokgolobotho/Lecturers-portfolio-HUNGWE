<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all fields";
        exit;
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }
    
    // Email receiver
    $to = "khanyisafaithmokgolobotho@gmail.com";
    
    // Email subject
    $subject = "New Contact Form Submission";
    
    // Email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message: \n$message";
    
    // Headers
    $headers = "From: $email\r\nReply-To: $email\r\n";
    
    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Thank you for contacting us!";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    // If the request method is not POST, redirect back to the contact form
    header("Location: contact_form.php");
    exit;
}
?>
