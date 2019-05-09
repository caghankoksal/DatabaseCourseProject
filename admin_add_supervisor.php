<!DOCTYPE html>
<html>
<head>
    <title>Admin_add_supervisor</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color:#e3e3e3;">

<h3 style="color:black, ;">This is a page for adding supervisor</h3>

<p style="color:black; padding-left:15px">Enter the student id and starting term for newly chosen supervisors. </p>

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
Query::getTable("su_students");
?>

<div style="margin-left: 45px;">
<?php
Query::tablePopulator("supervisors");
?>
</div>



</body>
</html>
