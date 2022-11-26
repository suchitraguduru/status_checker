<?php
$username="epiz_33079984";
$password="chary";
$host="sql306.epizy.com";
$db_name="epiz_33079984_statuschecker";
$con=mysqli_connect($host,$username,$password,$db_name);
if(!$con){
  echo "not sucess";
  die();
}
// echo "success";
 ?>
