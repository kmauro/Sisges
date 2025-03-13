<?php


if(!$_SESSION["ingreso"]){
	header("location:index.php?route=login");
	exit();
}else{
	session_destroy();
	header("location:index.php?route=login");
}
	
?>

