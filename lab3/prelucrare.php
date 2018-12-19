<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$o=$_GET["opt"];
if ($o==1){
include("http://localhost/afisare.php");
}
else if ($o==2){
include("http://localhost/inserare.html");
}
else if ($o==3){
include("http://localhost/updatare.html");
}
else if ($o==4){
include("http://localhost/stergere.html");
}
?>
</body>
</html>
