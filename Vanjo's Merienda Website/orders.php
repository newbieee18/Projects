<?php
session_start();
include("config.php");
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="dashboard/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/logo1.png">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Orders
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="dashboard/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="dashboard/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="#35404f" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="dashboard.php">
            <img src="img/logo1.png" style="height: 180px; width: 250px;">       
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="notifications.php">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <?php 
                if($_SESSION['id'] =="user"){
                  echo "<a href='user.php'>
                  <i class='nc-icon nc-single-02'></i>
                  <p>User Profile</p>
                  </a>";}
                else{
                  echo "<a href='#'>
                  <i class='nc-icon nc-single-02'></i>
                  <p>User Profile</p>
                  </a>";
                  }  
            ?>
          </li>
          <li class="active">
            <?php 
                if($_SESSION['id'] =="user" ||
                $_SESSION['id'] =="order"){
                  echo "<a href='orders.php'>
                  <i class='nc-icon nc-tile-56'></i>
                  <p>Orders</p>
                  </a>";}
                else{
                  echo "<a href='#'>
                  <i class='nc-icon nc-tile-56'></i>
                  <p>Orders</p>
                  </a>";
                }
            ?>
          </li>
          <li>
            <?php 
                if($_SESSION['id'] =="user" ||
                $_SESSION['id'] =="inventory"){
                 echo "<a href='items.php'>
                <i class='nc-icon nc-bag-16'></i>
                <p>Items</p>
                </a>";}
                else{
                  echo "<a href='#'>
                  <i class='nc-icon nc-bag-16'></i>
                  <p>Items</p>
                  </a>";
                }
            ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="background:linear-gradient(to bottom, lightgrey, #ffd57e, grey);">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="orders.php">Orders</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

    <div class="content">
    <div class="row">
    <?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from orders where status='pending' order by id desc";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){


    echo "
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title'>Pending</h4>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class='text-primary'>
                      <th>
                        Name
                      </th>
                      <th>
                        Username
                      </th>
                      <th>
                        Product Name
                      </th>
                      <th>
                        Quantity
                      </th>
                      <th>
                        Date
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Tax
                      </th>
                      <th>
                        Total
                      </th>
                      <th>
                      </th>
                    </thead>";

    while($row = mysqli_fetch_assoc($res)){
      $stotal = $row['price'] * $row['quantity'];
      $tax = $stotal * .12;
      $total = $stotal + $tax;

        echo       "<form action='' method='POST'><tbody>
                      <tr>
                        <td>
                          ".$row['fname'].' '.$row['lname']."
                        </td>
                        <td>
                          ".$row['username']."
                        </td>
                        <td>
                          ".$row['prodname']."
                        </td>
                        <td>
                          ".$row['quantity']."
                        </td>
                        <td>
                         ".$row['date']."
                        </td>
                        <td>
                         ".number_format($row['price'], 2)."
                        </td>
                        <td>
                         ".number_format($tax, 2)."
                        </td>
                        <td>
                         ".number_format($total, 2)."
                        </td>
                        <td>
                          <input type='hidden' name='id' value='".$row['id']."'>
                          <button type='submit' name='submit' style='border-radius: 50%; all: unset; border: none; outline: inherit; cursor: pointer;'><i class='fa fa-check-circle fa-2x' style='color: green;'></i></button>
                        </td>
                      </tr>
                    </tbody></form>";
      }             
      echo      "</table>
                </div>
              </div>
            </div>
          </div>";
      }else{
      echo "<h2>No Record Found</h2>";
      }}


$sql2="select * from orders where status='delivered'";
    if($res2 = mysqli_query($conn, $sql2)){
    if (mysqli_num_rows($res2) > 0){


    echo "
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title'>Delivered</h4>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class='text-primary'>
                      <th>
                        Name
                      </th>
                      <th>
                        Username
                      </th>
                      <th>
                        Product Name
                      </th>
                      <th>
                        Quantity
                      </th>
                      <th>
                        Date
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                      </th>
                    </thead>";

    while($row2 = mysqli_fetch_assoc($res2)){
        echo       "<form action='' method='POST'><tbody>
                      <tr>
                        <td>
                          ".$row2['fname'].' '.$row2['lname']."
                        </td>
                        <td>
                          ".$row2['username']."
                        </td>
                        <td>
                          ".$row2['prodname']."
                        </td>
                        <td>
                          ".$row2['quantity']."
                        </td>
                        <td>
                         ".$row2['date']."
                        </td>
                        <td>
                         ".$row2['price']."
                        </td>
                        <td>
                          <input type='hidden' name='id' value='".$row2['id']."'>
                          <button type='submit' class='btn btn-warning' style='border-radius: 50%; font-size: 10px;' disabled>Delivered</button>
                        </td>
                      </tr>
                    </tbody></form>";
      }             
      echo      "</table>
                </div>
              </div>
            </div>
          </div>";
      }else{
      echo "<h2>No Record Found</h2>";
      }}


$sql3="select * from orders where status='rated'";
    if($res3 = mysqli_query($conn, $sql3)){
    if (mysqli_num_rows($res3) > 0){


    echo "
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title'>Rated</h4>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class='text-primary'>
                      <th>
                        Name
                      </th>
                      <th>
                        Username
                      </th>
                      <th>
                        Product Name
                      </th>
                      <th>
                        Quantity
                      </th>
                      <th>
                        Date
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                      </th>
                    </thead>";

    while($row3 = mysqli_fetch_assoc($res3)){
        echo       "<form action='' method='POST'><tbody>
                      <tr>
                        <td>
                          ".$row3['fname'].' '.$row3['lname']."
                        </td>
                        <td>
                          ".$row3['username']."
                        </td>
                        <td>
                          ".$row3['prodname']."
                        </td>
                        <td>
                          ".$row3['quantity']."
                        </td>
                        <td>
                         ".$row3['date']."
                        </td>
                        <td>
                         ".$row3['price']."
                        </td>
                        <td>
                          <input type='hidden' name='id' value='".$row3['id']."'>
                          <button type='submit' class='btn btn-dark' style='border-radius: 50%; font-size: 10px;' disabled>Rated</button>
                        </td>
                      </tr>
                    </tbody></form>";
      }             
      echo      "</table>
                </div>
              </div>
            </div>
          </div>";
      }else{
      echo "<h2>No Record Found</h2>";
      }}



if(isset($_POST['submit'])){
  $id = $_POST['id'];
  
  $conn = new mysqli('localhost', 'root', '', 'projweb');

  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "UPDATE orders SET status='delivered' WHERE id='".$id."'";

  if (mysqli_query($conn, $sql)) {
    echo '<script type = "text/javascript">';
          echo 'alert("Record Updated Successfully..");'; 
          echo 'window.location.href = "orders.php";';
          echo '</script>';
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

  mysqli_close($conn);

}


?>



      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, <i class="fa fa-heart heart"></i> GO3J's.
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="dashboard/assets/js/core/jquery.min.js"></script>
  <script src="dashboard/assets/js/core/popper.min.js"></script>
  <script src="dashboard/assets/js/core/bootstrap.min.js"></script>
  <script src="dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="dashboard/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="dashboard/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="dashboard/assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="dashboard/assets/demo/demo.js"></script>
</body>

</html>
