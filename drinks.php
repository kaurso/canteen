<?php
$con = mysqli_connect("localhost", "kaurso", "wildbrass60", "kaurso_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo " ";
}
/* Drinks Query*/
/*Select Everything, from drinks and stocks*/
$all_drinks_query = "SELECT * FROM drinks, stocks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

if (isset($_GET['drink'])){
    $id = $_GET['drink'];
}else{
    $id= 0;
}
/*Running drinks query: Selecting drinks cost calories availibility from drinks and stocks. */
$this_drinks_query= "SELECT drink, cost, calories, availability FROM drinks, stocks WHERE drinkID='"  .$id. "'";
$this_drinks_result=mysqli_query($con,$this_drinks_query);
$this_drinks_record=mysqli_fetch_assoc($this_drinks_result);
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
<!-- Nav Bar links and div tags that are connected to styling sheet-->
    <div id="logo">
        <a href="index.php"><img class="logo" src="images/WGC.png" width="125px" height="125px" alt="Image of logo"></a>
    </div>
    <main>
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
            <h2 id="headings">Our Drink Menu!</h2>

        <div id="search">
        <h2> Search an item</h2>

        <form action= "searchd.php" method="post">
            <input type="text" name = "search">
            <input type="submit" value="Search">
        </form>
            <!-- Search function for drinks-->
        <?php
        if(isset($_POST['search'])){
            $search = $_POST['search'];
            $query1 = "SELECT * FROM drinks WHERE drink LIKE '%$search%'";
            $query = mysqli_query($con, $query1);
            $count = mysqli_num_rows($query);
            if($count == 0){
                echo "There was no search results!";

            }else{
                while($row = mysqli_fetch_array($query)){
                    echo $row ['drink'];
                    echo"<br>";
                }
            }
        }
        ?>

        </div>

        <!-- Sort by function-->
        <div id="search4">
            <p>Filter</p>
        <form name="manage" action="drinks.php" method="post">
            <select name="manage">
                <option value="Choose">Show by</option>
                <option value="priceLH">Price high to low</option>
                <option value="priceHL">Price low to high</option>
                <option value="caloriesHL">Calories low to high</option>
                <option value="caloriesLH">Calories high to low</option>
            </select>
            <input type="submit" value="Search"/>
        </form>

        <?php
        if (isset($_POST['manage'])){
            switch( $_POST['manage'] ){

                case 'priceHL':
                    $query = ' SELECT drinkID, drink, cost,calories FROM drinks ORDER BY cost ASC';
                    break;
                case 'priceLH':
                    $query = ' SELECT drinkID, drink, cost,calories FROM drinks ORDER BY cost DESC';
                    break;
                case 'caloriesHL':
                    $query = ' SELECT drinkID, drink, cost,calories FROM drinks ORDER BY calories ASC';
                    break;
                case 'caloriesLH':
                    $query = ' SELECT drinkID, drink, cost,calories FROM drinks ORDER BY calories DESC';
                    break;
            }
        }else{
            $query = "SELECT * FROM drinks";
        }
        $results = mysqli_query( $con, $query );
        ?>
        </div>


        <div class="itemimages">
        <?php
        while($row=mysqli_fetch_array($results)){
            echo '<div class="placement">';
            $drink_id=$row['drinkID'];
            $drink=$row['drink'];
            echo"<p><img src=\"images/$drink.jpg\" width='150px' height='150px' alt='Image of drink'></p>";
            echo"<p> Drink Name: <a href=\"drinkitems.php?drink_id=$drink_id\">$drink</a>";
            echo "<p> Cost: ".$row['cost'];
            echo "<p> Calories: ".$row['calories'];
            echo "<br><br><br><br>";
            echo'</div>';
        }
        ?>
        </div>
    </main>
</body>

</html>
