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
  border-radius: 5px;
}
td{
  color: white;
  font-family: roboto;
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

/***************************************************************CHICKEN*******************************************************/

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from chicken where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
        $prodname = $row['prodname'];
        echo "<br><br><form action='payment.php' method='POST'>
              <div class='row' style='max-width: 100%; margin-left: 1px; border-top: 1px solid #373a40; border-bottom: 1px solid #373a40;'>
              <div class='col-sm-5'> 
                <img src='".$row['img']."' style='height: 300px; width: 502px; background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;' class='pimg'>
                <input type='hidden' name='img' value='".$row['img']."'/>
              </div>
              <div class='col-md-4' max-width: 100%;>
                <table>
                  <tr>
                    <input type='hidden' name='id' value='".$row['id']."'/>
                    <td style='font-size: 23px;'>Product Name: ".$row['prodname']."</td>
                    <input type='hidden' name='prodname' value='".$row['prodname']."'/>
                  </tr>
                  <tr>
                  <td><br><div class='nice-number'><p style='display: inline;'>Quantity:
                  <button type='button' class='btn btn-primary' onclick='minus()'><i class='fa fa-minus'></i></button>
                  <input type='number' value='1' id='quantity' name='quantity' style='width: 4ch;'>
                  <button type='button' class='btn btn-primary' onclick='plus()'><i class='fa fa-plus'></i></button>
                  &nbsp;&nbsp;</p><p style='display: inline; color: grey; margin-top: 5px; margin-left: -5px'>".$row['quantity']." Available Order(s)</p></div></td>
                  </tr>
                  <tr>
                    <td style='font-size: 30px; font-family: georgia; color: orange; text-shadow: 1px 1px black;'>₱".$row['price']."</td><input type='hidden' name='price' value='".$row['price']."'/>
                  </tr>
                  <tr>";
                  if($row['quantity'] !=0){
                    echo "
                    <td><br><br><button type='submit' name='submit' id='pOrder' class='btn-info' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Place Order</button>&nbsp;
                    <p style='font-size: 12px;'><i>Note: `Please confirm your details to enable place order`</i></p>
                    </td>";
                  }else{
                    echo "
                    <td><br><br><button type='submit' class='btn-danger' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Out of Stock</button>&nbsp;
                    </td>";
                  }
                  echo "
                  </tr>
                </table>
              </div>
              ";
              if($row['quantity'] !=0){
              $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
              $result = $mysqli->query("SELECT * FROM customer WHERE username='".$_SESSION['id1']."'") or die ($mysqli->error);
              while ($row = $result->fetch_assoc()):
               echo "<div class='col-md-3' style='background-color: darkgrey; height: 450px; border: 1px solid black; box-shadow: 0px -1px 7px 2px black; border-radius: 5px;'>
              <p style='font-size: 23px; font-family: Delighted Panda; border: 1px solid black; text-align: center;'>Confirm Details</p>
              <p style='border: 1px solid black; text-align: center;'><b>Name:</b><br><input type='text' class='details' placeholder='Last Name' value='".$row['lname']."' style='width: 40%;'>
              <input type='text' class='details' placeholder='First Name' value='".$row['fname']."' style='width: 40%;'>
              <b>Age:</b><input type='text' class='details' placeholder='Age' value='".$row['age']."' style='width: 20%;'>
              <b>Sex:</b><input type='text' class='details' placeholder='Sex' value='".$row['sex']."' style='width: 30%;'>
              <b>Contact Number:</b><input type='text' class='details' placeholder='Enter Contact Number' value='".$row['contact']."'>
              <b>Location:</b><input type='text' class='details' placeholder='Complete Address' value='".$row['address']."'></p>
              <input type='button' class='btn btn-success' id='confirm' onclick='enablepOrder()' value='Confirm' style='width: 100%;'>
              </div>
              </div>
              </form><br>";
              endwhile;
              }
              else{
                echo "</div><br><br>";
              }

        echo '
        <div class="container">
        <div class="row">
        <div class="col-md-11" style="background-color: white; border-radius: 10px; font-family: Times New Roman;">
        <div style="background: #f5f5f5; border-radius: 5px;">';

        $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM ratings WHERE prodname='$prodname'") or die ($mysqli->error);
        if (mysqli_num_rows($result) > 0){
        while ($row = $result->fetch_assoc()):
          echo '&nbsp;&nbsp;<img src="upload/'.$row['img'].'" style="width: 30px; height: 30px; margin-top: 5px; border-radius: 50%;">&nbsp;'.$row['username'].'<br>';
          if($row['ratedIndex'] == 1){
          echo '&nbsp
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 2){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 3){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 4){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 5){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i><br>';
          }
          echo '&emsp;&emsp;'.$row['comments'].'<hr>';
        endwhile;
        }else echo "No Reviews";
       }
    }
    }
}  

        echo '</div>
        </div>
        </div>
        </div>
        '; 


