<?php
$con = mysqli_connect("localhost", "kaurso", "wildbrass60", "kaurso_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo " ";
}

/* Foods Query*/
/*Select everything,foods*/
$all_foods_query = "SELECT * FROM foods";
$all_foods_result = mysqli_query($con, $all_foods_query);

if (isset($_GET['food'])){
    $id = $_GET['food'];
}else{
    $id= 0;
}

$this_foods_query= "SELECT food, cost, calories FROM foods WHERE foodID='"  .$id. "'";
$this_foods_result=mysqli_query($con,$this_foods_query);
$this_foods_record=mysqli_fetch_assoc($this_foods_result);
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
            <!-- Nav Bar links and div tags that are connected to styling sheet-->
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
        <h2 id="headings">Our Food Menu!</h2>

        <!-- Search function for foods-->
            <div id="search">
            <h2> Search an item</h2>
            <form action= "search.php" method="post">
                <input type="text" name = "search">
                <input type="submit" value="Search">
            </form>
                
            <?php
            if(isset($_POST['search'])){
                $search = $_POST['search'];
                $query1 = "SELECT * FROM foods WHERE food LIKE '%$search%'";
                $query = mysqli_query($con, $query1);
                $count = mysqli_num_rows($query);
                if($count == 0){
                    echo "There was no search results!";

                }else{
                    while($row = mysqli_fetch_array($query)){
                        echo $row ['food'];
                        echo"<br>";
                    }
                }
            }
            ?>
            </div>


            <div id="search4">
                <p>Filter</p>
            <form name="manage" action="foods.php" method="post">
                <select name="manage">
                    <option value="Choose">Show by</option>
                    <option value="priceLH">Price high to low</option>
                    <option value="priceHL">Price low to high</option>
                    <option value="caloriesHL">Calories low to high</option>
                    <option value="caloriesLH">Calories high to low</option>
                </select>
                <input type="submit" value="Search"/>
            </form>

                <!-- Sort by function-->
        <?php
        if (isset($_POST['manage'])){
            switch( $_POST['manage'] ){

                case 'priceHL':
                    $query = ' SELECT foodID, food, cost,calories, gluten, vegetarian, vegan FROM foods ORDER BY cost ASC';
                    break;
                case 'priceLH':
                    $query = ' SELECT foodID, food, cost,calories, gluten, vegetarian, vegan FROM foods ORDER BY cost DESC';
                    break;
                case 'caloriesHL':
                    $query = ' SELECT foodID, food, cost,calories, gluten, vegetarian, vegan FROM foods ORDER BY calories ASC';
                    break;
                case 'caloriesLH':
                    $query = ' SELECT foodID, food, cost,calories,gluten, vegetarian, vegan FROM foods ORDER BY calories DESC';
                    break;
            }
        }else{
            $query = "SELECT * FROM foods";
        }
        $results = mysqli_query( $con, $query );
        ?>
        </div>

            <div class="itemimages">
            <?php
            while($row=mysqli_fetch_array($results)){
                echo '<div class="placement">';
                $food_id=$row['foodID'];
                $food=$row['food'];
                echo"<p><img src=\"images/$food.jpg\" width='150px' height='150px' alt='Image of food'></p>";
                echo "<a href=\"fooditems.php?food_id=$food_id\">".$row['food']. "</a><br>";
                echo "<p> Cost: ".$row['cost'];
                echo "<p> Calories: ".$row['calories'];
                echo "<br><br>";
                echo'</div>';
        }
        ?>
        </div>

    </main>
</body>

</html>