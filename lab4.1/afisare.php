<?php
$connection = OCILogon("student","student","XE");
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
		$nr_crt=OCIResult($stmt,"NR_CRT");
		$titlu=OCIResult($stmt,"TITLU_CARTE");
		$autor=OCIResult($stmt,"AUTOR_CARTE");
		$editura=OCIResult($stmt,"EDITURA");
		$nr_exemplare=OCIResult($stmt,"NR_EXEMPLARE");
		$an_aparitie=OCIResult($stmt,"ANUL_APARITIEI");
		$codISBN=OCIResult($stmt,"COD_ISBN");
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
echo "</table>";
		OCIFreeStatement($stmt);
		OCILogoff($connection);
?>

