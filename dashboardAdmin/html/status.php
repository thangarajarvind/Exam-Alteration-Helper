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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../path-to/node_modules/mdi/css/materialdesignicons.min.css"/>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
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
            <li class="nav-item ">
              <a class="nav-link" href="dashboard.php">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="user.html">
                <i class="material-icons">person</i>
                <p>User Profile</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./tables.php">
                <i class="material-icons">content_paste</i>
                <p>Activity/Faculty List</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="nduty.html">
                <i class="bi bi-calendar3-week"></i>
                <p>Create Duty</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="alloc.php">
                <i class="bi bi-laptop"></i>
                <p>Allocate staff</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./searchtimetable.html">
                <i class="material-icons">calendar_today</i>
                <p>Timetable</p>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="req.php">
              <i class="bi bi-bookmarks"></i>
              <p>Request Handling</p>
            </a>
          </li>
            <li class="nav-item active">
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
            <li class="nav-item ">
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
          
      </nav>
      <!-- End Navbar -->
      <form name="myform" action="../php/status.php" method="GET"></form>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
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
                          if($c == 99){
                            $c_code = "fa fa-circle text-dark";
                            $c_txt = "Out of duty";
                          }
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