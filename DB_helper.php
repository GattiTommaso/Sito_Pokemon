<html>
<?php

function connectDB()
{
  $servername = 'localhost';
  $port = 3306;
  $username = 'root';
  $Password = 'mysql';
  $dbName= 'DB_POKEMON';
  $conn = new PDO("mysql:host=$servername; dbname=$dbName", $username, $Password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  return $conn;
}


function register($conn,$email, $pwd, $name,$Surname,$user)
{
          $query = "INSERT INTO clienit (name, Surname, email, password, user) VALUES (:email, :password, :name, :Surname, :user)";
          $sth = $conn->prepare($query);
          $sth->execute(array(':email'=>$email, ':password'=>$pwd, ':name'=>$name, ':Surname'=>$Surname , ':user'=>$user ));
          return true;
   }

function Login($conn,$user,$password)
{
  try{
$query="SELECT * FROM clienit WHERE user=:user AND password=:password";
$sql = $conn->prepare($query);
$sql->execute(array(':user'=>$user, ':password'=>$password));
$result = $sql->fetch(PDO::FETCH_ASSOC);
if(null != $result["user"].$result["password"])
return true;

else return false;}

catch(PDOException $e){
  echo 'Error: ' . $e->getMessage();
  return false;
}

}
?>
</htmL>
