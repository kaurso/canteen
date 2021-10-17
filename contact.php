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

    <h1>Contact Us</h1>
    <div class="contact">
        <a href="https://wgc.school.nz/contact/" target="_blank"> If you have any enquiries or concerns, please don't hesitate
            to call us, on our school's official website!</a>
    </div>

    <p>The canteen is open during school hours</p>
    <p> That is Monday to Friday 8:30am to 3:20pm</p>
    <p>Click on the image for directions to the school!</p>
    <a href="https://wgc.school.nz/our-school/map-and-directions/" target="_blank">
        <img src="images/schoolimage.jpg" alt="Image with location link." style="width:300px;height:300px;">
    </a>

    </main>
    </body>
</html>