/***************************************************************PASTA*******************************************************/

if (isset($_GET['edit1'])) {
    $id = $_GET['edit1'];

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from pasta where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      $prodname = $row['prodname'];
      while($row = mysqli_fetch_assoc($res)){
         echo "<br><br><form action='payment.php' method='POST'>
              <div class='row' style='max-width: 100%; margin-left: 1px; border-top: 1px solid #373a40; border-bottom: 1px solid #373a40;'>
              <div class='col-sm-5'> 
                <img src='".$row['img']."' style='height: 300px; width: 502px; background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;' class='pimg'>
                <input type='hidden' name='img' value='".$row['img']."'/>
              </div>
              <div class='col-md-4' max-width: 100%;>
                <table>
                  <tr>
                    <input type='hidden' name='id' value='".$row['id']."'/>
                    <td style='font-size: 23px;'>Product Name: ".$row['prodname']."</td>
                    <input type='hidden' name='prodname' value='".$row['prodname']."'/>
                  </tr>
                  <tr>
                  <td><br><div class='nice-number'><p style='display: inline;'>Quantity:
                  <button type='button' class='btn btn-primary' onclick='minus()'><i class='fa fa-minus'></i></button>
                  <input type='number' value='1' id='quantity' name='quantity' style='width: 4ch;'>
                  <button type='button' class='btn btn-primary' onclick='plus()'><i class='fa fa-plus'></i></button>
                  &nbsp;&nbsp;</p><p style='display: inline; color: grey; margin-top: 5px; margin-left: -5px'>".$row['quantity']." Available Order(s)</p></div></td>
                  </tr>
                  <tr>
                    <td style='font-size: 30px; font-family: georgia; color: orange; text-shadow: 1px 1px black;'>₱".$row['price']."</td><input type='hidden' name='price' value='".$row['price']."'/>
                  </tr>
                  <tr>";
                  if($row['quantity'] !=0){
                    echo "
                    <td><br><br><button type='submit' name='submit1' id='pOrder' class='btn-info' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Place Order</button>&nbsp;
                    <p style='font-size: 12px;'><i>Note: `Please confirm your details to enable place order`</i></p>
                    </td>";
                  }else{
                    echo "
                    <td><br><br><button type='submit' class='btn-danger' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Out of Stock</button>&nbsp;
                    </td>";
                  }
                  echo "
                  </tr>
                </table>
              </div>
              ";
              if($row['quantity'] !=0){
              $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
              $result = $mysqli->query("SELECT * FROM customer WHERE username='".$_SESSION['id1']."'") or die ($mysqli->error);
              while ($row = $result->fetch_assoc()):
               echo "<div class='col-md-3' style='background-color: darkgrey; height: 450px; border: 1px solid black; box-shadow: 0px -1px 7px 2px black; border-radius: 5px;'>
              <p style='font-size: 23px; font-family: Delighted Panda; border: 1px solid black; text-align: center;'>Confirm Details</p>
              <p style='border: 1px solid black; text-align: center;'><b>Name:</b><br><input type='text' class='details' placeholder='Last Name' value='".$row['lname']."' style='width: 40%;'>
              <input type='text' class='details' placeholder='First Name' value='".$row['fname']."' style='width: 40%;'>
              <b>Age:</b><input type='text' class='details' placeholder='Age' value='".$row['age']."' style='width: 20%;'>
              <b>Sex:</b><input type='text' class='details' placeholder='Sex' value='".$row['sex']."' style='width: 30%;'>
              <b>Email Address:</b><input type='text' class='details' placeholder='Email Address' value='".$row['email']."'>
              <b>Location:</b><input type='text' class='details' placeholder='Complete Address' value='".$row['address']."'></p>
              <input type='button' class='btn btn-success' id='confirm' onclick='enablepOrder()' value='Confirm' style='width: 100%;'>
              </div>
              </div>
              </form><br>";
              endwhile;
              }
              else{
                echo "</div><br><br>";
              }

        echo '
        <div class="container">
        <div class="row">
        <div class="col-md-11" style="background-color: white; border-radius: 10px; font-family: Times New Roman;">
        <div style="background: #f5f5f5; border-radius: 5px;">';

        $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM ratings WHERE prodname='$prodname'") or die ($mysqli->error);
        if (mysqli_num_rows($result) > 0){
        while ($row = $result->fetch_assoc()):
          echo '&nbsp;&nbsp;<img src="upload/'.$row['img'].'" style="width: 30px; height: 30px; margin-top: 5px; border-radius: 50%;">&nbsp;'.$row['username'].'<br>';
          if($row['ratedIndex'] == 1){
          echo '&nbsp
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 2){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 3){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 4){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 5){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i><br>';
          }
          echo '&emsp;&emsp;'.$row['comments'].'<hr>';
        endwhile;
        }else echo "No Reviews";
       }
    }
    }
}  

        echo '</div>
        </div>
        </div>
        </div>
        '; 


