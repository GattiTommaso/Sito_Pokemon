<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
</head>
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
  <div class="topnav">
  <a class="active" href="indexX.php">Homepage</a>
  <a  href="login.html">Login</a>
  <a  href="sign_up.html">Sign Up</a>
  <a href="ricerchino.php">Catalogo</a>
    <a href="ricerca_poke.php">Ricerca</a>
  </div>

<form name="ricerchino" method="get" action="ricerca.php">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Pokemon ...</td>
      <td><input type="text" class="demoInputBox" name="nome"></td>
      <input type="submit" name="ricerca" value="Ricerca" class="Ricerca"></td>
    </tr>
  </table>
</form>
<?php
    include('DB_helper.php');
    $connessione = connectDB();

 $sql = "SELECT * FROM pokemon limit 700";
 $sth = $connessione->prepare($sql);
 $sth-> execute();


echo "<table class='table table-hover table-dark'>";
echo "<tr><td>". "NOME". "</td><td>" .  "ALTEZZA" ."</td><td> " ."PESO" . "</td></tr>";
$count=0;
while($result = $sth->fetch(PDO::FETCH_ASSOC))
{
    echo "<tr><td>"."<img src='sprites/".$result['id'].".png'>".$result['identifier']. "</td><td>" . $result['height'] ."</td><td> " .$result['weight'] . "</td></tr>";
    $count++;
}
echo "</table>";
?>
</html>
