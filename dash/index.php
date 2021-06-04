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
    $_SESSION['name'] = $name;
    $empty = 0;

    $conn = mysqli_connect("localhost", "root", "", "timetable");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM $name WHERE day='Friday'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $nan = $row["p1"];
      }
    }
    if($nan == 'nan'){
      $empty = $empty+1;
    }
?>
<script>
    function printPageArea(areaID){
      var printContents = document.getElementById(areaID).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>
<script src="../js/jquery-3.6.0.min.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Faculty</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" sizes="32x32"/>
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
        <a class="navbar-nav" href="cindex.php"><img src="images/logo.png" /></a>
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
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="icon-ellipsis"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="javascript:void(0);" onclick="printPageArea('printableArea')" data-title="Print">
              <div class="logoutLblPos">
                <i class="ti-printer text-primary"></i>
                Print TT
              </div>
              </a>
            <a class="dropdown-item" href="../../login/html/index.html">
              <div class="logoutLblPos">
                <i class="ti-power-off text-primary"></i>
                Logout
              </div>
              </a>
              <?php
              if($empty == 1){
                echo '<a class="dropdown-item" href="html/uploadtimetableStart.php">
                <div class="logoutLblPos">
                  <i class="ti-marker-alt text-primary"></i>
                  Feed Timetable
                </div>
                </a>';
              }
              ?>
            </div>
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
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Timetable</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/profile.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/duty.php">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Duty list</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/timetableedit.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Edit TT</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/ctt.php">
              <i class="icon-globe menu-icon"></i>
              <span class="menu-title">Collegue TT</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/TT_change_req.html">
              <i class="ti-exchange-vertical menu-icon"></i>
              <span class="menu-title">Change request</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/reqstatus.php">
              <i class="ti-signal menu-icon"></i>
              <span class="menu-title">Request Status</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="html/chpass.php">
              <i class="ti-pencil-alt menu-icon"></i>
              <span class="menu-title">Change Password</span>
            </a>
          </li>          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

        <div id="printableArea">
        <div class="col-12">
        
                <div class="card">
                    <div class="table-responsive">
                    <?php
                            echo '<table class="table table-hover table-bordered table-striped">
                                <thead>';
                                echo '<br>';
                                echo '<h3 style="text-align:center">Timetable</h3>';
                                echo '<br>';
                                    echo '<tr>
                                        <th scope="col">Day\Class</th>
                                        <th scope="col">1</th>
                                        <th scope="col">2</th>
                                        <th scope="col">3</th>
                                        <th scope="col">4</th>
                                        <th scope="col">5</th>
                                        <th scope="col">6</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    $conn = mysqli_connect("localhost", "root", "", "timetable");
                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    $sql = "SELECT day,p1,p2,p3,p4,p5,p6 FROM $name order by FIELD(day, 'Monday','Tuesday','Wednesday','Thursday','Friday') ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    $day = $row["day"];
                                    $x1 = $row["p1"];
                                    $x2 = $row["p2"];
                                    $x3 = $row["p3"];
                                    $x4 = $row["p4"];
                                    $x5 = $row["p5"];
                                    $x6 = $row["p6"];
                                    
                                    if($day == 'Monday'){
                                        $c1 = colour($x1);
                                        $c2 = colour($x2);
                                        $c3 = colour($x3);
                                        $c4 = colour($x4);
                                        $c5 = colour($x5);
                                        $c6 = colour($x6);
                                        echo "<tr><th scope='row'>Monday</th>
                                        <td class='" .$c1. "'>" . $row["p1"] . "</td>
                                        <td class='" .$c2. "'>" . $row["p2"] ."</td>
                                        <td class='" .$c3. "'>" . $row["p3"] ."</td>
                                        <td class='" .$c4. "'>" . $row["p4"] ."</td>
                                        <td class='" .$c5. "'>" . $row["p5"] ."</td>
                                        <td class='" .$c6. "'>" . $row["p6"] ."</td>
                                        </tr>";
                                    }
                                    if($day == 'Tuesday'){
                                        $c1 = colour($x1);
                                        $c2 = colour($x2);
                                        $c3 = colour($x3);
                                        $c4 = colour($x4);
                                        $c5 = colour($x5);
                                        $c6 = colour($x6);
                                        echo "<tr><th scope='row'>Tuesday</th>
                                        <td class='" .$c1. "'>" . $row["p1"] . "</td>
                                        <td class='" .$c2. "'>" . $row["p2"] ."</td>
                                        <td class='" .$c3. "'>" . $row["p3"] ."</td>
                                        <td class='" .$c4. "'>" . $row["p4"] ."</td>
                                        <td class='" .$c5. "'>" . $row["p5"] ."</td>
                                        <td class='" .$c6. "'>" . $row["p6"] ."</td>
                                        </tr>";
                                    }
                                    if($day == 'Wednesday'){
                                        $c1 = colour($x1);
                                        $c2 = colour($x2);
                                        $c3 = colour($x3);
                                        $c4 = colour($x4);
                                        $c5 = colour($x5);
                                        $c6 = colour($x6);
                                        echo "<tr><th scope='row'>Wednesday</th>
                                        <td class='" .$c1. "'>" . $row["p1"] . "</td>
                                        <td class='" .$c2. "'>" . $row["p2"] ."</td>
                                        <td class='" .$c3. "'>" . $row["p3"] ."</td>
                                        <td class='" .$c4. "'>" . $row["p4"] ."</td>
                                        <td class='" .$c5. "'>" . $row["p5"] ."</td>
                                        <td class='" .$c6. "'>" . $row["p6"] ."</td>
                                        </tr>";
                                    }
                                    if($day == 'Thursday'){
                                        $c1 = colour($x1);
                                        $c2 = colour($x2);
                                        $c3 = colour($x3);
                                        $c4 = colour($x4);
                                        $c5 = colour($x5);
                                        $c6 = colour($x6);
                                        echo "<tr><th scope='row'>Thursday</th>
                                        <td class='" .$c1. "'>" . $row["p1"] . "</td>
                                        <td class='" .$c2. "'>" . $row["p2"] ."</td>
                                        <td class='" .$c3. "'>" . $row["p3"] ."</td>
                                        <td class='" .$c4. "'>" . $row["p4"] ."</td>
                                        <td class='" .$c5. "'>" . $row["p5"] ."</td>
                                        <td class='" .$c6. "'>" . $row["p6"] ."</td>
                                        </tr>";
                                    }
                                    if($day == 'Friday'){
                                        $c1 = colour($x1);
                                        $c2 = colour($x2);
                                        $c3 = colour($x3);
                                        $c4 = colour($x4);
                                        $c5 = colour($x5);
                                        $c6 = colour($x6);
                                        echo "<tr><th scope='row'>Friday</th>
                                        <td class='" .$c1. "'>" . $row["p1"] . "</td>
                                        <td class='" .$c2. "'>" . $row["p2"] ."</td>
                                        <td class='" .$c3. "'>" . $row["p3"] ."</td>
                                        <td class='" .$c4. "'>" . $row["p4"] ."</td>
                                        <td class='" .$c5. "'>" . $row["p5"] ."</td>
                                        <td class='" .$c6. "'>" . $row["p6"] ."</td>
                                        </tr>";
                                    }
                                    }
                                    echo "</table>";
                                    } else { echo "0 results"; }
                                    $conn->close();
                                    function colour($p){
                                    if($p == 'Available'){
                                        $c = 'table-success';
                                    }
                                    if($p == 'In-Class'){
                                        $c = 'table-primary';
                                    }
                                    if($p == 'On-Duty'){
                                        $c = 'table-danger';
                                    }
                                    if($p == 'nan'){
                                      $c = 'table-warning';

                                  }
                                    return $c;
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
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->

  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

