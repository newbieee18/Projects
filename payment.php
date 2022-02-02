<?php
session_start();
include("config.php");
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link rel="icon" type="image/png" href="img/logo1.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!DOCTYPE html>

<html lang="en">
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

  <title>Vanjo's Merienda</title> 
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
  <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
    </head>

<style>
.cc img:hover{
    opacity: 0.7;
}

.cc span:hover{
    opacity: 0.7;
}

.cc span{
    opacity: .9;
}

.nav-item img:hover{
    opacity: 0.7;
}
.btn-warning, .btn-success{
  border-radius: 12px;
}
td{
  color: white;
  font-family: roboto;
}

</style>

<body style="background-color: #393e46;">

<div class="bs-example">
    <nav class="navbar navbar-dark navbar-expand-md" style="background-color: rgba(0,0,0,.4);">
        <a href="index.php"><img src="img/logo1.png" class="logo" style="height: 100px; padding: 0; margin: 0;"></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" style="border-color: rgba(49, 222, 54, 0.3);">
            <span class="navbar-toggler-icon" style="color: #fff;"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

            <nav class="fill" style="margin-top: 18px;">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="sale.php">Sale</a></li>
                <li><a href="more.php">More</a></li>
                <li><a href="contact.php">Contact Us</a></li>
              </ul>
            </nav>

            <div class="d-flex justify-content-center h-100">
              <div class="searchbar">
                <input class="search_input" type="text" name="" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
              </div>
            </div>


            <?php 
            ini_set('display_errors', 0);
            $conn = new mysqli('localhost', 'root', '', 'projweb');
            if($conn->connect_error){
              echo 'Connection Failed: '.$conn->connect_error;
            }
            $sql="select * from customer where username ='".$_SESSION['id1']."'";
            if($res = mysqli_query($conn, $sql)){
            if (mysqli_num_rows($res) > 0){

              while($row = mysqli_fetch_assoc($res)){

            if(isset($_SESSION['id1']) !=""){
              echo "<div class='navbar-nav' style='position: inline-block;'>
                    <div class='dropdown' style='float:right;'>
                    <a href='#' class='dropbtn' style='float: none; display: block; text-align: center; width: 100%; max-width: none;'><img src='upload/".$row['img']."' style='width: 30px; height: 30px; margin-top: 5px; border-radius: 50%;'></a>
                    <div class='dropdown-content' style='right: 0; text-align: center; min-width: 150px;'>          
                    <a href='#'>".$row['fname']." ".$row['lname']."</a>
                    <a href='#'>My Account</a>
                    <a href='transaction.php'>My Orders</a>
                    <a href='logout.php'>Logout</a>
                    
                    </div>
                    </div>
                    </div>";
            }}}
            else{
              echo "<div class='navbar-nav' style='position: inline-block;'>
                    <a href='login.php' class='dropbtn' style='float: none; display: block; text-align: center; width: 100%; max-width: none;'><img src='img/images.png' style='width: 35px; height: 35px;'></a>";
            }
            }
            ?>
        </div>
    </nav>
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: orange;">&times;</a>
  <a href="burger.php" style="background-color: #edc988; padding-top: 0; padding-bottom: 0; padding-left: 0; text-align: center; border: 2px solid black;">Burgers</a><br>
  <a href="pasta.php" style="background-color: #edc988; padding-top: 0; padding-bottom: 0; padding-left: 0; text-align: center; border: 2px solid black;">Pasta</a>
  <div class="dropdown"><br>
  <a href="#" class="dropbtn" style="background-color: #edc988; padding-top: 0; padding-bottom: 0; padding-left: 100; padding-right: 113; text-align: center; border: 2px solid black;">Dish</button>
  <div class="dropdown-content" style="position: relative;">
    <a href="chicken.php" style="font-size: 16px;">Chicken</a>
    <a href="pork.php" style="font-size: 16px;">Pork</a>
    <a href="beef.php" style="font-size: 16px;">Beef</a>
  </div>
