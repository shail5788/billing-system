<?php 
    
    error_reporting(0);
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

        include_once("db/connect.php");
        include_once('resource/api_function.php');
        
        $db=new database($con);   //object of query builder
        $api= new apiFunction($db,$con); // object apiFunction class
        
        $customer_id=$_POST['customer_id'];
        $searchYear=$_POST['year'];
        //$bill_id=$_POST['bill_id'];
        $date2=date("Y-m-d");
        $date3=explode('-', $date2);
        //$month=$date3[1];
        $year=$date3[0];
        // $month=$_POST['duemonth'];
        $getyear="select DISTINCT year from bill ORDER BY year ASC ";
        $row12=$con->query($getyear);

 
     if(isset($_POST['submit'])&&$customer_id!='')
     {
      
      
          $result1=$db->select_colum_where('customer',['customer_fullname','meter_id','type_of_customer'],['customer_id'=>$customer_id]);

           $fullname1=$result1[0]['customer_fullname'];
          
           $meter_id=$result1[0]['meter_id'];
          
           $ctype=$result1[0]['type_of_customer'];
   
     
      }
       $query1="select * from bill where customer_id='$customer_id' AND year='$searchYear' order by  month ASC";
        $row=$con->query($query1);

 ?>
 <?php include_once('include/header.php') ?>
         

 <?php 
    
    $type=$_SESSION['type'];
    
    if($type==1)
    {
       include("navbar/super-adminheader.php");


    }
    else if($type==2)
    {
      include("navbar/admin-header.php");

    }
    else if($type==3)
    {
      include("navbar/billingheader.php");
    }

 ?>

  <!-- Content Wrapper. Contains page content -->
  <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      
          $(".getBill").click(function(){
         
              var bill_id=$(this).attr('id');
              
              $.post('getDuplicateBill.php',{bill_id:bill_id},function(data){

                  //console.log(data);

                   $("#myModal").modal();

                    $(".invoice_popup").html(data);

                });

        });

    });
      
      function printReport(divName) 
      {
        $('#headTitle').show();
        $(".Operation").hide();
        $(".opep").hide();
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
         $('#headTitle').hide();
         $(".Operation").show();
        $(".opep").show();
     }
     function printBill(divName) 
         {
            
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

  </script>
  <style type="text/css">
   .Operation .btn-group-sm>.btn, .btn-sm{
      padding: 0px 8px;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Customer Bill by Customer ID</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Accounting</li>
        <li class="active">Customer Bill by Customer ID</li>
      </ol>
    </section>
<div class="clr-20"></div>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <div class="container">
        <form method="post" action="#">
        <div class="row" >
          <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Customer Id" id="usr" name="customer_id">
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter meter_id" id="meter" name="meter_id">
              </div>
          </div>
         <div class="col-md-2">
           
           <select class="form-control" name="year">
              <option value="">Select Year</option>
              <?php while($result2=$row12->fetch_assoc()){


                 echo "<option value='".$result2['year']."'>".$result2['year']."</option>";

                }  ?>


           </select>
         </div>
          <div class="col-sm-2">
            <button type="submit" name="submit" class="col-md-12 btn btn-warning" name="submit">Find Bill</button>
            </div>
             <div class="col-sm-1">
            <button class="col-md-12 btn btn-default" onClick="printReport('printIng')">Print</button>
            </div>
        </div>
        </form>
      <div id="printIng">
    <!--     <h3 id="headTitle" style="font-size: 25px; text-align: center;display:none;"><strong>KUIDFC & TOWN MUNICIPAL COUNCIL</strong>
          <p>Magadi</p>
          <p>Customer Yearly Billing Report</p><br></h3> -->
           <table class="table"  id="headTitle" style="display: none; border: 0px">
                    <tr>
                      <td><img src="img/logo/logo.png" width="100" height="80"></td>
                      <td><h3 style="text-align: center; margin-top:25px; font-size: 27px;">
                          KUIDFC & TWON MUNICIPAL COUNCIL
                                 <p>Magadi</p></h3></td>
                      <td><img src="img/logo/kuidc.png" width="100" height="80" style="float: right"></td>
                    </tr>
                    <tr>
                      
                      <td colspan="3">
                         <h3 style="text-align: center;">Customer Yearly Billing Report </h3>
                      </td>
                    </tr>
                  </table>
        <div class="row">
          <div class="col-md-3">
              <div class="form-group">
              <label>Customer Id</label>
                <input type="text" class="form-control" readonly placeholder="Customer Id" id="usr" value='<?php echo $customer_id; ?>'>
              </div>             
          </div>
          
            <div class="col-sm-3">
              <div class="form-group">
              <label>Customer Name</label>
                <input type="text" class="form-control" readonly placeholder="Name" id="usr"  value='<?php echo $fullname1; ?>'>
              </div>  
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <label>Customer Type</label>
                <input type="text" class="form-control" readonly placeholder="Type" id="ctype" value='<?php echo $ctype; ?>'>
              </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <label>Meter Id</label>
                <input type="text" class="form-control" readonly placeholder="Meter Id" id="usr" value='<?php echo $meter_id; ?>'>
              </div>
            </div>
             <div class="col-sm-2">
                <div class="form-group">
                <label>Year</label>
                <input type="text" class="form-control" readonly placeholder="Year" id="usr" value='<?php echo $searchYear; ?>'>
              </div>
            </div>
        </div>
         <table class="table table-bordered">
           <tr style="background:black; padding: 10px;color:white;">
         
         
          <td class="col-md-2">
              <span>Bill Id</span>             
          </td>
          
            <td class="col-md-1">
              <span>Month</span>  
            </td>
            <td class="col-md-2">
                <span>Previous Reading</span>
            </td>
            <td class="col-md-2">
                <span>Current Reading</span>
            </td>
            <td class="col-md-2">
                <span>Consumed Reading</span>
            </td>
            <td class="col-md-2">
                <span>Amount</span>
            </td>
            <td class="col-md-1">
                <span>Status</span>
            </td>
            <td class="col-md-1 opep">
                <span>Operation</span>
            </td>
             
        </tr>
        <?php $pReading=0;   while($result =$row->fetch_assoc())
         {

          $pReading=$result['meterReading']-$result['reading'];
        ?>
        <tr class=" <?php if($result['status']=='0'){ echo "bgred";}else echo "bg-white";  ?> ">
          <td class="col-md-2 border-right border-bottom">
              <span><?php echo $result['bill_id'];?></span>         
          </td>
          
            <td class="col-md-1 border-right border-bottom">
             <span><?php echo $result['month'];?></span>   
            </td>
            <td class="col-md-2 border-right border-bottom">
          <span><?php echo $pReading;?></span>   
            </td>
            <td class="col-md-2 border-right border-bottom">
                <span><?php echo $result['meterReading'];?></span>   
            </td>
            <td class="col-md-2 border-right border-bottom">
               <span><?php echo $result['reading'];?></span>   
            </td>
            <td class="col-md-2 border-right border-bottom">
                <span><?php echo $result['total'];?></span>   
            </td>
            <td class="col-md-1 border-bottom">
             <span><?php if($result['status']=='1'){echo "Paid";}else{
              echo"Unpaid";
             }?></span>   
            </td>
            <td class="Operation"><a href="#" class="btn btn-sm btn-warning getBill" id="<?php echo $result['bill_id']; ?>">Print</a></td>
             
        </tr>
       

       <?php  $pReading=0;}  ?>
   </table>
        </div>
        <div class="clr-20"></div>
       
      </div>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
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
                 <button type="submit" class="btn btn-warning" data-dismiss="modal" onclick="printBill('printBill');">Print Statement </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
      </div>