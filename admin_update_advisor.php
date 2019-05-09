<!DOCTYPE html>
<html>
<head>
    <title>Admin_add_advisor</title>
    <meta-charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color:#e3e3e3;">

<h3 style="color:black, ;">This is a a page for updating advisor info</h3>

<p style="color:black; padding-left:45px">Enter the student information to update a current advisor  </p>

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
        <form action="admin_update_advisor.php", class="form-search", method="post", style="padding-left:45px" >
            <input type="text", class="input-medium search-query", name="valueToSearch" placeholder="stu_name/stu_id">
            <input type="submit", class="btn btn-info" name="search" value="Filter"><br><br>
        </form>

    </body>
</html>

<div style="margin-left:45px;">
<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT 
    			advisor.stu_id,
                su_students.stu_name,
                advisor.adv_from,
                advisor.adv_to
    FROM advisor,su_students
    WHERE su_students.stu_id = advisor.stu_id AND CONCAT(advisor.stu_id,su_students.stu_name) LIKE '%".$valueToSearch."%'";
    Query::getTableWithQuery($query);
}
 else {
    //$query = "SELECT * FROM projects,manages WHERE projects.project_id=manages.project_id";
    //Query::getTableWithQuery($query);
}
?>
</div>


<div style="margin-left: 45px;">
<?php
Query::tableUpdater("advisor");
?>
</div>



</body>
</html>
