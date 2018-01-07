<?php
error_reporting(0);
     session_start();
      include('db/connect.php');
         if(isset($_SESSION['user']->username) && $_SESSION['user']->username !="")
         {
          header('Location:login.php');
         }
       //mysql_select_db('billingsystem');
         $_SESSION['err']="";
     if(isset($_POST['submit'])&&$_POST['username']!=""&&$_POST['password']!="")
     {     
   //$user_Type=$_POST['user_typ'];
           
             $username=$_POST['username'];
             $password=$_POST['password'];
        
               $q="Select * from login where user_id='$username' AND password='$password' AND login_type=1";
               $qery=$con->query($q);
               $data=$qery->num_rows;
              $user_details = $qery->fetch_assoc();

                  $q1="Select * from login where user_id='$username' AND password='$password' AND login_type=2";
                 $qery1=$con->query($q1);
                 $data1=$qery1->num_rows;
                 $user_details1 = $qery1->fetch_assoc();
              


                $q2="Select * from login where user_id='$username' AND password='$password' AND login_type=3";
                 $qery2=$con->query($q2);
                 $data2=$qery2->num_rows;
                 $user_details2 = $qery2->fetch_assoc();


                 $q3="Select * from login where user_id='$username' AND password='$password' AND login_type=4";
                 $qery3=$con->query($q3);
                 $data3=$qery3->num_rows;
                 $user_details3 = $qery3->fetch_assoc();


                    $q4="Select * from login where user_id='$username' AND password='$password' AND login_type=5";
                 $qery4=$con->query($q4);
                 $data4=$qery4->num_rows;
                 $user_details4 = $qery4->fetch_assoc();
                $q5="Select * from login where user_id='$username' AND password='$password' AND login_type=6";
                 $qery5=$con->query($q5);
                 $data5=$qery5->num_rows;
                 $user_details5 = $qery5->fetch_assoc();

               if($data==1&&$user_details['login_type']==1)
               {

                
              
                  $_SESSION['user']=$user_details['user_id'];
                  $_SESSION['type']=$user_details['login_type'];
                  header('Location:index-super-admin.php');
         
               }
               else if($data1==1 && $user_details1['login_type']==2){

                  $_SESSION['user']=$user_details1['user_id'];
                  $_SESSION['type']=$user_details1['login_type'];
                  $_SESSION['empid']=$user_details1['emp_id'];
                  header('Location:admin.php');
               }
               else if($data2==1 && $user_details2['login_type']==3){

                  $_SESSION['user']=$user_details2['user_id'];
                  $_SESSION['type']=$user_details2['login_type'];
                  $_SESSION['empid']=$user_details2['emp_id'];
                  header('Location:billing.php');
               }
                else if($data3==1 && $user_details3['login_type']==4){

                  $_SESSION['user']=$user_details3['user_id'];
                  $_SESSION['type']=$user_details3['login_type'];
                  $_SESSION['empid']=$user_details3['emp_id'];

                  header('Location:complain.php');
               }
             
               else if($data4==1 && $user_details4['login_type']==5){
                     
                  $_SESSION['user']=$user_details4['user_id'];
                  $_SESSION['type']=$user_details4['login_type'];
                  $_SESSION['empid']=$user_details4['emp_id'];

                  header('Location:complain_service_handler.php');
               }
             else if($data5==1 && $user_details5['login_type']==6){
                     
                  $_SESSION['user']=$user_details5['user_id'];
                  $_SESSION['type']=$user_details5['login_type'];
                  $_SESSION['empid']=$user_details5['emp_id'];

                  header('Location:billfeeding1.php');
               }

               else{

                      $_SESSION['err']="Invalid Login";
                   }

               






     }
    
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>water 2 | Dashboard</title>
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
  <script>
  	$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
  </script>
</head>
<body class="skin-blue sidebar-mini sidebar-collapse">
<div class="login-full">
<div class="wrapper login-full ">
	<div class="login">
    	<div class="container">
        	<div class="login-page">
            	<div class="logo"><img src="img/logo/water-logo-1.png" alt="water logo"></div>
  <div class="form">
    <form class="register-form" action="" method="post">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post">

    <?php if(isset($_SESSION['err']) && $_SESSION['err'] !=""){ $err=$_SESSION['err']; $_SESSION['err']=""; ?>
  <div class="alert alert-danger"><?php echo $err; ?></div>
  
<?php } ?>
   

      <input type="text" placeholder="username"  name="username" id="username" />
      <input type="password" placeholder="password" name="password" id="password"/>
      <button type="submit" name='submit'>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
        </div>
    </div>
</div>
</div>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- water App -->
<script src="dist/js/app.min.js"></script>
<!-- water dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- water for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  var waterOptions = {
    //Enable sidebar expand on hover effect for sidebar mini
    //This option is forced to true if both the fixed layout and sidebar mini
    //are used together
    sidebarExpandOnHover: true,
    //BoxRefresh Plugin
    enableBoxRefresh: true,
    //Bootstrap.js tooltip
    enableBSToppltip: true
  };
</script>
</body>
</html>
