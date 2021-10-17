<?php
$con = mysqli_connect("localhost", "kaurso", "wildbrass60", "kaurso_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo " ";
}
/* Specials Query*/
/*Select specialsID, Item FROM special*/
$all_specials_query = "SELECT * FROM specials";
$all_specials_result = mysqli_query($con, $all_specials_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> WGC CANTEEN </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='styling.css'>
    <h1>WGC CANTEEN</h1>
</head>

<body>
    <div id="logo">
        <a href="index.php"><img class="logo" src="images/WGC.png" width="125px" height="125px" alt="Image of logo"></a>
    </div>
    <main>
        <h2 id="headings">Our Specials Menu!</h2>
        <header>
            <nav>
                <!-- Nav Bar links and div tags that are connected to styling sheet-->
                <ul class="nav_links">
                    <li> <a href='index.php'> HOME </a></li>
                    <li> <a href='drinks.php'> DRINKS </a></li>
                    <li> <a href='foods.php'> FOOD </a></li>
                    <li> <a href='specials.php'> WEEKLY SPECIALS</a></li>
                </ul>
            </nav>
            <a class="cta" href="contact.php"><button>Contact</button></a>
        </header>


            <?php
            $_=1;
            while($row=mysqli_fetch_array($all_specials_result)){
                echo '<div class="placement">';
                $special_id=$row['specialsID'];
                $this_specials_query= "SELECT specials.specialsID, specials.cost, specials.calories, specials.day, foods.food, drinks.drink FROM specials,foods,drinks WHERE foods.foodID=specials.foodID AND drinks.drinkID=specials.drinkID AND specialsID='" .$special_id."'";
                $this_specials_result=mysqli_query($con,$this_specials_query);
                $this_specials_record=mysqli_fetch_assoc($this_specials_result);
                $food=$this_specials_record['food'];
                $drink=$this_specials_record['drink'];
                $food_id=$row['foodID'];
                $drink_id=$row['drinkID'];
                echo"<p> Food:<a href=\"fooditems.php?food_id=$food_id\">$food</a>";
                echo"<p> Drink:<a href=\"drinkitems.php?drink_id=$drink_id\">$drink</a>";
                echo "<p> Day :".$row['day'];
                echo "<p> Cost:".$row['cost'];
                echo "<p> Calories:".$row['calories'];
                echo "<br><br>";
                echo'</div>';
                $_=$_+1;
            }
            ?>
    </main>
</body>

</html>
