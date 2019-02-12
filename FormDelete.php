<?php
require "Query.php";
$columns = array(); //this will hold the column names
$dataList = array(); //the list that will hold the data for the row to be deleted from the database
$tableName = $_POST["tableName"];
foreach ($_POST as $key => $value){
    if ($key != "tableName"){ //we have to check this since we also send the table name information and don't want it to be added in to the lists.
        array_push($columns,$key);
        array_push($dataList,$value);
    }

}
Query::connectDatabase();
$result = Query::deleteRow($tableName,$columns,$dataList);

if($result){
    echo " <br> <br> Deleted successfully from ".$tableName ;
}
else {
    echo "<br> <br> Couldn't deleted from ".$tableName;
}
echo"<br>";
$pageArray = array(
    "su_students" => "private_page.php"
);
#$returnPage = $pageArray[$tableName];
#echo "<a href='$returnPage'>return to $tableName page</a>";
echo "<a href='private_page.php'>Return to admin page</a>";
