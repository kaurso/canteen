<?php
$con = mysqli_connect("localhost", "kaurso", "wildbrass60", "kaurso_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo " ";
}
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
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query1 = "SELECT * FROM foods WHERE food LIKE '%$search%'";
    $query = mysqli_query($con, $query1);
    $count = mysqli_num_rows($query);
    if ($count == 0) {
        echo "There was no search results!";

    } else {
        $_=1;
        while($row=mysqli_fetch_array($query)){
            $food_id=$row['foodID'];
            $food=$row['food'];
            echo"<p> $_.Food Name:<a href=\"fooditems.php?food_id=$food_id\">$food</a>";
            echo "<p> Cost:".$row['cost'];
            echo "<p> Calories:".$row['calories'];
            echo"<p> Vegan:".$row['Vegan'];
            echo"<p> Vegetarian:".$row['Vegetarian'];
            echo"<p> Gluten Free: ".$row['Gluten Free'];
            echo "<br><br>";
            $_=$_+1;
        }


    }
}
?>


