<?php
$con = mysqli_connect("localhost", "kaurso", "wildbrass60", "kaurso_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo " ";
}

$item_id=$_GET['drink_id'];
$this_query= "SELECT drinks.drinkID, drinks.drink, drinks.cost, drinks.calories, stocks.availability FROM drinks, stocks WHERE drinks.availabilityID=stocks.availabilityID AND drinkID='"  .$item_id. "'";
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
        <main>
        <header>
            <nav>
                <!-- Nav bar with links to all pages-->
                <ul class="nav_links">
                    <li> <a href='index.php'> HOME </a></li>
                    <li> <a href='drinks.php'> DRINKS </a></li>
                    <li> <a href='foods.php'> FOOD </a></li>
                    <li> <a href='specials.php'> WEEKLY SPECIALS</a></li>
                </ul>
            </nav>
            <a class="cta" href="contact.php"><button>Contact</button></a>
        </header>
            <!-- Displaying the information of each drink item-->
            <?php
            $drink=$this_query_results['drink'];
            echo"<p><img src=\"images/$drink.jpg\" width='150px' height='150px'></p>";
            echo $this_query_results['drink'];
            echo "<p> Cost: ".$this_query_results['cost'];
            echo "<p> Calories: ".$this_query_results['calories'];
            echo"<p> Availability: ".$this_query_results['availability'];
            echo "<br><br>";
            ?>
        </main>
    </body>

</html>