/***************************************************************PORK*******************************************************/


if (isset($_GET['edit2'])) {
    $id = $_GET['edit2'];

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from pork where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
        $prodname = $row['prodname'];
         echo "<br><br><form action='payment.php' method='POST'>
              <div class='row' style='max-width: 100%; margin-left: 1px; border-top: 1px solid #373a40; border-bottom: 1px solid #373a40;'>
              <div class='col-sm-5'> 
                <img src='".$row['img']."' style='height: 300px; width: 502px; background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;' class='pimg'>
                <input type='hidden' name='img' value='".$row['img']."'/>
              </div>
              <div class='col-md-4' max-width: 100%;>
                <table>
                  <tr>
                    <input type='hidden' name='id' value='".$row['id']."'/>
                    <td style='font-size: 23px;'>Product Name: ".$row['prodname']."</td>
                    <input type='hidden' name='prodname' value='".$row['prodname']."'/>
                  </tr>
                  <tr>
                  <td><br><div class='nice-number'><p style='display: inline;'>Quantity:
                  <button type='button' class='btn btn-primary' onclick='minus()'><i class='fa fa-minus'></i></button>
                  <input type='number' value='1' id='quantity' name='quantity' style='width: 4ch;'>
                  <button type='button' class='btn btn-primary' onclick='plus()'><i class='fa fa-plus'></i></button>
                  &nbsp;&nbsp;</p><p style='display: inline; color: grey; margin-top: 5px; margin-left: -5px'>".$row['quantity']." Available Order(s)</p></div></td>
                  </tr>
                  <tr>
                    <td style='font-size: 30px; font-family: georgia; color: orange; text-shadow: 1px 1px black;'>₱".$row['price']."</td><input type='hidden' name='price' value='".$row['price']."'/>
                  </tr>
                  <tr>";
                  if($row['quantity'] !=0){
                    echo "
                    <td><br><br><button type='submit' name='submit2' id='pOrder' class='btn-info' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Place Order</button>&nbsp;
                    <p style='font-size: 12px;'><i>Note: `Please confirm your details to enable place order`</i></p>
                    </td>";
                  }else{
                    echo "
                    <td><br><br><button type='submit' class='btn-danger' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Out of Stock</button>&nbsp;
                    </td>";
                  }
                  echo "
                  </tr>
                </table>
              </div>
              ";
              if($row['quantity'] !=0){
              $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
              $result = $mysqli->query("SELECT * FROM customer WHERE username='".$_SESSION['id1']."'") or die ($mysqli->error);
              while ($row = $result->fetch_assoc()):
               echo "<div class='col-md-3' style='background-color: darkgrey; height: 450px; border: 1px solid black; box-shadow: 0px -1px 7px 2px black; border-radius: 5px;'>
              <p style='font-size: 23px; font-family: Delighted Panda; border: 1px solid black; text-align: center;'>Confirm Details</p>
              <p style='border: 1px solid black; text-align: center;'><b>Name:</b><br><input type='text' class='details' placeholder='Last Name' value='".$row['lname']."' style='width: 40%;'>
              <input type='text' class='details' placeholder='First Name' value='".$row['fname']."' style='width: 40%;'>
              <b>Age:</b><input type='text' class='details' placeholder='Age' value='".$row['age']."' style='width: 20%;'>
              <b>Sex:</b><input type='text' class='details' placeholder='Sex' value='".$row['sex']."' style='width: 30%;'>
              <b>Email Address:</b><input type='text' class='details' placeholder='Email Address' value='".$row['email']."'>
              <b>Location:</b><input type='text' class='details' placeholder='Complete Address' value='".$row['address']."'></p>
              <input type='button' class='btn btn-success' id='confirm' onclick='enablepOrder()' value='Confirm' style='width: 100%;'>
              </div>
              </div>
              </form><br>";
              endwhile;
              }
              else{
                echo "</div><br><br>";
              }

        echo '
        <div class="container">
        <div class="row">
        <div class="col-md-11" style="background-color: white; border-radius: 10px; font-family: Times New Roman;">
        <div style="background: #f5f5f5; border-radius: 5px;">';

        $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM ratings WHERE prodname='$prodname'") or die ($mysqli->error);
        if (mysqli_num_rows($result) > 0){
        while ($row = $result->fetch_assoc()):
          echo '&nbsp;&nbsp;<img src="upload/'.$row['img'].'" style="width: 30px; height: 30px; margin-top: 5px; border-radius: 50%;">&nbsp;'.$row['username'].'<br>';
          if($row['ratedIndex'] == 1){
          echo '&nbsp
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 2){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 3){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 4){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 5){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i><br>';
          }
          echo '&emsp;&emsp;'.$row['comments'].'<hr>';
        endwhile;
        }else echo "No Reviews";
       }
    }
    }
}  

        echo '</div>
        </div>
        </div>
        </div>
        '; 

