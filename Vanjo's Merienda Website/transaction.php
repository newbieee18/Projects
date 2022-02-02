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
  border-radius: 12px;
}
td{
  color: black;
  font-family: roboto;
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
<br><br>

<?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from orders where username='".$_SESSION['id1']."' order by id desc";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
?>
<div class="container" style='background-color: white;'>
  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:50%">Product</th>
              <th style="width:5%">Price</th>
              <th style="width:5%">Quantity</th>
              <th style="width:5%">Subtotal</th>
              <th style="width:5%">Tax</th>
              <th style="width:5%">Total</th>
              <th style="width:10%"></th>
            </tr>
          </thead>
          <?php
          foreach($res as $row){
            $subtotal = $row['price'] * $row['quantity'];
            $tax = $subtotal * .12;
            $total = $subtotal + $tax;

          echo '
          <tbody>
            <tr><form action="" method="POST">
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-3 hidden-xs"><img src="'.$row['img'].'" alt="..." class="img-responsive" width="130px" height="100px"/></div>
                  <div class="col-sm-8">
                    <input type="hidden" value="'.$row['id'].'" name="id">
                    <h4 class="nomargin">'.$row['prodname'].'</h4><input type="hidden" value="'.$row['prodname'].'" name="prodname"><input type="hidden" value="'.$row['quantity'].'" id="mquantity" name="mquantity"> 
                    <p>Your tracking number is: #'.$row['tnum'].'</p>
                  </div>
                </div>
              </td>
              <td data-th="Price">₱'.number_format($row['price'], 2).'</td><input type="hidden" value="'.$row['price'].'" id="origPrice">
              <td data-th="Quantity">
                <div class="nice-number">                
                  <input type="number" value="'.$row['quantity'].'" id="quantity" name="quantity" style="width: 4ch;" disabled>                
                </div>
              </td>
              <td data-th="Subtotal">₱'.number_format($subtotal, 2).'</td>
              <td data-th="Tax">₱'.number_format($tax, 2).'</td>
              <td data-th="Total">₱'.number_format($total, 2).'</td>
              <td class="actions" data-th="">';
              if($row['status'] == "delivered"){
                echo '
                <a href="transaction.php?rate='.$row["id"].'" role="button" class="btn btn-dark" id="rate" name="rate" onclick="openForm()">Rate Now</a>';             
              }
              if($row['status'] == "pending"){
                echo '
                <button type="button" class="btn" style="background-color: #FF8C00;" disabled>Pending</button><br><br>
                <button type="submit" class="btn btn-danger" id="cancel1" name="cancel1" style="background-color: white; color: black;">Cancel</button>';                               
              }
              else{ echo '';}
              echo '
              </td>
            </tr>
          </tbody></form>';
          }?>
        </table>
</div>
<?php
}}

 $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));

    if(isset($_POST['cancel1'])){
    $id = $_POST['id'];
    $prodname = $_POST['prodname'];
    $quantity = $_POST['mquantity'];

    $mysqli->query("DELETE FROM orders WHERE id='$id'") or die ($mysqli->error);
    $mysqli->query("UPDATE beef SET quantity=$quantity+quantity WHERE prodname='$prodname'") or die ($mysqli->error);
    $mysqli->query("UPDATE burger SET quantity=$quantity+quantity WHERE prodname='$prodname'") or die ($mysqli->error);
    $mysqli->query("UPDATE chicken SET quantity=$quantity+quantity WHERE prodname='$prodname'") or die ($mysqli->error);
    $mysqli->query("UPDATE pasta SET quantity=$quantity+quantity WHERE prodname='$prodname'") or die ($mysqli->error);
    $mysqli->query("UPDATE pork SET quantity=$quantity+quantity WHERE prodname='$prodname'") or die ($mysqli->error);
    $mysqli->query("UPDATE sale SET quantity=$quantity+quantity WHERE prodname='$prodname'") or die ($mysqli->error);

    echo '<script type = "text/javascript">';
          echo 'alert("ORDER CANCELED!");'; 
          echo 'window.location.href = "transaction.php";';
          echo '</script>';
    }

    if(isset($_GET['rate'])){
    $id = $_GET['rate'];       
    
    }
    $result = $mysqli->query("select * from orders where id='$id'") or die ($mysqli->error);
    $result2 = $mysqli->query("select * from customer where username='".$_SESSION['id1']."'") or die ($mysqli->error);
    while ($row = $result->fetch_assoc()):
    while ($row1 = $result2->fetch_assoc()):  
