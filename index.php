<?php
error_reporting(0);
session_start();

include_once("db/connect.php");
include_once('resource/api_function.php');

$db=new database($con);
$api=new apiFunction($db,$con); 

if(isset($_SESSION['user']->username) && $_SESSION['user']->username !="")
{
   header('Location:login.php');
}
     
$_SESSION['err']="";
     if(isset($_POST['submit'])&&$_POST['username']!=""&&$_POST['password']!="")
     {     
  
           
         
         $username=$_POST['username'];
         $password=$_POST['password'];

         $user1=$db->select('login',['user_id'=>$username,'password'=>$password,'login_type'=>'1']);

         $user2=$db->select('login',['user_id'=>$username,'password'=>$password,'login_type'=>'2']); 
              
         $user3=$db->select('login',['user_id'=>$username,'password'=>$password,'login_type'=>'3']);

         $user4=$db->select('login',['user_id'=>$username,'password'=>$password,'login_type'=>'4']); 
             
         $user5=$db->select('login',['user_id'=>$username,'password'=>$password,'login_type'=>'5']);
           
         $user6=$db->select('login',['user_id'=>$username,'password'=>$password,'login_type'=>'6']);
             
               if($user1[0]['login_type']==1)
               {

                  $_SESSION['user']=$user1[0]['user_id'];
                  $_SESSION['type']=$user1[0]['login_type'];
                  header('Location:index-super-admin.php');
         
               }
               else if($user2[0]['login_type']==2){

                  $_SESSION['user']=$user2[0]['user_id'];
                  $_SESSION['type']=$user2[0]['login_type'];
                  header('Location:admin.php');
               }
               else if($user3[0]['login_type']==3){

                  $_SESSION['user']=$user3[0]['user_id'];
                  $_SESSION['type']=$user3[0]['login_type'];
                  header('Location:billing.php');
               }
               else if($user4[0]['login_type']==4){

                  $_SESSION['user']=$user4[0]['user_id'];
                  $_SESSION['type']=$user4[0]['login_type'];
                  header('Location:complain.php');
               }
               else if($user5[0]['login_type']==5){
                     
                  $_SESSION['user']=$user5[0]['user_id'];
                  $_SESSION['type']=$user5[0]['login_type'];
                  $_SESSION['empid']=$user5[0]['emp_id'];

                  header('Location:complain_service_handler.php');
               }
               else if($user6[0]['login_type']==6){
                     
                  $_SESSION['user']=$user6[0]['user_id'];
                  $_SESSION['type']=$user6[0]['login_type'];
                  $_SESSION['empid']=$user6[0]['emp_id'];

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
  <title>Login | Page </title>
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
<div class='login-full'>
<div class="wrapper">
	<div class="login">
    	<div class="container">
        	<div class="login-page">
            	<div class="logo"><img src="img/logo/water-logo-1.png" alt="water logo"></div>
  <div class="form">
    <form class="register-form" method="post">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post" action="">

    <?php if(isset($_SESSION['err']) && $_SESSION['err'] !=""){ $err=$_SESSION['err']; $_SESSION['err']=""; ?>
  <div class="alert alert-danger"><?php echo $err; ?></div>
  
<?php } ?>
   

      <input type="text" placeholder="username"  name="username" id="username" />
      <input type="password" placeholder="password" name="password" id="password"/>
      <button type="submit" name='submit'>login</button>
      <p class="message">Not registered? <a href="#" id="clickRegister">Create an account</a></p>
    </form>
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
</div></div>
<!-- ./wrapper -->
<script>
//    $('.message a').click(function(){
//    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
// });


     $(document).ready(function(data){

             $("#clickRegister").click(function(){

                   $("#userModal").modal();
             });
             
            
              

              
             $("#register").click(function(){

                 
                    
                    var fname=$("#fname").val();
                    var dob=$("#dob").val();
                    var email=$("#email").val();
                    var password=$("#password1").val();
                    var username=$("#username1").val();
                    var repass=$("#rpassword").val();
                    var gen=$("#gen").val();
                   
                    if(password==repass)
                     {
                         
                         $("#error").removeClass('alert-danger');
                         $("#error").html("");
                     

                         data={fname:fname,dob:dob,gen:gen,email:email,username:username,password:password};

                         var action="createNewAdminUser";

                         $.post('ajax.php',{data:data,action:action},function(data){
                         
                              console.log(data);
                              
                              if(data.status=="false")
                              {
                                     
                                    $("#error").addClass('alert-danger');
                                    $("#error").html("You can not register from here !");
                              }
                              else
                              {
                                    
                                    $("#error").addClass('alert-success');
                                    $("#error").html("Success! User Create ");
                              }
                              


                         },'json');

                     }
                     else
                     {
                        
                        $("#error").addClass('alert-danger');
                        $("#error").html("Repassword not matched !");
                     
                     }
                         

                   
                  

                  


             });
     });
  </script>
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


<div class="modal fade" id="userModal" role="dialog" >
          <div class="modal-dialog" style="width: 19%; margin-top: 130px;">
    
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class=" glyphicon glyphicon-registration-mark"></span> New User Register </h4>
              </div>
              <div class="modal-body">
                  <div class="col-md-12 alert" id="error">
                    
                  </div>
                 
                  <div class="col-md-12">
                   <label>Name </label>
                   <input type="text" name="fname" id="fname" class="form-control">
                  
                   <label>Date Of Birth</label>
                   <input type="text" name="dob" id="dob" class="form-control">
                   <label>Gender</label>
                   <select class="form-control" id="gen">
                      <option value="">Select Gender</option>
                       <option value="Male">Male</option>
                        <option value="Female">Female</option>
                   </select>
                   <label>Email </label>
                   <input type="text" name="email" id="email" class="form-control">
                   <label>UserName</label>
                   <input type="text" name="username1" id="username1" class="form-control">
                   <label>Password </label>
                   <input type="password" name="password1" id="password1" class="form-control">
                   <label>Re Enter Password </label>
                   <input type="password" name="rpassword" id="rpassword" class="form-control">


                  </div> 
              </div>
              <div class="modal-footer" >
              <div class="clr-20"></div>
                <div class="col-md-2 col-md-offset-3">
                <button class="btn btn-success btn-md" id="register" >Register User</button>
                </div>
               <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              </div>
            </div>
          </div>
        </div>

