<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input data
    $fullName = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING);
    $numberOfBags = filter_input(INPUT_POST, 'numberOfBags', FILTER_SANITIZE_NUMBER_INT);
    $deliveryDate = filter_input(INPUT_POST, 'deliveryDate', FILTER_SANITIZE_STRING);
    $phoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $additionalInfo = filter_input(INPUT_POST, 'additionalInfo', FILTER_SANITIZE_STRING);

    // Validate the required fields
    if (empty($fullName) || empty($numberOfBags) || empty($deliveryDate) || empty($phoneNumber) || empty($email)) {
        echo "All required fields must be filled out.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email details
    $to = "cobbiekay8642@gmail.com";
    $subject = "New Water Delivery Request";
    
    // Prepare the email content
    $message = "
    <html>
    <head>
      <title>New Water Delivery Request</title>
    </head>
    <body>
      <h2>Water Delivery Request</h2>
      <p><strong>Full Name:</strong> $fullName</p>
      <p><strong>Number of Bags:</strong> $numberOfBags</p>
      <p><strong>Preferred Delivery Date:</strong> $deliveryDate</p>
      <p><strong>Phone Number:</strong> $phoneNumber</p>
      <p><strong>Email:</strong> $email</p>
      <p><strong>Additional Information:</strong> $additionalInfo</p>
    </body>
    </html>
    ";

    // Set content-type header for HTML email
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= "From: <$email>" . "\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Your request has been sent successfully!";
    } else {
        echo "Failed to send the request. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
