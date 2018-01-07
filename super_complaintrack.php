<?php
    //error_reporting(0);
  session_start();
   if(!isset($_SESSION['user']))
         {
          header('Location:login.php');

         }
         
?> 

 <?php include('include/header.php') ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php 
       if($_SESSION['type']==1)
        include("navbar/super-adminheader.php");
      else if($_SESSION['type']==2)
        include("navbar/admin-header.php");
      else if($_SESSION['type']==4)
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
        <small>Complain History </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Complain Management</li>
        <li class="active">Complain History</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

 <?php 
     
     include('db/connect.php');
     $query1="select distinct year from complainregister ";
     $row=$con->query($query1);
   

 ?>
      <!-- Info boxes -->
     <!-- <div class="row">-->
       <!-- <div class="col-md-3 col-sm-6 col-xs-12">-->
       <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
       <script type="text/javascript" src="js/complain_tracking.js"></script>
       <script type="text/javascript">
           function printCompReport(divName) 
           {
            
                $("#Cheading").show(); 
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
             
                document.body.innerHTML = originalContents;
               $("#Cheading").hide(); 
            
          }
       </script>
        
        <div class="clr-20"></div>
       <div class="row">
          <div class='col-md-12'>
          <div class="col-md-3">
                <input type="text" name="customer_id" id="customer_id" class="form-control" placeholder="customer id">
          </div>
        <div class="col-md-2">
                <input type="text" name="complain_id" id="complain_id" class="form-control" placeholder="complain No ">
        </div>
           <div class="col-md-2">
          
             
                   
                  <select class="form-control" id="year" name="year">
                   <option value="0">Select Year </option>
                   <?php while($result=$row->fetch_assoc())
                   {
                  
                       echo "<option value='".$result['year']."'>".$result['year']." </option>";
                   } 
                  ?>        
                </select>
               </div>
                 
             
               <div class="col-md-2">
                <select class="form-control " id="month" name="month">
                <option value="0">Select Month  </option>
                   
                
                </select>
                 
               </div>   
               <div class="col-md-2">
              
                 <div class='input-group date' id='datetimepicker1'>
                 <input type="text" name="date1" id="date1" class="form-control" placeholder="Search Complain History By Date ">
                 <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  
              </div>
                 <script>
                $(function () {
                  
                  $('#datetimepicker1').datepicker({
                      
                       format: 'yyyy-mm-dd'
                });
             });
            </script>

          </div>
          <div class="col-md-1">
             <button class="btn btn-default btn-block" id="CompPrint" onclick="printCompReport('printArea')">Print <span class="glyphicon glyphicon-print"></span></button>
          </div>
          

          <div class="clr-20"></div>
          <div class="clr-20"></div>
          <div id="printArea">
             <div class="col-md-12" style="display:none;" id="Cheading">
                  <table class="table table-brodered">
                    <tr>
                      <td><img src="img/logo/logo.png" width="100" height="80"></td>
                      <td><h3 style="text-align: center; margin-top:25px; font-size: 27px;">
                          KUIDFC & TWON MUNICIPAL COUNCIL
                                 <p>Magadi</p></h3></td>
                      <td><img src="img/logo/kuidc.png" width="100" height="80" style="float: right"></td>
                    </tr>
                    <tr>
                      
                      <td colspan="3">
                         <h3 style="text-align: center;"> Complain History </h3>
                      </td>
                    </tr>
                  </table>
                  
             </div>
             <div class="clr-20"></div>
           
          <div class='col-md-12' id="list">
            
          

          </div>
          </div>

      
     </div></section>
  </div>
  <?php include('include/footer.php') ?>
<div class="modal fade" id="comp_track" role="dialog" >
          <div class="modal-dialog">
    
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Assign Employeed Detail</h4>
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
