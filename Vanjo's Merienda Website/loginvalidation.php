<?php 
session_start();

include('config.php');

if(isset($_POST['submit'])){
 
if(isset($_POST['username']))
    $username = $_POST['username'];
   if(isset($_POST['password']))
    $password = $_POST['password'];

if(strtolower($username) == $username && strtolower($password) == $password){
$sql1 = "SELECT * from admin where username = '$username' and password = '$password'";
    $result1 = mysqli_query($link,$sql1) or die(mysqli_error($link));
$sql2 = "SELECT * from customer where username = '$username' and password = '$password'";
    $result2 = mysqli_query($link,$sql2) or die(mysqli_error($link));
         
  //  $row = ;
    if(mysqli_num_rows($result1)==1){
        $sql1 = "SELECT fname from admin where username = '$username' and password = '$password'";
        $result1 = mysqli_query($link,$sql1) or die(mysqli_error($link));
        if (mysqli_num_rows($result1) > 0) {
            while($row = mysqli_fetch_assoc($result1)) {
                echo '<script type = "text/javascript">';
                echo 'alert("HELLO! WELCOME '.$row['fname'].'");'; 
                echo 'window.location.href = "dashboard.php";';
                echo '</script>';
            }
              $_SESSION['id']=$username;
              $_SESSION['loggedin'] = true;
        }
    }
    
    else if(mysqli_num_rows($result2)==1){
        $sql2 = "SELECT fname from customer where username = '$username' and password = '$password'";
        $result2 = mysqli_query($link,$sql2) or die(mysqli_error($link));
        if (mysqli_num_rows($result2) > 0) {
            while($row = mysqli_fetch_assoc($result2)) {
                echo '<script type = "text/javascript">';
                echo 'alert("HELLO! WELCOME '.$row['fname'].'!");'; 
                echo 'window.location.href = "index.php";';
                echo '</script>';   

            }
              $_SESSION['id1']=$username;
              $_SESSION['loggedin'] = true;
        }
    }
}
    else{
            if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    //header("location: login.php");
    
    }
    echo '<script>alert("Invalid Account!"); location.replace(document.referrer);</script>';
}
?>