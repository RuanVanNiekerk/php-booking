<?php session_start();?>
<?php

?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <form method="post" action="booking.php">
        <h1>Hotel Reservations</h1><br/>
        <label for="first_name">First Name:</label><br/>
        <input name="first_name" type="text" required><br/>
        <label for="last_name">Surname:</label><br/>
        <input name="last_name" type="text" required><br/>
        <label for="email">Email address:</label><br/>
        <input name="email" type="text" required><br/>
        <p>Select your Hotel by clicking the dropdown menu below.</p><br/>
        <select name="hotel">
            <option value="hotel1">Hotel 1</option>
            <option value="hotel2">Hotel 2</option>
            <option value="hotel3">Hotel 3</option>
            <option value="hotel4">Hotel 4</option>
        </select><br/>
        <label for="check_in">Check in Date</label>
        <input name="check_in" type="date" required><br/>
        <label for="check_out">Check out Date</label>
        <input name="check_out" type="date" required><br/>
        <input type="submit">
    </form>
    
</body>
</html>