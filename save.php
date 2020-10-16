<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'signup';

$con = mysqli_connect($server,$user,$pass,$db);

if($_POST["postId"] != ''){
  $sql = "UPDATE registeration SET message = '".$_POST["postDescription"]."' WHERE id = '".$_POST["postId"]."'";
  mysqli_query($con ,$sql );
}else{

}

?>