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
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            </a>
          </li>
          
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
            </a>
          </li>
        </ul>
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
            <div class="col-md-4 col-md-offset-1">
                <div class="card">
                    <div class="card-body">
                    <br>
                    <h3 class="text-primary">Profile overview</h3>
                    <?php
                        echo '<br>';
                        echo '<small class="text-muted">Name</small><h5>'.ucfirst($name).'</h5>';
                        echo '<small class="text-muted">Department</small><h5>'.strtoupper($row['dep']).'</h5>';
                        echo '<small class="text-muted">Designation</small><h5>'.strtoupper($row1['dsgn']).'</h5>';
                        echo'
                        <br>
                        <small class="text-muted">Email address</small><h6>'.$row['email'].'</h6> 
                        <small class="text-muted pt-4 db">Phone</small><h6>'.$row['mno'].'</h6> 
                        <small class="text-muted pt-4 db">Address</small><h6>'.$row1['adr'].'-'.$row1['pin'].'</h6>
                        <br />';
                        ?>
                    </div>
                </div>
                </div>
            
            <div class="col-md-5 grid-margin">
                <div class="card">  
                        <div class="card-body">
                        <br>
                        <h3 class="text-primary">Edit Profile</h3>
                        <br>
                            <form class="form-horizontal form-material" action="../php/updateprofile.php" method="POST">
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" name="name" 
                                                class="form-control form-control-line">
                                            </div>
                                    </div>
                                        <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="" name="email"
                                                class="form-control form-control-line" name="example-email"
                                                id="example-email">
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Phone No</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="" name="mno"
                                                    class="form-control form-control-line">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Designation</label>
                                                <div class="col-md-12">
                                                    <select type="text" id="des" placeholder="" name="des"
                                                        class="form-control form-control-line">
                                                        <option value="Select">Select</option>
                                                        <option value="Professor">Professor</option>
                                                        <option value="Asst. Professor">Asst. Professor</option>
                                                        <option value="Lecturer">Lecturer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="addr"
                                                        class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Pincode</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="" name="pin"
                                                        class="form-control form-control-line">
                                                </div>
                                            </div>
                                            
                                            <button class="btn btn-success">Update Profile</button>
                                                
                                        </form>
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

