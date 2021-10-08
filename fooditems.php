<?php
$con = mysqli_connect("localhost", "kaurso", "wildbrass60", "kaurso_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo " ";
}

$item_id=$_GET['food_id'];
$this_query= "SELECT foods.foodID, foods.food, foods.cost, foods.calories, foods.vegan, foods.vegetarian, foods.gluten, stocks.availability FROM foods, stocks WHERE foods.availabilityID=stocks.availabilityID AND foodID='"  .$item_id. "'";
$this_results=mysqli_query($con, $this_query);
$this_query_results=mysqli_fetch_assoc($this_results);
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
<header>
    <nav>
        <ul class="nav_links">
            <li> <a href='index.php'> HOME </a></li>
            <li> <a href='drinks.php'> DRINKS </a></li>
            <li> <a href='foods.php'> FOOD </a></li>
            <li> <a href='specials.php'> WEEKLY SPECIALS</a></li>
        </ul>
    </nav>
    <a class="cta" href="contact.php"><button>Contact</button></a>
</header>
</body>
<?php
$food=$this_query_results['food'];
echo"<p><img src=\"images/$food.jpg\" width='150px' height='150px'></p>";
echo $this_query_results['food'];
echo "<p> Cost: ".$this_query_results['cost'];
    echo "<p> Calories: ".$this_query_results['calories'];
    echo"<p> Vegan:".$this_query_results['vegan'];
    echo"<p> Vegetarian:".$this_query_results['vegetarian'];
    echo"<p> Gluten Free: ".$this_query_results['gluten'];
    echo "<br><br>";
?>