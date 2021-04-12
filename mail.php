<?php
session_start();

$hotels = $_SESSION["hotels"];
$days = date_diff($_SESSION["date1"],$_SESSION["date2"])->format("%a");
//assign values for compared hotel
$firstOption = $hotels[$_SESSION["selection"]];
$secondOption = $_SESSION['secondOption'];

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '05b0611d206f40';                       // SMTP username
    $mail->Password   = 'c207557c9562af';                       // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 2525;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($_SESSION["email"], $_SESSION["firstName"]);     // Add a recipient
    $mail->addReplyTo('info@example.com', 'Information');

    
    if(isset($_POST["book1"])){
        $message = "Dear ".$_SESSION["firstName"]." ".$_SESSION["lastName"]."<br><br>"."The following booking details have been confirmed.<br>"
                . "Location: ".$firstOption["name"]."<br>"
                . "Features: ".$firstOption["features"]."<br>"
                . "Duration: ".$days." days.<br>"
                . "Price: ".$firstOption["rate"]*$days;

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Booking Confirmation';
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    }elseif(isset($_POST["book2"])){
        $message = "Dear ".$_SESSION["firstName"]." ".$_SESSION["lastName"]."<br><br>"."The following booking details have been confirmed.<br>"
                . "Location: ".$secondOption["name"]."<br>"
                . "Features: ".$secondOption["features"]."<br>"
                . "Duration: ".$days." days.<br>"
                . "Price: ".$secondOption["rate"]*$days;
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Booking Confirmation';
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header('Location: booking.php');
?>