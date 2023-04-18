<?php
// Connect to the database
$conn = new mysqli('127.0.0.1', 'root', '', 'mp_db');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the values from the form
  $RollNo = $_POST['RollNo'];
  $Company_ID = $_POST['Company_ID'];
  $Role_Name = $_POST['Role_Name'];
  $Job_DOI = $_POST['Job_DOI'];

  // Insert the values into the database
  $sql = "INSERT INTO student_registrations (RollNo, Company_id, job_roles_name, Job_DOI) 
          VALUES ('$RollNo', '$Company_ID', '$Role_Name', '$Job_DOI')";
  if (mysqli_query($conn, $sql)) {
    // Redirect the user to a different page
    header("Location: success.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
?>
