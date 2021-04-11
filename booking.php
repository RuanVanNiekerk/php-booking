<?php
session_start();

$hotels = $_SESSION["hotels"];
$days = date_diff($_SESSION["date1"],$_SESSION["date2"])->format("%a");
$firstOption = $hotels[$_SESSION["selection"]];
//assign values for compared hotel
if(isset($_POST["compHotel"])){
    $secondOption = $hotels[$_POST["compHotel"]];
}

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
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleSheet.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Hotel Comparison</h1>
        </div>  
        <div class="row">
            <div class="col-6">
                <div class="card-custom h-100">
                    <div class="card-body">
                        <h3><?php echo $firstOption["name"]?></h3>
                        <p>Rate:<?php echo $firstOption["rate"] ?></p>
                        <p>Features:<?php echo $firstOption["features"] ?></p>
                        <p>Cost of Stay: R<?php echo $firstOption["rate"]*$days?></p><!--Fix issue: always gets 0. sort out price calculation-->
                    </div>                    
                    <div class="card-footer">
                        <form method="post">
                            <input name="book1" type="submit" value="book">
                        </form>
                    </div>
                </div>                
            </div>
            <div class="col-6">
                <div class="card-custom h-100">
                    <div class="card-header">
                        <form id="comp" name="compare" method="post" action="">
                            <select name="compHotel" onchange="comp.submit()">
                                <option value="hotel1">Hotel 1</option>
                                <option value="hotel2">Hotel 2</option>
                                <option value="hotel3">Hotel 3</option>
                                <option value="hotel4">Hotel 4</option>
                            </select>
                        </form>
                    </div>
                    <div class="card-body">                        
                        <h3><?php echo $secondOption["name"]?></h3>
                        <p>Rate:<?php echo $secondOption["rate"] ?></p>
                        <p>Features:<?php echo $secondOption["features"] ?></p>
                        <p>Cost of Stay: R<?php echo $secondOption["rate"]*$days?></p><!--Fix issue: always gets 0. sort out price calculation-->                        
                    </div>
                    <div class="card-footer">
                        <form method="post">
                            <input name="book2" type="submit" value="book">
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
