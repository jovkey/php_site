<?php $server = "localhost";
$user = "root";
$password = "";
$dbase = "librairie";
$Login = mysqli_connect($server,$user,$password,$dbase);
if(!$Login){
    die("connexion erronée :" .mysqli_connect_error());
}else{;}
?>