<?php
$o=$_GET['opt'];
if($o==1){
	include('afisare.php');
	}
elseif($o==2){
	include("inserare.htm");
	}
elseif($o==3){
	include('stergere.html');
	}
	elseif($o==4){
	include('imprumut.htm');
	}
?>

