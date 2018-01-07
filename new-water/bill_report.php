
<?php error_reporting(0);
   
   session_start();
   if(!isset($_SESSION['user']))
   {
          header('Location:login.php');
   }

?>
<?php

      include('db/connect.php');
      
    
   
  
   
?>
<?php include("include/header.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->

     <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" type="text/css" href="dist/css/style11.css">  
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
          include("navbar/billingheader.php");
        }
        
 ?> 

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Report And Analysis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Accounting</li>
        <li class="active">Report And Analysis  </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-md-12">
        <div class="col-md-3">
        <select id="year" name="year" class="form-control">
        <option value="0">Select Year </option>
  
        <?php 
     $str="select  Distinct year from bill";
     $row11=$con->query($str);
     while($rslt=$row11->fetch_assoc())
     {
         echo"<option value='".$rslt['year']."'>".$rslt['year']."</option>";

     }
        ?>
            

            
       </select></div><div class="col-md-3">
          <select id="month" name ="month" class="form-control">
                   <option value="0">Select Month</option>

                  
                          
          </select>
       </div>
      <!--  <div class="col-md-3">
          <select class="form-control" id="Get_Pdf_Report">
             <option value="">Get PDF Report </option>
              <?php 
                 $str1="select  Distinct year from bill";
                 $row12=$con->query($str1);    
                 while($rslt1=$row12->fetch_assoc())
                 {
                    
                     echo "<option value='".$rslt1['year']."'>".$rslt1['year']."</option>";

                 }

              ?>
          </select>
       </div>
        <div class="col-md-3">
          <select class="form-control" id="pdfMonth">
             
             <option value="">Get PDF Monthly Report </option>


          </select>
       </div>
 -->       <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
         <script type="text/javascript">
           
          $(document).ready(function(){

                  $('#year').change(function(){
                     
                     var year =$('#year').val();
                     var action="getbillYearly";
                     
                     var glabel=[];
                     var tbill=[];
                     var pBill=[];
                     var uBill=[];

                     $.post('ajax.php',{year:year,action:action},function(data){

                           console.log(data);
                             
                           for(var i=0;i<data.length;i++)
                           {
                               
                               glabel.push(data[i].month);
                         
                               tbill.push(data[i].total_bill);
                               
                               pBill.push(data[i].paidBill);
                               
                               uBill.push(data[i].unpaid_bill);

                           }

                           var chartData={
                            labels:glabel,
                            datasets:[
                          
                          {
                            
                            label:'Total Bill',
                            backgroundColor:'rgba(230, 126, 34,1.0)',
                            borderColor:'rgba(230, 126, 34,1.0)',
                            hoverBackgroundColor:'rgba(211, 84, 0,1.0)',
                            hoverBorderColor:'rgba(211, 84, 0,1.0)',
                            data:tbill
                            

                          },
                          {
                            
                            label:'Paid Bill',
                            backgroundColor:'rgba(46, 204, 113,1.0)',
                            borderColor:'rgba(46, 204, 113,1.0)',
                            hoverBackgroundColor:'rgba(39, 174, 96,1.0)',
                            hoverBorderColor:'rgba(39, 174, 96,1.0)',
                            data:pBill


                          },
                          {
                            
                            label:'UnPaid Bill',
                            backgroundColor:'rgba(231, 76, 60,1.0)',
                            borderColor:'rgba(231, 76, 60,1.0)',
                            hoverBackgroundColor:'rgba(200,200,200,1)',
                            hoverBorderColor:'rgba(200,200,200,1)',
                            data:uBill


                          }

                        ]
                    };
                    var ctx=$("#myChart");
                    
                      var barGraph=new Chart(ctx,{
                          type:'bar',
                          data:chartData

                     });
                    
                      barGraph.destroy();  
                     
                      
                     },'json');
                    
                   // draw piChart data 

                   var action1="getBillAmountYearly";

                   $.post('ajax.php',{action1:action1,year:year},function(data){

                        // console.log(data);
                         var billData=[];
                         billData.push(data.totalBill);
                         billData.push(data.paidBill);
                         billData.push(data.unpaidBill);
                         var data = {
                            labels: [
                                "Total Amount",
                                "Paid Amount",
                                "Unpaid Amount"
                            ],
                            datasets: [
                                {
                                    data: billData,
                                    backgroundColor: [
                                        "#e67e22",
                                        "#2ecc71",
                                        "#e74c3c"
                                    ],
                                    hoverBackgroundColor: [
                                        "#d35400",
                                        "#27ae60",
                                        "#d35400"
                                    ]
                                }]
                        };
                          
                         var ctx1=$("#piChart"); 
                        var myDoughnutChart = new Chart(ctx1, {
                          type: 'doughnut',
                          data: data,
                          
                      });
                         
                   },'json');
                       

                  // get months of active year 

                  var getMonth="GetMonthOfActiveYear";

                  $.post('ajax.php',{getMonth:getMonth,year:year},function(data){

                       $("#month").html(data);

                  });
                 
                   
            });

                 


          $("#month").change(function(){

               var month =$(this).val();
               
               var year =$('#year').val();

               var action="getMonthDetails";
               
               $.post('ajax.php',{year:year,month:month,action:action},function(data){

                    console.log(data);

                        var billData=[];
                         billData.push(data.totalBill);
                         billData.push(data.paidBill);
                         billData.push(data.unpaidBill);
                         var data = {
                            labels: [
                                "Total Amount",
                                "Paid Amount",
                                "Unpaid Amount"
                            ],
                            datasets: [
                                {
                                    data: billData,
                                    backgroundColor: [
                                        "#e67e22",
                                        "#2ecc71",
                                        "#e74c3c"
                                    ],
                                    hoverBackgroundColor: [
                                        "#d35400",
                                        "#27ae60",
                                        "#d35400"
                                    ]
                                }]
                        };
                          
                        var ctx1=$("#monthlyChart"); 
                        var myDoughnutChart = new Chart(ctx1, {
                          type: 'doughnut',
                          data: data,
                          
                      });

                },'json');
          });



          // $("#Get_Pdf_Report").change(function(){

          //       var year=$(this).val();
          //       var getMonth="GetMonthOfActiveYear";

          //       var getyearlyBillingData="getYearlyBillingData";
            
          //       var html="";
               
               
               
          //       $.post('ajax.php',{getyearlyBillingData:getyearlyBillingData,year:year},function(data){
                              
          //                     var month=['01','02','03','04','05','06','07','08','09','10','11','12'];   
          //                    var j=0; 
          //                    $("#chart-container").hide();
          //                     html+="<table class='table table-bordered table-hover' style='width:98%;margin:auto;'>";
          //                     html+="<tr><th>Bill Id</th><th>Customer ID</th><th>Name</th><th>Month</th><th>Year</th>"+
          //                             "<th>Type</th><th>Reading</th><th>Total </th><th>Status</th></tr>"; 
          //                    for(var i=0;i<data.length;i++)
          //                    {
                                 
                                 
          //                             html+="<tr><td>"+data[i].bill_id+"</td>"+
          //                            "<td>"+data[i].customer_id+"</td>"+
          //                            "<td>"+data[i].customer_fullname+"</td>"+
          //                            "<td>"+data[i].month+"</td>"+
          //                            "<td>"+data[i].year+"</td>"+
          //                            "<td>"+data[i].bill_type+"</td>"+
          //                            "<td>"+data[i].reading+"</td>"+
          //                            "<td>"+data[i].total+"</td>"+
          //                            "<td>"+data[i].status+"</td></tr>";
                                
                                  

                             
          //                    }
                             
          //                    console.log("j="+j);




                           
          //                    $(".table-data").html(html);  
          //                    //console.log(data);
          //       },'json');
                 
          //        $.post('ajax.php',{getMonth:getMonth,year:year},function(data){

                      
          //              $("#pdfMonth").html(data);

          //         });




          // });

  });
         </script>
      </div>
        
       <!-- Graph code  -->
         
        <div class="clr-20"></div>
        <div class="clr-20"></div>
         <div class="col-md-12" id="chart-container">
               <div class="col-md-5">
                 <canvas id="myChart" width="700" height='500'></canvas>
                 </div>
              <div class="col-md-4">
                
                <canvas id="piChart" width="700" height='500'></canvas> 
              </div> 
              <div class="col-md-3">
                
                <canvas id="monthlyChart" width="700" height='500'></canvas> 
              </div>   
         </div>
         <div class="col-md-12 table-data">
           
         </div>
         <!-- <div class="clr-20"></div>
         <div class="clr-20"></div>
         <div class="clr-20"></div>
         <div class="col-md-12">
           
             <div class="col-md-6 col-md-offset-3">
                    <canvas id="monthlyChart" width="700" height='500'></canvas>
             </div>
             
         </div> -->
      
   

  </section>

     </div>
    <?php include "include/footer.php"; ?>