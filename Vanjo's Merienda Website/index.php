<?php
session_start();

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
  border-radius: 5px;
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
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-aos="fade-down-right">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="height: 500px; ">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/vm.gif" alt="First slide" style="height: 100%;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="sale/sale1.jpg" alt="Second slide" style="height: 100%;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/slide1.jpg" alt="Third slide" style="height: 100%;">
    </div>
  </div>
</div>
<br><br>

<!-- Sample-->
<div class="g-row md justify-content-center">

  <div class="column">
<div class="container vc">
  <img id="vc" data-aos="fade-right" style="background: url('img/burger.jpg'); background-size: cover; border-radius: 50%; box-shadow: 8px 8px 8px black; padding: 10px; margin-bottom: 10px; " width="200" height="200">
  
  <a href="burger.php" class="vc"><div class="overlay">
    <div class="text"><b>BURGER</b></div>
  </div></a>

</div>
</div>

  <div class="column">
<div class="container vc">
  <img class="vc" data-aos="fade-center" style="background: url('img/pork.jpg'); background-size: cover; border-radius: 50%; box-shadow: 8px 8px 8px black; padding: 10px; margin-bottom: 10px;" width="200" height="200">

  <a href="pork.php" class="vc"><div class="overlay">
    <div class="text"><b>PORK</b></div>
  </div></a>

</div>
</div>

  <div class="column vc">
<div class="container">
  <img class="vc" data-aos="fade-left" style="background: url('img/chicken.jpeg'); background-size: cover; border-radius: 50%; box-shadow: 8px 8px 8px black; padding: 10px; margin-bottom: 10px;" width="200" height="200">
  
  <a href="chicken.php" class="vc"><div class="overlay">
    <div class="text"><b>CHICKEN</b></div>
  </div></a>

</div>
</div>

</div>
<!-- End of Sample-->


<br><br>

<div class="g-row justify-content-center">

<div class="g-column" data-aos="fade-left" style="height: 400px; border: solid black 2px; border-radius: 20px; background: url('img/announcement.jpg'); background-size: cover; background-position: center; box-shadow: 8px 8px 8px;">
<p style="font-family: Courier New; font-size: 11px; text-align: center; margin-left: 5%; margin-top: 20%;"><i>Are you looking for delicious<br>food? Just explore Vanjo's<br>Merienda</i> &#10084;</p>
<p style="font-family: Courier New; font-size: 11px; text-align: center; margin-left: 5%; margin-top: 5%;"><i>Vanjo's Merienda makes<br>you satisfied</i> &#10084;</p>
<p style="font-family: Courier New; font-size: 11px; text-align: center; margin-left: 5%; margin-top: 5%;"><i>We are offering best treats<br>for your merienda cravings!!!</i></p>
<p style="font-family: Courier New; font-size: 11px; text-align: center; margin-left: 5%; margin-top: 5%;"><i>Ready to serve you<br>as soon as possible</i></p>
</div>&nbsp;

</div>
<br> 
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

<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>
</html>