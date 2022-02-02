<?php

session_start();
include("config.php");

$mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));

$username = '';
$password = '';
$fname = '';
$lname = '';
$position = '';
$username = '';

if (isset($_POST['save'])){
	$id = htmlspecialchars($_POST['id']);
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$fname = htmlspecialchars($_POST['fname']);
	$lname = htmlspecialchars($_POST['lname']);
	$position = htmlspecialchars($_POST['position']);
	$salary = htmlspecialchars($_POST['salary']);
	
	$mysqli->query("insert into admin (id, username, password, fname, lname, 
		position, salary) values($id, '$username', '$password', '$fname', '$lname', 
		'$position', '$salary')") or die ($mysqli->error);
	
	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] = "success";
	
	header("location: user.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("delete from admin where id=$id") or die($mysqli->error());
	echo '<script type = "text/javascript">';
	echo 'alert("Record Deleted!");';
	echo 'window.location.href = "user.php";';
	echo '</script>';
	
}
  
if(isset($_POST["id"]))  
 {  
 	  $connect = mysqli_connect("localhost", "root", "", "jvmtech");
      $query = "SELECT * FROM admin WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }
 

?>