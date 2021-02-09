<?php
include('application/dbinfo.php');




if(isset($_POST['save'])){
   
   



    if($_POST['password']===$_POST['confirm']) {


           $data['stf_utyp'] = $_POST['stf_utyp'];
             $data['stf_name'] = $_POST['stf_name'];
             $data['stf_email'] = $_POST['stf_email'];
             $data['stf_mob'] = $_POST['stf_mob'];
             $data['stf_uname'] = $_POST['stf_uname'];
             $data['stf_pass'] = md5($_POST['password']);




        $newfilename='';
        $status=1;
        if($_FILES["imgsign"]["size"]>0){

            $targetDir = "application/user_profile/sign/";
            $fileName = basename($_FILES["imgsign"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            
          
            


             

            $allowTypes = array('jpg','png','jpeg','gif');

            $newfilename=null;

            $a=explode(".",$fileName);
                array_pop($a);
                
                foreach ($a as $key => $value) {
                     $newfilename=$newfilename."".$value;
               }
                $newfilename=$newfilename."_".time().".".$fileType;

                $targetFilePath=$targetDir . $newfilename;  


            if(in_array($fileType, $allowTypes)){
                // Upload file to server
            if(move_uploaded_file($_FILES["imgsign"]["tmp_name"], $targetFilePath)){
               // Insert image file name into database

                
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            
              }else{
                $status=0;
                 $statusMsg = "Sorry, there was an error uploading your file.";
                }
             }else{
                $status=0;
                  $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
              }
              //echo $statusMsg;
        }


       if($status){
        $data['stf_emp_sign'] = $newfilename;
             
         $qry = "SELECT stf_id FROM tbl_staff ORDER BY stf_id DESC";
        $res = mysqli_query($connect, $qry);
        $row=mysqli_fetch_array($res);
        $id = $row['stf_id'];
        $cid = $id+1;
        $data['stf_id'] = $cid;
        foreach(array_keys($data) as $field_name) {
                $data[$field_name] = mysqli_escape_string($connect,$data[$field_name]);
                if (!isset($field_string)) {
                    $field_string = "`".strtolower($field_name)."`"; 
                    $value_string = "'$data[$field_name]'";
                } else {
                    $field_string .= ",`".strtolower($field_name)."`";
                    $value_string .= ",'$data[$field_name]'";
                }
                
            }

            $sql1="INSERT INTO tbl_staff ($field_string) VALUES ($value_string)";
        $statement = $connection->prepare($sql1);


        $result = $statement->execute();
        
                
        
        if(!empty($result))
        {
        echo '<script>alert("User Registered Successfully"); window.location = "index.php"</script>';
           //  header('Location:index.php');
        //window.location = "index.php";
         }

        } else{
            echo '<script>alert("<?=$statusMsg?>"); ';
        }

        } else{
           echo '<script>alert("Password and Confirm Password is not same");</script>';
       }  

    





}


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Nabh::Hospital</title>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/login.css" rel="stylesheet">

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-cyan login-page authentication">
<div class="container" style="width: 1200px!important">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span>NABH Hospital</span> <span class="msg">Register a new User</span></h1>
        <div class="col-md-12">
            <form id="sign_up" class="col-xs-12" method="POST"   enctype="multipart/form-data"> 
                

               


          <div class="input-group">

            <div class="demo-google-material-icon"> <i class="material-icons">list</i> <span class="icon-name"></span> </div>
                                <div class="form-line">
                                    <select class="form-control show-tick" id="stf_utyp" name="stf_utyp" required="">
                                        <option value="">-- User Type --</option>
                                         <?php    $sql = "SELECT * FROM tbl_user_types";

                        
                                 $result = mysqli_query($connect, $sql);

                          

         if (mysqli_num_rows($result) > 0) { 

            while($row = mysqli_fetch_assoc($result)) {  ?>                 
                <option value="<?=$row['name']?>" <?php if(isset($_POST['stf_utyp'])) echo 'selected';?> ><?=$row['name']?></option>
                                                    

        <?php } } ?>
                                    </select>
                                </div>
                            </div>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-account"></i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="stf_name" placeholder="full name"  id="stf_name" required="" value="<?php if(isset($_POST['stf_name'])) echo $_POST['stf_name'];?>" autofocus >
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-email"></i>
                </span>
                <div class="form-line">
                    <input type="email" class="form-control" name="stf_email" placeholder="Email Address" id="stf_email" value="<?php if(isset($_POST['stf_email'])) echo $_POST['stf_email'];?>">
                </div>
            </div>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-email"></i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="stf_mob" placeholder="Mobile Number" id="stf_mob"  value="<?php if(isset($_POST['stf_mob'])) echo $_POST['stf_mob'];?>">
                </div>
            </div>


            <div class="input-group">
                 <span class="label label-default"><b>User Sign</b></span>
                <div class="form-line">
                   <input type="file"  name="imgsign" id="imgsign"  class="form-control" style="opacity: 1;
                                              position: relative;" />
                </div>
            </div>


    

             

             <div class="input-group">
                <span class="label bg-purple"><b>User Name</b></span>
                <div class="form-line">
                    <input type="text" class="form-control" name="stf_uname" placeholder="Username for login"  id="stf_uname" required="" autofocus style="border: red">
                </div>
            </div>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-lock"></i>
                </span>
                <div class="form-line">
                    <input type="password" class="form-control" name="password"  placeholder="Password" required="">
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-lock"></i>
                </span>
                <div class="form-line">
                    <input type="password" class="form-control" name="confirm" placeholder="Confirm Password" required="">
                </div>
            </div>
            <div class="form-group">
                <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
            </div>
            <div class="text-center">
               
                <input type="submit" name="save" class="btn btn-raised g-bg-cyan waves-effect" value="SAVE">
            </div>
            <div class="m-t-10 m-b--5 align-center">
                <a href="index.php">You already have a membership?</a>
            </div>
        </form>
        </div>
    </div>  
</div>
<div class="theme-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>
</html>