/***************************************************************BURGER*******************************************************/      

if (isset($_GET['edit3'])) {
    $id = $_GET['edit3'];

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from burger where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
        $prodname = $row['prodname'];
         echo "<br><br><form action='payment.php' method='POST'>
              <div class='row' style='max-width: 100%; margin-left: 1px; border-top: 1px solid #373a40; border-bottom: 1px solid #373a40;'>
              <div class='col-sm-5'> 
                <img src='".$row['img']."' style='height: 300px; width: 502px; background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;' class='pimg'>
                <input type='hidden' name='img' value='".$row['img']."'/>
              </div>
              <div class='col-md-4' max-width: 100%;>
                <table>
                  <tr>
                    <input type='hidden' name='id' value='".$row['id']."'/>
                    <td style='font-size: 23px;'>Product Name: ".$row['prodname']."</td>
                    <input type='hidden' name='prodname' value='".$row['prodname']."'/>
                  </tr>
                  <tr>
                  <td><br><div class='nice-number'><p style='display: inline;'>Quantity:
                  <button type='button' class='btn btn-primary' onclick='minus()'><i class='fa fa-minus'></i></button>
                  <input type='number' value='1' id='quantity' name='quantity' style='width: 4ch;'>
                  <button type='button' class='btn btn-primary' onclick='plus()'><i class='fa fa-plus'></i></button>
                  &nbsp;&nbsp;</p><p style='display: inline; color: grey; margin-top: 5px; margin-left: -5px'>".$row['quantity']." Available Order(s)</p></div></td>
                  </tr>
                  <tr>
                    <td style='font-size: 30px; font-family: georgia; color: orange; text-shadow: 1px 1px black;'>₱".$row['price']."</td><input type='hidden' name='price' value='".$row['price']."'/>
                  </tr>
                  <tr>";
                  if($row['quantity'] !=0){
                    echo "
                    <td><br><br><button type='submit' name='submit3' id='pOrder' class='btn-info' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Place Order</button>&nbsp;
                    <p style='font-size: 12px;'><i>Note: `Please confirm your details to enable place order`</i></p>
                    </td>";
                  }else{
                    echo "
                    <td><br><br><button type='submit' class='btn-danger' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Out of Stock</button>&nbsp;
                    </td>";
                  }
                  echo "
                  </tr>
                </table>
              </div>
              ";
              if($row['quantity'] !=0){
              $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
              $result = $mysqli->query("SELECT * FROM customer WHERE username='".$_SESSION['id1']."'") or die ($mysqli->error);
              while ($row = $result->fetch_assoc()):
               echo "<div class='col-md-3' style='background-color: darkgrey; height: 450px; border: 1px solid black; box-shadow: 0px -1px 7px 2px black; border-radius: 5px;'>
              <p style='font-size: 23px; font-family: Delighted Panda; border: 1px solid black; text-align: center;'>Confirm Details</p>
              <p style='border: 1px solid black; text-align: center;'><b>Name:</b><br><input type='text' class='details' placeholder='Last Name' value='".$row['lname']."' style='width: 40%;'>
              <input type='text' class='details' placeholder='First Name' value='".$row['fname']."' style='width: 40%;'>
              <b>Age:</b><input type='text' class='details' placeholder='Age' value='".$row['age']."' style='width: 20%;'>
              <b>Sex:</b><input type='text' class='details' placeholder='Sex' value='".$row['sex']."' style='width: 30%;'>
              <b>Email Address:</b><input type='text' class='details' placeholder='Email Address' value='".$row['email']."'>
              <b>Location:</b><input type='text' class='details' placeholder='Complete Address' value='".$row['address']."'></p>
              <input type='button' class='btn btn-success' id='confirm' onclick='enablepOrder()' value='Confirm' style='width: 100%;'>
              </div>
              </div>
              </form><br>";
              endwhile;
              }
              else{
                echo "</div><br><br>";
              }
        
        echo '
        <div class="container">
        <div class="row">
        <div class="col-md-11" style="background-color: white; border-radius: 10px; font-family: Times New Roman;">
        <div style="background: #f5f5f5; border-radius: 5px;">';

        $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM ratings WHERE prodname='$prodname'") or die ($mysqli->error);
        if (mysqli_num_rows($result) > 0){
        while ($row = $result->fetch_assoc()):
          echo '&nbsp;&nbsp;<img src="upload/'.$row['img'].'" style="width: 30px; height: 30px; margin-top: 5px; border-radius: 50%;">&nbsp;'.$row['username'].'<br>';
          if($row['ratedIndex'] == 1){
          echo '&nbsp
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 2){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 3){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 4){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 5){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i><br>';
          }
          echo '&emsp;&emsp;'.$row['comments'].'<hr>';
        endwhile;
        }else echo "No Reviews";
       }
    }
    }
}  

        echo '</div>
        </div>
        </div>
        </div>
        '; 

