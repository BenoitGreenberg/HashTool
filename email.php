<?php

include('function.php');
$mysqli = mysqli_connect($host,$login,$pass,$db);


$query = "INSERT INTO `to_crack` (`hash`,`email`,`language`) VALUE('".$_POST['hash']."','".$_POST['email']."','".."')";

if (mysqli_query($mysqli,$query)) {
echo '<p>
OK
</p>';
}

mysqli_close($mysqli);
?>