<?php
	$con = new mysqli("localhost","root","","library1");
	$sql1 = "select loan_id,due_date from book_loans where due_date<'$date' and date_in is null";
	$date=$_GET["card_id"];
	$l='';
	$d='';
	$r1 = $con->query($sql1);
	if ($r1->num_rows > 0) 
	{
		while($row1 = $r1->fetch_assoc())
		{
			$l=$row1['loan_id'];
			$d=$row1['due_date'];
			$q1 = "select loan_id from fines where loan_id=$l and paid=0";
			$r = $con->query($q1);
			if($r->num_rows > 0)
			{	
				$q2="update fines set fine_amt=((SELECT DATEDIFF('$date','$d') AS days)*0.25) where loan_id=$l";
				$con->query($q2); 
			}
			else
			{
				$q3="insert into fines values($l,(SELECT DATEDIFF('$date','$d') AS days)*0.25,FALSE)";
				$con->query($q3); 
			}
		}
	}
	echo "Successfull Update.";
	echo "<br><br><button type='button' onclick=home();>Go Back to main page";
	$con->close();
?>