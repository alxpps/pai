<?php
$connection = OCILogon("student","student","EX");
$stmt = OCIParse($connection, "select * from evidenta_carti");
OCIExecute($stmt);

echo "<table border ='4' align ='center'>";
echo "<tr>";
echo "<th>Nr crt</th>";
echo "<th>Titlu carte</th>";
echo "<th>Autor carte</th>";
echo "<th>Editura</th>";
echo "<th>Nr exemplae</th>";
echo "<th>Anul aparitiei</th>";
echo "<th>Cod isbn</th>";
echo "</tr>";

	while(OCIFetch($stmt))
	{
		$nr_crt=OCIResult($stmt,"nr_crt");
		$titlu=OCIResult($stmt,"titlu_carte");
		$autor=OCIResult($stmt,"autor_carte");
		$editura=OCIResult($stmt,"editura");
		$nr_exemplare=OCIResult($stmt,"nr_exemplare");
		$an_aparitie=OCIResult($stmt,"anul_aparitiei");
		$codISBN=OCIResult($stmt,"cod_isbn");
		print("<tr>".
			"<td>$nr_crt</td>".
			"<td>$titlu</td>".
			"<td>$autor</td>".
			"<td>$editura</td>".
			"<td>$nr_exemplare</td>".
			"<td>$an_aparitie</td>".
			"<td>$codISBN</td>".
			"</tr>");
			}
		OCIFreeStatement($stmt);
		OCILogoff($connection);
?>

