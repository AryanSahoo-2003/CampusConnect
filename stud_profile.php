<!DOCTYPE html>
<html>
<head>
	<title>Student Profile</title>
	<style>
        .container {
	max-width: 800px;
	margin: 0 auto;
	padding: 20px;
}

table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	padding: 12px;
	text-align: left;
	border-bottom: 1px solid #ddd;
}

th {
	background-color: #333;
	color: white;
}

tr:hover {
	background-color: #f5f5f5;
}

a {
	color: blue;
	text-decoration: none;
}

a:hover {
	color: red;
}

.error {
	color: red;
	margin-bottom: 10px;
}
        </style>
</head>
<body>
	<div class="container">
		<?php 
			//Start session
			session_start();
            ini_set('display_errors', 'On');
			//Check if student is logged in
			if (isset($_SESSION['Email'])) {
				$email = $_SESSION['Email'];
				//Connect to database
				$conn = mysqli_connect("localhost", "root", "", "CampusConnect");
				//Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				//Query database to retrieve student details based on email
				$sql = "SELECT * FROM Student WHERE Email='$email'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) == 1) {
					$student = mysqli_fetch_assoc($result);
					echo "<h1>Welcome, ".$student['Name']."</h1>";
					echo "<table>";
					echo "<tr><th>RollNo</th><td>".$student['RollNo']."</td></tr>";
					echo "<tr><th>Name</th><td>".$student['Name']."</td></tr>";
					echo "<tr><th>10th</th><td>".$student['10th']."</td></tr>";
					echo "<tr><th>12th</th><td>".$student['12th']."</td></tr>";
					echo "<tr><th>CPI</th><td>".$student['CPI']."</td></tr>";
					echo "<tr><th>DOB</th><td>".$student['DOB']."</td></tr>";
					echo "<tr><th>Specialization</th><td>".$student['Specialization']."</td></tr>";
					echo "<tr><th>Area of Interest</th><td>".$student['Area_of_Interest']."</td></tr>";
					echo "<tr><th>File Link</th><td><a href='".$student['file_link']."'>Download</a></td></tr>";
					// echo "<tr><th>PasswordCC</th><td>".$student['PasswordCC']."</td></tr>";
					// echo "<tr><th>Email</th><td>".$student['Email']."</td></tr>";
					echo "<tr><th>Sex</th><td>".$student['Sex']."</td></tr>";
					echo "</table>";
				} else {
					//If student does not exist, display error message
					echo "<p>Student not found</p>";
				}
				//Close connection
				mysqli_close($conn);
			} else {
				//If student is not logged in, redirect to login page

				header("Location: Reg.php");
				exit;
			}
		?>
	</div>
</body>
</html>
