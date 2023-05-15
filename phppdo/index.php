<?php

try{
$server = "localhost";
$username = "root";
$password = "";
$db = "phppdo";

$dbcon = new PDO("mysql:host=$server; dbname=$db", $username,$password); 


$dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id=3;

$deletequery = "delete from studentstable where id=?";
$stmt = $dbcon->prepare($deletequery);
$stmt->execute([$id]);

}
catch(PDOException $e){
    echo  "Error: ".$e->getMessage();
}
?>