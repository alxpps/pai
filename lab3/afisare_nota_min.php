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
$marca=$_POST['marca'];
$query=mysql_query("select * from studenti where marca='$marca'");
$nr=mysql_num_rows($query); 

if ($nr>0){ 
$query1=mysql_query("select studenti.*,note.nota from studenti,note where studenti.marca=note.marca and note.marca='$marca' and note.nota=(select min(nota) from note where marca='$marca' )");
 echo "<table border='2' align='center'>";
 $coln=mysql_num_fields($query1); //nr. de campuri
 echo"<tr bgcolor='silver'>";

 // realizare automata a capului de tabel (continând toate câmpurile)
 for ($i=0; $i<$coln; $i++){
 //numele câmpurilor ca si cap de tabel
 $var=mysql_field_name($query1,$i);
 echo "<th> $var </th>";
 }
 echo"</tr>";

 // afiseaza inregistrarile gasite in urma interogarii
 while($row=mysql_fetch_row($query1)){
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
echo "Studentul nu exista in baza de date!";
echo"</center>"; 
}
?>
</body>
</html>
