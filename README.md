# php-booking
## introduction
php-booking is a hotel booking web app that can be used to compare and book a client's stay at one of a selection of hotels.
## How To Use
for this web app to work, it needs to be hosted from a server that supports php web pages and mySQL databases. Once a booking has been made, a confirmation of booking 
email will be sent and received by mailtrap, these emails can be viewed on the mailtrap website. Make sure that the correct mailtrap info has been saved in the following 
lines of code in the mail.php file:
````
    $mail->Username   = '...';                       // SMTP username
    $mail->Password   = '...';                       // SMTP password
    $mail->Port       = ...;
````
## Technologies Used
- HTML5
- CSS3
- PHP
- Mailtrap
