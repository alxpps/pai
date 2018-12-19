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
$marca=$_POST['marca_form'];
$nume=$_POST['nume_form'];
$prenume=$_POST['prenume_form'];
$an=$_POST['an_form']; 
$query=mysql_query("select count(*) from studenti where marca='$marca'");
$row=mysql_fetch_row($query);
$nr=$row[0];
if ($nr==0){ 
$query1=mysql_query("insert into studenti
values('$marca','$nume','$prenume','$an')"); 
$query2=mysql_query("select * from studenti where
marca='$marca'"); 
$nr_inreg=mysql_num_rows($query2); 
if ($nr_inreg>0){ 
echo "<table border='2' align='center'>";
 $coln=mysql_num_fields($query2); //nr. de campuri
 echo"<tr bgcolor='silver'>";

 // realizare automata a capului de tabel (continând toate câmpurile)
 for ($i=0; $i<$coln; $i++){
 //numele câmpurilor ca si cap de tabel
 $var=mysql_field_name($query2,$i);
 echo "<th> $var </th>";
 }
 echo"</tr>";

 // afiseaza inregistrarile gasite in urma interogarii
 while($row=mysql_fetch_row($query2)){
 echo"<tr>";
 foreach ($row as $value){
 echo "<td>$value</td>";
 }
 echo"</tr>";
 }
 echo"</table>"; 
}
else{ 
 echo"<center>";
 echo "Nu s-a gasit nici o inregistrare!!!";
 echo"</center>";
} 
}
else{
echo"<center>";
echo "Studentul respectiv exista deja in baza de date!";
echo"</center>";
}
mysql_close(); 
?>
</body>
</html>
