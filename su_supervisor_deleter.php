<!DOCTYPE html>
<html>
<head>
    <title>Admin_supervisor_deleter</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color:#e3e3e3;">

<h3 style="color:black, ;">This is a a page for deleting supervisors</h3>

<p style="color:black; padding-left:15px">Enter the student information to delete a supervisor from database  </p>

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

<?php
 $query="SELECT supervisors.stu_id,su_students.stu_entry_year,su_students.stu_name FROM supervisors,su_students WHERE supervisors.stu_id=su_students.stu_id";
Query::getTableWithQuery($query);
?>


<div style="margin-left: 15px;">
<?php
Query::tableDeleter("supervisors");
?>
</div>



</body>
</html>
