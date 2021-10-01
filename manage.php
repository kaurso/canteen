<?php
$con = mysqli_connect("localhost", "kaurso", "wildbrass60", "kaurso_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo " ";
}
?>
<main>
<?php
if (isset($_POST['order'])){
    switch( $_POST['order'] ){

        case 'priceDESC':
            $query = ' SELECT item_id, item, cost,calories FROM food ORDER BY cost DESC';
            break;
        case 'priceASC':
            $query = ' SELECT item_id, item, cost,calories FROM food ORDER BY cost ASC';
            break;
        case 'caloriesDESC':
            $query = ' SELECT item_id, item, cost,calories FROM food ORDER BY calories DESC';
            break;
        case 'caloriesASC':
            $query = ' SELECT item_id, item, cost,calories FROM food ORDER BY calories ASC';
            break;
    }
}else{
    $query = "SELECT * FROM food";
}
$results = mysqli_query( $con,$query );
    $_=1;
    while($row=mysqli_fetch_array($results)){
        $food_id=$row['foodID'];
        $food=$row['food'];
        echo"<p> $_.Food Name:<a href=\"fooditems.php?food_id=$food_id\">$food</a>";
        echo "<p> Cost:".$row['cost'];
        echo "<p> Calories:".$row['calories'];
        echo "<br><br>";
        $_=$_+1;
    }
    ?>
</main>


<main>
<?php
if (isset($_POST['order'])){
    switch( $_POST['order'] ){

        case 'priceDESC':
            $query = ' SELECT item_id, item, cost,calories FROM drink ORDER BY cost DESC';
            break;
        case 'priceASC':
            $query = ' SELECT item_id, item, cost,calories FROM drink ORDER BY cost ASC';
            break;
        case 'caloriesDESC':
            $query = ' SELECT item_id, item, cost,calories FROM drink ORDER BY calories DESC';
            break;
        case 'caloriesASC':
            $query = ' SELECT item_id, item, cost,calories FROM drink ORDER BY calories ASC';
            break;
    }
}else{
    $query = "SELECT * FROM drink";
}
$results = mysqli_query( $con,$query );
$_=1;
while($row=mysqli_fetch_array($results)){
    $drink_id=$row['drinkID'];
    $drink=$row['drink'];
    echo"<p> $_.Drink Name:<a href=\"drinkitems.php?drink_id=$drink_id\">$drink</a>";
    echo "<p> Cost:".$row['cost'];
    echo "<p> Calories:".$row['calories'];
    echo "<br><br>";
    $_=$_+1;
}
?>
</main>
