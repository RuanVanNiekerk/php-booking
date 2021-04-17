<?php
session_start();

$hotels = $_SESSION["hotels"];
$days = date_diff($_SESSION["date1"],$_SESSION["date2"])->format("%a");
$firstOption = $hotels[$_SESSION["selection"]];
//assign values for compared hotel
$secondOption = $hotels[$_POST["compHotel"]];
$_SESSION['secondOption'] = $secondOption;

function compareRate($choice){
$hotels = $_SESSION["hotels"];
$firstOption = $hotels[$_SESSION["selection"]];
$secondOption = $hotels[$_POST["compHotel"]];

    if($choice == 'first'){
        if($secondOption["rate"]<$firstOption["rate"]&&!$secondOption["rate"]==NULL){
            echo '<p>Rate:<b>R'. $firstOption["rate"] .' per day</b>   <img src="images/arrowDown.png" style="height:1em"></p>';
        } elseif($secondOption["rate"]>$firstOption["rate"]) {
            echo '<p>Rate:<b>R'.$firstOption["rate"].' per day</b>   <img src="images/arrowUp.png" style="height:1em"></p>';
        }else{
            echo '<p>Rate:<b>R'.$firstOption["rate"].' per day</b></p>';
        }
    }elseif($choice == 'second'){
        if($secondOption["rate"]!=NULL){
            if($secondOption["rate"]<$firstOption["rate"]&&!$secondOption["rate"]==NULL){
                echo '<p>Rate:<b>R'. $secondOption["rate"] .' per day</b>   <img src="images/arrowUp.png" style="height:1em"></p>';
            } elseif($secondOption["rate"]>$firstOption["rate"]) {
                echo '<p>Rate:<b>R'.$secondOption["rate"].' per day</b>   <img src="images/arrowDown.png" style="height:1em"></p>';
            }else{
                echo '<p>Rate:<b>R'.$secondOption["rate"].' per day</b></p>';
            }
        }else{
            echo '<p>Rate: <b>R**** per day</b></p>';
        }        
    }
}
function compareFeatures($choice){
$hotels = $_SESSION["hotels"];
$firstOption = $hotels[$_SESSION["selection"]];
$secondOption = $hotels[$_POST["compHotel"]];

    if($choice == 'first'){
        if(strlen($secondOption["features"])<strlen($firstOption["features"])&&!$secondOption["rate"]==NULL){
            echo '<p>Features:<b>'. $firstOption["features"] .'</b>   <img src="images/arrowUp.png" style="height:1em"></p>';
        } elseif(strlen($secondOption["features"])>strlen($firstOption["features"])) {
            echo '<p>Features:<b>'.$firstOption["features"].'</b>   <img src="images/arrowDown.png" style="height:1em"></p>';
        }else{
            echo '<p>Features:<b>'.$firstOption["features"].'</b></p>';
        }
    }elseif($choice == 'second'){
        if($secondOption["features"]!=NULL){
            if(strlen($secondOption["features"])<strlen($firstOption["features"])&&!$secondOption["rate"]==NULL){
                echo '<p>Features:<b>'. $firstOption["features"] .'</b>   <img src="images/arrowDown.png" style="height:1em"></p>';
            } elseif(strlen($secondOption["features"])>strlen($firstOption["features"])) {
                echo '<p>Features:<b>'.$firstOption["features"].'</b>   <img src="images/arrowUp.png" style="height:1em"></p>';
            }else{
                echo '<p>Features:<b>'.$secondOption["features"].'</b></p>';
            }
        }else{
            echo '<p>Features: <b>****</b></p>';
        }
        
    }
}
function comparePrice($choice){
$hotels = $_SESSION["hotels"];
$firstOption = $hotels[$_SESSION["selection"]];
$secondOption = $hotels[$_POST["compHotel"]];
$days = date_diff($_SESSION["date1"],$_SESSION["date2"])->format("%a");

    if($choice == 'first'){
        if($secondOption["rate"]*$days<$firstOption["rate"]*$days&&!$secondOption["rate"]*$days==NULL){
            echo '<p>Cost of Stay: <b>R'. $firstOption["rate"]*$days .'</b>   <img src="images/arrowDown.png" style="height:1em"></p>';
        } elseif($secondOption["rate"]*$days>$firstOption["rate"]*$days) {
            echo '<p>Cost of Stay: <b>R'.$firstOption["rate"]*$days.'</b>   <img src="images/arrowUp.png" style="height:1em"></p>';
        }else{
            echo '<p>Cost of Stay: <b>R'.$firstOption["rate"]*$days.'</b></p>';
        }
    }elseif($choice == 'second'){
        if($secondOption["rate"]!=NULL){
            if($secondOption["rate"]*$days<$firstOption["rate"]*$days&&!$secondOption["rate"]*$days==NULL){
                echo '<p>Cost of Stay: <b>R'. $secondOption["rate"]*$days .'</b>   <img src="images/arrowUp.png" style="height:1em"></p>';
            } elseif($secondOption["rate"]*$days>$firstOption["rate"]*$days) {
                echo '<p>Cost of Stay: <b>R'.$secondOption["rate"]*$days.'</b>   <img src="images/arrowDown.png" style="height:1em"></p>';
            }else{
                echo '<p>Cost of Stay: <b>R'.$secondOption["rate"]*$days.'</b></p>';
            }
        }else{
            echo '<p>Cost of Stay: <b>R****</b></p>';
        }
    }
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
    <?php echo $hotels[1] ?>
    <div class="flex-col" method="post" action="#">
        <h1>Lets Compare Some Options First</h1>
        <div class="flex-item">
            <h2>Your First Choice</h2>
        </div>
        <div class="flex-item">
            <h3><?php echo $firstOption["name"]?></h3>
            <?php compareRate("first")?>
            <?php compareFeatures("first")?>
            <?php compareprice("first")?>
            <form method="post" action="mail.php">
                <input id="button" name="book1" type="submit" value="Make a Booking">
            </form>
        </div>
        <div class="flex-item">
            <h2>Select Your Second Choice</h2>
            <form id="comp" name="compare" method="post" action="">
                <select class="input" name="compHotel" onchange="comp.submit()">
                    <option selected disabled>Choose a Hotel</option>
                    <option value="hotel1">Lemon Tree Lane</option>
                    <option value="hotel2">The Paxton Hotel</option>
                    <option value="hotel3">Radison Blu Hotel</option>
                    <option value="hotel4">Forest Hall B&B</option>
                </select>
            </form> 
        </div>
        <div class="flex-item">

            <h3><?php 
                if($secondOption["name"]!=NULL){
                    echo $secondOption["name"];
                }else{
                    echo "****";
                }
            ?></h3>
            <?php compareRate("second")?>
            <?php compareFeatures("second")?>
            <?php compareprice("second")?>
            <form method="post" action="mail.php">
                <input id="button" name="book2" type="submit" value="Make a Booking">
            </form>
        </div>
    </div>
</body>
</html>
