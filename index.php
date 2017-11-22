<?php

	function OpenCon()
	 {
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "receptiondeskqueue";

	 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
	 
	 return $conn;
	 }
	 
	 echo "<head>

	 
	 <script type='text/javascript'>
	function typeChanged(x) {
        if (x.value == 'Citizen') {
            document.getElementsByName('firstName')[0].addAttributed('required');
            document.getElementsByName('firstName')[0].addAttributed('required');
        } else {
            document.getElementsByName('firstName')[0].removeAttribute('required');
            document.getElementsByName('lastName')[0].removeAttribute('required');
        }
    };
    </script>

    </head>";


	$conn = OpenCon();

	echo('<form action="store.php" method="post">
		Type:<select name="type" onChange="typeChanged(this)">
		  <option value="Citizen">Citizen</option>
		  <option value="Anonymous">Anonymous</option>
		</select>
		First Name: <input type="text" name="firstName" required><br>
		Surname: <input type="text" name="lastName" required><br>
		Organization: <input type="text" name="organization"><br>
		Service:<select name="service">
		  <option value="Council Tax">Council Tax</option>
		  <option value="Benefits">Benefits</option>
		  <option value="Rent">Rent</option>
		</select>
		<input type="submit">
		</form>');

	$sql = "SELECT * FROM queue"; 
	$result = mysqli_query($conn, $sql);

	echo "<table>"; 
	echo "<tr><td>First Name</td> <td>Last Name</td> <td>Organization</td><td>Type</td><td>Service</td> <td>Queued Date</td></tr>";
	while($row = mysqli_fetch_array($result)){  
	echo "<tr><td>" . $row['firstName'] . "</td><td>" . $row['lastName'] . "</td><td>" . $row['organization'] . "</td><td>" . $row['type'] . "</td><td>" . $row['service'] . "</td><td>" . $row['queuedDate'] . "</td></tr>";  
	}

	echo "</table>";




	   

?>
