<?php
//Connecting to database
mysql_connect("localhost","root","");
mysql_select_db("pet_connect_db");
if (isset($_POST['Animal_ID'])){
$AID = $_POST['Animal_ID'];
$species = $_POST['species'];
$breed = $_POST['breed'];
$name = $_POST['name'];
$age = $_POST['age'];
$price = $_POST['price'];
$VID = $_COOKIE['ID'];
$req  = mysql_query("INSERT INTO animal VALUES ('$AID','$species','$breed','$name','$age','$price','$VID')") or die ("ERROR REQUEST");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|| Vendor Space ||</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="icon" href="./PICS/bar.gif">
    <script src="./JS/script.js"></script>
</head>
<body class="regis-bod">
<div class="page">
        <header tabindex="0">Pet Connect <img src="./PICS/bar.gif" class="movin-logo-bar"><img src="./PICS/userAvatar.png" id="B" class="user-logo">
        <div id="username" class="username"></div> </header>
        <div id="nav-container">
        <script>
            var TypeOfUser = getCookie("TypeOfuser");
            var username =  getCookie("username");
         document.getElementById("username").innerHTML = username; 
         </script>
          <div class="bg"></div>
          <div class="button" tabindex="0">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </div>
          <div id="nav-content" tabindex="0">
            <ul>
              <li><a href="home.html">Home</a></li>
              <li><a href="register.html">Register</a></li>
              <li><a href="Buyer_space.php">Browse for pets</a></li>
              <li><a href="vendor_space.php">Vendor space</a></li>
            </ul>
          </div>
          </div>
          <div id="Msg">
            <div class="nav_browse_V"> <a href="vendor_space.php"> Add a pet for sale</a> </div><div class="nav_ongoing_requests_V"> <a href="ongoing_req_V.php"> Ongoing requests</a> </div>
            <div class="buyerspace_content">
            <form name="form" action="vendor_space.php" method="POST">
              <label for="Animal_Id">Animal Id</label><br>
              <input type="text" name="Animal_ID" id="Animal_ID"><br>
              <label for="species">Species</label><br>
              <input type="text" name="species" id="species"><br>
              <label for="breed">Breed</label> <br>
              <input type="text" name="breed" id="Breed"><br>
              <label for="name">Name</label><br>
              <input type="text" name="name" id="name"><br>
              <label for="age">Age</label><br>
              <input type="text" name="age" id="age"><br>
              <label for="price">Price</label><br>
              <input type="text" name="price" id="price"><br>
              <input type="submit" value="Submit">
</form>
            </div>


          </div>
    </div>
</body>
</html>
<script>
            if (username == "Guest") {
                var msg="You're not logged in to be able to access this! Please log-in from here : <br> <button><a href='login.php'>Log-In</a></button>";
                var element = document.getElementById("Msg");
                element.className = "alert-b alert-warning";
                element.innerHTML = msg ;
            }
            else if ((username != "Guest") && (TypeOfUser != "V")){
              var msg="You're not logged in as a buyer to access this specific page! Please log-in from here : <br> <button><a href='login.php'>Log-In</a></button> Or Register as a buyer :<button><a href='Buyer.php'>Register</a></button> ";
                var element = document.getElementById("Msg");
                element.className = "alert-b alert-warning";
                element.innerHTML = msg ;
            }
</script>
