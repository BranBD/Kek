<?php
//Connecting to database
mysql_connect("localhost","root","");
mysql_select_db("pet_connect_db");
//variables from the form
$msg = "";
if (isset($_POST['H_ID'])){
  $H_ID = $_POST['H_ID'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $eco = $_POST['eco'];
  $H_size = $_POST['H_size'];
  $age_g ="";
  if (isset($_POST['Age_G_1'])) {
    $Age_G_1 = $_POST['Age_G_1'];
    $age_g = $age_g + $Age_G_1;
    if (isset($_POST['Age_G_2'])){
      $Age_G_2 = $_POST['Age_G_2'];
      $age_g =  $age_g +$Age_G_2; 
      if( isset($_POST['Age_G_3'])){
        $Age_G_3 = $_POST['Age_G_3'];
        $age_g = $age_g + $Age_G_3; 
        if (isset($_POST['Age_G_4'])){
          $Age_G_4 = $_POST['Age_G_4'];
          $age_g =$age_g + $Age_G_4;
        } 
      }
    }
  }
  $O_P =$_POST['O_P'];
  $otherpets = "";
  if (isset($_POST['cb1'])) {
    $cb1 =$_POST['cb1'];
    $otherpets =$otherpets + $cb1;
    if (isset($_POST['cb2'])){
      $cb2 =$_POST['cb2'];
      $otherpets =$otherpets + $cb2;
      if( isset($_POST['cb3'])){
        $cb2 =$_POST['cb3'];
        $otherpets =$otherpets + $cb3;
      }
    }
  }
  $Hous_D = $_POST['Hous_D'];
  $Aw_T = $_POST['Aw_T'];
  $Phy_Act = $_POST['Phy_Act'];
  $Hous_Nutri = $_POST['Hous_Nutri'];
  $allergies= $_POST['allergies'];  
  $res_ty= $_POST['res_ty'];
  $res_size= $_POST['res_size'];
  $balcony= $_POST['balcony'];
  $Garden= $_POST['Garden'];
  $gar_size= $_POST['gar_size'];

  $req = mysql_query("SELECT * FROM household WHERE H_Id = '$H_ID' LIMIT 0 , 30") or die("REQUEST DID NOT WORK");
  if (mysql_num_rows($req) >= 1){
    $msg = " <div class='alert-b alert-error' role='alert-b'>Household already exists</div>";
  }
  else{
      $req_3 = mysql_query("INSERT INTO household  VALUES('$H_ID', '$country', '$city', '$eco', '$H_size', '$age_g', '$O_P', '$otherpets', '$Hous_D', '$Aw_T', '$Phy_Act', '$Hous_Nutri', '$allergies','$res_ty','$res_size','$balcony','$Garden','$gar_size') ") or die(" Error in REQUEST 3 ");
      $msg = " <div class='alert-b alert-success' role='alert-b'>Your household is now registered.</div>";

  }
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
    <label for="fname">Household ID</label>
    <input type="text" id="H_ID" name="H_ID" placeholder="Household ID ..">
    <label for="country">Country</label>
    <select id="country" name="country">
        <option value="Default">select country</option>
        <option value="AF">Afghanistan</option>
        <option value="AX">Aland Islands</option>
        <option value="AL">Albania</option>
        <option value="DZ">Algeria</option>
        <option value="AS">American Samoa</option>
        <option value="AD">Andorra</option>
        <option value="AO">Angola</option>
        <option value="AI">Anguilla</option>
        <option value="AQ">Antarctica</option>
        <option value="AG">Antigua and Barbuda</option>
        <option value="AR">Argentina</option>
        <option value="AM">Armenia</option>
        <option value="AW">Aruba</option>
        <option value="AU">Australia</option>
        <option value="AT">Austria</option>
        <option value="AZ">Azerbaijan</option>
        <option value="BS">Bahamas</option>
        <option value="BH">Bahrain</option>
        <option value="BD">Bangladesh</option>
        <option value="BB">Barbados</option>
        <option value="BY">Belarus</option>
        <option value="BE">Belgium</option>
        <option value="BZ">Belize</option>
        <option value="BJ">Benin</option>
        <option value="BM">Bermuda</option>
        <option value="BT">Bhutan</option>
        <option value="BO">Bolivia</option>
        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
        <option value="BA">Bosnia and Herzegovina</option>
        <option value="BW">Botswana</option>
        <option value="BV">Bouvet Island</option>
        <option value="BR">Brazil</option>
        <option value="IO">British Indian Ocean Territory</option>
        <option value="BN">Brunei Darussalam</option>
        <option value="BG">Bulgaria</option>
        <option value="BF">Burkina Faso</option>
        <option value="BI">Burundi</option>
        <option value="KH">Cambodia</option>
        <option value="CM">Cameroon</option>
        <option value="CA">Canada</option>
        <option value="CV">Cape Verde</option>
        <option value="KY">Cayman Islands</option>
        <option value="CF">Central African Republic</option>
        <option value="TD">Chad</option>
        <option value="CL">Chile</option>
        <option value="CN">China</option>
        <option value="CX">Christmas Island</option>
        <option value="CC">Cocos (Keeling) Islands</option>
        <option value="CO">Colombia</option>
        <option value="KM">Comoros</option>
        <option value="CG">Congo</option>
        <option value="CD">Congo, Democratic Republic of the Congo</option>
        <option value="CK">Cook Islands</option>
        <option value="CR">Costa Rica</option>
        <option value="CI">Cote D'Ivoire</option>
        <option value="HR">Croatia</option>
        <option value="CU">Cuba</option>
        <option value="CW">Curacao</option>
        <option value="CY">Cyprus</option>
        <option value="CZ">Czech Republic</option>
        <option value="DK">Denmark</option>
        <option value="DJ">Djibouti</option>
        <option value="DM">Dominica</option>
        <option value="DO">Dominican Republic</option>
        <option value="EC">Ecuador</option>
        <option value="EG">Egypt</option>
        <option value="SV">El Salvador</option>
        <option value="GQ">Equatorial Guinea</option>
        <option value="ER">Eritrea</option>
        <option value="EE">Estonia</option>
        <option value="ET">Ethiopia</option>
        <option value="FK">Falkland Islands (Malvinas)</option>
        <option value="FO">Faroe Islands</option>
        <option value="FJ">Fiji</option>
        <option value="FI">Finland</option>
        <option value="FR">France</option>
        <option value="GF">French Guiana</option>
        <option value="PF">French Polynesia</option>
        <option value="TF">French Southern Territories</option>
        <option value="GA">Gabon</option>
        <option value="GM">Gambia</option>
        <option value="GE">Georgia</option>
        <option value="DE">Germany</option>
        <option value="GH">Ghana</option>
        <option value="GI">Gibraltar</option>
        <option value="GR">Greece</option>
        <option value="GL">Greenland</option>
        <option value="GD">Grenada</option>
        <option value="GP">Guadeloupe</option>
        <option value="GU">Guam</option>
        <option value="GT">Guatemala</option>
        <option value="GG">Guernsey</option>
        <option value="GN">Guinea</option>
        <option value="GW">Guinea-Bissau</option>
        <option value="GY">Guyana</option>
        <option value="HT">Haiti</option>
        <option value="HM">Heard Island and Mcdonald Islands</option>
        <option value="VA">Holy See (Vatican City State)</option>
        <option value="HN">Honduras</option>
        <option value="HK">Hong Kong</option>
        <option value="HU">Hungary</option>
        <option value="IS">Iceland</option>
        <option value="IN">India</option>
        <option value="ID">Indonesia</option>
        <option value="IR">Iran, Islamic Republic of</option>
        <option value="IQ">Iraq</option>
        <option value="IE">Ireland</option>
        <option value="IM">Isle of Man</option>
        <option value="IL">Israel</option>
        <option value="IT">Italy</option>
        <option value="JM">Jamaica</option>
        <option value="JP">Japan</option>
        <option value="JE">Jersey</option>
        <option value="JO">Jordan</option>
        <option value="KZ">Kazakhstan</option>
        <option value="KE">Kenya</option>
        <option value="KI">Kiribati</option>
        <option value="KP">Korea, Democratic People's Republic of</option>
        <option value="KR">Korea, Republic of</option>
        <option value="XK">Kosovo</option>
        <option value="KW">Kuwait</option>
        <option value="KG">Kyrgyzstan</option>
        <option value="LA">Lao People's Democratic Republic</option>
        <option value="LV">Latvia</option>
        <option value="LB">Lebanon</option>
        <option value="LS">Lesotho</option>
        <option value="LR">Liberia</option>
        <option value="LY">Libyan Arab Jamahiriya</option>
        <option value="LI">Liechtenstein</option>
        <option value="LT">Lithuania</option>
        <option value="LU">Luxembourg</option>
        <option value="MO">Macao</option>
        <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
        <option value="MG">Madagascar</option>
        <option value="MW">Malawi</option>
        <option value="MY">Malaysia</option>
        <option value="MV">Maldives</option>
        <option value="ML">Mali</option>
        <option value="MT">Malta</option>
        <option value="MH">Marshall Islands</option>
        <option value="MQ">Martinique</option>
        <option value="MR">Mauritania</option>
        <option value="MU">Mauritius</option>
        <option value="YT">Mayotte</option>
        <option value="MX">Mexico</option>
        <option value="FM">Micronesia, Federated States of</option>
        <option value="MD">Moldova, Republic of</option>
        <option value="MC">Monaco</option>
        <option value="MN">Mongolia</option>
        <option value="ME">Montenegro</option>
        <option value="MS">Montserrat</option>
        <option value="MA">Morocco</option>
        <option value="MZ">Mozambique</option>
        <option value="MM">Myanmar</option>
        <option value="NA">Namibia</option>
        <option value="NR">Nauru</option>
        <option value="NP">Nepal</option>
        <option value="NL">Netherlands</option>
        <option value="AN">Netherlands Antilles</option>
        <option value="NC">New Caledonia</option>
        <option value="NZ">New Zealand</option>
        <option value="NI">Nicaragua</option>
        <option value="NE">Niger</option>
        <option value="NG">Nigeria</option>
        <option value="NU">Niue</option>
        <option value="NF">Norfolk Island</option>
        <option value="MP">Northern Mariana Islands</option>
        <option value="NO">Norway</option>
        <option value="OM">Oman</option>
        <option value="PK">Pakistan</option>
        <option value="PW">Palau</option>
        <option value="PS">Palestinian Territory, Occupied</option>
        <option value="PA">Panama</option>
        <option value="PG">Papua New Guinea</option>
        <option value="PY">Paraguay</option>
        <option value="PE">Peru</option>
        <option value="PH">Philippines</option>
        <option value="PN">Pitcairn</option>
        <option value="PL">Poland</option>
        <option value="PT">Portugal</option>
        <option value="PR">Puerto Rico</option>
        <option value="QA">Qatar</option>
        <option value="RE">Reunion</option>
        <option value="RO">Romania</option>
        <option value="RU">Russian Federation</option>
        <option value="RW">Rwanda</option>
        <option value="BL">Saint Barthelemy</option>
        <option value="SH">Saint Helena</option>
        <option value="KN">Saint Kitts and Nevis</option>
        <option value="LC">Saint Lucia</option>
        <option value="MF">Saint Martin</option>
        <option value="PM">Saint Pierre and Miquelon</option>
        <option value="VC">Saint Vincent and the Grenadines</option>
        <option value="WS">Samoa</option>
        <option value="SM">San Marino</option>
        <option value="ST">Sao Tome and Principe</option>
        <option value="SA">Saudi Arabia</option>
        <option value="SN">Senegal</option>
        <option value="RS">Serbia</option>
        <option value="CS">Serbia and Montenegro</option>
        <option value="SC">Seychelles</option>
        <option value="SL">Sierra Leone</option>
        <option value="SG">Singapore</option>
        <option value="SX">Sint Maarten</option>
        <option value="SK">Slovakia</option>
        <option value="SI">Slovenia</option>
        <option value="SB">Solomon Islands</option>
        <option value="SO">Somalia</option>
        <option value="ZA">South Africa</option>
        <option value="GS">South Georgia and the South Sandwich Islands</option>
        <option value="SS">South Sudan</option>
        <option value="ES">Spain</option>
        <option value="LK">Sri Lanka</option>
        <option value="SD">Sudan</option>
        <option value="SR">Suriname</option>
        <option value="SJ">Svalbard and Jan Mayen</option>
        <option value="SZ">Swaziland</option>
        <option value="SE">Sweden</option>
        <option value="CH">Switzerland</option>
        <option value="SY">Syrian Arab Republic</option>
        <option value="TW">Taiwan, Province of China</option>
        <option value="TJ">Tajikistan</option>
        <option value="TZ">Tanzania, United Republic of</option>
        <option value="TH">Thailand</option>
        <option value="TL">Timor-Leste</option>
        <option value="TG">Togo</option>
        <option value="TK">Tokelau</option>
        <option value="TO">Tonga</option>
        <option value="TT">Trinidad and Tobago</option>
        <option value="TN">Tunisia</option>
        <option value="TR">Turkey</option>
        <option value="TM">Turkmenistan</option>
        <option value="TC">Turks and Caicos Islands</option>
        <option value="TV">Tuvalu</option>
        <option value="UG">Uganda</option>
        <option value="UA">Ukraine</option>
        <option value="AE">United Arab Emirates</option>
        <option value="GB">United Kingdom</option>
        <option value="US">United States</option>
        <option value="UM">United States Minor Outlying Islands</option>
        <option value="UY">Uruguay</option>
        <option value="UZ">Uzbekistan</option>
        <option value="VU">Vanuatu</option>
        <option value="VE">Venezuela</option>
        <option value="VN">Viet Nam</option>
        <option value="VG">Virgin Islands, British</option>
        <option value="VI">Virgin Islands, U.s.</option>
        <option value="WF">Wallis and Futuna</option>
        <option value="EH">Western Sahara</option>
        <option value="YE">Yemen</option>
        <option value="ZM">Zambia</option>
        <option value="ZW">Zimbabwe</option>
    </select> <br> 
    <label for="city">City</label>
    <input type="text" id="city" name="city" placeholder="Your City..">

    <label for="eco">Ecology</label>
    <select name="eco" id="eco">
        <option value="Default">Choose an ecology</option>
        <option value="town">Town</option>
        <option value="village">Village</option>
        <option value="metropolis">Metropolis</option>
    </select><br>
    <label for="H_size">Household size</label><br>
    <input type="text" name="H_size" id="H_size" placeholder="Household size..">
    <label for="Age_G">Age Groups </label><br>
    <input type="checkbox" name="Age_G_1" id="CB1" value="0-14 years"> 0-14 years <br>
    <input type="checkbox" name="Age_G_2" id="CB2" value="15-24 years"> 15-24 years <br>
    <input type="checkbox" name="Age_G_3" id="CB3" value="25-64 years"> 25-64 years <br>
    <input type="checkbox" name="Age_G_4" id="CB3" value="65 years and over"> 65 years and over <br>
    <label for="O_P">Other Pets</label><br>
    <input type="text" name="O_P" id="O_P" placeholder="Quantity of other pets..(put 0 if you don't have any)"><br>
    <label for="O_P_T">Other pets types</label><br>
    <input type="checkbox" name="cb1"  value="Cats"id="cbop1"> Cats <br>
    <input type="checkbox" name="cb2"  value="Dogs"id="cbop2"> Dogs <br>
    <input type="checkbox" name="cb3"  value="Others"id="cbop3"> Others <br>
    <label for="House_Dy">Household dynamics</label> <br>
    <select name="Hous_D" id="House_D">
      <option value="Default">Select a Household dynamic</option>
      <option value="Outgoing">Outgoing</option>
      <option value="Travelling">Travelling</option>
      <option value="Very Social"> Very Social</option>
    </select> <br>
  </div>
  <div class="form-2">

  <label for="Aw_T">Away time</label> <br>
    <input type="text" name="Aw_T" id="Aw_T" placeholder="Your away time"> <br>
    <label for="Phy_Act">Physical activity</label> <br>
    <select name="Phy_Act" id="Phy_Act">
      <option value="Default">Choose Physical activity level</option>
      <option value="Low">Low</option>
      <option value="Moderate">Moderate</option>
      <option value="High">High</option>
    </select> <br>
    <label for="Hous_Nutri">Household Nutrition </label> <br>
    <select name="Hous_Nutri" id="Hous_Nutri">
      <option value="Default">Choose Household nutrition</option>
      <option value="vegetarian">Vegetarian</option>
      <option value="vegan">Vegan</option>
      <option value="omnivore ">Omnivore </option>
      </select> <br>
      <label for="allergies">Allergies</label> <br>
      <input type="radio" name="allergies"value="Yes" id="Yes">Yes 
      <input type="radio" name="allergies" value="No" id="No">No <br>
      <label for="Resid_Type">Residence Type</label> <br>
      <select name="res_ty" id="res_ty">
        <option value="Default">Choose your residence type</option>
        <option value="S_F_Home">Single-Family Homes</option>
        <option value="Apartment">Apartments</option>
        <option value="M_F_Home">Multi-Family Homes</option>
      </select> <br>
      <label for="res_size">Residence size</label> <br>
      <input type="text" name="res_size" id="res_size"><br>
      <label for="balcony">Balcony</label> <br>
      <input type="radio" name="balcony" value="Yes" id="Yes">Yes <br>
      <input type="radio" name="balcony" value="No" id="No">No <br>
      <label for="Garden">Garden</label> <br>
      <input type="radio" name="Garden" value="Yes"  id="Yes">Yes 
      <input type="radio" name="Garden"  value="No"id="No">No <br>
      <label for="gar_size">Garden Size</label> <br>
      <input type="text" name="gar_size" id="Garden" placeholder="Input garden size ..">
      <input class="Submit-Button" type="submit" value="Submit">
  </div>
  </form>
  <?php echo $msg ?>
</div>
</body>
</html>