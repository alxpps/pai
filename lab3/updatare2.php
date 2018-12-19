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
$nume2=$_POST['nume2_form'];
$prenume2=$_POST['prenume2_form'];
$marca1=$_POST['marca1_form'];
$nume1=$_POST['nume1_form'];
$prenume1=$_POST['prenume1_form'];
$an1=$_POST['an1_form'];
// modificare efectiva
$query =mysql_query("update studenti set marca='$marca1',nume='$nume1', prenume='$prenume1',an_studiu='$an1' where nume='$nume2' and prenume='$prenume2'");

if ( ! $query ) {
    die( mysql_error() );
} else {
    echo "Number of rows affected: " . mysql_affected_rows($query) . "<br>";
}

// afisare mesaj de eroare pentru date incorect introduse (daca se doreste)
$var=mysql_error();
echo $var;
echo "OK, am modificat!";
mysql_close();
?>
</body>
</html>
