<?php
include('dbcon.php') ;
$str = $_GET['q'] ;
// echo "ashjbsa" ;
$srch = "'".$str."%'" ;

// starting from the first name

$query = "SELECT * FROM main WHERE first like ".$srch.";" ;
 	// echo $query ;
	$result = $conn->query($query);
	$count1 = mysqli_num_rows($result) ;  // get the count

	// echo "number of rows are for 1 : ".$count1 ; 
	// echo $result;
	$pass = array() ;
		if($count1 >= 5){                                        // got all the first name
			 while($row = $result->fetch_assoc()) {
	    	// echo "im loop" ;
	    	// echo $row['first'] ;
	    	$pass[] = $row ;
	    	// echo "\n\n" ;
	   		 }
		}
		else{
			$lim1 = 5 - $count1 ;
			// remaining result

			while($row = $result->fetch_assoc()) {
	    	// echo "im loop" ;
	    	// echo $row['first'] ;
	    	$pass[] = $row ;
	    	// echo "\n\n" ;
	   		 }

			// starting from the first name

			$query = "SELECT * FROM main WHERE last like ".$srch.";" ;
		 	// echo $query ;
			$result = $conn->query($query);
			$count2 = mysqli_num_rows($result) ;  // get the count
			// echo "number of rows are for 2 : ".$count2 ;

			if($count2 >= $lim1)   // got the remaining
			{
			    while($row = $result->fetch_assoc()) {
		    	// echo "im loop" ;
			    $pass[] = $row ;
		    	// echo $row['first'] ;
		    	// echo "\n\n" ;
	   		 	}
			}
			else
			{

				// remaining result
				$lim2 = $lim1 - $count2 ;

				while($row = $result->fetch_assoc()) {
		    	// echo "im loop" ;
			    $pass[] = $row ;
		    	// echo $row['first'] ;
		    	// echo "\n\n" ;
	   		 	}



				// pattern in the first name or last name 
				$srch2 = "'%".$str."%'" ;
				$query = "SELECT * FROM main WHERE first like ".$srch2.";" ;
			 	// echo $query ;
				$result = $conn->query($query);
				$count3 = mysqli_num_rows($result) ;  // get the count
				// echo "number of rows are for 3 : ".$count3 ;

				if($count3 >= $lim2)
				{

					while($row = $result->fetch_assoc()) {
			    	// echo "im loop" ;
			    	// echo $row['first'] ;
			    	$pass[] = $row ;
			    	// echo "\n\n" ;
		   		 	}
		   		}
		   		else
		   		{
		   			while($row = $result->fetch_assoc()) {
			    	// echo "im loop" ;
			    	// echo $row['first'] ;
			    	$pass[] = $row ;
			    	// echo "\n\n" ;
		   		 	}

		   		 	$query = "SELECT * FROM main WHERE last like ".$srch2.";" ;
				 	// echo $query ;
					$result = $conn->query($query);
					while($row = $result->fetch_assoc()) {
			    	// echo "im loop" ;
			    	// echo $row['first'] ;
			    	$pass[] = $row ;
			    	// echo "\n\n" ;
		   		 	}

		   		}
			} 
		}
		

$names = json_encode($pass) ;
echo $names ;   
// echo $str ;
?>