/**********************************************************************BEEF**********************************************************/

if (isset($_GET['edit4'])) {
    $id = $_GET['edit4'];

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from beef where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
        $prodname = $row['prodname'];
         echo "<br><br><form action='payment.php' method='POST'>
              <div class='row' style='max-width: 100%; margin-left: 1px; border-top: 1px solid #373a40; border-bottom: 1px solid #373a40;'>
              <div class='col-sm-5'> 
                <img src='".$row['img']."' style='height: 300px; width: 502px; background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;' class='pimg'>
                <input type='hidden' name='img' value='".$row['img']."'/>
              </div>
              <div class='col-md-4' max-width: 100%;>
                <table>
                  <tr>
                    <input type='hidden' name='id' value='".$row['id']."'/>
                    <td style='font-size: 23px;'>Product Name: ".$row['prodname']."</td>
                    <input type='hidden' name='prodname' value='".$row['prodname']."'/>
                  </tr>
                  <tr>
                  <td><br><div class='nice-number'><p style='display: inline;'>Quantity:
                  <button type='button' class='btn btn-primary' onclick='minus()'><i class='fa fa-minus'></i></button>
                  <input type='number' value='1' id='quantity' name='quantity' style='width: 4ch;'>
                  <button type='button' class='btn btn-primary' onclick='plus()'><i class='fa fa-plus'></i></button>
                  &nbsp;&nbsp;</p><p style='display: inline; color: grey; margin-top: 5px; margin-left: -5px'>".$row['quantity']." Available Order(s)</p></div></td>
                  </tr>
                  <tr>
                    <td style='font-size: 30px; font-family: georgia; color: orange; text-shadow: 1px 1px black;'>₱".$row['price']."</td><input type='hidden' name='price' value='".$row['price']."'/>
                  </tr>
                  <tr>";
                  if($row['quantity'] !=0){
                    echo "
                    <td><br><br><button type='submit' name='submit4' id='pOrder' class='btn-info' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Place Order</button>&nbsp;
                    <p style='font-size: 12px;'><i>Note: `Please confirm your details to enable place order`</i></p>
                    </td>";
                  }else{
                    echo "
                    <td><br><br><button type='submit' class='btn-danger' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Out of Stock</button>&nbsp;
                    </td>";
                  }
                  echo "
                  </tr>
                </table>
              </div>
              ";
              if($row['quantity'] !=0){
              $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
              $result = $mysqli->query("SELECT * FROM customer WHERE username='".$_SESSION['id1']."'") or die ($mysqli->error);
              while ($row = $result->fetch_assoc()):
               echo "<div class='col-md-3' style='background-color: darkgrey; height: 450px; border: 1px solid black; box-shadow: 0px -1px 7px 2px black; border-radius: 5px;'>
              <p style='font-size: 23px; font-family: Delighted Panda; border: 1px solid black; text-align: center;'>Confirm Details</p>
              <p style='border: 1px solid black; text-align: center;'><b>Name:</b><br><input type='text' class='details' placeholder='Last Name' value='".$row['lname']."' style='width: 40%;'>
              <input type='text' class='details' placeholder='First Name' value='".$row['fname']."' style='width: 40%;'>
              <b>Age:</b><input type='text' class='details' placeholder='Age' value='".$row['age']."' style='width: 20%;'>
              <b>Sex:</b><input type='text' class='details' placeholder='Sex' value='".$row['sex']."' style='width: 30%;'>
              <b>Email Address:</b><input type='text' class='details' placeholder='Email Address' value='".$row['email']."'>
              <b>Location:</b><input type='text' class='details' placeholder='Complete Address' value='".$row['address']."'></p>
              <input type='button' class='btn btn-success' id='confirm' onclick='enablepOrder()' value='Confirm' style='width: 100%;'>
              </div>
              </div>
              </form><br>";
              endwhile;
              }
              else{
                echo "</div><br><br>";
              }

        echo '
        <div class="container">
        <div class="row">
        <div class="col-md-11" style="background-color: white; border-radius: 10px; font-family: Times New Roman;">
        <div style="background: #f5f5f5; border-radius: 5px;">';

        $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM ratings WHERE prodname='$prodname'") or die ($mysqli->error);
        if (mysqli_num_rows($result) > 0){
        while ($row = $result->fetch_assoc()):
          echo '&nbsp;&nbsp;<img src="upload/'.$row['img'].'" style="width: 30px; height: 30px; margin-top: 5px; border-radius: 50%;">&nbsp;'.$row['username'].'<br>';
          if($row['ratedIndex'] == 1){
          echo '&nbsp
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 2){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 3){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 4){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 5){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i><br>';
          }
          echo '&emsp;&emsp;'.$row['comments'].'<hr>';
        endwhile;
        }else echo "No Reviews";
       }
    }
    }
}  

        echo '</div>
        </div>
        </div>
        </div>
        '; 

