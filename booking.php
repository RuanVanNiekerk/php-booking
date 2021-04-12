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
            echo '<p style="color:red">Rate:'. $firstOption["rate"] .'</p>';
        } elseif($secondOption["rate"]>$firstOption["rate"]) {
            echo '<p style="color:green">Rate:'.$firstOption["rate"].'</p>';
        }else{
            echo '<p>Rate:'.$firstOption["rate"].'</p>';
        }
    }elseif($choice == 'second'){
        if($secondOption["rate"]<$firstOption["rate"]&&!$secondOption["rate"]==NULL){
            echo '<p style="color:green">Rate:'. $secondOption["rate"] .'</p>';
        } elseif($secondOption["rate"]>$firstOption["rate"]) {
            echo '<p style="color:red">Rate:'.$secondOption["rate"].'</p>';
        }else{
            echo '<p>Rate:'.$secondOption["rate"].'</p>';
        }
    }
}
function compareFeatures($choice){
$hotels = $_SESSION["hotels"];
$firstOption = $hotels[$_SESSION["selection"]];
$secondOption = $hotels[$_POST["compHotel"]];

    if($choice == 'first'){
        if(strlen($secondOption["features"])<strlen($firstOption["features"])&&!$secondOption["rate"]==NULL){
            echo '<p style="color:green">Features:'. $firstOption["features"] .'</p>';
        } elseif(strlen($secondOption["features"])>strlen($firstOption["features"])) {
            echo '<p style="color:red">Features:'.$firstOption["features"].'</p>';
        }else{
            echo '<p>Features:'.$firstOption["features"].'</p>';
        }
    }elseif($choice == 'second'){
        if(strlen($secondOption["features"])<strlen($firstOption["features"])&&!$secondOption["rate"]==NULL){
            echo '<p style="color:red">Features:'. $firstOption["features"] .'</p>';
        } elseif(strlen($secondOption["features"])>strlen($firstOption["features"])) {
            echo '<p style="color:green">Features:'.$firstOption["features"].'</p>';
        }else{
            echo '<p>Features:'.$secondOption["features"].'</p>';
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
            echo '<p style="color:red">Cost of Stay: R'. $firstOption["rate"]*$days .'</p>';
        } elseif($secondOption["rate"]*$days>$firstOption["rate"]*$days) {
            echo '<p style="color:green">Cost of Stay: R'.$firstOption["rate"]*$days.'</p>';
        }else{
            echo '<p>Cost of Stay: R'.$firstOption["rate"]*$days.'</p>';
        }
    }elseif($choice == 'second'){
        if($secondOption["rate"]*$days<$firstOption["rate"]*$days&&!$secondOption["rate"]*$days==NULL){
            echo '<p style="color:green">Cost of Stay: R'. $secondOption["rate"]*$days .'</p>';
        } elseif($secondOption["rate"]*$days>$firstOption["rate"]*$days) {
            echo '<p style="color:red">Cost of Stay: R'.$secondOption["rate"]*$days.'</p>';
        }else{
            echo '<p>Cost of Stay: R'.$secondOption["rate"]*$days.'</p>';
        }
    }
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
    <div class="container container-custom">
        <div class="row">
            <div class="col-12 mt-3 p-3 card-custom">
                <h1>Lets Compare Some Options First</h1>
            </div>            
        </div>  
        <div class="row">
            <div class="col-12 mt-3  p-0 pr-lg-2 col-lg-6">
                <div class="card-custom h-100">
                    <div class="card-header">
                        <h3>Original Choice</h3>
                    </div>
                    <div class="card-body">
                        <h3><?php echo $firstOption["name"]?></h3>
                        <?php compareRate("first")?>
                        <?php compareFeatures("first")?>
                        <?php compareprice("first")?>
                    </div>                    
                    <div class="card-footer">
                        <form method="post" action="mail.php">
                            <input name="book1" type="submit" value="book">
                        </form>
                    </div>
                </div>                
            </div>
            <div class="col-12 mt-3 p-0 pl-lg-2 col-lg-6">
                <div class="card-custom h-100">
                    <div class="card-header">
                        <form id="comp" name="compare" method="post" action="">
                            <select name="compHotel" onchange="comp.submit()">
                                <option selected disabled>Choose a Hotel</option>
                                <option value="hotel1">Hotel 1</option>
                                <option value="hotel2">Hotel 2</option>
                                <option value="hotel3">Hotel 3</option>
                                <option value="hotel4">Hotel 4</option>
                            </select>
                        </form>
                    </div>
                    <div class="card-body">                        
                        <h3><?php echo $secondOption["name"]?></h3>
                        <?php compareRate("second")?>
                        <?php compareFeatures("second")?>
                        <?php compareprice("second")?>                        
                    </div>
                    <div class="card-footer">
                        <form method="post" action="mail.php">
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
