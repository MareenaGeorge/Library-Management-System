<?php
	$con = new mysqli("localhost","root","","library1");
	$l=$_GET["loan_id"];
	$x = intval($l);
	$q = "update fines set paid=true where loan_id=$x";
	if ($con->query($q) === TRUE) 
		echo " Successfull Fine Payment";
	echo "<br><br><button type='button' onclick=home();>Go Back to main page";
	$con->close();
?>