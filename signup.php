<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="icon" type="image/png" href="img/logo1.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <meta name="author" content="sumit kumar"> 
  <title>Sign Up</title> 
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
  <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
<style>
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background-color: #393e46;
  background-size: contain;
  background-repeat: no-repeat;
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

@media screen and (max-width: 800px) {
  .head{
    display: none;
  }
}


/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
</style>
</head>

<body>
  
<?php 

session_start();
include('config.php');
$mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));

if(isset($_POST['submit'])){

  $username = $_POST['username'];
  $password = $_POST['password'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];
  $sex = $_POST['sex'];
  $email = $_POST['email'];
  $address = $_POST['address'];


  $name = $_FILES['img']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["img"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $mysqli->query("insert into customer (username, password, fname, lname, 
     age, sex, email, address, img) values('$username', '$password', '$fname', '$lname', '$age', '$sex',
     '$email', '$address', '".$name."')") or die ($mysqli->error);
  
     // Upload file
     move_uploaded_file($_FILES['img']['tmp_name'],$target_dir.$name); 

    echo '<script type = "text/javascript">';
    echo 'alert("Data has been recorded!");'; 
    echo 'window.location.href = "login.php";';
    echo '</script>';
  }
}



?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-sm-8 col-md-7 col-lg-4 mx-auto">
        <div class="card card-signin my-4" style="background: linear-gradient(to right, #ffd57e, lightblue);">
          <div class="card-body">
            <center><a href="index1.php" class="navbar-brand">&nbsp;&nbsp;<img src="img/logo1.png" class="center" style="height: 115px; width: 120px; background: #35404f; border-radius: 60px; margin-top: -75px;"></a></center>
            <hr class="my-4">
            <h5 class="card-title text-center" style="margin-left: -15px;">Sign Up</h5>
            <hr class="my-4">
            <form class="form-signin">
              <div class="form-label-group">
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUsername">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="fname" id="inputFirstName" class="form-control" placeholder="First Name" required>
                <label for="inputFirstName">First Name</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="lname" id="inputLastName" class="form-control" placeholder="Last Name" required>
                <label for="inputLastName">Last Name</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="age" id="inputAge" class="form-control" placeholder="Age" required>
                <label for="inputAge">Age</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="sex" id="inputSex" class="form-control" placeholder="Sex" required>
                <label for="inputSex">Sex</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
                <label for="inputEmail">Email</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="address" id="inputAddress"class="form-control" placeholder="Address" required>
                <label for="inputAddress">Address</label>
              </div>

              <div class="form-label-group">
                <input type="file" name="img" required>
              </div>
              <center>
              <button class="btn btn-lg btn-primary text-uppercase" name="submit" type="submit" style="width: 110px; font-size: 15px;">Submit</button>
              <a href="login.php" class="btn btn-lg btn-primary text-uppercase" style="width: 110px; font-size: 15px;">Back</a>
              </center>
              <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>


</body>
</html>