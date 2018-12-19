<?php
$connection = OCILogon("student","student","XE");

  $titlu=$_POST['titlu_carte'];
 
 $stmt1 = OCIParse($connection, "select count (titlu_carte) from evidenta_carti where titlu_carte='$titlu'");
 OCIExecute($stmt1);
 $row=OCI_Fetch_row($stmt1);
 if($row[0]!=0)
 {
 	 $stmt = OCIParse($connection, "update evidenta_carti set nr_exemplare=nr_exemplare-1 where titlu_carte='$titlu'");
	OCIExecute($stmt);
	OCIFreeStatement($stmt);
 }
 else
 {
 	echo "Cartea nu exista";
}
OCIFreeStatement($stmt1);

OCILogoff($connection);
?>	<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
</html>
