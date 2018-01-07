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

    include("db/connect.php");
    $str="select * from tariff ";
    $row=$con->query($str);

?>

<?php include "include/header.php"; ?>
 <?php 

     include('navbar/super-adminheader.php');
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Tariff Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Admin Tool</li>
        <li class="active">Tariff Management </li>
      </ol>
    </section>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
      
      $(document).ready(function(){
           
           $("#type").change(function(){
  
                 
                var ctype= $("#type").val();
                
                var action="GetTariff";
                
                $.post('ajax.php',{ctype:ctype,action:action},function(data){
                  
                    $('#getConsumption').html(data);
                
                });
                
           });
         

              $("#type").change(function(){
                 
                   var t =$("#type").val();
                   $("#getConsumption").change(function(){

                     var getC=$("#getConsumption").val();
                           
                      
                    /*  $.post('tariffchange.php',{t:t,getC:getC},function(data){

                      alert(data);
                      });*/

                   }); 


              });   

          

      });
    </script>
<div class="clr-20"></div>
  <section>
    <div class="row">

      <form method="post" action="tariffchange.php">
        <div class="col-md-12">
         <div class="col-md-12">
        <div class="alert alert-success width float-left" id="update" role="alert" data-toggle="modal">
          <span><?php echo $message;?></span>
          <span class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></span>
            
          </div></div></div>
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
         <div class="col-sm-4">
          <?php $str1="select DISTINCT ctype from tariff";
               $row11=$con->query($str1);

          ?>
         	<div class="form-group">
          <select class="form-control"  name="type" id='type' required data-error="Select ID Proof">
                  <option value="0"> Type</option>
          <?php while ($result1=$row11->fetch_assoc())
             
          {
              $ctype=$result1['ctype'];      
           echo"<option value='".$ctype."'>".$ctype."</option>";
             }?>     
              </select>
            </div>
       </div>
          <div class="col-sm-4">
            <select id="getConsumption" name="get" class="form-control">
              <option value='0'>Select Slab</option>
            </select>
            </div>
        


        
            <div class="col-sm-4">
            <input type="text" name="new" id="new" class="form-control" placeholder="Please enter new tariff" required data-error="First Name is required.">
            </div>
            
            
        </div>
        
        <div class="clr-20"></div>
        <div class="col-md-12"  style="font-family:verdana;font-size:12px;background:lightblue;padding:5px;">
         <div class="col-md-4">Customer Type</div>
         <div class="col-md-4">Consumption(K/L)</div>
         <div class="col-md-4">Charges</div>
        </div>
        <div class="col-md-12" style="background:white;font-family:verdana;font-size:12px;">
             
          <?php
            while($result=$row->fetch_assoc())
            {
          ?>
           <div class="col-md-4" style="border-bottom:1px solid lightgray;">  
           <?php echo $result['ctype'];?></div>
           <div class="col-md-4" style="border-bottom:1px solid lightgray;">
           <?php echo $result['consumption'];?></div>

            <div class="col-md-4" style="border-bottom:1px solid lightgray;">
             <?php echo $result['price'];?></div> 
           <?php }

          ?>
      
              
               
            </div>
            <div class="col-md-12">

              <input type="submit" name ="submit" id="submit" class="col-md-12 btn btn-warning" value="Change Tariff">
          </div>
          
      </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
