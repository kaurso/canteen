<?php
$con = mysqli_connect("localhost", "kaurso", "wildbrass60", "kaurso_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
/* Drinks Query*/
/*Select DrinkID, Item FROM drinks*/
$all_Drinks_query = "SELECT drinksID, item FROM drinks";
$all_Drinks_result = mysqli_query($con, $all_Drinks_query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Coffee shop </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>

<body>
<header>
    <h1> Coffee Shop </h1>
    <nav>
        <ul>
            <li> <a href="index.php"> HOME </a></li>
            <li> <a href="drinks.php"> DRINKS </a></li>
            <li> <a href="orders.php"> ORDERS </a></li>
        </ul>
    </nav>
</header>
<main>
    <!--Drinks form-->
    <form name= 'drinks form' id='drink_form' method='get' action='drinks.php'>
        <select id='drink' name='drink'>
            <!--options-->
            <?php
            while($all_Drinks_record = mysqli_fetch_assoc($all_Drinks_result)){
                echo "<option value ='". $all_drinks_record['drinksID']."'>";
                echo $all_Drinks_record['item'];
                echo "</option>";
            }
            ?>
        </select>
        <input type='submit' name='drinks_button' value='Show me the drink information'>
    </form>
    <!--Orders form-->
    <form name= 'orders form' id='order_form' method='get' action='orders.php'>
        <select id='order' name='order'>
            <!--options-->
        </select>
        <input type='submit' name='orders_button' value='Show me the orders information'>
    </form>
</main>

</body>
</html>
