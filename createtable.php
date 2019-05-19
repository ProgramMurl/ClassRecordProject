

<?php
	$servername ="localhost";
	$username="root";
	$password="";
	$Dname="classrecord";

	$conn=new mysqli($servername, $username, $password, $Dname);

	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		echo "Connected successfully";
	}

	// CREATE TABLE syntax

	// "CREATE TABLE `users` (
	//   `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	//   `username` varchar(100) NOT NULL,
	//   `email` varchar(100) NOT NULL,
	//   `password` varchar(100) NOT NULL
	// ) ENGINE=InnoDB DEFAULT CHARSET=latin1;"

	//check if table was created syntax

	// if(mysqli_query($conn, $sql)){
	// 	echo "Table created successfully.";
	// }
	// else{
	// 	echo "ERROR: Could not able to execute $sql." .mysqli_error($conn)
	// }


	mysqli_close($conn);
	?>