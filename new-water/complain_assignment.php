<?php
    //error_reporting(0);
  session_start();
   if(!isset($_SESSION['user']))
         {
          header('Location:login.php');

         }
         
?> 

<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php 
       if($_SESSION['type']==1)
        include("navbar/super-adminheader.php");
      else if($_SESSION['type']==2)
        include("navbar/admin-header.php");
      else if($_SESSION['type']==5)
      {
       include("navbar/complainheader.php"); 
      }
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Allocate</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Complain Management</li>
        <li class="active">Allocate</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <!-- Info boxes -->
     <!-- <div class="row">-->
       <!-- <div class="col-md-3 col-sm-6 col-xs-12">-->
       <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
       <script>
         
            $(document).ready(function(){
                   
                 $('#find').click(function(){
                  
                      var date1=$('#date1').val();
                      
                      $.post('assigningprocess.php',{date1:date1},function(data){

                            $("#list").html(data);
                      });
                 });
            });
       </script>
        <div class="clr-20"></div>
       <div class="row">
          <div class='col-md-12'>

           <div class="col-md-8">
           <div class='input-group date' id='datetimepicker1'>
                 <input type="text" name="date1" id="date1" class="form-control" placeholder="Enter date ">
                 <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
            </div>
            <script>
           $(function () {
                $('#datetimepicker1').datepicker({
                    
                    
                });
            });
            </script>
               <div class="col-md-2">
                <button type ="button" class="col-md-12 btn btn-warning" id="find"> Find</button>
                 
               </div>

                
                
             
             
              

          </div>
          <div class="clr-20"></div>
          <div class="clr-20"></div>
          <div class='col-md-12' id="list">
            
          

          </div>

      
     </div></section>
  </div>
<footer class="main-footer">
    <strong>Copyright &copy; 2016.</strong> All rights
    reserved.
  </footer>
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
