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
    <!-- This is a comment to show changes to VCS-->
    <div id="logo">
        <a href="index.php"><img class="logo" src="images/WGC.png" width="125px" height="125px" alt="Image of WGC logo"></a>
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

    <div class="container">
        <div class="image">
            <img src="images/canteen.jpg" width="600px" height="400px">
        </div>
        <div class="text">
            <h2 id="headings">Our values</h2>
            <p id="intro"> Here at the Wellington Girl's College, we make fresh, healthy and safe meals everyday!</p>
            <p id="intro"> We believe that every kid should have access to affordable, healthy and fresh meals. That is
                why, we have very low prices at our canteen!</p>
            <p id="intro"> We have a variety of foods because we believe it is important that kids get a taste of every culture!
                Our cuisines range from Mexican, English and Indian.</p>
            <p id="intro"> </p>
            <h2 id="headings">Daily Specials </h2>
            <p id="intro"> Every day, we have a special combo meal. These combo meals are different everyday and come with a
                drink and main serving. All special combo meals are only for $2.50. We keep our prices very cheap because
                we know that not every child can afford expensive meals!</p>
            <br><br>
        </div>
    </div>




    </body>

    <footer>
        @Copyright Sarah Kaur 2021- All Right Reserved.
    </footer>
</html>

