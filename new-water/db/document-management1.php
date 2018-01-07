<?php
    error_reporting(0);

    session_start();
   if(!isset($_SESSION['user']))
         {
          header('Location:login.php');
         }

     if(!empty($_SESSION['message'])) {
   $message = $_SESSION['message'];}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/water.min.css">
  <!-- water Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
</head>
<body class="skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header"><!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="img/logo/water-logo.png" alt=""></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="img/logo/water-logo.png" alt="">water</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        water Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
 </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['user'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['user'];?>
                </p>
              </li>
        	
              <li class="user-footer">

                <div class="text-center">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  
 <?php
     if($_SESSION['type']==1)
     include('super-adminheader.php');
    else if($_SESSION['type']==2)
      include('admin-header.php');
      ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Document Management </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Connection</li>
        <li class="active">Document Management</li>
      </ol>
    </section>
<div class="clr-20"></div>
  <section><?php
 include('db/connect.php');
    $customer_id=$_POST['customer-id'];
            $meter_id=$_POST['meter-id'];
            $qery="select * from customer where customer_id='$customer_id' OR meter_id='$meter_id' ";
            $row=$con->query($qery);
            $result=$row->fetch_assoc();
            ?>
    <div class="row">
      <div class="col-md-12">
      <div class="alert alert-success width float-left" id="update" role="alert" data-toggle="modal">
          <span><?php echo $message;?></span>
          <span class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></span>
            
          </div>
          <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
          <script type="text/javascript">
        $(document).ready(function(){
          //$("#update").hide();
          var msg="<?php echo $message; ?>";
           if(msg=="")
           {
           $("#update").hide(); 
           }
           else{
            $("#update").show();}

    $(".close").click(function(){
        $("#update").hide();
    });
    });
          </script>
            <div class="col-sm-4">
              <form method="post" action "#">

            <input type="text" name="customer-id" id="customer-id" class="form-control" placeholder="Customer Id *">
            </div>
            <div class="col-sm-4">
            <input type="text" name="meter-id" class="form-control" placeholder="Please Enter Meter Id">
            </div>
            <div class="col-sm-2">
            <input type="text" name=Bill No" class="form-control" placeholder="Please Enter Bill No. *"  >
            </div>

           <div class="col-sm-2">
            <input type="submit" name="Find" class="col-md-12 btn btn-warning" value="Find">
            </div>
           </form>
        </div>
        <div class="clr-20"></div>
      <form method="post" action="updating_process.php" name='Myform' id='Myform'>
        <div class="col-md-12" >
          <div class="col-md-1">
             
              <input type="text" name="fi" class="form-control" value='<?php echo $result['fi'];?>' required="required" data-error="First Name is required." readonly>
          </div>
          <div class="col-sm-3">
            <input type="text" name="fname" class="form-control" value='<?php echo $result['C_name'];?>' required="required" data-error="First Name is required." readonly>
            </div>
            <div class="col-sm-3">
            <input type="text" name="mname1" class="form-control" value='<?php echo $result['C_mid_name'];?>' readonly>
            </div>
            <div class="col-sm-3">
            <input type="text" name="lname2" class="form-control" value='<?php echo $result['C_lname'];?>' placeholder="Please enter your Last Name *" required="required" data-error="Last Name is required." readonly>
            </div>
            <div class="col-sm-2">
            
              <input type="text" name="gen" class="form-control" value='<?php echo $result['gender'];?>' placeholder="gender *" required="required" data-error="First Name is required." readonly>
          </div>
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-2">
         
              <input type="text" name="relation" class="form-control" value='<?php echo $result['relation_type'];?>' placeholder="relation *" required="required" data-error="First Name is required." readonly>
          </div>
          
            <div class="col-sm-6">
            <input type="text" name="rel_name" class="form-control" value='<?php echo $result['r_name'];?>' placeholder="Enter Name" required="required" data-error="Enter number of faimly member is required." readonly>
            </div>
            <div class="col-sm-4">
            <input type="text" name="no_of_family" class="form-control" value='<?php echo $result['no_of_family_m'];?>' placeholder="Family member" required="required" data-error="Enter number of faimly member is required." readonly>
            </div>
             
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-4">
            <input type="text" name="adharNo" class="form-control" value='<?php echo $result['adhar_no'];?>' placeholder="Enter Adhar Card No." required="required" data-error="Enter Adhar Card No. is required." readonly>
              
          </div>
          
            <div class="col-sm-4">
            
              <input type="text" name="idProof" class="form-control" value='<?php echo $result['idproof'];?>' placeholder="EnterId Proof" required="required" data-error="Enter Adhar Card No. is required." readonly>
            </div>
            <div class="col-sm-4">
           <input type="text" name="addressProof" class="form-control"  value='<?php echo $result['addressproof'];?>' placeholder="Address proof" readonly >
            </div>
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
        <div class="col-md-4">
            <input type="text" name="c_type" class="form-control" value='<?php echo $result['type_of_customer'];?>' placeholder="Customer type" readonly >
           
          </div>
          <div class="col-md-4">
            <input type="text" name="customer_id" class="form-control" value='<?php echo $result['customer_id'];?>' placeholder="Customer id" readonly >
              
          </div>
          
            
           <div class="col-md-4">
            <input type="text" name="meterA" class="form-control" value='<?php echo $result['meter_id'];?>' placeholder="Meter Id Allocator" required="required" readonly>
              
          </div>
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-4">
            <input type="text" name="address" class="form-control" value='<?php echo $result['address'];?>' placeholder="Enter Your Address line-1" required="required" data-error="Enter Address is required." readonly>
              
          </div>
           <div class="col-md-4">
            <input type="text" name="mname" class="form-control" placeholder="Enter Your Address line-2" readonly >
              
          </div>
           <div class="col-sm-4">
           <input type="text" name="location" class="form-control" value='<?php echo $result['location'];?>' placeholder="Enter Your Location" required="required" data-error="Enter Location is required." readonly>
            </div>
          
            
           
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
        
         <div class="col-md-4">
            <input type="text" name="city" class="form-control" value='<?php echo $result['city'];?>' placeholder="Enter Your City" required="required" data-error="Enter City is required." readonly>
              
          </div>

          <div class="col-sm-4">
           <input type="text" name="state" class="form-control" value='<?php echo $result['state'];?>' placeholder="Enter Your State" required="required" data-error="Enter State is required." readonly>
            </div>
          
            <div class="col-sm-4">
           <input type="text" name="pin" class="form-control" value='<?php echo $result['pin'];?>' placeholder="Enter Your Pin Code" required="required" data-error="Enter Pin Code is required." readonly>
            </div>
           
            
        </div>
         <div class="clr-20"></div>
        <div class="col-md-12">
         <div class="col-sm-4">
           <input type="text" name="mname" class="form-control" placeholder="Enter Your State" readonly >
            </div>
          <div class="col-sm-4">
           <input type="text" name="mobile" class="form-control" value='<?php echo $result['mobile'];?>' placeholder="Enter Your Mobile No." required="required" data-error="Enter Mobile No. is required." readonly>
            </div>
            <div class="col-sm-4">
           <input type="text" name="landline" class="form-control" value='<?php echo $result['landline_no'];?>' placeholder="Enter Your Landline No." readonly>
            </div>
            
        </div>
</form>

        <div class="clr-20"></div>
        <div class="col-md-12">
        <form method="post" action="document_upload_processing.php" enctype="multipart/form-data" id="upload_file">
         <div class="col-md-4">
         <input type="hidden" name="customer_id" value='<?php echo $result['customer_id'];?>'>
         <label>Upload Photograph</label>
            <input type="file" name="picture[]" id="picture" class="form-control" placeholder="Upload Photograph" required="required">
              
          </div>

          <div class="col-sm-4">
          <label>Upload Id Proof</label>
           <input type="file" name="picture[]" class="form-control" placeholder="Upload Id Proof" required="required">
            </div>
          
            <div class="col-sm-4">
            <label>Upload Address Proof</label>
           <input type="file" name="picture[]" class="form-control" placeholder="Upload Address Proof" required="required">
            </div>
           
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
        <div id="gallery"></div>
          <button type="submit" class="col-md-12 btn btn-warning" name='submit' >Update Document </button>
        </div>
       <div class="clr-20"></div>
      </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
