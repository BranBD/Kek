<?php
//Connecting to database
mysql_connect("localhost","root","");
mysql_select_db("pet_connect_db");
//variables from the form
$msg = "";
if (isset($_POST['V_or_B'])){
    $V_or_B = $_POST["V_or_B"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $password = $_POST["password"];

  if ($V_or_B == "B" ){
    $req_B = mysql_query("SELECT * FROM buyer WHERE name = '$name' AND password = '$password'") or die ("Error in REQUEST");
    if (mysql_num_rows($req_B) < 1){
        $msg = " <div class='alert alert-error' style='top:497px; left: 450px; width:500px;' role='alert'>We can't seem to find your information in our databases. Please make sure everything is correct!</div>";
    }
    else{
      $row = mysql_fetch_array($req_B);
      $buyerID = $row[0];
      setcookie("TypeOfuser", $V_or_B, time() + (86400 * 30), "/");
      setcookie("ID", $buyerID, time() + (86400 * 30), "/");
        $msg = "<script>
        document.cookie = 'username= $name'
        window.location.replace('home.html');
        </script>";
    }
  }
  else{
    $req_V = mysql_query("SELECT * FROM vendor WHERE name = '$name' AND password = '$password'") or die ("Error in REQUEST");
    if (mysql_num_rows($req_V) < 1){
        $msg = " <div class='alert alert-error' style='top:497px; left: 450px; width:500px;' role='alert'>We can't seem to find your information in our databases. Please make sure everything is correct!</div>";
    }
    else{
      $row = mysql_fetch_array($req_V);
      $VendorID = $row[0];
      setcookie("TypeOfuser", $V_or_B, time() + (86400 * 30), "/");
      setcookie("ID", $VendorID, time() + (86400 * 30), "/");
        $msg = " <script> 
        document.cookie = 'username= $name'
        window.location.replace('home.html');
        </script>";
    }
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|| Logging in ||</title>
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
         document.getElementById("username").innerHTML = getCookie("username"); </script>
          <div class="bg">
          </div>
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
          <form action="login.php" method="POST" onsubmit="return Controle_L()">
  <div class="form-log">
     <label for="V_or_B">Logging in as :</label><br>
    <input type="radio" name="V_or_B" value="V">Vendor<input type="radio" name="V_or_B" value="B">Buyer <br>
    <label for="name">Name</label><br>
    <input type="text" name="name" id="name" placeholder="The name you registered with .."> <br>
    <label for="surname">Surname</label> <br>
    <input type="text" name="surname" id="surname" placeholder="The surname you registered with .."> <br>
    <label for="password">Password :</label><br>
    <input type="password" name="password" id="password"><br>
    <input class="login-Submit-Button" type="submit" value="Submit">
    </div>
  </form>
    </div>
    <?php echo $msg ?>
</body>
</html>