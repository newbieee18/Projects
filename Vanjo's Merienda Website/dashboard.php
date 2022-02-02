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
    Dashboard
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>

<body class="">
  <div class="wrapper">
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
          <li class="active ">
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
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
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
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Monthly Sales</h5>
                <p class="card-category">From January 2020 to December 2020 </p>
              </div>
              <div class="card-body">
                <canvas id="myChart"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href='dashboard.php'><i class="fa fa-history"></i></a>Refresh
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Ratings</h5>
                <p class="card-category">Overall Ratings</p>
              </div>
              <div class="card-body ">
                <?php 
                    $conn = new mysqli('localhost', 'root', '', 'projweb');
                    if($conn->connect_error){
                      echo 'Connection Failed: '.$conn->connect_error;
                    }
                    $sql="SELECT AVG(ratedIndex) as rAve, COUNT(username) as users FROM ratings";
                    if($res = mysqli_query($conn, $sql)){
                    if (mysqli_num_rows($res) > 0){

                      while($row = mysqli_fetch_assoc($res)){

                        echo "<p style='font-family: Cooper; font-size: 30px; text-align: center;'>".number_format($row['rAve'], 1)."<i class='fa fa-star' style='color: yellow;'></i></p>";
                        echo "<p style='color: lightgrey; text-align: center;'>Total Responses: ".$row['users']." User(s)</p>";
                      }
                    }
                    }
                ?>
              </div>
              <div class="card-footer">
                  <hr>
                  <div class="stats">
                  <a href='dashboard.php'><i class="fa fa-history"></i></a>Refresh
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Sale Per Categories</h5>
              </div>
              <div class="card-body ">
                <canvas id="myChart1"></canvas>
              </div>
              <div class="card-footer">
                  <hr>
                  <div class="stats">
                  <a href='dashboard.php'><i class="fa fa-history"></i></a>Refresh
                  </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>

<?php 


$mysqli = new mysqli('localhost', 'root', '', 'projweb') or die (mysqli_error($mysqli));

$result16 = $mysqli->query("SELECT COUNT(*) as pork FROM pork") or die ($mysqli->error);
$result15 = $mysqli->query("SELECT COUNT(*) as beef FROM beef") or die ($mysqli->error);
$result14 = $mysqli->query("SELECT COUNT(*) as chicken FROM chicken") or die ($mysqli->error);
$result13 = $mysqli->query("SELECT COUNT(*) as pasta FROM pasta") or die ($mysqli->error);
$result12 = $mysqli->query("SELECT COUNT(*) as burger FROM burger") or die ($mysqli->error);

$result11 = $mysqli->query("SELECT COUNT(*) as january FROM orders WHERE date>='2020-01-01' AND date<='2020-01-31'") or die ($mysqli->error);
$result10 = $mysqli->query("SELECT COUNT(*) as february FROM orders WHERE date>='2020-02-01' AND date<='2020-02-31'") or die ($mysqli->error);
$result9 = $mysqli->query("SELECT COUNT(*) as march FROM orders WHERE date>='2020-03-01' AND date<='2020-03-31'") or die ($mysqli->error);
$result8 = $mysqli->query("SELECT COUNT(*) as april FROM orders WHERE date>='2020-04-01' AND date<='2020-04-31'") or die ($mysqli->error);
$result7 = $mysqli->query("SELECT COUNT(*) as may FROM orders WHERE date>='2020-05-01' AND date<='2020-05-31'") or die ($mysqli->error);
$result6 = $mysqli->query("SELECT COUNT(*) as june FROM orders WHERE date>='2020-06-01' AND date<='2020-06-31'") or die ($mysqli->error);
$result5 = $mysqli->query("SELECT COUNT(*) as july FROM orders WHERE date>='2020-07-01' AND date<='2020-07-31'") or die ($mysqli->error);
$result4 = $mysqli->query("SELECT COUNT(*) as august FROM orders WHERE date>='2020-08-01' AND date<='2020-08-31'") or die ($mysqli->error);
$result3 = $mysqli->query("SELECT COUNT(*) as september FROM orders WHERE date>='2020-09-01' AND date<='2020-09-31'") or die ($mysqli->error);
$result2 = $mysqli->query("SELECT COUNT(*) as october FROM orders WHERE date>='2020-10-01' AND date<='2020-10-31'") or die ($mysqli->error);
$result1 = $mysqli->query("SELECT COUNT(*) as november FROM orders WHERE date>='2020-11-01' AND date<='2020-11-31'") or die ($mysqli->error);
$result = $mysqli->query("SELECT COUNT(*) as december FROM orders WHERE date>='2020-12-01' AND date<='2020-12-31'") or die ($mysqli->error);
  $date=mysqli_fetch_assoc($result);
  $date1=mysqli_fetch_assoc($result1);
  $date2=mysqli_fetch_assoc($result2);
  $date3=mysqli_fetch_assoc($result3);
  $date4=mysqli_fetch_assoc($result4);
  $date5=mysqli_fetch_assoc($result5);
  $date6=mysqli_fetch_assoc($result6);
  $date7=mysqli_fetch_assoc($result7);
  $date8=mysqli_fetch_assoc($result8);
  $date9=mysqli_fetch_assoc($result9);
  $date10=mysqli_fetch_assoc($result10);
  $date11=mysqli_fetch_assoc($result11);
  $pork=mysqli_fetch_assoc($result12);
  $beef=mysqli_fetch_assoc($result13);
  $chicken=mysqli_fetch_assoc($result14);
  $pasta=mysqli_fetch_assoc($result15);
  $burger=mysqli_fetch_assoc($result16);

?>


<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Sales',
            backgroundColor: ['#00FFFF', '#C0C0C0', '#0000FF', '#FFA500', '#800080', '#FFFF00', '#00FF00', '#FF00FF', '#A52A2A', '#95B9C7', '#F5F5DC', '#FFCBA4'], 
            borderColor: '#000000', 
            data: [<?php echo $date11['january']; ?>, <?php echo $date10['february']; ?>, <?php echo $date9['march']; ?>, <?php echo $date8['april']; ?>, <?php echo $date7['may']; ?>, <?php echo $date6['june']; ?>, <?php echo $date5['july']; ?>, <?php echo $date4['august']; ?>, <?php echo $date3['september']; ?>, <?php echo $date2['october']; ?>, <?php echo $date1['november']; ?>, <?php echo $date['december']; ?>]
        }]
    },

    // Configuration options go here
    options: {}
});

</script>

<script>
var ctx1 = document.getElementById('myChart1').getContext('2d');
var chart1 = new Chart(ctx1, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Pork', 'Beef', 'Pasta', 'Burger', 'Chicken'],
        datasets: [{
            label: 'Sales',
            backgroundColor: ['#00FFFF', '#C0C0C0', '#0000FF', '#FFA500', '#800080'], 
            borderColor: '#000000', 
            data: [<?php echo $date11['january']; ?>, <?php echo $date10['february']; ?>, <?php echo $date9['march']; ?>, <?php echo $date8['april']; ?>, <?php echo $date7['may']; ?>]
        }]
    },

    // Configuration options go here
    options: {}
});

</script>


      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,  <i class="fa fa-heart heart"></i> JGM TECH
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
  <script src=".dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
