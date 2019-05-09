<html>


<center><img src="cip_logo.png" class="img-rounded" style="width:100px;height:100px" ></center>
<h1 style="background-color:coral; color:white;text-align:center "> Welcome to CIP Database Main Page ! </h1>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

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
<br>
<h2 style="padding-left:60px"> Current Projects: </h2>
<div style="margin-left:100px;">
<?php
    //$query="SELECT * FROM Projects WHERE projects.term_id=201702"; //Getting the current projects
    //Query::getTableWithQuery($query);
?>
</div>


<p style="padding-left:60px"> Find the projects suits to you. You can filter by day, title or supervisor of the projects. </p>

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
    <body style="background-color:#e3e3e3">
        <form action="public_page.php", class="form-search", method="post", style="padding-left:60px" >
            <input type="text", class="input-medium search-query", name="valueToSearch" placeholder="Project Id/Day/Supervisor">
            <input type="submit", class="btn btn-info" name="search" value="Filter"><br><br>
        </form>

    </body>
</html>

<div style="margin-left:60px;">
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
    WHERE projects.project_id = manages.project_id AND su_students.stu_id = manages.stu_id AND projects.term_id=201702 AND CONCAT(
    projects.day, projects.project_id,projects.p_name, su_students.stu_name) LIKE '%".$valueToSearch."%' ";

    Query::getTableWithQuery($query);
}
 else {
    $query = "SELECT * FROM projects,manages WHERE projects.project_id=manages.project_id";
    Query::getTableWithQuery($query);
}
?>
</div>

<div align="center">
<a href="index_thesis.html"><input type="button" name="Log in" id="button2" value="Log in" /><p style="text-align:center;font-size:25px;padding-left:1%>"> </p></a>
</div>

<style>
.bg-4 {
    background-color: #2f2f2f;
    color: #ffffff;
}
</style>
<footer class="container-fluid bg-4 text-center">
  <p>This Project is made by Banu, Caghan, Deren and Berk © </p>
</footer>
<br>
</html>