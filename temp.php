
<table>
        <thead>
            <tr>
                <th>Company</th>
                <th>Job Role</th>
                <th>Job Description</th>
                <th>CTC</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
<?php>
$sql = "SELECT * FROM alumni_experience where rollno = '$rollno'";
            $result = mysqli_query($conn, $sql);

            // Display the results in a table
            while ($row = mysqli_fetch_assoc($result)) {
            $sql1 = "SELECT * FROM alumni_experience where rollno = '$row['rollno']";
            $result1 = mysqli_query($conn, $sql1);
            while ($row1 = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["company_name"] . "</td>";
                echo "<td>" . $row["job_role"] . "</td>";
                echo "<td>" . $row["job_desc"] . "</td>";
                echo "<td>" . $row["ctc"] . "</td>";
                echo "<td>" . $row["start_date"] . "</td>";
                echo "<td>" . $row["end_date"] . "</td>";                                                                                                                                                                            
                echo "</tr>";
            }
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

            