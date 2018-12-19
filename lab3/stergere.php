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
$query=mysql_query("select * from studenti where
nume='$nume' and prenume='$prenume'");
$nr_inreg=mysql_num_rows($query);

if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari";
 echo"</center>";

 // creare tabela de afisare rezultate
 echo "<table border='3' align='center'>";
 //numarare campuri
 $coln=mysql_num_fields($query);
 echo"<tr bgcolor='silver'>";
 // realizare automata a capului de tabel (continând toate câmpurile)
 for ($i=0; $i<$coln; $i++){
 //numele câmpurilor ca si cap de tabel
 $var=mysql_field_name($query,$i);
 echo "<th> $var </th>";
 } 
 echo"</tr>";
 // extragere informatii si afisare
 while (list ($marca,$nume,$prenume,$an) =
 mysql_fetch_row($query)){
 print (" <tr>".
 " <td>$marca</td>".
 " <td>$nume</td>".
 " <td>$prenume</td>".
 " <td>$an</td>".
 " </tr>");
 }
 echo"</table>";

 // Apelarea scriptului de stergere efectiva/anulare (cu transmitere mai departe
 // a parametrilor de intrare, în cazul de fata ‘nume’ dupa care se face cautarea)

echo "<form method='POST'
action='http://localhost/stergere2.php'>";

 // ”pasare”, transmitere mai departe a parametrului nume ($nume)
 //sub numele ‘ nume1’

 echo "<input type='hidden' name='nume1_form'
 value=".$_POST['nume_form'].">";
 echo "<input type='SUBMIT' value='Stergere efectiva'>";
 echo "</form>";
 // link pt. revenire la pagina de start si anulare stergere
 echo "<a HREF='http://localhost/stergere.html'>
 Renunt si revin...</a>";
}
else
 die("Nu gasesc nici o inregistrare ...");
mysql_close();  
?>
</body>
</html>
