<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a class="simple-text logo-normal">
      Admin
    </a></div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item   ">
              <a class="nav-link" href="./dashboard.html">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./user.html">
                <i class="material-icons">person</i>
                <p>User Profile</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./tables.html">
                <i class="material-icons">content_paste</i>
                <p>Activity/Faculty List</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./allocation.php">
                <i class="material-icons">library_books</i>
                <p>Duty Allocation</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./searchtimetable.html">
                <i class="material-icons">calendar_today</i>
                <p>Timetable</p>
              </a>
            </li>
            <li class="nav-item active ">
              <a class="nav-link" href="./status.php">
                <i class="material-icons">done_all</i>
                <p>Status</p>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./adduser.html">
              <i class="material-icons">person_add</i>
              <p>Add User</p>
            </a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="./changepassword.html">
                <i class="material-icons">vpn_key</i>
                <p>Change Password</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand">Status</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">3</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your request</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You have 1 unsolved issue</a>
                  <!--<a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                  -->
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <form name="myform" action="../php/status.php" method="GET"></form>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Status</h4>
                  <p class="card-category">This table shows user status</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                      </thead>
                      <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "se");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT id,name,status FROM work";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          $c = $row["status"];
                          if($c == 2){
                            $c_code = "fa fa-circle text-warning";
                            $c_txt = "In class";
                          }
                          if($c == 3){
                            $c_code = "fa fa-circle text-dark";
                            $c_txt = "Absent";
                          }
                          if($c == 0){
                            $c_code = "fa fa-circle text-success";
                            $c_txt = "Available";
                          }
                          if($c == 1){
                            $c_code = "fa fa-circle text-danger";
                            $c_txt = "In duty";
                          }
                          echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td>". "<td class='border-top-0 text-center'><i class=' . $c_code . ' data-toggle='tooltip' data-placement='top' title=' $c_txt '></i>" . "</td></tr>";
                        }
                        echo "</table>";
                        } else { echo "0 results"; }
                        $conn->close();
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
            if($work==1)
            document.write("available<br />");
            if($work==2)
            document.write("inClass<br />");
            if($work==3)
            document.write("absent<br />");
            if($work==4)
            document.write("inDuty<br />");
            </script>
</body>
</html>