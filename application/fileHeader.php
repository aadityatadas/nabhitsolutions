<?php
$uid = $_SESSION['id'];
  $qry1 = ($_SESSION['typ'] == 'Admin') ? "SELECT * from tbl_doc_request where status = '1'" : "SELECT * from tbl_doc_request where uid = '$uid' and status = '2'" ;


  $statement1 = $connection->prepare($qry1);
  $statement1->execute();
  $result1 = $statement1->rowCount(); 

  //die();

?>

<header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
       
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Hospi</b>Xperts</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../vendor/img/icon2.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../vendor/img/icon2.png"   alt="User Image"><br>
                 <a href="change_pass.php" class="btn btn-default ">Change Password</a><br>
                 <a href="../logout.php" class="btn btn-default ">Sign out</a>
              </li>
              <!-- Menu Body -->
               
              <!-- Menu Footer-->
               
                 
                <div class="pull-right"> 
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
           
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../vendor/img/icon3.png" class="img-circle" alt="User Image">
        </div><br>
        <div class="pull-left info">
           
          <a href="#" style="color:#e6eeff; "><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="border-color:#333; font-size: 13px; color: #e6eeff; font-weight: 100; font-family:sans-serif; line-height: 2.428560;">
        <li class="header">MAIN NAVIGATION</li>

        <li class="active">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="documents.php" style="color:#e6eeff;  background-color: #272525; ">
            <i class="fa fa-home fa-fw" ></i>  New Documents 
          </a>
        </li>
        <li>
          <?php if($_SESSION['typ'] == 'Admin')
          {
              echo '<a href="viewRequest.php" style="color:#e6eeff;  background-color: #272525; ">
            <i class="fa fa-home fa-fw" ></i>New  Request <sup><span class="badge badge-danger" style="background-color: red;">'.$result1.'</span></sup>
          </a>';
          }
          else
          {
            echo '<a href="addRequest.php" style="color:#e6eeff;  background-color: #272525; ">
            <i class="fa fa-home fa-fw" ></i>New  Request <sup><span class="badge badge-danger" style="background-color: red;">'.$result1.'</span></sup> 
          </a>';
          }
          ?>
        </li>
                        

                       
            

    </section>
    <!-- /.sidebar -->
  </aside>