/**********************************************************************SALE**********************************************************/

if (isset($_GET['edit5'])) {
    $id = $_GET['edit5'];

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from sale where id=$id";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
        $prodname = $row['prodname'];
         echo "<br><br><form action='payment.php' method='POST'>
              <div class='row' style='max-width: 100%; margin-left: 1px; border-top: 1px solid #373a40; border-bottom: 1px solid #373a40;'>
              <div class='col-sm-5'> 
                <img src='".$row['img']."' style='height: 300px; width: 502px; background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;' class='pimg'>
                <input type='hidden' name='img' value='".$row['img']."'/>
              </div>
              <div class='col-md-4' max-width: 100%;>
                <table>
                  <tr>
                    <input type='hidden' name='id' value='".$row['id']."'/>
                    <td style='font-size: 23px;'>Product Name: ".$row['prodname']."</td>
                    <input type='hidden' name='prodname' value='".$row['prodname']."'/>
                  </tr>
                  <tr>
                  <td><br><div class='nice-number'><p style='display: inline;'>Quantity:
                  <button type='button' class='btn btn-primary' onclick='minus()'><i class='fa fa-minus'></i></button>
                  <input type='number' value='1' id='quantity' name='quantity' style='width: 4ch;'>
                  <button type='button' class='btn btn-primary' onclick='plus()'><i class='fa fa-plus'></i></button>
                  &nbsp;&nbsp;</p><p style='display: inline; color: grey; margin-top: 5px; margin-left: -5px'>".$row['quantity']." Available Order(s)</p></div></td>
                  </tr>
                  <tr>
                    <td style='font-size: 30px; font-family: georgia; color: orange; text-shadow: 1px 1px black;'>₱".$row['price']."</td><input type='hidden' name='price' value='".$row['price']."'/>
                  </tr>
                  <tr>";
                  if($row['quantity'] !=0){
                    echo "
                    <td><br><br><button type='submit' name='submit5' id='pOrder' class='btn-info' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Place Order</button>&nbsp;
                    <p style='font-size: 12px;'><i>Note: `Please confirm your details to enable place order`</i></p>
                    </td>";
                  }else{
                    echo "
                    <td><br><br><button type='submit' class='btn-danger' style='border-radius: 4px; font-size: 20px; font-family: Cooper;' disabled>Out of Stock</button>&nbsp;
                    </td>";
                  }
                  echo "
                  </tr>
                </table>
              </div>
              ";
              if($row['quantity'] !=0){
              $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
              $result = $mysqli->query("SELECT * FROM customer WHERE username='".$_SESSION['id1']."'") or die ($mysqli->error);
              while ($row = $result->fetch_assoc()):
               echo "<div class='col-md-3' style='background-color: darkgrey; height: 450px; border: 1px solid black; box-shadow: 0px -1px 7px 2px black; border-radius: 5px;'>
              <p style='font-size: 23px; font-family: Delighted Panda; border: 1px solid black; text-align: center;'>Confirm Details</p>
              <p style='border: 1px solid black; text-align: center;'><b>Name:</b><br><input type='text' class='details' placeholder='Last Name' value='".$row['lname']."' style='width: 40%;'>
              <input type='text' class='details' placeholder='First Name' value='".$row['fname']."' style='width: 40%;'>
              <b>Age:</b><input type='text' class='details' placeholder='Age' value='".$row['age']."' style='width: 20%;'>
              <b>Sex:</b><input type='text' class='details' placeholder='Sex' value='".$row['sex']."' style='width: 30%;'>
              <b>Email Address:</b><input type='text' class='details' placeholder='Email Address' value='".$row['email']."'>
              <b>Location:</b><input type='text' class='details' placeholder='Complete Address' value='".$row['address']."'></p>
              <input type='button' class='btn btn-success' id='confirm' onclick='enablepOrder()' value='Confirm' style='width: 100%;'>
              </div>
              </div>
              </form><br>";
              endwhile;
              }
              else{
                echo "</div><br><br>";
              }

        echo '
        <div class="container">
        <div class="row">
        <div class="col-md-11" style="background-color: white; border-radius: 10px; font-family: Times New Roman;">
        <div style="background: #f5f5f5; border-radius: 5px;">';

        $mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM ratings WHERE prodname='$prodname'") or die ($mysqli->error);
        if (mysqli_num_rows($result) > 0){
        while ($row = $result->fetch_assoc()):
          echo '&nbsp;&nbsp;<img src="upload/'.$row['img'].'" style="width: 30px; height: 30px; margin-top: 5px; border-radius: 50%;">&nbsp;'.$row['username'].'<br>';
          if($row['ratedIndex'] == 1){
          echo '&nbsp
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 2){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 3){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 4){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x"></i><br>';
          }
          if($row['ratedIndex'] == 5){
          echo '&nbsp;
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i>
          <i class="fa fa-star fa-1x" style="color: yellow;"></i><br>';
          }
          echo '&emsp;&emsp;'.$row['comments'].'<hr>';
        endwhile;
        }else echo "No Reviews";
       }
    }
    }
}  

        echo '</div>
        </div>
        </div>
        </div>
        ';   
