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
$nume=$_POST['nume_form'];
$prenume=$_POST['prenume_form'];

// cautarea înregistrarii care va fi modificata
$query=mysql_query("select * from studenti where
nume='$nume' and prenume='$prenume'");

$nr_inreg=mysql_num_rows($query);

if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari";
 echo"</center>";

 echo "<table border='2' align='center'>";
 echo"<tr bgcolor='silver'>";
 $coln=mysql_num_fields($query);

 for ($i=0; $i<$coln; $i++){
 $var=mysql_field_name($query,$i);
 echo "<th> $var </th>";
 }
 echo"</tr>";

 $nr_val=0; // contor indice array
 while ($row = mysql_fetch_row($query)){ 
  echo"<tr>";
 foreach ($row as $value) {
 echo "<td BGCOLOR='Yellow'> $value</td>";
 // memorare într-un sir (array) a datelor din articolul gasit
 $sir[$nr_val]=$value;
 $nr_val++;
}
 echo "</tr>";
 }
 echo "</table>";

// Rezolvarea este valabila pentru o singura înregistrare gasita
// Pentru mai multe înregistrari gasite, modificarile efectuate se aplica asupra tuturor
 echo '<br><hr>'; // trasarea unei linii

// apel script pentru modificarea efectiva
echo "<form method='POST'
action='http://localhost/updatare2.php'>";

// transfer (ascuns) spre script a parametrilor de cautare
echo "<input type='hidden' name='marca2_form'
value=".$sir[0].">";
echo "<input type='hidden' name='nume2_form'
value=".$sir[2].">";
echo "<input type='hidden' name='prenume2_form'
value=".$sir[1].">";
echo "<input type='hidden' name='an2_form'
value=".$sir[2].">";

// transfer spre script ca parametrii a datelor care pot fi modificate
echo "<table>";
echo "<tr>";
echo "<td>";
echo "<input type='text' name='marca1_form'
value=".$sir[0].">";
echo "<input type='text' name='nume1_form'
value=".$sir[1].">";
echo "<input type='text' name='prenume1_form'
value=".$sir[2].">";
echo "<input type='text' name='an1_form'
value=".$sir[3].">";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<input type='SUBMIT' value='Modifica!' >";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";

// link de revenire si renuntare la modificare
echo '<a HREF="http://localhost/updatare.html"> Renunt
si revin...</a>';
}
else
 die ("Nu gasesc nici o inregistrare ...");
mysql_close(); 
?>
</body>
</html>
