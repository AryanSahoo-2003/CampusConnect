<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    $year = $_SESSION['year'];

    $conn = new mysqli('localhost', 'root', '', 'CampusConnect');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql1 = "SELECT branch, AVG(ctc) as avg_ctc FROM alumni_placement Natural Join Alumni
            where batch = $year 
            GROUP BY Alumni.branch";
    $result1 = $conn->query($sql1);

    $branches = [];
    $average_ctc1 = [];

    if ($result1->num_rows > 0) {
        while($row1 = $result1->fetch_assoc()) {
            $branches[] = $row1['branch'];
            $average_ctc1[] = $row1['avg_ctc'];
        }
    } 

    $sql2 = "SELECT company, AVG(ctc) as avg_ctc FROM prev_jobs 
            where year = $year 
            GROUP BY company";
    $result2 = $conn->query($sql2);

    $companies = [];
    $average_ctc2 = [];

    if ($result2->num_rows > 0) {
        while($row2 = $result2->fetch_assoc()) {
            $companies[] = $row2['company'];
            $average_ctc2[] = $row2['avg_ctc'];
        }
    } 

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stats</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Statistics</h2>

    <?php
            $year = $_SESSION['year'];
            $conn = new mysqli('localhost', 'root', '', 'TPC');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "select count(*) as total, avg(ctc) as average, max(ctc) as highest 
                    from alumni_placement 
                    where year = $year";
            $result = $conn->query($sql);

            $row = $result->fetch_assoc();
        ?>
        <div>
            <h3>Placement Statistics for <?php echo $year ?></h3>
            <p>Total Placements: <?php echo $row['total'] ?></p> 
            <p>Average CTC: <?php echo number_format($row['average'], 2) ?></p>
            <p>Highest CTC: <?php echo number_format($row['highest'], 2) ?></p>
        </div>

    <canvas id="barChart" width = '10' height='2'></canvas>
    <script>
        const branches = <?php echo json_encode($branches); ?>;
        const average_ctc1 = <?php echo json_encode($average_ctc1); ?>;

        const ctx1 = document.getElementById('barChart').getContext('2d');
        const chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: branches,
                datasets: [{
                    label: 'Average CTC',
                    data: average_ctc1,
                    backgroundColor: 'blue'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

        <?php
            $year = $_SESSION['year'];
            $conn = new mysqli('localhost', 'root', '', 'TPC');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "select count(*) as total, avg(ctc) as average, max(ctc) as highest 
                    from prev_jobs 
                    where year = $year";
            $result = $conn->query($sql);

            $row = $result->fetch_assoc();
        ?>
        <div>
            <h3>Placement Statistics for <?php echo $year ?></h3>
            <p>Total Placements: <?php echo $row['total'] ?></p> 
            <p>Average CTC: <?php echo number_format($row['average'], 2) ?></p>
            <p>Highest CTC: <?php echo number_format($row['highest'], 2) ?></p>
        </div>

    <canvas id="hello" width = '10' height='2'></canvas>
    <script>
        const companies = <?php echo json_encode($companies); ?>;
        const average_ctc2 = <?php echo json_encode($average_ctc2); ?>;

        const ctx2 = document.getElementById('hello').getContext('2d');
        const chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: companies,
                datasets: [{
                    label: 'Average CTC',
                    data: average_ctc2,
                    backgroundColor: 'blue'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>