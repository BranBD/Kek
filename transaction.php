<?php
//Connecting to database
mysql_connect("localhost","root","");
mysql_select_db("pet_connect_db");
if (isset( $_GET['AID'])){
    $AID = $_GET['AID'];
    $VID = $_GET['VID'];
    $price = $_GET['price'];
    $BID = $_COOKIE['ID'];
    $req = mysql_query("INSERT INTO transaction (price, date_time, A_ID, V_ID, B_ID) VALUES ('$price',NOW(),'$AID', '$VID', '$BID');")or die("REQUEST ERROR");

}

if (isset($_POST['submit'] )){
    echo " <script> window.location.replace('home.html');</script>";
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
            var TypeOfUser = getCookie("TypeOfUser");
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
            <div class="buyerspace_content">
                <form name="form" action="transaction.php" method="POST">
                    <label for="animalID">Animal ID</label><br>
                    <input type="text" name="animalID"  value="<?php echo $AID; ?>"><br>
                    <label for="VendorID">Vendor ID</label>
                    <input type="text" name="VendorID" value="<?php echo $VID; ?>"><br>
                    <label for="price">Price</label>
                    <input type="text" name="price" value="<?php echo $price; ?>"><br>
                    <input type="submit" name="submit" value="Confirm">
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
            else if ((username != "Guest") && (TypeOfuser != "B")){
              var msg="You're not logged in as a buyer to access this specific page! Please log-in from here : <br> <button><a href='login.php'>Log-In</a></button> Or Register as a buyer :<button><a href='Buyer.php'>Register</a></button> ";
                var element = document.getElementById("Msg");
                element.className = "alert-b alert-warning";
                element.innerHTML = msg ;
            }
</script>