?>

<!--------------------------------------------------------------OTHER PRODUCTS------------------------------------------------->
<br><br>

<div style="background:rgba(255,255,255,0.1);" data-aos="zoom-up">
  <div class="wrapper1">
  <div class='item'>
  <?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from chicken limit 2";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

        while($row = mysqli_fetch_assoc($res)){
          echo "
    <form action='cart.php' method='POST'>
    <div style='background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;'>
    <div class='img-hover-zoom'>
    <a href='buy.php?edit=".$row['id']."' style='text-decoration: none;'>
    <center><img src='".$row['img']."' style='height: 110px; width: 170px;'>
    </a>
    <h5><i>".$row['prodname']."</i></h5><br>
    <p>Php".$row['price']."</p>
    <a href='buy.php?edit=".$row['id']."' style='text-decoration: none;'><button type='button' class='btn-warning'>Buy</button>&nbsp;</a>
    <input type='hidden' name='id' value='".$row['id']."'/>
    <input type='hidden' name='img' value='".$row['img']."'>
    <input type='hidden' name='prodname' value='".$row['prodname']."'>
    <input type='hidden' name='price' value='".$row['price']."'>
    <button type='submit' name='add' class='btn-success'>Add to Cart</button></center><br>
    </div></form></div>";
  }
  }else{
      echo "<h2>No Record Found</h2>";
      echo "<a href = index.php target = right>BACK</a>";
    }
  }
  ?>
  </div>

  <div class='item'>
  <?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from pasta limit 2";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

        while($row = mysqli_fetch_assoc($res)){
          echo "
    <form action='cart.php' method='POST'>
    <div style='background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;'>
    <div class='img-hover-zoom'>
    <a href='buy.php?edit1=".$row['id']."' style='text-decoration: none;'>
    <center><img src='".$row['img']."' style='height: 110px; width: 170px;'>
    </a>
    <h5><i>".$row['prodname']."</i></h5><br>
    <p>Php".$row['price']."</p>
    <a href='buy.php?edit1=".$row['id']."' style='text-decoration: none;'><button type='button' class='btn-warning'>Buy</button>&nbsp;</a>
    <input type='hidden' name='id' value='".$row['id']."'/>
    <input type='hidden' name='img' value='".$row['img']."'>
    <input type='hidden' name='prodname' value='".$row['prodname']."'>
    <input type='hidden' name='price' value='".$row['price']."'>
    <button type='submit' name='add1' class='btn-success'>Add to Cart</button></center><br>
    </div></form></div>";
  }
  }else{
      echo "<h2>No Record Found</h2>";
      echo "<a href = index.php target = right>BACK</a>";
    }
  }
  ?>
    </div>

  <div class='item'>
  <?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from pork limit 2";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

        while($row = mysqli_fetch_assoc($res)){
          echo "
    <form action='cart.php' method='POST'>
    <div style='background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;'>
    <div class='img-hover-zoom'>
    <a href='buy.php?edit2=".$row['id']."' style='text-decoration: none;'>
    <center><img src='".$row['img']."' style='height: 110px; width: 170px;'>
    </a>
    <h5><i>".$row['prodname']."</i></h5><br>
    <p>Php".$row['price']."</p>
    <a href='buy.php?edit2=".$row['id']."' style='text-decoration: none;'><button type='button' class='btn-warning'>Buy</button>&nbsp;</a>
    <input type='hidden' name='id' value='".$row['id']."'/>
    <input type='hidden' name='img' value='".$row['img']."'>
    <input type='hidden' name='prodname' value='".$row['prodname']."'>
    <input type='hidden' name='price' value='".$row['price']."'>
    <button type='submit' name='add2' class='btn-success'>Add to Cart</button></center><br>
    </div></form></div>";
  }
  }else{
      echo "<h2>No Record Found</h2>";
      echo "<a href = index.php target = right>BACK</a>";
    }
  }
  ?>
    </div>

