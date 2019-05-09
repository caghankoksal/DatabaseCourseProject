<?php
define("COOKIE_LEN",600);//this defines a constant for cookie length (in seconds)
class Query
{
    public static $conn;

    public static function connectDatabase(){
        if(!self::$conn){//check if you are already connected to database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cip_database";
            // Create connection
            self::$conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if (self::$conn->connect_error) {
                echo "Can't connect to database";
                exit();
            }
        }
    }

    public static function loginCheck(){
        if(!isset($_COOKIE['id'])){//check here if there is a cookie with 'id' which indicates that client has already logged in
            //if not set then exit
            echo "You are not logged in. Please log in first<br>";
            echo "<a href='Login.html'>Log in page </a>";
            exit();
        }
        else {
            $id = $_COOKIE['id'];
            $query = "SELECT *
                        FROM persons
                          WHERE persons.id = $id";
            $result = self::$conn->query($query);
            if(mysqli_num_rows($result)==0){
                echo "You have created a cookie with an id which is not in our database. If you are trying to cheat do it right :)<br>";
                echo "<a href='Login.html'>Log in page </a>";
                exit();
            }
        }
    }

    public static function getTable($tableName){
        $query = "SELECT *
                    FROM $tableName";
        $result = self::$conn->query($query);
        $fields = mysqli_fetch_fields($result);
        echo "<table class=\"table\">";
        echo "<tr>";
        foreach($fields as $field){
            echo "<th>$field->name</th>";
        }
        echo "</tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            foreach($fields as $field){
                $data = $row[$field->name];
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    public static function getTableWithQuery($query){
        $result = self::$conn->query($query);
        $fields = mysqli_fetch_fields($result);
        echo "<table class=\"table\">";
        echo "<tr>";
        foreach($fields as $field){

            echo "<th>$field->name</th>";
        }
        echo "</tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            foreach($fields as $field){
                $data = $row[$field->name];
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    public static function tablePopulator($tableName){
        $query = "DESCRIBE $tableName";//to get the only the table information without getting all the rows.Run this query in phpmyadmin to understand whats going on.
        //for example run 'DESCRIBE persons'
        $result = self::$conn->query($query);
        echo "<form action='FormSubmit.php' method='post'>";//starting of the submit form
        echo "<input type='hidden' name='tableName' value=$tableName >";//hidden attributed elements is not shown
        while($row = $result->fetch_assoc()) {
            $fieldName = $row["Field"];
            if ($fieldName != "id") {
                echo "<a>$fieldName</a><br>";
                if($fieldName == "password"){
                    echo "<input type='password' name=$fieldName><br>";
                }
                else{
                    echo "<input type=\"text\" name=$fieldName><br>";
                }

            }
        }
        echo "<input type=\"submit\" value=\"Add\">";
        echo "</form>";
    }

    public static function tableDeleter($tableName){
        $query = "DESCRIBE $tableName";//to get the only the table information without getting all the rows.Run this query in phpmyadmin to understand whats going on.
        //for example run 'DESCRIBE persons'
        $result = self::$conn->query($query);
        echo "<form action='FormDelete.php' method='post'>";//starting of the submit form
        echo "<input type='hidden' name='tableName' value=$tableName >";//hidden attributed elements is not shown
        while($row = $result->fetch_assoc()) {
            $fieldName = $row["Field"];
            if ($fieldName != "id") {
                echo "<a>$fieldName</a><br>";
                if($fieldName == "password"){
                    echo "<input type='password' name=$fieldName><br>";

                }
                else{
                    echo "<input type=\"text\" name=$fieldName><br>";
                    break;
                }

            }
        }
        echo "<input type=\"submit\" value=\"Delete\">";
        echo "</form>";
    }

    public static function tableUpdater($tableName){

        $query = "DESCRIBE $tableName";
        $result = self::$conn->query($query);
        echo "<form action='FormUpdate.php' method='post'>";//starting of the update form
        echo "<input type='hidden' name='tableName' value=$tableName >";//hidden attributed elements is not shown
        while($row = $result->fetch_assoc()) {
            $fieldName = $row["Field"];
            if ($fieldName != "id"){
                echo "<a>$fieldName</a><br>";
                if($fieldName == "password"){
                    echo "<input type='password' name=$fieldName><br>";
                }
                else{
                    echo "<input type=\"text\" name=$fieldName><br>";
                }

            }
        }
        echo "<input type=\"submit\" value=\"Update\">";
        echo "</form>";
    }



    public static function addRow($tableName,$columns,$dataList){
        $query = "INSERT INTO `$tableName`";
        $query = $query."(";
        foreach($columns as $column){
            $query = $query."$column".",";
        }
        $query = substr($query,0,-1);
        $query = $query.")";
        $query = $query."VALUES";
        $query = $query."(";
        foreach($dataList as $data){
            $query = $query."'$data'".",";
        }
        $query = substr($query,0,-1);
        $query = $query.")";
        $result = self::$conn->query($query);
        return $result;
    }

    public static function deleteRow($tableName,$columns,$dataList){
        $query = "DELETE FROM `$tableName`";
        $query = $query."WHERE";
        $query = $query."(";//parantez açıyor

        foreach($columns as $column){
            $query = $query."$column"."=";
            break;
        }
            foreach($dataList as $data){
                $query = $query."$data"." ";
                break;
            }
        $query = substr($query,0,-1);
        $query = $query.")";
        echo $query; //burda deniyoruz
        $result = self::$conn->query($query);
        return $result;
    }

     public static function updateRow($tableName,$columns,$dataList){
        
        if($tableName=='projects'){
            $primaryKey='project_id';
        }
        else if($tableName=='supervisors'||
                $tableName=='advisors'   ||
                $tableName=='su_students'){
            $primaryKey='stu_id';
        }

        $query = "UPDATE ";
        $query=$query.$tableName;
        $query = $query." SET ";

        for ($x = 0; $x <count($columns); $x++){
            $query = $query."$columns[$x]"."=";
            $query = $query."\"$dataList[$x]\"";
            $query = $query.",";

        } 

        $query = substr($query,0,-1);
        $query = $query." WHERE(";
        $query= $query."$primaryKey"."="."$dataList[0]".")";
        echo $query; //burda deniyoruz
        $result = self::$conn->query($query);
        return $result;
        }    
    }