</div></a><br><br>
  <a href="contact.php" style="background-color: #edc988; padding-top: 0; padding-bottom: 0; padding-left: 0; text-align: center; border: 2px solid black;">Contact</a>
  <p style="text-align: center; left: 20; font-family: Beauty Mountains Personal Use; position: absolute; bottom: 0; color: white; font-size: 15px;"><i>GOOD FOOD IS GOOD MOOD</i></p>
</div>

<div class="cc" style="background-color: rgba(0,0,0,.3); display: inline-block; border-radius: 0px 4px; ">
<span style="font-size:20px;cursor:pointer; background-color: #fca652; border-radius: 4px; font-family: BlinkMacSystemFont; font-weight: 800; color: black; display: inline-block; padding: 3; margin-top: 5px;" onclick="openNav()">&#9776; <i>BROWSE CATEGORIES</i></span>
    <a href="cart.php" class="nav-item nav-link" style="display: inline-block;"><img src="img/cart.png" style="width: 30px; height: 30px; margin-top: -8px; padding: -2;"></a>
</div>

<?php 

session_start();
include('config.php');
$mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));

if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $prodname = $_POST['prodname'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $username = $_SESSION['id1'];
  $img = $_POST['img'];
  $date = date('Y-m-d');
  $tnum = mt_rand();
  
  $result = $mysqli->query("SELECT * FROM customer WHERE username='$username'") or die ($mysqli->error);
  $result1 = $mysqli->query("SELECT * FROM chicken WHERE id='$id'") or die ($mysqli->error);

while ($row1 = $result1->fetch_assoc()):
$myQuantity = $row1['quantity'];
if($quantity <= $myQuantity){

  while ($row = $result->fetch_assoc()):
    $fname = $row['fname'];
    $lname = $row['lname'];

  $mysqli->query("insert into orders (tnum, username, fname, lname, prodname, price, quantity, date, img, status) values('$tnum', '$username', '$fname', '$lname', '$prodname', '$price', '$quantity', '$date', '$img', 'pending')") or die ($mysqli->error);
  endwhile;

   $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from chicken where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
          $rquantity = $row['quantity'];
          $fquantity = $rquantity - $quantity;

          $mysqli->query("UPDATE chicken SET quantity='$fquantity' WHERE id='$id'") or die ($mysqli->error);


      }
    }
    }

  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-check-circle' style='font-size: 150px; color: green; text-shadow: 3px 3px 3px black;'></i>
        <h4>ORDER COMPLETED SUCCESSFULLY!</h4><br><br>
        <p>Thank you for ordering. We received your order and will begin processing it.</p>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}else{
  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-times-circle' style='font-size: 150px; color: red; text-shadow: 3px 3px 3px black;'></i>
        <h4>SORRY THIS PRODUCT IS OUT OF STOCK OR YOU HAVE REACHED THE MAXIMUM QUANTITY AVAILABLE FOR THIS ITEM!</h4><br><br>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}endwhile;
}

