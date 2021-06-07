<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    session_start();
    $id = $_SESSION['id'];
    $conn = new mysqli ("localhost", "root", "", "se");
    $result = mysqli_query($conn,"SELECT * FROM register where id='$id'");
    $row = mysqli_fetch_assoc($result);
    $result = mysqli_query($conn,"SELECT * FROM details where id='$id'");
    $row1 = mysqli_fetch_assoc($result);
    $name = $row['name'];

?>
<script src="../js/jquery-3.6.0.min.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Faculty</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <style>
    .navbar-nav {
        position: relative;
        width: 38px;
      }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-nav" href="cindex.php"><img src="../images/logo.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="cindex.php"><img src="images/logo-mini.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        </button>
        
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Timetable</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="duty.php">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Duty list</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="timetableedit.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Edit TT</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ctt.php">
              <i class="icon-globe menu-icon"></i>
              <span class="menu-title">Collegue TT</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="TT_change_req.html">
              <i class="ti-exchange-vertical menu-icon"></i>
              <span class="menu-title">Change request</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reqstatus.php">
              <i class="ti-signal menu-icon"></i>
              <span class="menu-title">Request Status</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="chpass.php">
              <i class="ti-pencil-alt menu-icon"></i>
              <span class="menu-title">Change Password</span>
            </a>
          </li>          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">            
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Duty Monitor</h3>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>  
                          <th>Hour</th>
                          <th>Status</th>
                          <th>Room Number</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      
                        $conn = mysqli_connect("localhost", "root", "", "timetable");
                        date_default_timezone_set("Asia/Calcutta");
                        $time = date("H:i:sa");
                        $day = date("l");

                        $time = substr($time,0,2);
                        $time = (int)$time;

                        $valid = 0;
                        $hour = '';

                        #Change this to manual access time and day
                        $time = 9;
                        $day = 'Tuesday';

                        if($time == 9){
                            $hour = 'p1';
                            $valid = $valid+1;
                        }
                        if($time == 10){
                            $hour = 'p2';
                            $valid = $valid+1;
                        }
                        if($time == 11){
                            $hour = 'p3';
                            $valid = $valid+1;
                        }
                        if($time == 12){
                            $hour = 'p4';
                            $valid = $valid+1;
                        }
                        if($time == 14){
                            $hour = 'p5';
                            $valid = $valid+1;
                        }
                        if($time == 15){
                            $hour = 'p6';
                            $valid = $valid+1;
                        }
                        if($time == 13){
                            $hour = 'lunch';
                        }
                        if($valid == 1){
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM $name WHERE day='$day'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();

                            $present = $row[$hour];
                            if($present != 'On-Duty'){
                                echo "<tr><td>". $hour ."</td><td><label class='badge badge-success'>" . $present. "</label></td><td>-</td></label></tr>";
                            }
                            else{
                                $conn1 = mysqli_connect("localhost", "root", "", "se");
                                $sql = "SELECT * FROM work WHERE id='$id'";
                                $result1 = $conn1->query($sql);
                                $row1 = $result1->fetch_assoc();
                                $room = $row1['room'];
                                echo "<tr><td>". $hour ."</td><td><label class='badge badge-danger'>" . $present. "</label></td><td>". $room ."</td></label></tr>";
                            }
                        }
                        else{
                            echo "<tr><td>-</td><td><label class='badge badge-success'>-</label></td><td>-</td></label></tr>";
                        }

                        
                        function pop ($l,$m,$t){
                            echo '<script src="../login/js/jquery-3.6.0.min.js"></script>';
                            echo '<script src="../login/js/sweetalert2.all.min.js"></script>';
                            echo '<script type="text/javascript">';
                            echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
                            echo '},100);</script>';
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->

  <script src="../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

