<?php
    //error_reporting(0);

    session_start();
   if(!isset($_SESSION['user']))
         {
          header('Location:login.php');
         }
?>
<?php include "include/header.php"; ?>
 
 <?php
     if($_SESSION['type']==1)
     include('navbar/super-adminheader.php');
    else if($_SESSION['type']==2)
      include('navbar/admin-header.php');
      ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Consumer search </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Connection</li>
        <li class="active"> Consumer Search</li>
      </ol>
    </section>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
     <!-- @ js code for searching --> 
    <script type="text/javascript" src="js/consumer_searching.js"></script> 
  <script type="text/javascript">
       function printReport(divName) 
             {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
          }
  </script>
<div class="clr-20"></div>
  <section>
    <div class="row">
      <div class="col-md-12">
            <div class="col-sm-3">
            <input type="text" name="customer-id" id='customer-id' class="form-control" placeholder="Customer Id *">
            </div>
            <div class="col-sm-3">
            <input type="text" name="consumer_name" id='consumer_name' class="form-control" placeholder="Enter Consumer Name ">
            </div>
            <div class="col-sm-3">
            <input type="text" name="Bill No" id="pid_no" class="form-control" placeholder="Please Enter PID No. *" required="required" >
            </div>
              <div class="col-sm-3">
                 <input type="text" name="meter_id" id="meter_id" class="form-control" placeholder="Please Enter Meter No. *" required="required" >
            </div>
           <div id='msag'></div>
        </div>
        <div class="clr-20"></div>
         <div class="clr-20"></div>

        <div class="col-md-12" id="result">
            
        </div>
        
    </div>


    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>

   <div class="modal fade" tabindex="-1" role="dialog" id="cunsumer_detail">
            <div class="modal-dialog" role="document" style="width: 70%;">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title "> <span class='glyphicon glyphicon-edit'></span>
                        Consumer Full Detail  </h4>
                     </div>
                      <div class="modal-body">
                        <input type="hidden" name="cid" id="cid" >
                        <div class="row data_content">

                          <div class="col-md-12  detail table-responsive"
                           style="margin:auto;" id="cdetail">

                         </div>
                     </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="PrintCustomer" onclick="printReport('cdetail')">Print Detail</button>
                   </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
