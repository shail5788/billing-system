<?php
    
    error_reporting(0);

     session_start();
     
     if(!isset($_SESSION['user']))
     {
            header('Location:login.php');
     }
      
     $message=$_GET['msg'];
       



include_once 'include/header.php'; 
?>
   
 
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
        <small>Amendments </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Employee</li>
        <li class="active">  Amendments</li>
      </ol>
    </section>
  <?php
        include('db/connect.php');
      
        
           $emp_id=$_POST['emp_id'];
           $emp_id1=$result["emp_id"];
           $qery1="select * from assets where emp_id='$emp_id'";
           $row1=$con->query($qery1);
             
             
            
           // print_r($result);
?>
       
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

<div class="clr-20"></div>
  <section>

    <div class="row">
      <div class="col-md-12">
         <div class="col-md-12">
         <div class="alert alert-success width float-left" id="update" role="alert" data-toggle="modal">
          <span><?php echo $message;?></span>
          <span class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></span>
          </div>
         </div>
      </div>
          <div class="col-md-12">
          <form method="post">
            <div class="col-sm-4">
              <input type="text" name="emp_id" id="emp_id" class="form-control" placeholder="Employee Id *">
            </div>
           <!--  <div class="col-sm-4">
            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No ">
            </div>
            <div class="col-sm-2">
            <input type="text" name=Bill No" class="form-control" placeholder="Please Enter Bill No. *"  >
            </div> -->

           <div class="col-sm-2">
            <input type="submit" name="Find" class="col-md-12 btn btn-warning" value="Find">
            </div>
           </form>
           </div>
        
        <div class="clr-20"></div>
         <div class="clr-20"></div>
          <div class="clr-20"></div>
          
      
         <?php 
         if($row1->num_rows>0){ ?>    
         <form method="post" action="asset-info-updating.php" >
          <?php $i=0; while($result1=$row1->fetch_assoc()){$i++;?>
        <div class="col-md-12" >
         
          <div class="col-sm-4">
            <input type="text" name="device_type<?php echo $i ?>" class="form-control" value='<?php echo $result1['asset_name'];?>' required data-error=" required.">
            </div>
            <div class="col-sm-4">
            <input type="text" name="dbrand<?php echo $i ?>" class="form-control" value='<?php echo $result1['brand'];?>'>
            </div>
            <div class="col-sm-4">
            <input type="text" name="sr_no<?php echo $i ?>"  class="form-control" value='<?php echo $result1['asset_id'];?>' placeholder=" Device Id" >
            </div>
            <?php if($i==4){ ?>
            <input type="hidden" name="emp_id" value="<?php echo $result1['emp_id'] ?>">

         <div class="clr-20"></div>
         <div class="clr-20"></div>
        
            <div class="col-md-12">
               <button type="submit" class="col-md-12 btn btn-warning" name='update' >Update </button>
              </div>
          </form>    
            <?php }
            
            ?>
        </div>
       
        <div class="clr-20"></div>
       
        <?php  }
        }else { ?>
         <form method="post" action="assign_asset.php" name="form2">
         <div class="col-md-12" >
         
          <div class="col-sm-4">
            <input type="text" name="device_type1" class="form-control" required placeholder="Device Type ">
            </div>
            <div class="col-sm-4">
            <input type="text" name="dbrand1" class="form-control" placeholder="Brand">
            </div>
            <div class="col-sm-4">
            <input type="text" name="sr_no1"  class="form-control" placeholder=" Device Id" >
            </div>
           
            <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">

         <div class="clr-20"></div>
         
            </div>
            <div class="col-md-12" >
         
          <div class="col-sm-4">
            <input type="text" name="device_type2" class="form-control" required placeholder="Device Type">
            </div>
            <div class="col-sm-4">
            <input type="text" name="dbrand2" class="form-control" placeholder="Brand">
            </div>
            <div class="col-sm-4">
            <input type="text" name="sr_no2"  class="form-control" placeholder=" Device Id" >
            </div>
           
       

             <div class="clr-20"></div>

            </div>
            <div class="col-md-12" >
         
          <div class="col-sm-4">
            <input type="text" name="device_type3" class="form-control" required placeholder="Device Type">
            </div>
            <div class="col-sm-4">
            <input type="text" name="dbrand3" class="form-control" placeholder="Brand">
            </div>
            <div class="col-sm-4">
            <input type="text" name="sr_no3"  class="form-control" placeholder=" Device Id" >
            </div>
           
         

         <div class="clr-20"></div>
     
            </div>
             <div class="col-md-12" >
         
           <div class="col-sm-4">
            <input type="text" name="device_type4" class="form-control" required placeholder="Device Type">
            </div>
            <div class="col-sm-4">
            <input type="text" name="dbrand4" class="form-control" placeholder="Brand">
            </div>
            <div class="col-sm-4">
            <input type="text" name="sr_no4"  class="form-control" placeholder=" Device Id" >
            </div>
           
         

         <div class="clr-20"></div>
     
            </div>
            <div class="col-md-12">
             <div class="col-md-12">
                <button type="submit" class="col-md-12 btn btn-warning" name='addData' >Insert </button>
             </div>
              
              </div>
            
            
          </form>  
          
      
        <?php }?>
       
        
       
       
        
      
        
       
     
    </div>

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
