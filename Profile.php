<!DOCTYPE html>
<html>
<head>
  <title>Company Details</title>
  <link rel="stylesheet" type="text/css" href="company_andar.css">

  <style>
        /* CSS for the navigation bar */
        .navigation {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 220px;
      background-color: #f2f2f2;
      overflow-x: hidden;
      padding-top: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .navigation a {
      display: block;
      padding: 16px;
      color: #333;
      text-decoration: none;
      transition: 0.3s;
      font-size: 18px;
      font-weight: bold;
      border-left: 5px solid transparent;
    }

    .navigation a:hover {
      background-color: #ddd;
      border-left: 5px solid #4caf50;
    }

    .navigation a.active {
      background-color: #4caf50;
      color: #fff;
      border-left: 5px solid #fff;
    }

    .navigation h2 {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #eee;
    }

    h1 {
      color: #0055a5;
      font-size: 2.5rem;
      margin-bottom: 1rem;
      text-align: center;
      text-transform: uppercase;
    }

    h2 {
      color: #0055a5;
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
    }

    p {
      color: #333;
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    table {
      border-collapse: collapse;
      margin-bottom: 2rem;
      width: 100%;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 0.5rem;
      text-align: left;
      vertical-align: top;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }
  </style>
</head>
<body>
<div class="navigation">
    <h2>Navigation</h2>
    <a href="company.php" >Update</a>
    <a href="Profile.php"class="active">About</a>
    <a href="SRC.php">Students Registered</a>
    <a href="logout.php">Logout</a>
  </div>
  <div class="conet" style = "  margin-left: 200px;
  padding: 20px;">

  <h1>Company Details</h1>

  <?php
  session_start();

  // Check if the user is logged in
  if (isset($_SESSION["Company_ID"])) {

    // Include the database configuration file
    require_once "config.php";

    // Get the Company_ID value from the session
    $company_id = $_SESSION["Company_ID"];

    // Get the details for the specific company
    $sql = "SELECT Comp_Name, Comp_email, Comp_Desc FROM Companies WHERE Company_ID = $company_id";
    $result = $conn->query($sql);

    // Get the job roles for the specific company
    $sql2 = "SELECT * FROM Job_Roles WHERE Company_id = $company_id";
    $result2 = $conn->query($sql2);

    if ($result->num_rows > 0) {
      // Display the company details
      $row = $result->fetch_assoc();
      echo "<h2>" . $row["Comp_Name"] . "</h2>";
      echo "<p><strong>Email:</strong> " . $row["Comp_email"] . "</p>";
      echo "<p><strong>Description:</strong> " . $row["Comp_Desc"] . "</p>";

      // Display the job roles for the company
      if ($result2->num_rows > 0) {
        echo "<h2>Job Roles</h2>";
        echo "<table>";
        echo "<thead><tr><th>Role Name</th><th>Job Description</th><th>Minimum CPI</th><th>Job Specification</th><th>Job Department</th><th>Mode of Interview</th><th>Date of Interview</th><th>Job Package</th></tr></thead>";
        echo "<tbody>";
        while($row2 = $result2->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row2["Role_Name"] . "</td>";
          echo "<td>" . $row2["Job_Desc"] . "</td>";
          echo "<td>" . $row2["Min_CPI"] . "</td>";
          echo "<td>" . $row2["Job_Spec"] . "</td>";
          echo "<td>" . $row2["Job_Dept"] . "</td>";
          echo "<td>" . $row2["Job_MOI"] . "</td>";
          echo "<td>" . $row2["Job_DOI"] . "</td>";
          echo "<td>" . $row2["Job_Package"] . "</td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
      } else {
        echo "<p>No job roles found for this company.</p>";
      }

    } else {
      echo "<p>No company found with the given ID.</p>";
    }

  } else {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
  }
  ?>
</div>
</body>
</html>