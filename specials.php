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

if (isset($_GET['special'])){
    $id = $_GET['special'];
}else{
    $id= 0;
}

$this_specials_query= "SELECT special, cost, calories FROM specials WHERE specialsID='"  .$id. "'";
$this_specials_result=mysqli_query($con,$this_specials_query);
$this_specials_record=mysqli_fetch_assoc($this_specials_result);
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

<h2>Specials Information</h2>
<?php
echo"<p> Special Combo: ".$this_specials_record['special']."<br>";
echo"<p> Cost: ".$this_specials_record['cost']."<br>";
echo"<p> Calories: ".$this_specials_record['calories']."<br>";
?>

<main>
    <h2> Search an item</h2>
    <form action= "" method="post">
        <input type="text" name = "search">
        <input type="submit" value="Search">
    </form>
    <?php
    if(isset($_POST['search'])){
        $search = $_POST['search'];
        $query1 = "SELECT * FROM specials WHERE special LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);
        if($count == 0){
            echo "There was no search results!";

        }else{
            while($row = mysqli_fetch_array($query)){
                echo $row ['special'];
                echo"<br>";
            }
        }
    }
    ?>
</main>


<main>
    <?php
    $_=1;
    while($row=mysqli_fetch_array($all_specials_result)){
        $special_id=$row['specialsID'];
        $special=$row['special'];
        echo"<p> $_.Special Combo:<a href=\"specialitems.php?special_id=$special_id\">$special</a>";
        echo "<p> Cost:".$row['cost'];
        echo "<p> Calories:".$row['calories'];
        echo "<br><br>";
        $_=$_+1;
    }
    ?>
</main>

</html>

