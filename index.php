<?php
session_start();
    $hotels = array(//temporary array to hold hotels. Needs to be changed to seperate database
        "hotel1" => array("name"=>"test","rate"=>"2","features"=>"test"),
        "hotel2" => array("name"=>"test2","rate"=>"4","features"=>"test2test2"),
        "hotel3" => array("name"=>"test3","rate"=>"6","features"=>"test3test3test3"),
        "hotel4" => array("name"=>"test4","rate"=>"8","features"=>"test4test4test4"),
    );
    $_SESSION["hotels"] = $hotels;
    
    if(isset($_POST["hotel"])){
        $_SESSION["selection"] = $_POST["hotel"];
        var_dump($_SESSION["selection"]);
        $_SESSION["date1"] = date_create($_POST["check_in"]);
        $_SESSION["date2"] = date_create($_POST["check_out"]);
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["firstName"] = $_POST["first_name"];    
        var_dump($_SESSION["firstName"]);
        $_SESSION["lastName"] = $_POST["last_name"];
        
        header('Location: booking.php');
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
        <div class="row m-3">
            <div class="col-12 p-3 card-custom">
                <form method="post" action="#">
                <h1>Hotel Reservations</h1><br/>
                <label for="first_name">First Name:</label><br/>
                <input name="first_name" type="text" required><br/>
                <label for="last_name">Surname:</label><br/>
                <input name="last_name" type="text" required><br/>
                <label for="email">Email address:</label><br/>
                <input name="email" type="text" required><br/>
                <p>Select your Hotel by clicking the drop-down menu below.</p><br/>
                <select name="hotel">
                    <option value="hotel1" selected>Hotel 1</option>
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
            </div>
        </div>  
    </div>
        
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</body>
</html>
