<!DOCTYPE html>
<html>
<head>
    <title>Admin_update_project</title>
    <meta-charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color:#e3e3e3;">

<h3 style="color:black, ;">This is a a page for updating projects</h3>

<p style="color:black; padding-left:15px">Enter the project info to update a current project </p>

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
<div style="margin-left:100px;">
<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT 
                projects.term_id,
                projects.project_id,
                projects.day,
                projects.p_name,
                projects.capacity,
                su_students.stu_name
    FROM projects,manages,su_students
    WHERE projects.project_id = manages.project_id AND su_students.stu_id = manages.stu_id AND CONCAT(
    `day`, projects.`project_id`,'p_name', su_students.stu_name) LIKE '%".$valueToSearch."%' ";

    Query::getTableWithQuery($query);
}
 else {
    $query = "SELECT * FROM projects,manages WHERE projects.project_id=manages.project_id";
    Query::getTableWithQuery($query);
}
?>
</div>

<div style="margin-left: 15px;">
<?php
Query::tableUpdater("projects");
?>
</div>



</body>
</html>
