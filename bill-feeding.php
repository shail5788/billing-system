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
            $qery="select * from customer where (customer_id='$customer_id' OR meter_id='$mobile') AND isActive='1' ";
            $row=$con->query($qery);
            $result=$row->fetch_assoc();

                if($row->num_rows==0)
                {
                  echo "<script type='text/javascript'>alert('Customer is Deactivated ');</script>";
                }
            }

           
      ?>
<?php include "include/header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
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
<div class="clr-20"></div>
<div class="clr-20"></div>



  <section>
    <div class="row">
    
      <div class="alert alert-success width float-left" id="update" role="alert" data-toggle="modal">
          <span><?php echo $message;?></span>
          <span class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></span>
            
          </div>
          
          <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
          <script type="text/javascript" src="js/bill_feeding.js"></script>
         
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


            $("#billfeed").click(function(){

                  
                  var customer_id=$("#c_id").val();
                  var type=$("#type").val();
                  var feedingDate=$("#date1").val();
                  var p_reading=$("#p_reading").val();
                  var reading=$("#mreading").val();
                  var total=$("#total").val();
                  var status=$("#status").val();
                  var ugd_connection=$("#ugd_connection").val();
                  var borwell=$("#borwell").val();
                  var action= 'billFeedingProcess';

                  var data={customer_id:customer_id,type:type,feedingDate:feedingDate,p_reading:p_reading,reading:reading,ugd_connection:ugd_connection,borwell:borwell,total:total,status:status};

                  $.post("ajax.php",{data:data,action:action},function(data){
                    
                     console.log(data);
                      alert(data);

                  });

                  setTimeout(function(){
                     $.post('printBilldata.php',{data:data},function(data){
                      
                       $("#myModal").modal();
                       $(".invoice_popup").html(data);
                  });

                   },200); 
                 


            });

    });
          </script>
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
        <div class="col-md-12" style="margin-bottom:10px;">
         <div class="col-sm-4">

       <form method="post" action="#">
         	<input type="text" name="customer_id"  id="customer_id" class="form-control" placeholder="Please Enter Customer Id" >
         </div>


          <div class="col-sm-4">
            <input type="text" name="mobile" class="form-control" placeholder="Meter No *" >
            </div>
            <div class="col-sm-4">
                   <button type="submit" class="col-md-12 btn btn-warning" name="submit" >Find Customer<span class="glyphicon glyphicon-send"></span></button>
            </div>
            </form>
            
        </div>
        <div class="clr-20"></div>

 
      <form method="post" action="#">
        <div class="col-md-12" style="margin-bottom:10px;">
           
          <div class="col-sm-4">
          <input type="hidden" name="customer_id" id="customer_id" value='<?php echo $result['customer_id']; ?>'>
            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Name *" value='<?php echo $result['customer_fullname']; ?>' readonly >
            </div>
             <div class="col-sm-4">
            <input type="text" name="type" id="type" class="form-control" placeholder="customer type*"  value='<?php echo $result['type_of_customer']; ?>' readonly>
            </div>
             <div class="col-sm-4">
            <input type="text" name="address" class="form-control" placeholder="Address *" value='<?php echo $result['address']; ?>' readonly>
            </div>
        </div>

         <div class="clr-20"></div>
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
                // var date = new Date();
                // date.setDate(date.getDate()-1);

                $('#datetimepicker1').datepicker({
                 
                   // startDate: date  
                });
            });
            </script>
            <div class="col-sm-3">
            <input type="text" name="p_reading" id="p_reading" class="form-control" placeholder="Privious Month reading *" value=""  >
            </div>
          

            
              
           </div>
           <div class="clr-20"></div>
           <div class="col-md-12">

                <div class="col-sm-3">
            <input type="text" name="reading" class="form-control" id="mreading" placeholder="Meter Reading *" >
            </div>
                 
              <div class="col-sm-3">
                  <input type="text" name="total" id="total" class="form-control" placeholder="Total *" value="" readonly>
            </div>
            <div class="col-sm-2">
              <input type="text" name="ugd_connection" id="ugd_connection" class="form-control" placeholder="UGD Connection Fee *" >
            </div>
            <div class="col-sm-2">
              <input type="text" name="borwell" id="borwell" class="form-control" placeholder="Borrwell charge *" >
            </div>
              <div class="col-sm-2">
                  <input type="text" name="status" id="status" class="form-control" placeholder="status *" >
            </div>
             
           </div>

             
