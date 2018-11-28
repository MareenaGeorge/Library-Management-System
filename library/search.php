<?php

	$key=$_GET["keyword"];
	$parts = explode(" ", $key);
	$x="";
	for ($i = 0; $i <count($parts); $i++) 
	{
		$parts[$i]=trim($parts[$i]);
		if(strcmp($parts[$i],""))
		{
			$x.=" bk.isbn  like '%$parts[$i]%' or bk.title like '%$parts[$i]%' or ar.name like '%$parts[$i]%' ";
			if($i<count($parts)-1)
				$x.=" or ";
		}
	}
	$con = new mysqli("localhost","root","","library1");
	$sql = "select isbn from book_loans where date_in is null";
	$nobooks = $con->query($sql);
	$t="";
	if($nobooks->num_rows > 0)
	{
		while($row = $nobooks->fetch_assoc())
		{
			$t.=$row['isbn'];
			$t.=",";
		}
	}
	$q = "select bk.title,bk.isbn,GROUP_CONCAT(ar.name) from book as bk NATURAL JOIN book_authors NATURAL JOIN authors as ar where ($x) group by isbn";
	$result = $con->query($q);
	if ($result->num_rows > 0) 
	{
		echo "<table border='2' style='width:100%'><tr><th>ISBN</th><th>Title</th><th>Authors</th><th></th></tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr>";
			echo "<td>" . $row['isbn'] . "</td>";
			echo "<td>" . $row['title'] . "</td>";
			echo "<td>" . $row['GROUP_CONCAT(ar.name)'] . "</td>";
			echo "<td><button type='button' onclick=borrow('$t$row[isbn]');>Check Out</td>";
			echo "</tr>";
		}	
		echo "</table>";
		echo "<br><br><button type='button' onclick=home();>Go Back to main page";
	} 
	else
	{
		echo " Sorry! Could not find anything... ";
		echo "<br><br><button type='button' onclick=home();>Go Back to main page";
	}
	$con->close();
?>