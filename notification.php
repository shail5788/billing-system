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
<?php include "include/header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php 
     include("db/connect.php");
     include("navbar/super-adminheader.php");
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Email Notification </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Admin Tool</li>
        <li class="active">Email Notification</li>
      </ol>
    </section>
<div class="clr-20"></div>
  <section>
    <div class="row">
      
       
        <div class="col-md-12">
        <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function(){
                getEmailList();
                $("#submit").click(function(){

                     var email= $("#email").val();
                     var action="NotificationMail"; 
                  
                  if(email!="")  
                  {      
                        if(validateEmail(email))
                         {
                            
                            $.post('ajax.php',{email:email,action:action},function(data){
                             alert(data);
                             console.log(data);
                             getEmailList();
                            });

                            $("#email").val('');
                         }
                         else{
                          
                          alert("Enter the valid Email Address");
                         
                         }
                  }
                  else {
                    alert("Enter the Email address");
                  }       
                        
                         


                    });

                  function validateEmail(email)
                  {
                        
                        var filter = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                            
                            if (filter.test(email))
                            {
                               return true;
                            }
                            else
                            {
                               return false;
                            }

                 }

                 function getEmailList()
                 {
                      
                      var action="getEmailListData";
                      var html="";
                      html+="<table class='table table-bordered' style='background:white;width:56%;margin:160px;margin-top:0px;'>"+
                      "<tr><th>Email</th><th>Operation</th></tr>";
                      $.post('ajax.php',{action:action},function(data){
                        
                         for (var i = 0; i< data.length; i++) {
                           
                                html+="<tr><td>"+data[i].email+"</td>"+
                                "<td><a href='#'class='btn btn-warning edit' Ide='"+data[i].id+"'>Edit</a>|<a href='#'class='btn btn-danger delete' Ide='"+data[i].id+"'>Delete</a></td></tr>";
                         }
                         html+="</table>";

                         $("#emailList").html(html);

                         // edit code 
                         $(".edit").click(function(){

                                var id=$(this).attr("Ide");
                                var action="getSpacificEmail";
                                $("#emailNotification").modal();
                                $.post('ajax.php',{action:action,id:id},function(data){
                                   
                                    $("#emailid").val(data[0].email);
                                    $("#id").val(data[0].id);
                                
                                },'json');

                         });
                         // deletion code 

                         $(".delete").click(function(){

                                var id=$(this).attr("Ide");
                                var action="removeEmail";
                                response=confirm("Do you want to delete ?");
                                if(response)
                                {
                                   
                                   $.post('ajax.php',{action:action,id:id},function(data){

                                         alert(data); 
                                         getEmailList();
                                   });

                                }

                         });

                      },'json');
                 }
 
                  $("#changeEmail").click(function(){

                      var email =$("#emailid").val();
                      var id=$("#id").val();
                      var action ="UpdateEmailId";
                      $.post('ajax.php',{action:action,id:id,email:email},function(data){

                            alert(data);
                            getEmailList();
                           $("#emailNotification").modal('hide');

                      });
                  });


              });

               

        </script>
           <form method="post" action="#" id="emailForm" class="form-horizontal">
           <div class="col-md-8">
              <div class="clr-20"></div> 
               <div class="clr-20"></div>  
                   
                   <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-xs-3 control-label">Email address</label>
                             <div class="col-xs-7">
                              <input type="text" class="form-control" id="email" name="email" required placeholder="Enter Email Address" />
                              </div>
                        </div>
                   </div> 
                   <div class="col-md-2">
                     <input type="button" name="submit" id="submit" class="col-md-12 btn btn-success" value="Add">
                   </div>


           </div></form>
 
          
        </div>
        <div class="clr-20"></div>
         <div class="col-md-12" id="emailList">
              
         </div>
       </div>

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
<div class="modal fade" tabindex="-1" role="dialog" id="emailNotification">
            <div class="modal-dialog" role="document" style="width: 20%;margin-top:340px;">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title "> <span class='glyphicon glyphicon-edit'></span>
                        Edit Email Id </h4>
                     </div>
                      <div class="modal-body">
                        <div class="row locationData">
                          <div class="col-md-12  ldetail table-responsive"
                           style="margin:auto;" id="ldetail">
                           <table class="table table-responsive table-bordered ">
                              <tr>
                                <td><label>Email Id </label><input type="text" name="emailid" id="emailid" class="form-control"></td>
                                
                                <input type="hidden" id="id">
                              </tr>  
                           </table>
                         </div>
                     </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary " id="changeEmail" >Update Email Id </button>
                </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