<div class='item'>
  <?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from burger limit 2";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

        while($row = mysqli_fetch_assoc($res)){
          echo "
    <form action='cart.php' method='POST'>
    <div style='background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;'>
    <div class='img-hover-zoom'>
    <a href='buy.php?edit3=".$row['id']."' style='text-decoration: none;'>
    <center><img src='".$row['img']."' style='height: 110px; width: 170px;'>
    </a>
    <h5><i>".$row['prodname']."</i></h5><br>
    <p>Php".$row['price']."</p>
    <a href='buy.php?edit3=".$row['id']."' style='text-decoration: none;'><button type='button' class='btn-warning'>Buy</button>&nbsp;</a>
    <input type='hidden' name='id' value='".$row['id']."'/>
    <input type='hidden' name='img' value='".$row['img']."'>
    <input type='hidden' name='prodname' value='".$row['prodname']."'>
    <input type='hidden' name='price' value='".$row['price']."'>
    <button type='submit' name='add3' class='btn-success'>Add to Cart</button></center><br>
    </div></form></div>";
  }
  }else{
      echo "<h2>No Record Found</h2>";
      echo "<a href = index.php target = right>BACK</a>";
    }
  }
  ?>
</div>

<div class='item'>
  <?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from beef limit 2";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

        while($row = mysqli_fetch_assoc($res)){
          echo "
    <form action='cart.php' method='POST'>
    <div style='background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;'> 
    <div class='img-hover-zoom'>
    <a href='buy.php?edit4=".$row['id']."' style='text-decoration: none;'>
    <center><img src='".$row['img']."' style='height: 110px; width: 170px;'>  
    </a>
    <h5><i>".$row['prodname']."</i></h5><br>
    <p>Php".$row['price']."</p>
    <a href='buy.php?edit4=".$row['id']."' style='text-decoration: none;'><button type='button' class='btn-warning'>Buy</button>&nbsp;</a>
    <input type='hidden' name='id' value='".$row['id']."'/>
    <input type='hidden' name='img' value='".$row['img']."'>
    <input type='hidden' name='prodname' value='".$row['prodname']."'>
    <input type='hidden' name='price' value='".$row['price']."'>
    <button type='submit' name='add4' class='btn-success'>Add to Cart</button></center><br>
    </div></form></div>";
  }
  }else{
      echo "<h2>No Record Found</h2>";
      echo "<a href = index.php target = right>BACK</a>";
    }
  }
  ?>
</div>

<div class='item'>
  <?php

    $conn = new mysqli('localhost', 'root', '', 'projweb');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from chicken limit 6, 2";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

        while($row = mysqli_fetch_assoc($res)){
          echo "
    <form action='cart.php' method='POST'>
    <div style='background-color: grey; box-shadow: 5px 5px 5px black; border-radius: 5px;'>  
    <div class='img-hover-zoom'>
    <a href='buy.php?edit=".$row['id']."' style='text-decoration: none;'>
    <center><img src='".$row['img']."' style='height: 110px; width: 170px;'>
    </a> 
    <h5><i>".$row['prodname']."</i></h5><br>
    <p>Php".$row['price']."</p>
    <a href='buy.php?edit=".$row['id']."' style='text-decoration: none;'><button type='button' class='btn-warning'>Buy</button>&nbsp;</a>
    <input type='hidden' name='id' value='".$row['id']."'/>
    <input type='hidden' name='img' value='".$row['img']."'>
    <input type='hidden' name='prodname' value='".$row['prodname']."'>
    <input type='hidden' name='price' value='".$row['price']."'>
    <button type='submit' name='add' class='btn-success'>Add to Cart</button></center><br>
    </div></form></div>";
  }
  }else{
      echo "<h2>No Record Found</h2>";
      echo "<a href = index.php target = right>BACK</a>";
    }
  }
  ?>
</div>

  </div><br>
  <center><a href="more.php"><input class="btn btn-primary" type="button" name="more" value="View All"></a></center><br>

</div>
</div><br><br>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function enablepOrder() {
            document.getElementById("pOrder").disabled = false;
            document.getElementById('confirm').style.background = 'grey';
}

function minus() {

  var a = $("#quantity").val();
  var num = parseInt(a);
  var b = $("#origPrice").val();
  var price = parseFloat(b);
  
  if(num < 1){
    num = 0;
  }
  else{
    num--;
    var fprice = price * num;
  }

  $("#quantity").val(num);
  $("#sTotal").val(fprice);
  $("#subtotal").text(fprice.toFixed(2));

}

function plus(){

  var a = $("#quantity").val();
  var num = parseInt(a);
  var b = $("#origPrice").val();
  var price = parseFloat(b);

  num++;
  var fprice = price * num;
  $("#quantity").val(num);
  $("#sTotal").val(fprice);
  $("#subtotal").text(fprice.toFixed(2));

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