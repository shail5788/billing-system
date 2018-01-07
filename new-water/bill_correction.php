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
         
         $str="select DISTINCT year from bill";
         $row=$con->query($str);




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
         include("admin-header.php");
        }
        else if($type==3)
        {

          include('billingheader.php');
        }
 ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Bill Correction </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Accounting</li>
        <li class="active">Bill Correction</li>
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
          <script type="text/javascript" src="js/bill_editing.js"></script>
         
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
        <form method="post" action="#">
        <div class="col-md-12" style="margin-bottom:10px;">
         <div class="col-sm-3">

       
         	<input type="text" name="customer_id"  id="customer_id" class="form-control" placeholder="Please Enter Customer Id" >
         </div>


          <div class="col-sm-3">
            <input type="text" name="meter_id" id="meter_id" class="form-control" placeholder="Meter No *" >
            </div>
            <div class="col-md-2">
               <select class="form-control" id="month" >
                   
                   <option value="">Select month</option>
                   <option value="01">Jan</option>
                   <option value="02">Fab</option>
                   <option value="03">March</option>
                   <option value="04">April</option>
                   <option value="05">May</option>
                   <option value="06">June</option>
                   <option value="07">July</option>
                   <option value="08">Aug</option>
                   <option value="09">Sept</option>
                   <option value="10">Oct</option>
                   <option value="11">Nov</option>
                   <option value="12">Dec</option>

              </select>
            </div>
            <div class="col-md-2">
                 <select class="form-control" id="year">
                    <option value=""> Select Month </option>
                    <?php while($result=$row->fetch_assoc()){ 
                     
                       echo "<option value='".$result['year']."'>".$result['year']."</option>";

                      }?>
                    


                 </select>
            </div>
            <div class="col-sm-2">
                   <button type="button" class="col-md-12 btn btn-warning" id="FindBill">Find Bill<span class="glyphicon glyphicon-send"></span></button>
            </div>
            </form>
            
        </div>
        <div class="clr-20"></div>


     
           
           

 
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("include/footer.php") ?>
  <div class="modal fade" tabindex="-1" role="dialog" id="billEditing">
            <div class="modal-dialog" role="document" style="width: 50%;margin-top:230px;">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title "> <span class='glyphicon glyphicon-edit'></span>
                       Bill Correction </h4>
                     </div>
                      <div class="modal-body">
                        <div class="row locationData">
                          <div class="col-md-12  ldetail table-responsive"
                           style="margin:auto;" id="ldetail">
                           <table class="table table-responsive table-bordered ">
                              <tr>
                                <td><label>Customer Id </label>
                                  <input type="text" class="form-control" name="customer_id" id="c_id" readonly>
                                </td>
                                <td><label>Customer Name </label>
                                 <input type="text" class="form-control" name="c_name" id="c_name" readonly>
                                </td>   
                                <td><label>Address</label>

                                 <input type="text" class="form-control" name="address" id="address" readonly>
                                </td></tr>
                                <tr>  
                                <td><label>Zone</label>
                                 <input type="text" class="form-control" name="zone" id="zone" readonly>
                                </td>  
                                <td><label>Ward</label>
                                <input type="text" class="form-control" name="ward" id="ward" readonly>
                                </td>  
                                <td><label>Road</label>
                                <input type="text" class="form-control" name="road" id="road" readonly>
                                </td> </tr>
                                <tr>
                                <td>
                                    <label>Bill No </label>
                                    <input type="text" class="form-control" id="bill_id" readonly>
                                </td>
                                 <td>
                                    <label>Billing Month </label>
                                    <input type="text" class="form-control" id="bmonth" readonly> 
                                </td>
                                 <td>
                                    <label>Billing Year </label>
                                    <input type="text" class="form-control" id="byear" readonly>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    <label>Previous Reading </label>
                                    <input type="text" class="form-control" id="p_reading" readonly>
                                </td>
                                 <td>
                                    <label>Current Reading</label>
                                    <input type="text" class="form-control" id="c_reading" > 
                                </td>
                                 <td>
                                    <label>Actual Reading </label>
                                    <input type="text" class="form-control" id="a_reading" readonly>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    <label>Unit Price</label>
                                    <input type="text" class="form-control" id="up" readonly>
                                </td>
                                <td>
                                    <label>Amount</label>
                                    <input type="text" class="form-control" id="amt" readonly>
                                </td>
                                 <td>
                                    <label>Customer Type</label>
                                    <input type="text" class="form-control" id="ctype" readonly > 
                                </td>
                                
                                </tr>
                                <tr>
                                  
                                 <td>
                                    <label>UGD Connection Fee</label>
                                    <input type="text" class="form-control" id="ugd"> 
                                </td>
                                <td>
                                    <label>Borwell</label>
                                    <input type="text" class="form-control" id="borwell"> 
                                </td>
                                <td></td>
                                </tr>

                           </table>
                         </div>
                     </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary " id="changeBill" >Update Bill </button>
                </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
