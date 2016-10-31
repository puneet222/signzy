<?php
	include("dbcon.php") ;
	$query = "SELECT * FROM firstname WHERE 1" ;
 	echo $query ;
	$result = $conn->query($query);
	// // echo $result;
	    while($row = $result->fetch_assoc()) {
	        $fname = $row['fname'] ;
	        $query2 = "SELECT * FROM lastname WHERE 1" ;
	        $result2 = $conn->query($query2) ;

	        while($row2 = $result2->fetch_assoc()){
	        	$lname = $row2['lname'] ;

	        	// now i have to insert the names in the table

	        	$stmt = $conn->prepare("INSERT INTO `main`(`first`, `last`) VALUES (?, ?)");
				$stmt->bind_param('ss', $fname , $lname);

				/* execute prepared statement */
				$stmt->execute();
	        }
	    }
?>