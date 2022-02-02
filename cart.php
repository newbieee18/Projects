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
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!DOCTYPE html>

<html lang="en">
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

  <title>Vanjo's Merienda</title> 
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  
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
  border-radius: 5px;
}
td{
  color: black;
  font-family: roboto;
}
input[type=number] {
  -moz-appearance: textfield;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.details{
  width: 92%;
  padding: 7px 10px;
  margin: 8px 10px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-family: Times New Roman;
  text-align: center;
}
h3{
  font-family: cooper;
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
                    <a href='profile.php'>My Account</a>
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

$mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
$result = $mysqli->query("select * from cart where username='".$_SESSION['id1']."' order by id desc") or die ($mysqli->error);

  if(isset($_POST['add'])){
    $id = $_POST['id'];
    $prodname = $_POST['prodname'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $username = $_SESSION['id1'];
    $quantity = 1;
    $subtotal = $price * $quantity;

    $mysqli->query("insert into cart (username, prodname, price, quantity, subtotal, img) values('$username', '$prodname', '$price', '$quantity', '$subtotal', '$img')") or die ($mysqli->error);
    echo '<script>window.location.href = "cart.php";</script>';
  }

  if(isset($_POST['add1'])){
    $id = $_POST['id'];
    $prodname = $_POST['prodname'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $username = $_SESSION['id1'];
    $quantity = 1;
    $subtotal = $price * $quantity;

    $mysqli->query("insert into cart (username, prodname, price, quantity, subtotal, img) values('$username', '$prodname', '$price', '$quantity', '$subtotal', '$img')") or die ($mysqli->error);
    echo '<script>window.location.href = "cart.php";</script>';
  }

  if(isset($_POST['add2'])){
    $id = $_POST['id'];
    $prodname = $_POST['prodname'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $username = $_SESSION['id1'];
    $quantity = 1;
    $subtotal = $price * $quantity;

    $mysqli->query("insert into cart (username, prodname, price, quantity, subtotal, img) values('$username', '$prodname', '$price', '$quantity', '$subtotal', '$img')") or die ($mysqli->error);
    echo '<script>window.location.href = "cart.php";</script>';
  }

  if(isset($_POST['add3'])){
    $id = $_POST['id'];
    $prodname = $_POST['prodname'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $username = $_SESSION['id1'];
    $quantity = 1;
    $subtotal = $price * $quantity;

    $mysqli->query("insert into cart (username, prodname, price, quantity, subtotal, img) values('$username', '$prodname', '$price', '$quantity', '$subtotal', '$img')") or die ($mysqli->error);
    echo '<script>window.location.href = "cart.php";</script>';
  }

  if(isset($_POST['add4'])){
    $id = $_POST['id'];
    $prodname = $_POST['prodname'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $username = $_SESSION['id1'];
    $quantity = 1;
    $subtotal = $price * $quantity;

    $mysqli->query("insert into cart (username, prodname, price, quantity, subtotal, img) values('$username', '$prodname', '$price', '$quantity', '$subtotal', '$img')") or die ($mysqli->error);
    echo '<script>window.location.href = "cart.php";</script>';
  }

  if(isset($_POST['add5'])){
    $id = $_POST['id'];
    $prodname = $_POST['prodname'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $username = $_SESSION['id1'];
    $quantity = 1;
    $subtotal = $price * $quantity;

    $mysqli->query("insert into cart (username, prodname, price, quantity, subtotal, img) values('$username', '$prodname', '$price', '$quantity', '$subtotal', '$img')") or die ($mysqli->error);
    echo '<script>window.location.href = "cart.php";</script>';
  }

?>

<?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from cart where username='".$_SESSION['id1']."' order by id desc";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
?>
<br><br>
<div class="container" style='background-color: white;'>
  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:50%">Product</th>
              <th style="width:10%">Price</th>
              <th style="width:8%">Quantity</th>
              <th style="width:22%" class="text-center">Subtotal</th>
              <th style="width:10%"></th>
            </tr>
          </thead>
<?php 
    while($row = mysqli_fetch_assoc($res)){
        $total += $row['subtotal'];
        $tax = $total * .12;
        $ftotal = $total + $tax;


      $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));

      if(isset($_POST['minus'])){
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];


        if($quantity < 1){
          $fquantity = 0;
          $mysqli->query("UPDATE cart SET quantity='$fquantity' WHERE id='$id'") or die ($mysqli->error);
          echo '<script type = "text/javascript">window.location.href = "cart.php";</script>';
        }
        else{
          $fquantity = $quantity--;
          $mysqli->query("UPDATE cart SET quantity='$quantity', subtotal=quantity*price WHERE id='$id'") or die ($mysqli->error);
          echo '<script type = "text/javascript">window.location.href = "cart.php";</script>';
        }
      }

      if(isset($_POST['plus'])){
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];

        $fquantity = $quantity + 1;
          $mysqli->query("UPDATE cart SET quantity='$fquantity', subtotal=quantity*price WHERE id='$id'") or die ($mysqli->error);
          echo '<script type = "text/javascript">window.location.href = "cart.php";</script>';
      
      }


      if(isset($_POST['delete'])){
          $id = $_POST['id'];
          
          $mysqli->query("DELETE FROM cart WHERE id=$id") or die ($mysqli->error);
          echo '<script type = "text/javascript">';
                echo 'alert("Successfuly Deleted!");'; 
                echo 'window.location.href = "cart.php";';
                echo '</script>';

      }
        echo '<form actiocn="" method="POST">
          <tbody>
            <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-3 hidden-xs"><img src="'.$row['img'].'" alt="..." class="img-responsive" width="130px" height="100px"/></div>
                  <div class="col-sm-8">
                    <input type="hidden" value="'.$row['id'].'" name="id"><br>
                    <h4 class="nomargin">'.$row['prodname'].'</h4>
                    
                  </div>
                </div>
              </td>
              <td data-th="Price">₱'.number_format($row['price'], 2).'</td><input type="hidden" value="'.$row['price'].'" id="origPrice">
              <td data-th="Quantity">
                <div class="nice-number">
                  <button class="btn btn-primary" name="minus"><i class="fa fa-minus"></i></button></a>
                  <input type="number" value="'.$row['quantity'].'" id="quantity" name="quantity" style="width: 4ch;" readonly>
                  <button class="btn btn-primary" name="plus"><i class="fa fa-plus"></i></button>
                </div>
              </td>
              <td data-th="Subtotal" class="text-center">₱'.number_format($row['subtotal'], 2).'</td><input type="hidden" name="subtotal" value="'.$row['subtotal'].'">
              <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm" name="delete"><i class="fa fa-trash-o"></i></button>                
              </td>
            </tr>
          </tbody></form>';
      }?>
          <tfoot>
            <tr>
              <td><a href="more.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs text-center" id="total_amount"><b>Total: ₱<?php echo number_format($total, 2);?></b></td>
              <td><a data-toggle="modal" data-target="#confirmation" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
          </tfoot>
        </table>
          </form>
</div>

<?php 
      }}
      

?>


<form action="payment.php" method="POST">
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="payment" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Orders:</h3>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM cart WHERE username='".$_SESSION['id1']."'") or die ($mysqli->error);
        while ($row = $result->fetch_assoc()):
          echo "<p style='float: left;'>".$row['prodname']."</p><p style='float: right;'>₱".$row['subtotal']."</p><br><hr>";
          echo "<input type='hidden' name='prodname' value='".$row['prodname']."'><input type='hidden' name='price' value='".$row['price']."'><input type='hidden' name='quantity' value='".$row['quantity']."'><input type='hidden' name='img' value='".$row['img']."'>";
        endwhile;
        ?>
        <p style="float: right;">Subtotal: ₱<?php echo number_format($total, 2); ?></p><br><br>
        <p style="float: right;">Tax: ₱<?php echo number_format($tax, 2); ?></p><br><br>
        <b><p style="float: right;">Total: ₱<?php echo number_format($ftotal, 2); ?></p></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit6" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmation" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Confirmation:</h3>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM customer WHERE username='".$_SESSION['id1']."'") or die ($mysqli->error);
        while ($row = $result->fetch_assoc()):
          echo "<div class='col-md-12' style='background-color: darkgrey; height: 450px; border: 1px solid black; box-shadow: 0px -1px 7px 2px black; border-radius: 5px;'>
              <p style='font-size: 23px; font-family: Delighted Panda; border: 1px solid black; text-align: center;'>Confirm Details</p>
              <p style='border: 1px solid black; text-align: center;'><b>Name:<br></b><input type='text' class='details' placeholder='Last Name' value='".$row['lname']."' style='width: 40%;'>
              <input type='text' class='details' placeholder='First Name' value='".$row['fname']."' style='width: 40%;'><br>
              <b>Age:</b><input type='text' class='details' placeholder='Age' value='".$row['age']."' style='width: 30%;'>
              <b>Sex:</b><input type='text' class='details' placeholder='Sex' value='".$row['sex']."' style='width: 30%;'><br>
              <b>Email Address:</b><input type='text' class='details' placeholder='Email Address' value='".$row['email']."'>
              <b>Location:</b><input type='text' class='details' placeholder='Complete Address' value='".$row['address']."'></p>
              </div>
              ";
        endwhile;
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="payment()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function payment(){
  $("#payment").modal('show');
  $("#confirmation").modal('hide');
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
            <a href="cart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
            <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>          
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
            </div>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Payment Methods(Soon)</h4>
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


<script src="js/bootstrap.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>
</html>