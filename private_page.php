<html>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<div class="container">

<h1 style="background-color:#e3e3e3; color:black;text-align:center "> Admin Page </h1>
<h3 style="color:green;padding-left:20px"> Hello <?php session_start(); echo $_SESSION['userName']; ?>  ! You are logged in as : <?php echo $_SESSION['userName'].","; ?> </h3>



<?php

require "Query.php";
Query::connectDatabase();

$link = mysqli_connect("localhost", "root", "", "cip_database");
// Check connection
error_reporting(0);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>


<h4 style=" padding-left:20px"> Admin Abilities are below: </h4>
<br>

<div class="btn-group btn-group-justified" >
  <a href="admin_add_student.php" class="btn btn-primary">Add Student</a>
  <a href="admin_add_advisor.php" class="btn btn-primary">Add Advisor</a>
  <a href="admin_add_supervisor.php" class="btn btn-primary">Add Supervisor</a>
  <a href="admin_add_project.php" class="btn btn-primary">Add Project</a>
</div>
<br>

<div class="btn-group btn-group-justified" >

  <a href="su_students_deleter.php" class="btn btn-primary" style="color:black; background-color:#CD0000" >Delete Student</a>

  <a href="su_supervisor_deleter.php" class="btn btn-primary" style="color:black; background-color:#CD0000">Delete Supervisor</a>
  <a href="su_advisor_deleter.php" class="btn btn-primary" style="color:black; background-color:#CD0000">Delete Advisor</a>
  <a href="su_project_deleter.php" class="btn btn-primary" style="color:black; background-color:#CD0000">Delete Project</a>
</div>
<br> 
<div class="btn-group btn-group-justified" >

  <a href="admin_update_student.php" class="btn btn-primary" style="color:black; background-color:#98FB98" >Update Student Info</a>
  <a href="admin_update_supervisor.php" class="btn btn-primary" style="color:black; background-color:#98FB98">Update Supervisor Info</a>
  <a href="admin_update_advisor.php" class="btn btn-primary" style="color:black; background-color:#98FB98">Update Advisor Info</a>
  <a href="admin_update_project.php" class="btn btn-primary" style="color:black; background-color:#98FB98">Update Project Info</a>
</div>











				</tbody>

	</table>

	</div>
<br><br><br><br><br>
<br>
<br>
<br>
<br>
<a href="public_page.php"> <p style="text-align:center;font-size:20px;padding-left:400px>"> Log out </p> </a>


<style>
.bg-4 {
    background-color: #2f2f2f;
    color: #ffffff;
}
</style>
<footer class="container-fluid bg-4 text-center">
  <p>This Project is made by Banu, Caghan, Deren and Berk © </p>
</footer>

</html>
