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
	$prodname = htmlspecialchars($_POST['prodname']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$price = htmlspecialchars($_POST['price']);
	$image = htmlspecialchars($_POST['image']);
	
	$mysqli->query("insert into pork (id, prodname, quantity, price, img) values($id, '$prodname', '$quantity', '$price', '$image')") or die ($mysqli->error);
	
	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] = "success";
	
	header("location: items.php");
}

if (isset($_POST['save1'])){
	$id = htmlspecialchars($_POST['id']);
	$prodname = htmlspecialchars($_POST['prodname']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$price = htmlspecialchars($_POST['price']);
	$image = htmlspecialchars($_POST['image']);
	
	$mysqli->query("insert into burger (id, prodname, quantity, price, img) values($id, '$prodname', '$quantity', '$price', '$image')") or die ($mysqli->error);
	
	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] = "success";
	
	header("location: items.php");
}

if (isset($_POST['save2'])){
	$id = htmlspecialchars($_POST['id']);
	$prodname = htmlspecialchars($_POST['prodname']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$price = htmlspecialchars($_POST['price']);
	$image = htmlspecialchars($_POST['image']);
	
	$mysqli->query("insert into pork (id, prodname, quantity, price, img) values($id, '$prodname', '$quantity', '$price', '$image')") or die ($mysqli->error);
	
	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] = "success";
	
	header("location: items.php");
}

if (isset($_POST['save3'])){
	$id = htmlspecialchars($_POST['id']);
	$prodname = htmlspecialchars($_POST['prodname']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$price = htmlspecialchars($_POST['price']);
	$image = htmlspecialchars($_POST['image']);
	
	$mysqli->query("insert into pork (id, prodname, quantity, price, img) values($id, '$prodname', '$quantity', '$price', '$image')") or die ($mysqli->error);
	
	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] = "success";
	
	header("location: items.php");
}

if (isset($_POST['save4'])){
	$id = htmlspecialchars($_POST['id']);
	$prodname = htmlspecialchars($_POST['prodname']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$price = htmlspecialchars($_POST['price']);
	$image = htmlspecialchars($_POST['image']);
	
	$mysqli->query("insert into pork (id, prodname, quantity, price, img) values($id, '$prodname', '$quantity', '$price', '$image')") or die ($mysqli->error);
	
	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] = "success";
	
	header("location: items.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("delete from pork where id=$id") or die($mysqli->error());
	echo '<script type = "text/javascript">';
	echo 'alert("Record Deleted!");';
	echo 'window.location.href = "items.php";';
	echo '</script>';
	
}

if (isset($_GET['delete1'])){
	$product_id = $_GET['delete1'];
	$mysqli->query("delete from video_card where product_id=$product_id") or die($mysqli->error());
	echo '<script type = "text/javascript">';
	echo 'alert("Record Deleted!");';
	echo 'window.location.href = "items.php";';
	echo '</script>';
	
}

if (isset($_GET['delete2'])){
	$product_id = $_GET['delete2'];
	$mysqli->query("delete from motherboard where product_id=$product_id") or die($mysqli->error());
	echo '<script type = "text/javascript">';
	echo 'alert("Record Deleted!");';
	echo 'window.location.href = "items.php";';
	echo '</script>';
	
}

if (isset($_GET['delete3'])){
	$product_id = $_GET['delete3'];
	$mysqli->query("delete from mouse where product_id=$product_id") or die($mysqli->error());
	echo '<script type = "text/javascript">';
	echo 'alert("Record Deleted!");';
	echo 'window.location.href = "items.php";';
	echo '</script>';
	
}

if (isset($_GET['delete4'])){
	$product_id = $_GET['delete4'];
	$mysqli->query("delete from keyboard where product_id=$product_id") or die($mysqli->error());
	echo '<script type = "text/javascript">';
	echo 'alert("Record Deleted!");';
	echo 'window.location.href = "items.php";';
	echo '</script>';
	
}

if(isset($_POST["id"]))  
 {  
 	  $connect = mysqli_connect("localhost", "root", "", "projweb");
      $query = "SELECT * FROM pork WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }

if(isset($_POST["id1"]))  
 {  
 	  $connect = mysqli_connect("localhost", "root", "", "projweb");
      $query = "SELECT * FROM burger WHERE id = '".$_POST["id1"]."'";  
      $result = mysqli_query($connect1, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }

    
?>