<!DOCTYPE html>
<html>
<head>
    <title>Admin_add_advisor</title>
    <meta-charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color:#e3e3e3;">

<h3 style="color:black, ;">This is a a page for adding advisors</h3>

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
$query="SELECT advisor.stu_id, su_students.stu_name
		FROM su_students,advisor
		WHERE su_students.stu_id=advisor.stu_id";
echo "<p>Current Advisors:</p>";
Query::getTableWithQuery($query);
echo "<p>Enter the student id of the new advisor</p>";
?>
</div>


<div style="margin-left: 15px;">
<?php
Query::tablePopulator("advisor");
?>
</div>



</body>
</html>
