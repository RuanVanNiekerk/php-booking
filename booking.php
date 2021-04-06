<?php
    $hotels = array(//temporary array to hold hotels. Needs to be changed to seperate database
        "hotel1" => array("name"=>"test","rate"=>"2","features"=>"test"),
        "hotel2" => array("name"=>"test2","rate"=>"4","features"=>"test2"),
        "hotel3" => array("name"=>"test3","rate"=>"6","features"=>"test3"),
        "hotel4" => array("name"=>"test4","rate"=>"8","features"=>"test4"),
    );    
    if(!isset($_SESSION["selection"])){
        $_SESSION["selection"] = $_POST["hotel"];//hotel that was selected on previous page is used to pull relevant info of that hotel from array/database
        var_dump($_SESSION["selection"]);
        $_SESSION["date1"] = date_create($_POST["check_in"]);
        $_SESSION["date2"] = date_create($_POST["check_out"]);
        $days = date_diff($_SESSION["date1"],$_SESSION["date2"]);
        var_dump($days->format("%a"));
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["firstName"] = $_POST["first_name"];
        $_SESSION["lastName"] = $_POST["last_name"];
    };
        
    $firstOption = $hotels[$_SESSION["selection"]];
    //assign values for compared hotel
    $secondOption = $hotels[$_POST["compHotel"]];
    
    //mails a confirmation of booking
    
    if($_POST["book1"]){
        echo 'Hello World';
        var_dump(mail($_SESSION["email"], "Booking", $message));        
    }
        /*if($option == "first"){
            $message = "Dear ".$_SESSION["firstName"]." ".$_SESSION["lastName"]."\n \n"."Your booking has been confirmed. ";
            var_dump(mail($_SESSION["email"], "Booking", $message));
        }elseif($option == "second"){
            $message = "Dear ".$_SESSION["firstName"]." ".$_SESSION["lastName"]."\n \n"."Your booking has been confirmed. ";
            mail($_SESSION["email"], "Booking", $message); 
        }*/
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <h1>Hotel Comparison</h1>
    <div>
        <h3><?php echo $firstOption["name"]?></h3>
        <p>Rate:<?php echo $firstOption["rate"] ?></p>
        <p>Features:<?php echo $firstOption["features"] ?></p>
        <p>Cost of Stay: R<?php echo $firstOption["rate"]*$days->format("%a")?></p>.<!--Fix issue: always gets 0. sort out price calculation-->
    <div>
        <input name="book1" type="submit" value="book">
    </div>
    </div>
    <div>
        <form id="comp" name="compare" method="post" action="">
            <select name="compHotel">
                <option value="hotel1">Hotel 1</option>
                <option value="hotel2">Hotel 2</option>
                <option value="hotel3">Hotel 3</option>
                <option value="hotel4">Hotel 4</option>
            </select>
            <input type="submit" value="compare">
        </form>
        <h3><?php echo $secondOption["name"]?></h3>
        <p>Rate:<?php echo $secondOption["rate"] ?></p>
        <p>Features:<?php echo $secondOption["features"] ?></p>
        <p>Cost of Stay: R<?php echo $secondOption["rate"]*$days->format("%a")?></p><!--Fix issue: always gets 0. sort out price calculation-->
    <div>
        <input name="book1" type="submit" value="book">
    </div>
    </div>
    <script type="text/javascript" src="submit.js"></script>
</body>
</html>