<div class="clr-20"></div>
        

<div class="clr-20"></div>
        <div class="col-md-12" style="margin-bottom:10px;">
           <div class="col-md-12">
          <button type="button" class="col-md-12 btn btn-warning" name="submit" id="billfeed" >Feed Meter Reading <span class="glyphicon glyphicon-send"></span></button>
        </div>
        </div>
      </form> 
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include("include/footer.php") ?>
<div class="col-md-12">
       
    <div class="modal fade" id="myModal" role="dialog" style="margin: auto;">
          <div class="modal-dialog"> 
            
            <!-- Modal content-->
            <div class="modal-content" style="width:800px; background: white; margin-left: -220px;" > 
             <!-- <div class="col-md-6"> -->
              <div class="modal-header">
              <br><br>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               
              </div>
              <div class="modal-body" id="printBill">
                 <table><tr><td width="200">
                 <img src="img/logo/logo.png" height="80" width="100"></td><td>
                 <h5 class="modal-title" style="font-size: 30px; text-align:center;">KUIDFC & TMC Billing Invoice</h5></td><td width="200" style="text-align: right;"><img src="img/logo/kuidc.png" height="80" width="100"></td></tr></table>
                <div class="col-md-12 border pad0 points"  >
                <div class="col-md-6">
                  <div class="invoice_popup" style="width:300px; border: 1px solid lightgray;padding: 5px;float: left;"></div>
                  </div>
                  <div class="col-md-6">
                  <div class="default-data" style="width:300px; border: 1px solid lightgray;padding-right: 8px;float: right;">
                      <p><span class="text-center">Text:</span></p>
                  <ul>
                    <li>ಚಿ ಟಟಿ ಣಚಿಟಜ ಜಿಚಿಛಿಣ ಣಚಿಣ ಚಿ ಡಿಚಿಜಡಿ ತಿಟಟ ಜಣಡಿಚಿಛಿಣಜ ಥಿ ಡಿಚಿಜಚಿಟ ಛಿಟಿಣಟಿಣ ಜಿ ಚಿ ಠಿಚಿ ತಿಟಿ ಟಞಟಿ ಚಿಣ ಟಚಿಥಿಣ.</li>
                    <li>ಚಿ ಟಟಿ ಣಚಿಟಜ ಜಿಚಿಛಿಣ ಣಚಿಣ ಚಿ ಡಿಚಿಜಡಿ ತಿಟಟ ಜಣಡಿಚಿಛಿಣಜ ಥಿ ಡಿಚಿಜಚಿಟ ಛಿಟಿಣಟಿಣ ಜಿ ಚಿ ಠಿಚಿ ತಿಟಿ ಟಞಟಿ ಚಿಣ ಟಚಿಥಿಣ.</li>
                    <li>ಚಿ ಟಟಿ ಣಚಿಟಜ ಜಿಚಿಛಿಣ ಣಚಿಣ ಚಿ ಡಿಚಿಜಡಿ ತಿಟಟ ಜಣಡಿಚಿಛಿಣಜ ಥಿ ಡಿಚಿಜಚಿಟ ಛಿಟಿಣಟಿಣ ಜಿ ಚಿ ಠಿಚಿ ತಿಟಿ ಟಞಟಿ ಚಿಣ ಟಚಿಥಿಣ.</li>
                    <li>ಚಿ ಟಟಿ ಣಚಿಟಜ ಜಿಚಿಛಿಣ ಣಚಿಣ ಚಿ ಡಿಚಿಜಡಿ ತಿಟಟ ಜಣಡಿಚಿಛಿಣಜ ಥಿ ಡಿಚಿಜಚಿಟ ಛಿಟಿಣಟಿಣ ಜಿ ಚಿ ಠಿಚಿ ತಿಟಿ ಟಞಟಿ ಚಿಣ ಟಚಿಥಿಣ.</li>
                    <li>ಚಿ ಟಟಿ ಣಚಿಟಜ ಜಿಚಿಛಿಣ ಣಚಿಣ ಚಿ ಡಿಚಿಜಡಿ ತಿಟಟ ಜಣಡಿಚಿಛಿಣಜ ಥಿ ಡಿಚಿಜಚಿಟ ಛಿಟಿಣಟಿಣ ಜಿ ಚಿ ಠಿಚಿ ತಿಟಿ ಟಞಟಿ ಚಿಣ ಟಚಿಥಿಣ.</li>
                    <li>ಚಿ ಟಟಿ ಣಚಿಟಜ ಜಿಚಿಛಿಣ ಣಚಿಣ ಚಿ ಡಿಚಿಜಡಿ ತಿಟಟ ಜಣಡಿಚಿಛಿಣಜ ಥಿ ಡಿಚಿಜಚಿಟ ಛಿಟಿಣಟಿಣ ಜಿ ಚಿ ಠಿಚಿ ತಿಟಿ ಟಞಟಿ ಚಿಣ ಟಚಿಥಿಣ.</li>
                    
                    
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Slab</th>
                          <th>Tariff</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th rowspan="4" scope="rowgroup">Domestic</th>
                          <th scope="row">0-8</th>
                          <td>7.00</td>
                        </tr>
                        <tr>
                          <th scope="row">8-15</th>
                          <td>9.00</td>
                        </tr>
                        <tr>
                          <th scope="row">15-25</th>
                          <td>11.00</td>
                        </tr>
                        <tr>
                          <th scope="row">>25</th>
                          <td>13.00</td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <th rowspan="4" scope="rowgroup">Commercial</th>
                          <th scope="row">0-8</th>
                          <td>28.00</td>
                        </tr>
                        <tr>
                          <th scope="row">8-15</th>
                          <td>36.00</td>
                        </tr>
                        <tr>
                          <th scope="row">15-25</th>
                          <td>44.00</td>
                        </tr>
                        <tr>
                          <th scope="row">>25</th>
                          <td>52.00</td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <th rowspan="4" scope="rowgroup">Non-Commercial</th>
                          <th scope="row">0-8</th>
                          <td>14.00</td>
                        </tr>
                        <tr>
                          <th scope="row">8-15</th>
                          <td>18.00</td>
                        </tr>
                        <tr>
                          <th scope="row">15-25</th>
                          <td>22.00</td>
                        </tr>
                        <tr>
                          <th scope="row">>25</th>
                          <td>26.00</td>
                        </tr>
                      </tbody>
                     
                    </table>
                   
                  </ul>
                <span>*Note: </span><p>Payment is not made Before the Due Date Steps for discounnection of Water supply will be Initiated.</p>

                  </div>
                   
                  </div>
                  <div class="invoice_detail">
                  
                    <!--<p><span>Payment Detail's:</span></p>
                      <p><span>
                      Water Changes:</span></p>
                      <p><span>Meter Charges:</span></p>
                      <p><span>Sanitary Charges:</span>
                      <p><span>S.C. for Borewell:</span></p>
                      <p><span>Other Charges:</span></p>
                      <p><span>Arrears Balance:</span></p>
                      <p><span>Intrest Arrears:</span></p>
                      <p><span>Total Amount:</span></p>-->
                      
                
                  
                </div>
             </div>
              </div>
              <div class="clr-20"></div>
              <div class="modal-footer">
                 <button type="submit" class="btn btn-warning" data-dismiss="modal" onclick="printReport('printBill');">Print Statement </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
      </div>
       
    <!-- right col -->
 