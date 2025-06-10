<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $phone   = htmlspecialchars(trim($_POST['phone']));
    $amount  = htmlspecialchars(trim($_POST['amount']));
    $term    = htmlspecialchars(trim($_POST['term']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email details
    $adminEmail = "wethu.mhlanga@imaginescholar.org";  // Replace with your real admin email
    $subject = "New Loan Application from $name";

    $body = "You have received a new loan application:\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Phone: $phone\n" .
            "Loan Amount: R$amount\n" .
            "Repayment Term: $term months\n" .
            "Message: $message\n";

    $headers = "From: no-reply@khulammtradings.co.za\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($adminEmail, $subject, $body, $headers)) {
        echo "Thank you, your application has been submitted. We will contact you soon.";
    } else {
        echo "Sorry, there was an error sending your application. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
