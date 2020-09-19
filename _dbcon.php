<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'chatroom';

$conn = mysqli_connect($server,$username,$password,$database);
if ($conn) {
    #echo 'successfully connect';
}else{
    die('errror'.mysqli_connect_error());
}
?>