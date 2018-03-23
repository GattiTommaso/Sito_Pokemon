
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
</head>
<body>

  <div class="topnav">
  <a  href="indexX.php">Homepage</a>
  <a  href="login.html">Login</a>
  <a   href="sign_up.html">Sign Up</a>
  <a class="active" href="ricerchino.php">Catalogo</a>
  <a href="ricerca_poke.php">Ricerca</a>
  </div>
</div>

<?php

$x_pag = 10;  //[1] how many rows to display for each page

      if (isset($_GET['pag'])) //[2]
      {
          $pag = $_GET['pag'];
      }
      else
      {
         $pag  = 1;
      }

      //You could do the same at th point [2] with
      //$pag = isset($_GET['pag']) ? $_GET['pag'] : 1;

      if (!$pag || !is_numeric($pag))  //[3]
      {
          $pag = 1;
      }

     include('DB_helper.php');
     $conn = connectDB();


     $sql = "SELECT count(*) FROM pokemon";
     $sth = $conn->prepare($sql);
     $sth->execute();
     $all_rows = $sth->fetchColumn();  //[5]
     $all_pages = ceil($all_rows / $x_pag); //[6]
     $first = ($pag-1) * $x_pag;  //[7]

     $sql = "SELECT * FROM pokemon LIMIT $first, $x_pag"; //[8]
     $sth = $conn->prepare($sql);
     $sth->execute();

     echo "<table class='table table-hover table-dark'>";
     echo "<tr><td>". "NOME". "</td><td>" .  "ALTEZZA" ."</td><td> " ."PESO" . "</td></tr>";
     $count=0;
     while($result = $sth->fetch(PDO::FETCH_ASSOC))
     {
         echo "<tr><td>"."<img src='sprites/".$result['id'].".png'>".$result['identifier']. "</td><td>" . $result['height'] ."</td><td> " .$result['weight'] . "</td></tr>";
         $count++;
     }
     echo "</table>";


     if ($all_pages > 1){
         if ($pag > 1){

             echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag - 1) . "\">";
             echo "INDIETRO</a>&nbsp;";
         }
         if ($all_pages > $pag){
             echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag + 1) . "\">";
             echo "<br>";
             echo "AVANTI</a>";
         }

     }
?>
