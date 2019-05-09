<!DOCTYPE html>
<html>
<head>
    <title>Admin_advisor_deleter</title>
    <meta-charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color:#e3e3e3;">

<h3 style="color:black, ;">This is a a page for deleting advisor</h3>

<p style="color:black; padding-left:15px">Enter the student information to delete advisor from database  </p>

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
 $query="SELECT advisor.stu_id,su_students.stu_entry_year,su_students.stu_name FROM advisor,su_students WHERE advisor.stu_id=su_students.stu_id";
Query::getTableWithQuery($query);
?>

<div style="margin-left: 15px;">
<?php
Query::tableDeleter("advisor");
?>
</div>



</body>
</html>
