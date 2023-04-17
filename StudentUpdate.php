<!DOCTYPE html>
<html>
<head>
<style>
		body {
			background-image: url('');
			background-repeat: no-repeat;
			background-size: cover;
		}
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
<link rel="stylesheet" type="text/css" href="Student_Update1.css">
<meta charset="UTF-8">
  <title>Update Information</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="Student_Update_Date.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
  <script>
    $( function() {
      $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd/mm/yy'
      });
    } );
  </script>
</head>
<?php
session_start();
$email = $_GET['email'];

if(isset($_SESSION['Email']))
{
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

      echo $_FILES["resume1"];

      if (isset($_FILES['resume1'])) {
        echo "Resume uploaded successfully!";
        $file_name = $_FILES['resume1']['name'];
        $file_tmp = $_FILES['resume1']['tmp_name'];
        $file_dest = 'C:/xampp_mp/htdocs/Mini_Project/Resume/' . $file_name;
        if (move_uploaded_file($file_tmp, $file_dest)) {
          echo "Resume uploaded successfully!";
        } else {
          echo "Error uploading resume!";
        }
      }
      

$conn=new mysqli('127.0.0.1','root','','mp_db');
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
       

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$tenth_marks = $_POST['tenth_marks'];
$twelfth_marks = $_POST['twelfth_marks'];
$cpi = $_POST['cpi'];
$sex = $_POST['sex'];
$roll = $_POST['roll'];
$specialization = $_POST['specialization'];
$AOF = $_POST['area_of_interest'];
$Dob=$_POST['datepicker'];
$RollNo="2101CS69";

$sql = "UPDATE student_mp_db SET Name='$name',10th='$tenth_marks',RollNo='$roll',12th='$twelfth_marks',CPI='$cpi',DOB='$Dob',PhoneNo='$sex',Sex='$gender',Specialization='$specialization', Area_of_interest='$AOF' WHERE Email='$email'";
$conn->query($sql);

if (mysqli_query($conn, $sql)) {
   echo "User updated successfully!";
} else {
   echo "Error updating user: " . mysqli_error($conn);
}
    }
  }
  else{
    
  }

?>

<body>
  <title>Update User</title>
  <div class="navigation">
    <h2>Navigation</h2>
    <a href="Home.php?email=<?php echo $email; ?>">Home</a>
    <a href="Student_Profile.php?email=<?php echo $email; ?>">Profile</a>
    <a href="StudentUpdate.php?email=<?php echo $email; ?>" class="active">Update</a>
    
    <a href="Company_To_Apply.php?email=<?php echo $email; ?>">Companies</a>
    <a href="Alumni.php?email=<?php echo $email; ?>">Alumni</a>
    
    <a href="AboutUs.php">About Us</a>
  </div>
  <div class="container" style='margin-left:260px; padding:20px;'>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?email=<?php echo urlencode($email); ?>" method="POST">

  <input type="text" name="name" placeholder="Name">
  <input type="number" name="roll" placeholder="Roll Number">
  <input type="number" name="age" placeholder="Age">
  <input type="text" name="gender" placeholder="Gender">
  <input type="number" step="0.01" name="sex" placeholder="Contact Number">
  <!-- <input type="text" step="0.01" name="resume" placeholder="Drive Link to Resume"> -->
	<input type="text" id="datepicker" name="datepicker" placeholder="Date Of Birth">
  <input type="file" name="resume1" accept=".pdf">

    <input type="number" step="0.01" name="tenth_marks" placeholder="10th Marks">
  <input type="number" step="0.01" name="twelfth_marks" placeholder="12th Marks">
  <input type="number" step="0.01" name="cpi" placeholder="CPI">
  <input type="text" name="specialization" placeholder="Specialization">
  <input type="text" name="area_of_interest" placeholder="Area of Interest">
  <select name="field_to_work">
    <option value="">Select Field to Work In</option>
    <option value="Quant">Quant</option>
    <option value="Networks">Networks</option>
    <option value="Security">Security</option>
    <option value="Machine Learning">Machine Learning</option>
  </select>
  <input type="submit" value="Submit" style="background-color: #000000;
  color: #ffffff;
  border: none;
  border-radius: 30px;
  padding: 15px 30px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  box-shadow: 0px 0px 10px rgba(154, 145, 136, 1);
  margin_top:20px">
</form>
</div>
</link>

</body>
</html>