if(isset($_POST['submit1'])){
  $id = $_POST['id'];
  $prodname = $_POST['prodname'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $username = $_SESSION['id1'];
  $img = $_POST['img'];
  $date = date('Y-m-d');
  $tnum = mt_rand();
  
  $result = $mysqli->query("SELECT * FROM customer WHERE username='$username'") or die ($mysqli->error);
  $result1 = $mysqli->query("SELECT * FROM pasta WHERE id='$id'") or die ($mysqli->error);

while ($row1 = $result1->fetch_assoc()):
$myQuantity = $row1['quantity'];
if($quantity <= $myQuantity){

  while ($row = $result->fetch_assoc()):
    $fname = $row['fname'];
    $lname = $row['lname'];

  $mysqli->query("insert into orders (tnum, username, fname, lname, prodname, price, quantity, date, img, status) values('$tnum', '$username', '$fname', '$lname', '$prodname', '$price', '$quantity', '$date', '$img', 'pending')") or die ($mysqli->error);
  endwhile;
  
   $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from pasta where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
          $rquantity = $row['quantity'];
          $fquantity = $rquantity - $quantity;

          $mysqli->query("UPDATE pasta SET quantity='$fquantity' WHERE id='$id'") or die ($mysqli->error);


      }
    }
    }

  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-check-circle' style='font-size: 150px; color: green; text-shadow: 3px 3px 3px black;'></i>
        <h4>ORDER COMPLETED SUCCESSFULLY!</h4><br><br>
        <p>Thank you for ordering. We received your order and will begin processing it.</p>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}else{
  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-times-circle' style='font-size: 150px; color: red; text-shadow: 3px 3px 3px black;'></i>
        <h4>SORRY THIS PRODUCT IS OUT OF STOCK OR YOU HAVE REACHED THE MAXIMUM QUANTITY AVAILABLE FOR THIS ITEM!</h4><br><br>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}endwhile;
}

if(isset($_POST['submit2'])){
  $id = $_POST['id'];
  $prodname = $_POST['prodname'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $username = $_SESSION['id1'];
  $img = $_POST['img'];
  $date = date('Y-m-d');
  $tnum = mt_rand();
  
  $result = $mysqli->query("SELECT * FROM customer WHERE username='$username'") or die ($mysqli->error);
  $result1 = $mysqli->query("SELECT * FROM pork WHERE id='$id'") or die ($mysqli->error);

while ($row1 = $result1->fetch_assoc()):
$myQuantity = $row1['quantity'];
if($quantity <= $myQuantity){

  while ($row = $result->fetch_assoc()):
    $fname = $row['fname'];
    $lname = $row['lname'];

  $mysqli->query("insert into orders (tnum, username, fname, lname, prodname, price, quantity, date, img, status) values('$tnum', '$username', '$fname', '$lname', '$prodname', '$price', '$quantity', '$date', '$img', 'pending')") or die ($mysqli->error);
  endwhile;
  
   $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from pork where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
          $rquantity = $row['quantity'];
          $fquantity = $rquantity - $quantity;

          $mysqli->query("UPDATE pork SET quantity='$fquantity' WHERE id='$id'") or die ($mysqli->error);


      }
    }
    }

  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-check-circle' style='font-size: 150px; color: green; text-shadow: 3px 3px 3px black;'></i>
        <h4>ORDER COMPLETED SUCCESSFULLY!</h4><br><br>
        <p>Thank you for ordering. We received your order and will begin processing it.</p>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}else{
  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-times-circle' style='font-size: 150px; color: red; text-shadow: 3px 3px 3px black;'></i>
        <h4>SORRY THIS PRODUCT IS OUT OF STOCK OR YOU HAVE REACHED THE MAXIMUM QUANTITY AVAILABLE FOR THIS ITEM!</h4><br><br>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}endwhile;
}

if(isset($_POST['submit3'])){
  $id = $_POST['id'];
  $prodname = $_POST['prodname'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $username = $_SESSION['id1'];
  $img = $_POST['img'];
  $date = date('Y-m-d');
  $tnum = mt_rand();
  
  $result = $mysqli->query("SELECT * FROM customer WHERE username='$username'") or die ($mysqli->error);
  $result1 = $mysqli->query("SELECT * FROM burger WHERE id='$id'") or die ($mysqli->error);

while ($row1 = $result1->fetch_assoc()):
$myQuantity = $row1['quantity'];
if($quantity <= $myQuantity){

  while ($row = $result->fetch_assoc()):
    $fname = $row['fname'];
    $lname = $row['lname'];

  $mysqli->query("insert into orders (tnum, username, fname, lname, prodname, price, quantity, date, img, status) values('$tnum', '$username', '$fname', '$lname', '$prodname', '$price', '$quantity', '$date', '$img', 'pending')") or die ($mysqli->error);
  endwhile;
  
   $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from burger where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
          $rquantity = $row['quantity'];
          $fquantity = $rquantity - $quantity;

          $mysqli->query("UPDATE burger SET quantity='$fquantity' WHERE id='$id'") or die ($mysqli->error);


      }
    }
    }

  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-check-circle' style='font-size: 150px; color: green; text-shadow: 3px 3px 3px black;'></i>
        <h4>ORDER COMPLETED SUCCESSFULLY!</h4><br><br>
        <p>Thank you for ordering. We received your order and will begin processing it.</p>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}else{
  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-times-circle' style='font-size: 150px; color: red; text-shadow: 3px 3px 3px black;'></i>
        <h4>SORRY THIS PRODUCT IS OUT OF STOCK OR YOU HAVE REACHED THE MAXIMUM QUANTITY AVAILABLE FOR THIS ITEM!</h4><br><br>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}endwhile;
}


