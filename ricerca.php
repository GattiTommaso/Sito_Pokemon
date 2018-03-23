<html>
<?php
include('DB_helper.php');
$conn=connectDB();

$nome;
if(isset($_GET['nome']))
  {
      $nome=$_GET['nome'];
  }
$query= "SELECT * FROM pokemon WHERE identifier LIKE '%".$nome."%'";
$sth = $conn->prepare($query);
$sth->execute();
$baba=$sth->fetch(PDO::FETCH_ASSOC);
echo "<tr><td>"."<img src='sprites/".$baba['id'].".png'>".$baba['identifier']. "</td><td>" . $baba['height'] ."</td><td> " .$baba['weight'] . "</td></tr>";  
?>
</html>
