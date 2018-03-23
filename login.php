<html>
<style>
body {
margin: 0;
font-family: Arial, Helvetica, sans-serif;
}

.topnav {
overflow: hidden;
background-color: #42FFFF;
}

.topnav a {
float: left;
color: #4200FF;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size: 17px;
}

.topnav a:hover {
background-color: #4181FF;

}

.topnav a.active {
background-color: #0000AF;
color: white;
}
</style>
</head>
<body>

  <div class="topnav">
  <a  href="indexX.php">Homepage</a>
  <a  class="active" href="login.html">Login</a>
  <a  href="sign_up.html">Sign Up</a>
  <a href="ricerchino.php">Catalogo</a>
  <a href="ricerca_poke.php">Ricerca</a>
  </div>

<?php
include('DB_helper.php');
$conn=connectDB();
$pwd =$_POST["password"];
$user=$_POST["user"];
if(Login($conn,$user,$pwd)==1)
  echo "Login effettuato";
  else {
    echo "raaawr";
  }
?>
</html>
