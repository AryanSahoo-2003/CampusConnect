<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Profile</title>
    <style>
    body {
    background-image: url('');
    background-size: cover;
    }
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
    </style>
</head>
<body>
    <div class="navigation">
        <h2>Navigation</h2>
        <a href="home.php" class="active">Home</a>
        <a href="searchStudent.php">Search Student</a>
        <a href="incomingCompany.php">Search Company</a>
        <a href="currentStudents.php">Students</a>
        <a href="incomingCompany.php">Company</a>
        <a href="alumniExperience.php">Alumni</a>
        <!-- <a href="companyStats.php">Statistics</a> -->
        <a href="placing.php">Place Students</a>
        <!-- <a href="endPlacements.php">End Placements</a> -->
        <a href="logout.php">Log Out</a>
    </div>
    <h1>Administrator </h1>
</body>
</html>