if(isset($_POST['submit4'])){
  $id = $_POST['id'];
  $prodname = $_POST['prodname'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $username = $_SESSION['id1'];
  $img = $_POST['img'];
  $date = date('Y-m-d');
  $tnum = mt_rand();
  
  $result = $mysqli->query("SELECT * FROM customer WHERE username='$username'") or die ($mysqli->error);
  $result1 = $mysqli->query("SELECT * FROM beef WHERE id='$id'") or die ($mysqli->error);

while ($row1 = $result1->fetch_assoc()):
$myQuantity = $row1['quantity'];
if($quantity <= $myQuantity){

  while ($row = $result->fetch_assoc()):
    $fname = $row['fname'];
    $lname = $row['lname'];


  $mysqli->query("insert into orders (tnum, username, fname, lname, prodname, price, quantity, date, img, status) values('$tnum', '$username', '$fname', '$lname', '$prodname', '$price', '$quantity', '$date', '$img', 'pending')") or die ($mysqli->error);
  endwhile;
  
   $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from beef where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
          $rquantity = $row['quantity'];
          $fquantity = $rquantity - $quantity;

          $mysqli->query("UPDATE beef SET quantity='$fquantity' WHERE id='$id'") or die ($mysqli->error);


      }
    }
    }

  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-check-circle' style='font-size: 150px; color: green; text-shadow: 3px 3px 3px black;'></i>
        <h4>ORDER COMPLETED SUCCESSFULLY!</h4><br><br>
        <p>Thank you for ordering. We received your order and will begin processing it.</p>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}else{
  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-times-circle' style='font-size: 150px; color: red; text-shadow: 3px 3px 3px black;'></i>
        <h4>SORRY THIS PRODUCT IS OUT OF STOCK OR YOU HAVE REACHED THE MAXIMUM QUANTITY AVAILABLE FOR THIS ITEM!</h4><br><br>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}endwhile;
}

if(isset($_POST['submit5'])){
  $id = $_POST['id'];
  $prodname = $_POST['prodname'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $username = $_SESSION['id1'];
  $img = $_POST['img'];
  $date = date('Y-m-d');
  $tnum = mt_rand();

  $result = $mysqli->query("SELECT * FROM customer WHERE username='$username'") or die ($mysqli->error);
  $result1 = $mysqli->query("SELECT * FROM sale WHERE id='$id'") or die ($mysqli->error);

while ($row1 = $result1->fetch_assoc()):
$myQuantity = $row1['quantity'];
if($quantity <= $myQuantity){

  while ($row = $result->fetch_assoc()):
    $fname = $row['fname'];
    $lname = $row['lname'];


  $mysqli->query("insert into orders (tnum, username, fname, lname, prodname, price, quantity, date, img, status) values('$tnum', '$username', '$fname', '$lname', '$prodname', '$price', '$quantity', '$date', '$img', 'pending')") or die ($mysqli->error);
  endwhile;
  
   $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from sale where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
          $rquantity = $row['quantity'];
          $fquantity = $rquantity - $quantity;

          $mysqli->query("UPDATE sale SET quantity='$fquantity' WHERE id='$id'") or die ($mysqli->error);


      }
    }
    }

  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-check-circle' style='font-size: 150px; color: green; text-shadow: 3px 3px 3px black;'></i>
        <h4>ORDER COMPLETED SUCCESSFULLY!</h4><br><br>
        <p>Thank you for ordering. We received your order and will begin processing it.</p>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}else{
  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-times-circle' style='font-size: 150px; color: red; text-shadow: 3px 3px 3px black;'></i>
        <h4>SORRY THIS PRODUCT IS OUT OF STOCK OR YOU HAVE REACHED THE MAXIMUM QUANTITY AVAILABLE FOR THIS ITEM!</h4><br><br>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}endwhile;
}

