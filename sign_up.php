
<html>
<head>
<link rel="stylesheet" type="text/css" href="sign_up.php">
<title>Sign-Up</title>
</head>


<style>
body{ font-family: 'pokemon';
      color:#EFEFEF;
      font-size: 40px;}

@font-face {
    font-family: 'pokemon';
    src: url('C:\Program Files (x86)\Ampps\www\Gatti\SITO\pokemon.ttf');
    font-family: 'pokemon';
    src:url('pokemonfieldset.eot');
    src: local('pokemon'),
         local('pokemon'),
         url('pokemon.ttf') format('truetype'),
         url('pokemon.svg#font') format('svg');
}
#body{ background-image:url('cubone.png'); }

#Sign-Up{
        background-repeat:no-repeat;
          background-attachment:fixed;
          padding:45px 60px;
          font-size: 50px;}


#button  {  border-radius:15px;
            width:auto; height:auto;
            font-weight:lighter;
            font-size:30px;
            font-family: 'pokemon';}
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

<div>

</div>
<?php

include('DB_helper.php');
$conn= connectDB();


$name = $_POST['name'];
$Surname = $_POST['Surname'];
$email = $_POST['email'];
$user = $_POST['user'];
$password = $_POST['password'];

register($conn,$name,$Surname,$email,$password,$user);

?>
<body background="immagini\absol.jpg">
  <div class="topnav">
  <a  href="indexX.php">Homepage</a>
    <a  href="login.html">Login</a>
  <a  class="active" href="sign_up.html">Sign Up</a>
  <a href="ricerchino.php">Catalogo</a>
<a href="ricerca_poke.php">Ricerca</a>
  </div>
  <?php echo "buongiorno  ".$name ?>
</body>
</html>
