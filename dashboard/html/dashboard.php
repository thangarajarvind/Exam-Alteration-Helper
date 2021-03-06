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
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <style>
    .logoutLblPos{

        position:fixed;
        right:40px;
        top:25px;
     }
    </style>
<script type="text/javascript">
    window.history.forward();
    function noBack()
    {
        window.history.forward();
    }
</script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, severny admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, severny design, severny dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Severny is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Faculty Dashboard</title>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin1" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="relative" data-boxed-layout="full">
        <div class="app-container" data-navbarbg="skin1"></div>

        <header class="topbar" data-navbarbg="skin1">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                   <div>
                       </div><datagrid></datagrid>> 

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin1">
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav w-100 align-items-center">
                        <li class="nav-item ml-0 ml-md-3 ml-lg-0">
                            <a class="nav-link search-bar" href="javascript:void(0)">
                                <form class="my-2 my-lg-0">
                                    <div class="customize-input customize-input-v4">
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logoutLblPos">
                    <button type="button"  class="btn btn-light btn-rounded btn-fw"><a  href="../../login/html/index.html"> Logout </a></button>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="user-profile text-center pt-2">
                <div class="d-flex align-items-center justify-content-center pb-3">
                    <div class="dropdown sub-dropdown">
                        <button class="btn profile-pic rounded-circle position-relative" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="badge rounded-circle badge-success profile-dd text-center"><i
                                    class="fas fa-angle-down"></i></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-circle text-success font-12 mr-2"></i>
                                Available
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-circle text-warning font-12 mr-2"></i>
                                In Class
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-circle text-danger font-12 mr-2"></i>
                                On Duty
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-circle text-muted font-12 mr-2"></i>
                                Absent
                            </a>
                        </div>
                    </div>
                </div>
                <div class="profile-section">
                    <?php
                    echo '<p class="font-weight-light mb-0 font-18">'.ucfirst($name).'</p>
                    <span class="op-8 font-14">DEPT : '.strtoupper($row['dep']).'</span>
                    <div></div>
                    <span class="op-7 font-14">DESIGNATION : '.strtoupper($row1['dsgn']).' </span>
                    <div class="row border-top border-bottom mt-3 no-gutters">';
                    ?>
                        
                    </div>
                </div>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap"><span class="hide-menu">Pages</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="dashboard.php" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="pages-profile.php" aria-expanded="false">
                                <i data-feather="users" class="feather-icon"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        
                        
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="changepassword.php" aria-expanded="false">
                                <i data-feather="lock" class="feather-icon"></i>
                                <span class="hide-menu">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <?php
                        echo '<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Hello '.ucfirst($name).'!</h3>';
                        ?>
                        
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                    <?php
                        
                            echo '<table class="table table-hover table-bordered table-striped">
                                <thead>';
                                echo '<h3 style="text-align:center">Timetable</h3>';
                                    echo '<tr>
                                        <th scope="col">Class/Day</th>
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
                                    $sql = "SELECT day,p1,p2,p3,p4,p5,p6 FROM $name";
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
                                    return $c;
                                    }
                                ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
          </div>
              <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>