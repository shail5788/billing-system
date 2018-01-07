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
        
        $type=$_SESSION['type'];
        
        if($type==1)
        { 
           include('navbar/super-adminheader.php');
        }
        else if($type==2)
        {
          include("navbar/admin-header.php");
        }
        else if($type==3)
        {

          include('navbar/billingheader.php');
        
        }
 
 ?> 
  <?php 
     
     include('db/connect.php');
     
     $query1="select distinct year from bill ";
     
     $row=$con->query($query1);
   

 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Print Report </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Accounting</li>
        <li class="active"> Print Report </li>
      </ol>
    </section>
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/printReport.js"></script>    
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
  <section >

    <div class="row">
      <div class="col-md-12">

          <div class="col-md-3">
               <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" id="datep" name="datep" placeholder="Bill History search by date "/>
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
               </div>


                <div class="col-md-3">
                    <select class="form-control" id="year" name="year">
                   <option value="0">Select Year </option>
                   <?php while($result=$row->fetch_assoc())
                   {
                  
                       echo "<option value='".$result['year']."'>".$result['year']." </option>";
                   } 
                  ?>        
                </select>
                </div>
                 
                 
                
                <div class="col-md-3">
                <select class="form-control " id="month" name="month">
                <option value="0"> Select Month </option>
                   
                
                </select>
                 
               </div>  
               <div class="col-md-3">
                    <select class="form-control" id="billStatus">
                      <option value="">Select Bill status </option>
                      <option value="1">Paid</option>
                      <option value="0">Unpaid</option>
                    </select>
               </div> 
              
                </div>
         <input type="hidden" id="syear" value="">
           <input type="hidden" id="smonth" value="">
        </div>
        <div class="clr-20"></div>
        <div class="clr-20"></div>
        <div class="clr-20"></div>
        <div class="col-md-12">
           
           <div class="col-md-2 pull-right " id="printDiv" style="display: none;">
              <button class="btn btn-warning btn-sm" onclick="printReport('list');">Print Report</button>
           </div>
          

        </div>
        <div class='col-md-12' id="list">
            
      </div>
     <div class="clr-20"></div>
    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>

       <div class="modal fade" id="myModal" role="dialog" >
          <div class="modal-dialog">
    
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Customer Detail</h4>
              </div>
              <div class="modal-body">
                <div class="list_info"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    