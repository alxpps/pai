<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
mysql_connect("localhost","root","") or die ("Nu se poate
conecta la serverul MySQL");
mysql_select_db("facultate") or die("Nu se poate selecta baza
de date");
$nume1=$_POST['nume1_form'];
// stergere efectiva
$query =mysql_query("DELETE FROM studenti where
nume='$nume1'");
mysql_close ();
?>
</body>
</html>
