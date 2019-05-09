<!DOCTYPE html>
<html>
<head>
    <title>Admin_project_deleter</title>
    <meta-charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color:#e3e3e3;">

<h3 style="color:black, ;">This is a a page for deleting a project </h3>


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

<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <form action="su_project_deleter.php", class="form-search", method="post" >
            <input type="text", class="input-medium search-query", name="valueToSearch" placeholder="Project Id/Day/Supervisor...">
            <input type="submit", class="btn btn-info" name="search" value="Filter all the projects"><br><br>
        </form>

    </body>
</html>

<div>
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
    `day`, projects.`project_id`,projects.p_name,'term_id', su_students.stu_name) LIKE '%".$valueToSearch."%' ";

    Query::getTableWithQuery($query);
}
 else {
    //$query = "SELECT * FROM projects,manages WHERE projects.project_id=manages.project_id";
    //Query::getTableWithQuery($query);
}
?>

<p style="color:black; padding-left:15px">Enter the project information to delete project from the database  </p>
</div>

<div style="margin-left: 15px;">
<?php
Query::tableDeleter("projects");
?>
</div>



</body>
</html>
