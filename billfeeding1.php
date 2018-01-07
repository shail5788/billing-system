 <?php error_reporting(0);
    session_start();
   if(!isset($_SESSION['user']))
   {
          header('Location:login.php');
   }

   if(!empty($_SESSION['message']))
   {
                 $message=$_SESSION['message'];
                 unset($_SESSION['message']);
   }    
 ?>
         <?php
 include('db/connect.php');
      
         // $a='12344';
         if(isset($_POST['submit'])){
            $customer_id=$_POST['customer_id'];
            $mobile=$_POST['mobile'];
            $qery="select * from customer where customer_id='$customer_id' OR meter_id='$mobile' ";
            $row=$con->query($qery);
            $result=$row->fetch_assoc();
          $cun_type=$result['type_of_customer'];
            $empid=$_SESSION['empid'];
            $stremp="select * from employee where emp_id='$empid'";
            $emprow=$con->query($stremp);
            $empresult=$emprow->fetch_assoc();
            $mrtype=$empresult['mr_type'];
               if($cun_type!=$mrtype)
                {
                   
                     echo"<script>alert('Sorry! you are not authorized for this consumer ');</script>";
                   
                    $customer_id='';
                    $qery="select * from customer where customer_id='$customer_id' OR meter_id='$mobile' ";
                    $row=$con->query($qery);
                    $result=$row->fetch_assoc();

                } 

           



            }
      
           //echo "<script type='text/javascript'>alert('$er');</script>";
      ?>
<?php include "include/header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php
      /*  $type=$_SESSION['type'];
        if($type==1)
        { 
          include('super-adminheader.php');
        }
        else if($type==2)
        {
         include("admin-header.php");
        }
        else if($type==3)
        {

          include('billingheader.php');
        }*/
 ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Bill Feeding </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Accounting</li>
        <li class="active">Bill Feeding</li>
      </ol>
    </section>
<div class="clr-20"></div>

<script>
  
          $(document).ready(function(){
               alert("shailedra");

          });

</script>


  <section>
    <div class="row">
    
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
        <div class="col-md-12" style="margin-bottom:10px;">
         <div class="col-sm-4">

       <form method="post" action="#">
         	<input type="text" name="customer_id"  id="customer_id" class="form-control" placeholder="Please Enter Customer Id" >
         </div>


          <div class="col-sm-4">
            <input type="text" name="mobile" class="form-control" placeholder="Mobile No *" >
            </div>
            <div class="col-sm-4">
                   <button type="submit" class="col-md-12 btn btn-warning" name="submit" >Find Customer<span class="glyphicon glyphicon-send"></span></button>
            </div>
            </form>
            
        </div>
  <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
          
          $(document).ready(function(){
            
                
            $('#date1').blur(function(){
             
              var date2=$('#date1').val();
              
              var customer_id=$('#c_id').val();
              
              var action="getPreviousReading";
              
              $.post('ajax.php',{date2:date2,customer_id:customer_id,action:action},function(data){
                 
                 console.log(data);
                
                $('#p_reading').val(data);  
              
              });

            });



              $('#mreading').blur(function(){
                   
                   var mread= $('#mreading').val();
                   
                   var type=  $('#type').val();
                   
                   var previous_m=$('#p_reading').val();

                   var action ="FindAmount";
                  
                   $.post('ajax.php',{mread:mread,type:type,previous_m:previous_m,action:action},function(data){

                      $('#total').val(data);
                   
                   });

              });
      });
        </script>
      <form method="post" action="bill_feedingprocess.php">
        <div class="col-md-12" style="margin-bottom:10px;">
           
          <div class="col-sm-4">
          <input type="hidden" name="customer_id" id="customer_id" value='<?php echo $result['customer_id']; ?>'>
            <input type="text" name="fullname" class="form-control" placeholder="Name *" value='<?php echo $result['customer_fullname']; ?>' readonly >
            </div>
             <div class="col-sm-4">
            <input type="text" name="type" id="type" class="form-control" placeholder="customer type*"  value='<?php echo $result['type_of_customer']; ?>' readonly>
            </div>
             <div class="col-sm-4">
            <input type="text" name="address" class="form-control" placeholder="Address *" value='<?php echo $result['address']; ?>' readonly>
            </div>
        </div>


           <div class="col-md-12" style="margin-bottom:10px;">

         <div class="col-sm-3">
            <input type="text" name="c_id"  id="c_id" class="form-control" placeholder="customer_id*" value='<?php echo $result['customer_id']; ?>' readonly >
            </div>

              <div class="col-sm-3">
            <input type="text" name="meter_id" class="form-control" placeholder="Meter id*"  value='<?php echo $result['meter_id']; ?>' readonly>
            </div>
              
              <div class="col-sm-3">
               <div class='input-group date' id='datetimepicker1'>
                 <input type="text" name="date1" id="date1" class="form-control" placeholder="Date *" >
                 <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
              </div>
            </div>
              <script>
           $(function () {
                var date = new Date();
                date.setDate(date.getDate()-1);

                $('#datetimepicker1').datepicker({
                 
                   startDate: date  
                });
            });
            </script>
            <div class="col-sm-3">
            <input type="text" name="p_reading" id="p_reading" class="form-control" placeholder="Privious Month reading *" value=""  >
            </div>
          

            
              
           </div>
           <div class="col-md-12">

                <div class="col-sm-4">
            <input type="text" name="reading" class="form-control" id="mreading" placeholder="Meter Reading *" >
            </div>
                 
              <div class="col-sm-4">
                  <input type="text" name="total" id="total" class="form-control" placeholder="Total *" value="" readonly>
            </div>
               
              <div class="col-sm-4">
                  <input type="text" name="status" class="form-control" placeholder="status *" value="0">
            </div>
             
           </div>

             
<div class="clr-20"></div>
        

<div class="clr-20"></div>
        <div class="col-md-12" style="margin-bottom:10px;">
           
          <button type="submit" class="col-md-12 btn btn-warning" name="submit" >Feed Meter Reading <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </form> 
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2016.</strong> All rights
    reserved.
  </footer>

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
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                var date = new Date();
                date.setDate(date.getDate()-1);
                
                $('#date1').datepicker({ 
                    startDate: date
                });
                

               /* $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  */
            
            });
        </script>
     

</body>
</html>
