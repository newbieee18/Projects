<?php
session_start();
include("config.php");

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');
    require_once 'user.inc.php';
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <title>
    Users
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- CSS Files -->
  <link href="dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="dashboard/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="dashboard/assets/demo/demo.css" rel="stylesheet" />
  <style>
    .modal {
      overflow-y: auto !important;
    }
    .table-responsive{
      overflow-x: auto;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="#35404f" data-active-color="danger">
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
          <li class="active">
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
          <li>
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
    <div class="main-panel" style="background: linear-gradient(to bottom, lightgrey, #ffd57e, grey);">
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
            <a class="navbar-brand" href="user.php">User Profile</a>
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
      <!-- <div class="panel-header panel-header-sm">


</div> -->

<div class='content'>
        <div class='row'>
<!----------------------------------CUSTOMER------------------------------------>
<?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from customer";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){


    echo "
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title'>Customer</h4>
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
                        Password
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Adress
                      </th>
                    </thead>";

    while($row = mysqli_fetch_assoc($res)){
        echo       "<tbody>
                      <tr>
                        <td>
                          ".$row['fname'].' '.$row['lname']."
                        </td>
                        <td>
                          ".$row['username']."
                        </td>
                        <td>
                          ".$row['password']."
                        </td>
                        <td>
                          ".$row['email']."
                        </td>
                        <td>
                         ".$row['address']."
                        </td>
                      </tr>
                    </tbody>";
      }
      echo      "</table>
                </div>
              </div>
            </div>
          </div>";
      }else{
      echo "<h2>No Record Found</h2>";
      }}
?>

<!-----------------------------------------ADMIN------------------------------------------->

<?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from admin";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
?>

    <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title' style='float: left;'>Admin</h4>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#addmodal' style='float:right;'>Add admin</button>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <div id='admin_table'>
                  <table class='table'>
                    <thead class='text-primary'>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Position</th>
                      <th>Salary</th>
                      <th><center>Action</center></th>
                    </thead>
<?php 
    while($row = mysqli_fetch_assoc($res)){
        echo       "<tbody>
                      <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['fname'].' '.$row['lname']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['password']."</td>
                        <td>".$row['position']."</td>
                        <td>Php".$row['salary']."</td>
                        <td>               
                          <input type='button' name='edit' value='Edit' id='".$row["id"].";' class='btn btn-info btn-xs edit_data'/>
                          <a href='user.inc.php?delete=".$row["id"]."' class='btn btn-danger' role='button'>Delete</a>
                        </td>
                      </tr>
                    </tbody>";
      }
      ?>          </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php 
      }else{
      echo "<h2>No Record Found</h2>";
      }}
?>

<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">Edit Admin Info.</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                      <label>Enter Username</label>  
                      <input type="text" name="username" id="username" class="form-control" /> <br />  
                      <label>Enter Password</label>  
                      <input type="password" name="password" id="password" class="form-control" /> <br />  
                      <label>Enter First Name</label>  
                      <input type="text" name="fname" id="fname" class="form-control" />  
                      <br />  
                      <label>Enter Last Name</label>  
                      <input type="text" name="lname" id="lname" class="form-control" />  
                      <br />  
                      <label>Enter Position</label>  
                      <input type="text" name="position" id="position" class="form-control" /> <br />
                      <label>Enter Salary</label>  
                      <input type="text" name="salary" id="salary" class="form-control" /> <br /> 
                      <input type="hidden" name="id" id="id" />  
                      <div style="float: right;"> 
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                      </div>  
                     </form>  
                </div>        
           </div>  
      </div>  
 </div>

<script type="text/javascript">     
$(document).ready(function(){
  $(".edit_data").click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"user.inc.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#username').val(data.username);  
                     $('#password').val(data.password);  
                     $('#fname').val(data.fname);  
                     $('#lname').val(data.lname);  
                     $('#position').val(data.position);  
                     $('#salary').val(data.salary);
                     $('#id').val(data.id);  
                     $('#insert').val("Update");    
                     $('#add_data_Modal').modal('show');  
                }  
           });
      $("#add_data_Modal").modal("toggle");     
  });  

  $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#username').val() == "")  
           {  
                alert("Userame is required");  
           }  
           else if($('#password').val() == '')  
           {  
                alert("Password is required");  
           }  
           else if($('#fname').val() == '')  
           {  
                alert("First Name is required");  
           }  
           else if($('#lname').val() == '')  
           {  
                alert("Last Name is required");  
           }  
           else if($('#position').val() == '')  
           {  
                alert("Position is required");  
           }
           else if($('#salary').val() == '')  
           {  
                alert("Salary is required");  
           }
           else  
           {  
                $.ajax({  
                     url:"updateuser.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');
                          window.location.reload();
                     }  
                });  
           }  
    });
});
</script>

<form action="user.inc.php" method="POST">
<div class='modal fade' id='addmodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Add Admin</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        ID:
        <input type='text' placeholder='Enter ID' class='form-control' name='id' required value='<?php echo $row['id']; ?>'><br>
        Username:
        <input type='text' placeholder='Enter Username' class='form-control' name='username' required value='<?php echo $row['username'];?>'><br>
        Password:
        <input type='password' placeholder='Enter Password' class='form-control' name='password' required value='<?php echo $row['password']; ?>'><br>
        First Name:
        <input type='text' placeholder='Enter Firs Name' class='form-control' name='fname' required value='<?php echo $row['fname']; ?>'><br>
        Last Name:
        <input type='text' placeholder='Enter Last Name' class='form-control' name='lname' required value='<?php echo $row['lname']; ?>'><br>
        Position:
        <input type='text' placeholder='Enter Position' class='form-control' name='position' required value='<?php echo $row['position']; ?>'><br>
        Salary:
        <input type='text' placeholder='Enter Salary' class='form-control' name='salary' required value='<?php echo $row['salary']; ?>'>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' name="save">Save</button>
      </div>     
      </div>
    </div>
    </div>
    </div>
  </form>

<!---------------------------END OF ADMIN----------------------------->

      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
            </nav>
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
