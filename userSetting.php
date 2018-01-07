<?php
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
        <small>Change Password </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Connection</li>
        <li class="active"> Change Password </li>
      </ol>
    </section>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/userSetting.js"></script>
     <!-- @ js code for searching --> 
    

<div class="clr-20"></div>
  <section>
    <div class="row">
     <div class="clr-20"></div>
      <div class="clr-20"></div>
       <div class="clr-20"></div>
      <div class="clr-20"></div>
         <div class="clr-20"></div>
      <div class="clr-20"></div>
         <div class="clr-20"></div>
      <div class="clr-20"></div>
        <div class="col-md-6 col-md-offset-3  msgdiv" style="display: none;">
           <span class="alert" id="masge"></span>
      
       </div>
       <div class="clr-20"></div>
        <div class="col-md-6   col-md-offset-3" >
        
            <label>OldPasword</label>
            <input type="hidden" name="flag" id="flag" value="">
            <input type="password" name="oldPassword" id="oldPassword" class="form-control">
            <label>New Password </label>
            <input type="password" name="newPassword" id="newPassword" class="form-control" readonly><br>
            <input type="button" name="changePassword" id="changePassword" value="Change Password" class="btn btn-warning"> 
              
         
        </div>
          <div class="clr-20"></div>
          <div class="clr-20"></div>

        
            
    </div>
        



    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
