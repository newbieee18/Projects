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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <title>
    Items
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
  <style>
    .modal {
      overflow-y: auto !important;
    }
  </style>
</head>

<body class="">
  <div class="wrapper">
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
          <li class="active">
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
            <a class="navbar-brand" href="items.php">Items</a>
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
<div class="content">
        <div class="row">
<!--------------------------------Pork------------------------->
      
<?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from pork";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

    echo "<div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title' style='float: left;'>Pork</h4>
                <a href='items.php' class='btn btn-primary' data-toggle='modal' data-target='#addmodal' role='button' style='float: right;'>Add Pork</a>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class='text-primary'>
                      <th>
                        Product ID
                      </th>
                      <th>
                        Product Name
                      </th>
                      <th>
                        Quantity
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Image
                      </th>
                      <th>
                        <center>Action</center>
                      </th>
                    </thead>";

    while($row = mysqli_fetch_assoc($res)){
        echo       "<tbody>
                      <tr>
                        <td class='text-right'>
                          ".$row['id']."
                        </td>
                        <td>
                          ".$row['prodname']."
                        </td>
                        <td>
                          ".$row['quantity']."
                        </td>
                        <td>
                          Php".$row['price']."
                        </td>
                        <td style='width: 200px;'>
                          <img src='".$row['img']."' style='text-align: center; width: 200px; height: 200px;'>
                        </td>
                        <td class='text-right'>                      
                          <input type='button' name='edit' value='Edit' id='".$row["id"].";' class='btn btn-info btn-xs edit_data'/>
                          <a href='items.inc.php?delete=".$row["id"]."' class='btn btn-danger' role='button'>Delete</a>         
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

<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">Edit Pork</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                      <label>Enter Product Name</label>  
                      <input type="text" name="prodname" id="prodname" class="form-control" /> <br />   
                      <label>Enter Quantity</label>  
                      <input type="text" name="quantity" id="quantity" class="form-control" />  
                      <br />  
                      <label>Enter Price</label>  
                      <input type="text" name="price" id="price" class="form-control" /> <br />
                      <label>Enter Image</label> 
                      <input type="text" name="img" id="img" class="form-control" />
                      <input type="hidden" name="id" id="id" />
                      <span class="text-muted">Only .jpg, png, .gif file allowed</span> <br /><br><div style="float: right;">
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
                url:"items.inc.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#prodname').val(data.prodname);   
                     $('#quantity').val(data.quantity);  
                     $('#price').val(data.price);  
                     $('#img').val(data.img);
                     $('#id').val(data.id);  
                     $('#insert').val("Update");    
                     $('#add_data_Modal').modal('show');  
                }  
           });
      $("#add_data_Modal").modal("toggle");     
  });  

  $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#prodname').val() == "")  
           {  
                alert("Product Name is required");  
           }    
           else if($('#quantity').val() == '')  
           {  
                alert("Quantity is required");  
           }  
           else if($('#price').val() == '')  
           {  
                alert("Price is required");  
           }
           else if($('#image').val() == '')  
           {  
                alert("Image is required");  
           }
           else  
           {  
                $.ajax({  
                     url:"updateitems.php",  
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

<form method="POST" action="items.inc.php">
<div class='modal fade' id='addmodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Add Pork</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Product ID:
        <input type='text' placeholder='Enter ID' class='form-control' name='id' required value='<?php echo $row['id']; ?>'><br>
        Product Name:
        <input type='text' placeholder='Enter Username' class='form-control' name='prodname' required value='<?php echo $row['prodname']; ?>'><br>
        Quantity:
        <input type='text' placeholder='Enter Last Name' class='form-control' name='quantity' required value='<?php echo $row['quantity']; ?>'><br>
        Price:
        <input type='text' placeholder='Enter Position' class='form-control' name='price' required value='<?php echo $row['price']; ?>'><br>
        Image:<br>
        <input type="text" placeholder='Enter Image' class='form-control' name="image" required value='<?php echo $row['img']; ?>' multiple />
        <span class="text-muted">Only .jpg, png, .gif file allowed</span>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' name="save">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<!--------------------------------Burger------------------------->

<?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from burger";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

    echo "<div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title' style='float: left;'>Burger</h4>
                <a href='items.php' class='btn btn-primary' data-toggle='modal' data-target='#addmodal' role='button' style='float: right;'>Add Burger</a>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class='text-primary'>
                      <th>
                        Product ID
                      </th>
                      <th>
                        Product Name
                      </th>
                      <th>
                        Quantity
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Image
                      </th>
                      <th>
                        <center>Action</center>
                      </th>
                    </thead>";

    while($row = mysqli_fetch_assoc($res)){
        echo       "<tbody>
                      <tr>
                        <td class='text-right'>
                          ".$row['id']."
                        </td>
                        <td>
                          ".$row['prodname']."
                        </td>
                        <td>
                          ".$row['quantity']."
                        </td>
                        <td>
                          Php".$row['price']."
                        </td>
                        <td style='width: 200px;'>
                          <img src='".$row['img']."' style='text-align: center; width: 200px; height: 200px;'>
                        </td>
                        <td class='text-right'>                      
                           <a href='?edit=".$row['id']."' role='button' class='btn btn-info' id='myBtn' name='edit'>Edit</a>
                          <a href='items.inc.php?delete1=".$row["id"]."' class='btn btn-danger' role='button'>Delete</a>         
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

<!--------------------------------Chicken------------------------->

<?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from chicken";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

    echo "<div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title' style='float: left;'>Burger</h4>
                <a href='items.php' class='btn btn-primary' data-toggle='modal' data-target='#addmodal' role='button' style='float: right;'>Add Burger</a>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class='text-primary'>
                      <th>
                        Product ID
                      </th>
                      <th>
                        Product Name
                      </th>
                      <th>
                        Quantity
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Image
                      </th>
                      <th>
                        <center>Action</center>
                      </th>
                    </thead>";

    while($row = mysqli_fetch_assoc($res)){
        echo       "<tbody>
                      <tr>
                        <td class='text-right'>
                          ".$row['id']."
                        </td>
                        <td>
                          ".$row['prodname']."
                        </td>
                        <td>
                          ".$row['quantity']."
                        </td>
                        <td>
                          Php".$row['price']."
                        </td>
                        <td style='width: 200px;'>
                          <img src='".$row['img']."' style='text-align: center; width: 200px; height: 200px;'>
                        </td>
                        <td class='text-right'>                      
                           <a href='?edit=".$row['id']."' role='button' class='btn btn-info' id='myBtn' name='edit'>Edit</a>
                          <a href='items.inc.php?delete1=".$row["id"]."' class='btn btn-danger' role='button'>Delete</a>         
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

<!--------------------------------Chicken------------------------->

<?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from beef";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

    echo "<div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='card-title' style='float: left;'>Burger</h4>
                <a href='items.php' class='btn btn-primary' data-toggle='modal' data-target='#addmodal' role='button' style='float: right;'>Add Burger</a>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table'>
                    <thead class='text-primary'>
                      <th>
                        Product ID
                      </th>
                      <th>
                        Product Name
                      </th>
                      <th>
                        Quantity
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Image
                      </th>
                      <th>
                        <center>Action</center>
                      </th>
                    </thead>";

    while($row = mysqli_fetch_assoc($res)){
        echo       "<tbody>
                      <tr>
                        <td class='text-right'>
                          ".$row['id']."
                        </td>
                        <td>
                          ".$row['prodname']."
                        </td>
                        <td>
                          ".$row['quantity']."
                        </td>
                        <td>
                          Php".$row['price']."
                        </td>
                        <td style='width: 200px;'>
                          <img src='".$row['img']."' style='text-align: center; width: 200px; height: 200px;'>
                        </td>
                        <td class='text-right'>                      
                           <a href='?edit=".$row['id']."' role='button' class='btn btn-info' id='myBtn' name='edit'>Edit</a>
                          <a href='items.inc.php?delete1=".$row["id"]."' class='btn btn-danger' role='button'>Delete</a>         
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
   
<div id="edit_burger" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">Edit Burger</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form1">  
                      <label>Enter Product Name</label>  
                      <input type="text" name="prodname1" value='<?php echo $row['prodname']?>' id="prodname1" class="form-control" /> <br />   
                      <label>Enter Quantity</label>  
                      <input type="text" name="quantity1" value='<?php echo $row['quantity']?>' id="quantity1" class="form-control" />  
                      <br />  
                      <label>Enter Price</label>  
                      <input type="text" name="price1" value='<?php echo $row['price']?>' id="price1" class="form-control" /> <br />
                      <label>Enter Image</label> 
                      <input type="text" name="img1" value='<?php echo $row['img']?>' id="img1" class="form-control" />
                      <input type="hidden" name="id1" id="id1" />
                      <span class="text-muted">Only .jpg, png, .gif file allowed</span> <br /><br><div style="float: right;">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" name="insert1" id="insert1" value="Insert" class="btn btn-success" />
                      </div>  
                     </form>  
                </div>        
           </div>  
      </div>  
 </div>


<form method="POST" action="items.inc.php">
<div class='modal fade' id='addmodal1' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Add Burger</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Product ID:
        <input type='text' placeholder='Enter ID' class='form-control' name='id1' required value='<?php echo $row['id']; ?>'><br>
        Product Name:
        <input type='text' placeholder='Enter Username' class='form-control' name='prodname' required value='<?php echo $row['prodname']; ?>'><br>
        Quantity:
        <input type='text' placeholder='Enter Last Name' class='form-control' name='quantity' required value='<?php echo $row['quantity']; ?>'><br>
        Price:
        <input type='text' placeholder='Enter Position' class='form-control' name='price' required value='<?php echo $row['price']; ?>'><br>
        Image:<br>
        <input type="text" placeholder='Enter Image' class='form-control' name="image" required value='<?php echo $row['img']; ?>' multiple />
        <span class="text-muted">Only .jpg, png, .gif file allowed</span>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' name="save">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">     
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#edit_burger").modal("toggle");
    $("#edit_burger").modal("show");
  });
   $("#edit_burger").on('show.bs.modal', function(){
    alert('The modal is about to be shown.');
  });
});

  $('#insert_form1').on("submit", function(event){  
           event.preventDefault();  
           if($('#prodname1').val() == "")  
           {  
                alert("Product Name is required");  
           }    
           else if($('#quantity1').val() == '')  
           {  
                alert("Quantity is required");  
           }  
           else if($('#price1').val() == '')  
           {  
                alert("Price is required");  
           }
           else if($('#image1').val() == '')  
           {  
                alert("Image is required");  
           }
           else  
           {  
                $.ajax({  
                     url:"updateitems.php",  
                     method:"POST",  
                     data:$('#insert_form1').serialize(),  
                     beforeSend:function(){  
                          $('#insert1').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form1')[0].reset();  
                          $('#add_data_Modal1').modal('hide');
                          window.location.reload();
                     }  
                });  
           }  
    });
});
</script>


<!---------------------FOOTER----------------------->
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
