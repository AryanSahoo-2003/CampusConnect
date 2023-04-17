<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registered</title>
    <link rel="stylesheet" type="text/css" href="SRC.css">
</head>
<body>
<?php
  session_start();

  // Check if the user is logged in
  if (isset($_SESSION["Company_ID"])) {

    // Include the database configuration file
    require_once "config.php";

    // Get the Company_ID value from the session
    $company_id = $_SESSION["Company_ID"];

    $sql = "SELECT Student.Name, Student.CPI, Student.Sex,Job_DOI,Student.RollNo
        FROM Student
        INNER JOIN Student_Registrations ON Student.RollNo = Student_Registrations.RollNo
        WHERE Student_Registrations.Company_ID = $company_id";
        $result = $conn->query($sql);

        // Display the results in a table
        echo "<table>";
        echo "<thead><tr><th>Student Name</th><th>CPI</th><th>Gender</th><th>Date of Interview</th><th>Profile</th></tr></thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["Name"] . "</td><td>" . $row["CPI"] . "</td><td>" . $row["Sex"] . "</td><td>" .$row['Job_DOI'] ."</td><td><a href='profile.php?rollno=" . $row["RollNo"] . "'>Show Profile</a></td></tr>";        }
        echo "</tbody></table>";
        
        // Close the database connection
        $conn->close();
    }
        ?>

</body>
</html>