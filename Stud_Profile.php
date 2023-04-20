<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <style>
.container {
  width: 85%;
  margin: 0 auto;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  background-image: url("pexels-matheus-viana-2414036.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-color: rgba(202, 202, 202, 0.5); /* adjust the opacity here */
}


/* Hover effect */
.container:hover {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
  transition: box-shadow 0.3s ease-in-out;
}

/* Job role details */
#job_roles {
  margin-top: 20px;
}

/* Remove job role button */
.remove_job_role {
  background-color: #ffffff;
  color: #000000;
  border: none;
  border-radius: 20px;
  padding: 15px 30px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  box-shadow: 0px 0px 10px rgba(154, 145, 136, 1);
  
}

/* Remove job role button hover effect */
.remove_job_role:hover {
  background-color: #b71c1c;
  box-shadow: 0px 0px 10px rgb(184, 18, 18);
}

/* Form label */
label {
  display: block;
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 10px;
  color: #000000;
}

/* Form input fields */


button[type="submit"] {
  background-color: #ffffff;
  color: #FFFFFF;
  border: none;
  border-radius: 20px;
  padding: 15px 30px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  box-shadow: 0px 0px 10px rgba(255, 193, 7, 0.5);
}

button[type="submit"]:hover {
  background-color: #F44336;
  box-shadow: 0px 0px 20px rgba(244, 67, 54, 0.7);
}


/* Error message */
.error {
  color: #f44336;
  font-size: 14px;
  margin-top: 5px;
}

/* Success message */
.success {
  color: #4caf50;
  font-size: 14px;
  margin-top: 5px;
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
        

    .label {
font-size: 20px; /* decrease font size /
line-height: 30px; / increase line height */
}

.value {
font-size: 20px; /* decrease font size /
line-height: 30px; / increase line height */
}


        .error {
            color: red;
            margin-bottom: 10px;
        }

        .link {
            color: blue;
            text-decoration: none;
        }

        .link:hover {
            color: red;
        }
    </style>
</head>
<body>
<div class="navigation" >
    <h2>Navigation</h2>
    <a href="" >Home</a>
    <a href="Stud_Profile.php" class="active">Profile</a>
    <a href="#">Stud_Profile</a>
    <a href="#">Companies</a>
    <a href="#">Alumni</a>
    <a href="#">About Us</a>
  </div>
    <div class="container" style = "margin-left: 230px;
  padding: 20px;">
        <?php 
            //Start session
            session_start();
            ini_set('display_errors', 'On');
            //Check if student is logged in
            if (isset($_SESSION['Email'])) {
                $email = $_SESSION['Email'];
                //Connect to database
                $conn=new mysqli('127.0.0.1','root','','mp_db');
                //Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                //Query database to retrieve student details based on email
                $sql = "SELECT * FROM student_mp_db WHERE Email='$email'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) {
                    $student = mysqli_fetch_assoc($result);
                    // $batch_year = int(substr($student['RollNo'],0,2));
                    //Retrieve current year
                    $current_year = date("Y");
                    $alpha = "20". substr($student['RollNo'], 0, 2);
                    //Retrieve first two characters of RollNo from $student array and convert to integer
                    $rollno_year = intval($alpha);
                    //Calculate difference between $rollno_year and $current_year
                    $year_diff = $current_year - $rollno_year+1;
                    $sql = "SELECT RollNo FROM student_mp_db WHERE Email = '$email'";
                    $result_roll = mysqli_query($conn, $sql);

                     $row1=mysqli_fetch_assoc($result_roll);
                    $RollNo=$row1['RollNo'];
                    //Display year difference as string
                    echo "<h1>Welcome, ".$student['Name']."</h1>";
                    echo "<div>";
                    echo "<span class='label'>RollNo:</span><span class='value'>".$student['RollNo']."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<span class='label'>Name:</span><span class='value'>".$student['Name']."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<span class='label'>10th:</span><span class='value'>".$student['10th']."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<span class='label'>12th:</span><span class='value'>".$student['12th']."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<span class='label'>CPI:</span><span class='value'>".$student['CPI']."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<span class='label'>DOB:</span><span class='value'>".$student['DOB']."</span>";
                    echo "</div>";
                    echo "<div>";         
                    echo "<span class='label'>Current CTC :</span><span class='value'>".$student['ctc']."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<span class='label'>Resume Link :</span><span class='value'><a href =".$student['resume']."</a></span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<span class='label'>Transcript Link :</span><span class='value'><a href =".$student['transcript']."</a></span>";
                    echo "</div>";

                    if($year_diff==1){echo "<div><span class='label'>Batch Year:</span><span class='value'>".$year_diff."st year</span></div>";}}
                    else if($year_diff==2)
                    {echo "<div><span class='label'>Batch Year:</span><span class='value'>".$year_diff."nd year</span></div>";}
                    $rollno = $student['RollNo'];


                    $query = "SELECT Company_id,job_roles_name FROM Student_Registrations WHERE RollNo = '$rollno'";
                    $result = mysqli_query($conn, $query);
                    

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                           
                           
                                
                                $company_id = $row['Company_id'];
                                $query1 = "SELECT Comp_Name FROM Companie WHERE Company_ID = '$company_id'";
                                $result1 = mysqli_query($conn, $query1);
                                $row2=mysqli_fetch_assoc($result1);
                                $job_role=$row['job_roles_name'];
                                echo "<div>";
                                echo "<span class='label'>Company ID for ".$job_role.":</span><span class='value'>" . $row2['Comp_Name'] . "</span>";
                                echo "</div>";
                            
                        }
                    }
                    

                }
                    ?>
                    </div>
                </body>
                </html>                