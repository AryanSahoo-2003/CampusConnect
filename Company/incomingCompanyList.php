<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Student List</title>
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
        <a href="alumniProfile.php">Placements</a>
        <a href="updateInfo.php">Update Info</a>
    </div>
    <h1>Student List</h1>
    <table>
        <thead>
            <tr>
                <th>Company</th>
                <th>Job Role</th>
                <th>Job Description</th>
                <th>CTC</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            $domain = $_SESSION['domain'];
            $l_ctc = $_SESSION['l_ctc'];
            $h_ctc = $_SESSION['h_ctc'];

            $conn = mysqli_connect("localhost", "root", "", "TPC");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "select company, job_role, job_desc, ctc from student where
                    domain = $domain
                    and l_ctc >= $l_ctc
                    and h_ctc <= $h_ctc";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["company"] . "</td>";
                echo "<td><a href='http://localhost/Projects/Assign/student/{$row["job_role"]}'>" . $row["job_role"] . "</a></td>";
                echo "<td>" . $row["job_desc"] . "</td>";
                echo "<td>" . $row["ctc"] . "</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>