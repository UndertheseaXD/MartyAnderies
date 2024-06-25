<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the POST variables are set and not empty
    if (!empty($_POST["message"]) && !empty($_POST["name"]) && !empty($_POST["email"])) {
        $to = "m.anderies@asu.edu"; // Replace with your email address
        $subject = "New Message";
        $name = htmlspecialchars($_POST['name']);
        $message = htmlspecialchars($_POST["message"]);
        $from = htmlspecialchars($_POST["email"]);
        
        // If any field is empty, redirect back
        if (empty($message) || empty($name) || empty($from)) {
            header('Location:../index.html');
            exit();
        }

        // Send the email
        $headers = "From: " . $from;
        if (mail($to, $subject, $message, $headers)) {
            echo "Message sent!";
        } else {
            echo "Failed to send message.";
        }
        
        // Redirect after processing
        header('Location:../index.html');
        exit();
    } else {
        // Redirect if any field is missing
        header('Location:../index.html');
        exit();
    }
}
      