if(isset($_POST['submit6'])){
  $prodname = $_POST['prodname'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $username = $_SESSION['id1'];
  $img = $_POST['img'];
  $date = date('Y-m-d');
  
  $result = $mysqli->query("SELECT * FROM customer WHERE username='$username'") or die ($mysqli->error);
  $result2 = $mysqli->query("SELECT * FROM cart WHERE username='$username'") or die ($mysqli->error);

  
  while ($row = $result->fetch_assoc()):
    $fname = $row['fname'];
    $lname = $row['lname'];
    while ($row2 = $result2->fetch_assoc()):
      $tnum = mt_rand();

  $mysqli->query("insert into orders (tnum, username, fname, lname, prodname, price, 
    quantity, date, img, status) values('$tnum', '$username', '$fname', '$lname', '".$row2['prodname']."', '".$row2['price']."', '".$row2['quantity']."', '$date',
    '".$row2['img']."', 'pending')") or die ($mysqli->error);
  $mysqli->query("delete from cart where username='$username'") or die ($mysqli->error);
  endwhile;endwhile;
  
   $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from cart where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
          $rquantity = $row['quantity'];
          $fquantity = $rquantity - $quantity;

          $mysqli->query("UPDATE sale SET quantity='$fquantity' WHERE id='$id'") or die ($mysqli->error);


      }
    }
    }

  echo "<br><br>
        <div class='content'>
        <div class='row justify-content-center'>
        <div class='col-md-10' style='background-color: white; border-radius: 10px;'><center>
        <i class='fa fa-check-circle' style='font-size: 150px; color: green; text-shadow: 3px 3px 3px black;'></i>
        <h4>ORDER COMPLETED SUCCESSFULLY!</h4><br><br>
        <p>Thank you for ordering. We received your order and will begin processing it.</p>
        <a href='index.php' class='btn btn-dark'>BACK TO HOME</a>
        </center></div>
        </div>
        </div>
        ";
}

?>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<br><br><br><br><br><br><br><br><br>
<!--   FOOTER START================== -->
    
    <footer class="footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-3">
            <h4 class="title">Vanjo's Merienda</h4>
            <p>We serve as what you deserve. Vanjo's Merienda offer light meals for your brunch, evening meal, snacks, breakfast, dinner, lunch, etc.</p>
            <ul class="social-icon">
            <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
            </ul>
            </div>
        <div class="col-sm-3">
            <h4 class="title">My Account</h4>
            <span class="acount-icon">          
            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wish List</a>
            <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
            <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Language</a>           
          </span>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Category</h4>
            <div class="category">
            <a href="#">Dish</a>
            <a href="#">Burgers</a>
            <a href="chicken.php">Chicken</a>
            <a href="pork.php">Pork</a>
            <a href="beef.php">Beef</a>
            <a href="pasta.php">Pasta</a>
            <a href="#">Fries</a>         
            </div>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Payment Methods</h4>
            <p>You can choose any of the payment methods in your account with:</p>
            <ul class="payment">
            <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>            
            <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
            </ul>
            </div>
        </div>
        <hr>
        
        <div class="row text-center"> © 2020. GO3J's.</div>
        </div>
        
        
    </footer>

<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>
</html>