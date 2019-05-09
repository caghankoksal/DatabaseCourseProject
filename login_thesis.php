<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cip_database");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if(empty($_POST['username']) || empty($_POST['password'])   )
{
	echo "<script>alert('You have an empty field.');</script>";

    header("Refresh:0; url=index_thesis.html");   // go back to the login page
}

if(isset($_POST['log']))
{
	if($_POST['username'] && $_POST['password'])

		{
		$username = mysql_real_escape_string($_POST['username']);     // to get rid of the tricky characters which can destroy the database.
		//password = md5(mysql_real_escape_string($_POST['password']));  // turn into a hash function.
        $password=$_POST['password'];

        $res= mysqli_query($link,"SELECT * FROM `ofiscan_login` WHERE userName= '$username' ");
		//$res2=mysqli_query($link,"SELECT * FROM `admin` WHERE username= '$username' ");
		if($res === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
     $user=mysqli_fetch_array($res);
		 //$special_user=mysqli_fetch_array($res2);

		 /*if($username == $special_user['username'] && $password == $special_user['password'])
		{
			echo"<script>location.assign('super_admin.php')</script>";
		}*/

			if($user == NULL)   // if there is no such user like that.
		{
            echo "<script>alert('The username does not exist');</script>";

            header("Refresh:0; url=index_thesis.html");   // go back to the login page


		}

        else if($user['passwordS']!= $password || $user['userName']!= $username  )
		{


			echo "<script>alert('The password or the username is incorrect');</script>";

		  header("Refresh:0; url=index_thesis.html");
		}

			else if($username == $user['userName'] && $password == $user['passwordS'])
		{
			echo "<script>alert('You have succesfully entered the system !');</script>";

			session_start(); // remember the variables that are used.
			$_SESSION['userName'] = $user['userName'];
			//$_SESSION['profid'] = $user['prof_id'];
			echo"<script>location.assign('private_page.php')</script>";


		}



		else{

			header("Refresh:0; url=index_thesis.html");

		}
		}

		}
