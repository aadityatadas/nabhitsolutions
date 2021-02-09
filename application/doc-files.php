 <?php
  error_reporting(0);
  session_start();
  include"dbinfo.php";
  $cdate = date('Y-m-d');
  $fdt = date('Y-m-01');
  $tdt = date('Y-m-31');
  $ses = $_SESSION['login'];
  $cat_msg = '';
  if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $qry = "DELETE from tbl_doc_cat_file WHERE doc_file_id = '$id'";
    $statement = $connection->prepare($qry);
    $result = $statement->execute();
    if(!empty($result))
      {
        $cat_msg =  '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Category Delete Successfully.</div>';
      }
      else
      {
        $cat_msg =  '<div class="alert alert-danger alert-dismissible "><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Danger!</strong> Error While Deleting Category.</div>';
      }

  }
 
   if (isset($_GET['doc_id'])) {
    $cat_id = $_GET['doc_id'];

    $qry = "SELECT * from tbl_doc_cat_file where cat_id = '$cat_id'";
  $statement = $connection->prepare($qry);
  $statement->execute();
  $result = $statement->fetchAll();
}
  

  
  
 

  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HospiXperts-NABH Consultants & Service | NABH Certification</title>
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once 'fileHeader.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Documents
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Documents</li>
      </ol>
    </section>
    
    <!-- Main content -->

    <section class="content">
      <div class="row">

         <div class="col-md-12">

          <?php
              echo ($cat_msg == '') ? '' : $cat_msg ;
          ?>
          
        </div>
        <!-- left column -->
        <div class="col-md-1"></div>

        <div class="col-md-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  
                  <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Category</th>
                  <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Uploded By</th>
                  <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                      foreach ($result as $cat_val) {
                  ?>
  
                  <tr role="row" class="odd">
                    <td class="sorting_1" style="text-align: center;">
                      <a target="_blank" href="<?= $cat_val['filePath']; ?>"><?= $cat_val['fileName']; ?></a>
                    </td>
                    <td style="text-align: center;">
                      <?= $cat_val['created_by']; ?>
                        
                      </td>
                    <td style="text-align: center;">
                      <a target="_blank" href="<?= $cat_val['filePath']; ?>" data-toggle="tooltip" title="Download"  class="form-control btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>

                      <a href="<?= $cat_val['filePath']; ?>" data-toggle="tooltip" title="Download" download class="form-control btn btn-warning" onclick="if(!confirm('Are Sure You Want To Download This Document!!!')) return false;"> <i class="fa fa-download" aria-hidden="true"></i></a>
                      <?php if($_SESSION['typ'] == 'Admin') { ?>
                      <a href="?del_id=<?= $cat_val['doc_file_id']; ?>&&doc_id=<?=  $cat_id ?>" data-toggle="tooltip" title="Delete" class="form-control btn btn-danger" onclick="if(!confirm('Are Sure You Want To Remove This Document!!!')) return false;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      <?php } ?>

                      
                    </td>
                   
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
           
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.5.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://Hospiexperts.com">Hospiexperts</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
   
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
   

   $("#formData").submit(function(){

    var cat_id = $('#cat_id').val();
    var file_name = $('#file_name').val();
    var doc_file = $('#doc_file').val();
    if(cat_id == '')
    {
      $('#cat_id').focus();
      $('#cat_Error').show();
      return false;
    }
    if(file_name == '')
    {
      $('#file_name').focus();
      $('#cat_Error_name').show();
      return false;
    }
    if(doc_file == '')
    {
      $('#doc_file').focus();
      $('#cat_Error_file').show();
      return false;
    }
    else
    {
      var fileExtension = ['txt', 'xlsx', 'csv', 'pdf'];
        if ($.inArray($('#doc_file').val().split('.').pop().toLowerCase(), fileExtension) == -1) 
        {
          
          $('#doc_file').focus();
          $('#cat_Error_file').show();
          $("#doc_file").val('');
          return false;
        }
      }
    });
 });
</script>
</body>
</html>
