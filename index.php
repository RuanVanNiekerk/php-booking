<?php
session_start();
    $hotels = array(//temporary array to hold hotels. Needs to be changed to seperate database
        "hotel1" => array("name"=>"Lemon Tree Lane","rate"=>"180","features"=>"Pool, Beatifully Furnished Rooms, Communal Breakfast each Morning"),
        "hotel2" => array("name"=>"The Paxton Hotel","rate"=>"280","features"=>"Close to the Beach, Pool, Bar, Free Wifi, Room Service, Airport Shuttle Service"),
        "hotel3" => array("name"=>"Radison Blu Hotel","rate"=>"320","features"=>"Close to the Beach, Pool, Bar, Free Wifi, Room Service, Airport Shuttle Service, Wellness Center and Spa, Sea View"),
        "hotel4" => array("name"=>"Forest Hall B&B","rate"=>"120","features"=>"Pool, Free Parking, Airport Shuttle Service, Satellite TV, Breakfast Buffet and Home Cooked Meals"),
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Halant&family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styleSheet.css">
</head>
<body>
    <div class="container-parent">
        <div class="flex-container">
            <form class="flex-col" method="post" action="#">
                <div class="flex-item">
                    <h1>Hotel Reservations</h1>
                    <label for="first_name">First Name:</label><br/>
                    <input class="input" name="first_name" type="text" required><br/><br/>
                    <label for="last_name">Surname:</label><br/>
                    <input class="input" name="last_name" type="text" required><br/><br/>
                    <label for="email">Email address:</label><br/>
                    <input class="input" name="email" type="text" required><br/>
                </div>
                <div class="flex-item">
                    <p>Select your Hotel.</p>
                    <input type="radio" name="hotel" value="hotel1" required>
                    <label for="hotel1">Lemon Tree Lane</label>
                    <input type="radio" name="hotel" value="hotel2">
                    <label for="hotel2">The Paxton Hotel</label>
                    <input type="radio" name="hotel" value="hotel3">
                    <label for="hotel3">Radison Blu Hotel</label>
                    <input type="radio" name="hotel" value="hotel4">
                    <label for="hotel4">Forest Hall B&B</label>
                </div>
                <div class="flex-item">
                    <label for="check_in">Check in Date</label>
                    <input name="check_in" type="date" required>
                    <label for="check_out">Check out Date</label>
                    <input name="check_out" type="date" required><br/>
                    <input id="button" type="submit">
                </div>
            </form>
        </div>  
    </div>
  
</body>
</body>
</html>
