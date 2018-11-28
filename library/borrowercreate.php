<?php
	$key=$_GET["keyword"];
	$parts = explode('@', $key);
	$con = new mysqli("localhost","root","","library1");
	$sql = "select max(card_id) from borrower";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
	$idno = $row["max(card_id)"];
	$idno=$idno+1;
	$sql = "insert into borrower values($idno,'$parts[0]','$parts[1]','$parts[2]','$parts[3]')";
	if ($con->query($sql) === TRUE)
	{
		echo "New Borrower created!";
		echo "<br><br><button type='button' onclick=home();>Go Back to main page";
	}
	else 
	{
		echo "Unable to create new borrower. SSN already exists!";
		echo "<br><br><button type='button' onclick=home();>Go Back to main page";
	}

?>