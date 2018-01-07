<?php
    error_reporting(0);
    include('db/connect.php');
    session_start();
  
   if(!isset($_SESSION['user']))
   {
      header('Location:login.php');
   }
         

if(!empty($_SESSION['str'])) {
   
   $message = $_SESSION['str'];
   unset($_SESSION['str']);
}

include("db/connect.php");

 $str ="select area from area ";
 $row=$con->query($str);
 
?>
<?php include "include/header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
      <?php include("navbar/super-adminheader.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>New Connection Issue </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Connection</li>
        <li class="active">New Connection</li>
      </ol>
    </section>
<div class="clr-20"></div>
  <section>
    <div class="row">
      <form method="post" action="consumer-insert.php">
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
        <div class="col-md-12">
          <div class="col-md-1">
              <select class="form-control" id="sel1" name="fi">
                  <option value="Mr.">Mr.</option>
                  <option value="Mrs.">Mrs.</option>
                  <option value="Miss.">Miss.</option>
              </select>
          </div>
          <div class="col-sm-3">
            <input type="text" name="fname" class="form-control" placeholder="Enter First Name *" required="required" data-error="First Name is required.">
            </div>
            <div class="col-sm-3">
            <input type="text" name="mname1" class="form-control" placeholder="Enter Mid Name *" >
            </div>
            <div class="col-sm-3">
            <input type="text" name="lname1" class="form-control" placeholder="Enter Last Name *" required="required" data-error="Last Name is required.">
            </div>
            <div class="col-sm-2">
            <select class="form-control" id="sel1" required="required" data-error="Select Your Gender" name="gen">
                  <option value="0">Gender</option>
                  <option value="Male" >Male</option>
                  <option value="Female">Female</option>
              </select>
          </div>
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-2">
              <select class="form-control" id="sel1" required="required" name="relation">
                  <option value="Father">Father Name</option>
                  <option value="Husband">Husband Name</option>
              </select>
          </div>
          
            <div class="col-sm-6">
            <input type="text" name="rel_name" class="form-control" placeholder="Enter Name" required="required" data-error="Enter number of faimly member is required.">
            </div>
            <div class="col-sm-2">
            <select class="form-control" id="sel1" name="no_of_family">
                  <option value="0">No. of Faimly Member</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="5+">5+</option>
              </select>
              
            </div>
            <div class="col-md-2">
               <input type="text" name="pid" id="pid" class="form-control" placeholder="Pid No ">
            </div>
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-4">
            <input type="text" name="adharNo" class="form-control" placeholder="Enter Adhar Card No." required="required" data-error="Enter Adhar Card No. is required.">
              
          </div>
          
            <div class="col-sm-4">
            <select class="form-control" id="sel1" name="idProof" required="required" data-error="Select ID Proof">
                  
                  <option value="0"> Select Id Proof</option>
                  <option value="Ration Card">Ration Card</option>
                  <option value="Voter Id">Voter Id</option>
                  <option value="Driving Licence" >Driving Licence</option>
                  <option value="Driving Licence" >Adhar Card</option>
                  <option value="Passport">Passport</option>

              </select>
            </div>
            <div class="col-sm-4">
            <select class="form-control" id="sel1" name="addressProof">
                  
                  <option value="0">Select Address Proof</option>
                  <option value="Bank Passbook">Bank Passbook</option>
                  <option value="Passport">Passport</option>
                  <option value="Voter Id">Voter Id</option>
                 
              </select>
            </div>
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
        <div class="col-md-4">
            <select class="form-control" id="sel1" name='c_type'>
                  
                  <option value="0"> Customer Type</option>
                  <option value="Domestic">Domestic</option>
                  <option value="Comercial">Commercial</option>
                  <option value="Non-Comercial">Industry Type</option>
                  <option value="Non-Comercial">Other</option>
            
            </select>
          </div>
          <div class="col-md-4">
            <input type="text" name="meterA" class="form-control" placeholder="Meter Id Allocator" required>
              
          </div>
          
            
           <div class="col-md-4">
            <input type="text" name="address" class="form-control" placeholder="Enter Your Address line-1" required="required">
              
          </div>
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-4">
           <select class="form-control" id="zone" name="zone" required>
            <option value="0">Select Zone</option>
             <?php 
               while($result=$row->fetch_assoc())
               {?>
             <option value='<?php echo $result['area'];  ?>'><?php echo $result['area'];?></option> 
             <?php } ?>

            </select>  
          </div>
           <div class="col-md-4">
             <select class="form-control" id="location" name="location" required>
            <option value="0">Select Ward</option>
          

           </select>
            <script type="text/javascript">
              $(document).ready(function(){
                 
                 $("#zone").change(function(){

                      var zone= $(this).val();
                       
                      var action ="getWard";
                       
                       $.post('ajax.php',{zone:zone,action:action},function(data){
                            
                            console.log(data);
                           $("#location").html(data);
                       
                       });
                  
                      $("#location").change(function(){

                             var ward=$(this).val();
                             var action="getRoad";
                             $.post('ajax.php',{ward:ward,zone:zone,action:action},function(data){
                              console.log(data);
                               $("#road").html(data);
                             });
                      });     
                 
                 });


                  
              });
            </script>
              
          </div>
           <div class="col-sm-4">

            <select class="form-control" name="road" id="road" required>
               <option value="">Select Road </option>
            </select>

            </div>
          
            
           
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
        <div class="col-sm-4">
           <input type="text" name="pin" id="pin" class="form-control" placeholder="Enter Pin " required="required" data-error="Enter area is required.">
            </div>

         <div class="col-md-4">
           <input type="text" name="city" class="form-control" placeholder="Enter Your City" required="required" data-error="Enter City is required." value="Magadi" readonly>
          </div>

          <div class="col-sm-4">
           <input type="text" name="state" class="form-control" placeholder="Enter Your State" required="required" data-error="Enter State is required." value="Karnataka" readonly>
            </div>
          
            
           
            
        </div>
         <div class="clr-20"></div>
        <div class="col-md-12">
         <div class="col-sm-4">
            <div class='input-group date' id='datetimepicker1'>
                 <input type="text" name="date1" id="date1" class="form-control" placeholder="Date *" data-error="Enter Date " >
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
          <div class="col-sm-4">
           <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile No." required="required" data-error="Enter Mobile No. is required.">
            </div>
            <div class="col-sm-4">
           <input type="text" name="landline" class="form-control" placeholder="Enter Your Landline No.">
            </div>
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">

          <button type="submit" class="col-md-12 btn btn-warning" name="submit" >Issue Connection <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
