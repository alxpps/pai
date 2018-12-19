<?php
$connection = OCILogon("student","student","XE");

  $titlu=$_POST['titlu_carte'];
 
 $stmt1 = OCIParse($connection, "select count (titlu_carte) from evidenta_carti where titlu_carte='$titlu'");
 OCIExecute($stmt1);
 $row=OCI_Fetch_row($stmt1);
 if($row[0]==1)
 {
 	 $stmt = OCIParse($connection, "delete from evidenta_carti where titlu_carte='$titlu'");
	OCIExecute($stmt);
	OCIFreeStatement($stmt);
 }
 else
 {
 	echo "Cartea nu exista";
}
OCIFreeStatement($stmt1);

OCILogoff($connection);
?>	