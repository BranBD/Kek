//this function will return value of a cookie name
function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
    c = c.substring(1);
    }
      if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
      }
    }
  return "";
  }
//These functions is for basic control over the form. That way the user wont be able to submit the form without filling every input, ergo less php problems.
function Controle_B(){
  var Fname = document.getElementById("fname").value;
  var Lname = document.getElementById("lname").value;
  var country = document.getElementById("country").value;
  var DOB = document.getElementById("dob").value;
  var rb1 = document.getElementById("Rb1");
  var rb2 = document.getElementById("Rb2");
  var rb3 = document.getElementById("Rb3");
  var mail = document.getElementById("Email").value;
  var H_D = document.getElementById("Hous_Id").value;
  if (Fname == ""){alert("Please write your First name .. ");return false;}
  if (Lname == ""){alert("Please write your Last name .. ");return false;}
  if (country == "Default"){alert("Please select a country .. ");return false;}
  if (DOB == ""){alert("Please input your date of birth .. ");return false;}
  if ((rb1.checked == false) && (rb2.checked ==false) && (rb3.checked == false)){alert("Please select a gender ..");return false;}
  if (mail ==""){alert("Please input your E-mail .. ");return false;}
  if (H_D == ""){alert("Please input your Household ID ..");return false;}
}
function Controle_V(){
  var Fname = document.getElementById("fname").value;
  var country = document.getElementById("country").value;
  var DOB = document.getElementById("dob").value;
  var city = document.getElementById("city").value;
  var mail = document.getElementById("Email").value;
  var phone = document.getElementById("Pnumber").value;
  if (Fname == ""){alert("Please write your First name .. ");return false;}
  if (DOB == ""){alert("Please input your date of birth .. ");return false;}
  if (country == "Default"){alert("Please select a country .. ");return false;}
  if (city == ""){alert("Please input your city .. ");return false;}
  if (mail ==""){alert("Please input your E-mail .. ");return false;}
  if (phone ==""){alert("Please input your Phone Number .. ");return false;}
}
