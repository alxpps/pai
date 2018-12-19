<?php
$connection = OCILogon("student","student","XE");

  $nr_crt=$_POST['nr_crt'];
  $titlu=$_POST['titlu_carte'];
  $autor=$_POST['autor_carte'];
  $editura=$_POST['editura'];
  $nr_exemplare=$_POST['nr_exemplare'];
  $anul_aparitiei=$_POST['anul_aparitiei'];
  $cod_isbn=$_POST['cod_isbn'];
 
 $stmt1 = OCIParse($connection, "select count (nr_crt) from evidenta_carti where nr_crt='$nr_crt'");
 OCIExecute($stmt1);
 $row=OCI_Fetch_row($stmt1);
 if($row[0]==0)
 {
 	 $stmt = OCIParse($connection, "insert into evidenta_carti values ($nr_crt,'$titlu','$autor','$editura',$nr_exemplare,$anul_aparitiei,$cod_isbn)");
	OCIExecute($stmt);
	OCIFreeStatement($stmt);
 }
 else
 {
 	echo "Cartea exista";
}
OCIFreeStatement($stmt1);

OCILogoff($connection);
?>	