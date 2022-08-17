<?php
//Connecting to database
mysql_connect("localhost","root","");
mysql_select_db("pet_connect_db");
if (isset($_GET['BID'])){
    $BID = $_GET['BID'];
    $req1 = mysql_query("SELECT * FROM buyer WHERE B_Id= '$BID'")or die("ERROR request");
    $BuyerInfo = mysql_fetch_array($req1);
    $req2 = mysql_query("SELECT * FROM household WHERE H_Id='$BuyerInfo[7]' ")or die("ERROR request");
    $HouseholdInfo = mysql_fetch_array($req2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|| Household Registration ||</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="icon" href="./PICS/bar.gif">
    <script src="./JS/script.js"></script>
</head>

<body class="regis-bod">
<div class="page">
        <header tabindex="0">Pet Connect <img src="./PICS/bar.gif" class="movin-logo-bar"><img src="./PICS/userAvatar.png" id="B" class="user-logo">
        <div id="username" class="username"></div> </header>
        <div id="nav-container">
          <script> document.getElementById("username").innerHTML = getCookie("username"); </script>
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
     </div>
    
  <form name="form" id="H_Id" action="register_household.php" method="POST" onsubmit="return Controle_R_H()">
  <div class="form">
    <h1>Buyer's Household information :</h1><br>
    <label for="fname">Household ID</label> :<?php echo $HouseholdInfo[0]; ?>  <br>
    <label for="country">Country</label> :<?php echo $HouseholdInfo[1]; ?>  <br>
    <label for="city">City</label> : <?php echo $HouseholdInfo[2]; ?> <br>
    <label for="eco">Ecology</label> :<?php echo $HouseholdInfo[3]; ?>  <br>
    <label for="H_size">Household size</label> :<?php echo $HouseholdInfo[5]; ?> <br>
    <label for="Age_G">Age Groups </label> : <?php echo $HouseholdInfo[6]; ?> <br>
    <label for="O_P">Other Pets</label> : <?php echo $HouseholdInfo[7]; ?> <br>
    <label for="O_P_T">Other pets types</label> : <?php echo $HouseholdInfo[8]; ?> <br>
    <label for="House_Dy">Household dynamics</label> :  <?php echo $HouseholdInfo[9]; ?> <br>
    <label for="Aw_T">Away time</label> : <?php echo $HouseholdInfo[10]; ?>  <br>
    <label for="Phy_Act">Physical activity</label> :<?php echo $HouseholdInfo[11]; ?>   <br>
    <label for="Hous_Nutri">Household Nutrition </label>  : <?php echo $HouseholdInfo[12]; ?> <br>
      <label for="allergies">Allergies</label> :<?php echo $HouseholdInfo[13]; ?>   <br>
      <label for="Resid_Type">Residence Type</label>  :<?php echo $HouseholdInfo[14]; ?>  <br>
      <label for="res_size">Residence size</label> : <?php echo $HouseholdInfo[15]; ?>  <br>
      <label for="balcony">Balcony</label> : <?php echo $HouseholdInfo[16]; ?>  <br>
      <label for="Garden">Garden</label> : <?php echo $HouseholdInfo[17]; ?>  <br>
      <label for="gar_size">Garden Size</label>  :<?php echo $HouseholdInfo[18]; ?>  <br>
  </div>
  <div class="form-2">
    <h1>Buyer's personal information</h1>
    <label for="fname">First name</label> : <?php echo $BuyerInfo[1]; ?> <br>
    <label for="lname">Last name</label> : <?php echo $BuyerInfo[2]; ?>  <br>
    <label for="country">Country</label> :  <?php echo $BuyerInfo[3]; ?> <br>
    <label for="dob">Date of Birth</label> :<?php echo $BuyerInfo[4]; ?>  <br>
    <label for="gender">Gender</label> : <?php echo $BuyerInfo[5]; ?>  <br>
    <label for="Email">Email</label> : <?php echo $BuyerInfo[6]; ?> <br>
  </div>
  </form>
</div>
</body>
</html>