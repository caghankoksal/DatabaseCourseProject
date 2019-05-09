<!DOCTYPE html>
<html>
<head>
    <title>Admin_add_students</title>
    <meta-charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color:#e3e3e3;">

<h3 style="color:black, ;">This is a a page for updating student info</h3>

<p style="color:black; padding-left:15px">Enter student information to update a current student  </p>

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

<div style="margin-left: 100px;">
<?php
Query::getTable("su_students");
?>
</div>


<div style="margin-left: 100px;">
<?php
Query::tableUpdater('su_students');
?>
</div>



</body>
</html>
