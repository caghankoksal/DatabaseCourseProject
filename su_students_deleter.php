<!DOCTYPE html>
<html>
<head>
    <title>Admin_student_deleter</title>
    <meta-charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color:#e3e3e3;">

<h3 style="color:black, ;">This is a a page for deleting students</h3>

<p style="color:black; padding-left:15px">Enter student information to delete student from database  </p>

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


<div style="margin-left: 15px;">
<?php
Query::getTable("su_students");
Query::tableDeleter("su_students");
?>
</div>



</body>
</html>