?>

<div class="form-popup" id="myForm">
  <form action="" class="form-container" method="POST">
  <b>Product:  </b><?php echo $row['prodname']; ?><input type="hidden" value="<?php echo $row['prodname']; ?>" name="prod" id="prod"><br>
  <i class="fa fa-star fa-1x" data-index="0"></i>
  <i class="fa fa-star fa-1x" data-index="1"></i>
  <i class="fa fa-star fa-1x" data-index="2"></i>
  <i class="fa fa-star fa-1x" data-index="3"></i>
  <i class="fa fa-star fa-1x" data-index="4"></i><br><br>
  <input type="hidden" id="ratedIndex" name="ratedIndex">
  <input type="hidden" id="img" name="img" value="<?php echo $row1['img']; ?>">
  <input type="hidden" id="prodId" name="prodId" value="<?php echo $row['id']; ?>">
  <textarea name="comment" id="comment" placeholder="Type your comment here.." rows="5" cols="50"></textarea><br><br>
  <button type="button" class="btn cancel" onclick="closeForm()">Close</button><br>
  <button type="submit" class="btn btn-primary save" name="save"><i class="fa fa-paper-plane" style="font-size: 23px;"></i></button>
  </form>
</div>


<?php endwhile; endwhile;
$conn = new mysqli('localhost', 'root', '', 'projweb');

  if (isset($_POST['save'])) {
        $ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
        $ratedIndex++;
        $comment = $conn->real_escape_string($_POST['comment']);
        $prod = $conn->real_escape_string($_POST['prod']);
        $img = $conn->real_escape_string($_POST['img']);
        $prodId = $conn->real_escape_string($_POST['prodId']);

        $conn->query("INSERT INTO ratings (username, prodname, ratedIndex, comments, img) VALUES ('".$_SESSION['id1']."', '$prod', '$ratedIndex', '$comment', '$img')");
        $conn->query("UPDATE orders SET status='rated' WHERE id='".$prodId."'");
          echo '<script type = "text/javascript">';
          echo 'alert("Done Rating.. Thank you!");'; 
          echo 'window.location.href = "transaction.php";';
          echo '</script>';
        
        
  }
  
    // $sql = $conn->query("SELECT id FROM ratings");
    // $numR = $sql->num_rows;

    // $sql = $conn->query("SELECT SUM(rateIndex) AS total FROM ratings");
    // $rData = $sql->fetch_array();
    // $total = $rData['total'];

    // $avg = $total / $numR;

?>

<script>
var ratedIndex = -1, uID = 0, comment = $("#comment").val(), prod = $("#prod").val();
      
        $(document).ready(function () {
            resetStarColors();

            $('.fa-star').on('click', function () {
               ratedIndex = parseInt($(this).data('index'));
               localStorage.setItem('ratedIndex', ratedIndex);
               document.getElementById("ratedIndex").value = ratedIndex;
            });

            $('.fa-star').mouseover(function () {
                resetStarColors();
                var currentIndex = parseInt($(this).data('index'));
                setStars(currentIndex);
            });

            $('.fa-star').mouseleave(function () {
                resetStarColors();

                if (ratedIndex != -1)
                    setStars(ratedIndex);
            });
        });

        function setStars(max) {
            for (var i=0; i <= max; i++)
                $('.fa-star:eq('+i+')').css('color', 'yellow');
        }

        function resetStarColors() {
            $('.fa-star').css('color', 'black');
        }

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
function openForm() {
  $("#myForm").modal('show');
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  window.location.href="transaction.php";
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