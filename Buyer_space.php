<?php
//Connecting to database
mysql_connect("localhost","root","");
mysql_select_db("pet_connect_db");
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
            <div class="nav_browse"> <a href="buyer_space.php"> Browse</a> </div>
            <div class="buyerspace_content">
                  <?php
                    $req = mysql_query("SELECT * FROM animal");
                    if (mysql_num_rows($req)<1){
                      echo" There are no available pets for sale yet. ";
                    }
                    else{
                      echo "<table class='browse_B'> <tr> <th> species <th>breed <th> name <th> age <th> price <th>request</tr>";
                      while ($row = mysql_fetch_array($req)){
                        echo" <tr> <td> $row[1] <td> $row[2] <td> $row[3] <td>$row[4] <td> $row[5] <td> <button class='req_button'> <a  href='transaction.php?AID=$row[0]&VID=$row[6]&price=$row[5]'>Request</a></button> </tr> ";
                      }
                    }
                  ?>
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
            else if ((username != "Guest") && (TypeOfUser != "B")){
              var msg="You're not logged in as a buyer to access this specific page! Please log-in from here : <br> <button><a href='login.php'>Log-In</a></button> Or Register as a buyer :<button><a href='Buyer.php'>Register</a></button> ";
                var element = document.getElementById("Msg");
                element.className = "alert-b alert-warning";
                element.innerHTML = msg ;
            }
</script>
