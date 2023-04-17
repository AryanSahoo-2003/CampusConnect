<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        session_start();
        $_SESSION['domain'] = $_POST['domain'];
        $_SESSION['l_ctc'] = $_POST['l_ctc'];
        $_SESSION['h_ctc'] = $_POST['h_ctc'];
        $_SESSION['l_batch'] = $_POST['l_batch'];
        $_SESSION['h_batch'] = $_POST['h_batch'];

        $conn = new mysqli('localhost', 'root', '', 'TPC');

        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        header("Location: alumniExperienceList.php");
        exit;

        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Alumni</title>
</head>
<body>
    <h1>Incoming Companies</h1>
    <form>
        <div>
            <label for="domain">Domain</label>
            <select id="domain" name="domain" required>
                <option value="">Select an option</option>
                <?php
                    $conn = new mysqli('localhost', 'root', '', 'TPC');
                    if ($conn->connect_error){
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "select distinct domain from alumni_experience";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['domain'] . '">' . $row['domain'] . '</option>';
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="l_ctc">Package(LPA) lower bound</label>
            <input type="number" id="l_ctc" name="l_ctc">
        </div>
        <div>
            <label for="u_ctc">Package(LPA) upper bound</label>
            <input type="number" id="u_ctc" name="u_ctc">
        </div>
        <div>
            <label for="l_batch">Earliest Batch</label>
            <input type="number" id="l_batch" name="l_batch">
        </div>
        <div>
            <label for="u_batch">Recent Batch</label>
            <input type="number" id="u_batch" name="u_batch">
        </div>
        <div>
            <button>Submit</button>
        </div>
    </form>
</body>
</html>