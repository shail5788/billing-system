<?php
  $data=$_GET['data'];
 ?>
<style type="text/css">
	.div-back1{
    background-color: #262626;  
    padding:8px;
    border-right: 1px solid #595959 ;
    border-bottom: 0px solid;
    font-family: verdana;
    color:#f2f2f2;

	}
	.div-back{
		 padding:12px;
	}

	.div-back2
	{

		padding: 8px;
		font-family: verdana;
		border:1px solid lightgray;
	/*	border-right: 1px solid lightgray;
    border-bottom: 1px solid lightgray;*/
	}
	

</style>
  
  
        
            <h2 align="center">  BILLING REPORT </h2>
           
            <div class="clr-20"></div>
            <div class="clr-20"></div>
            <div class="clr-20"></div>
            <div class="clr-20"></div>
         
                    
               

          
        

        <div class="col-md-12 table-responsive">
            <table class="table table-bordered" cellspacing="0" style="width:100%; border-color:black; margin-left:0px;" >
               
                <tr class="div-back1" >
                    <th class="div-back1">Bill Id</th>
                    <th class="div-back1">Customer Id</th>
                    
                    <th class="div-back1">Reading</th>
                    <th class="div-back1">Amount</th>
                     <th class="div-back1">Bill Type </th>
                    <th class="div-back1">Month</th>
                    <th class="div-back1">status</th>
                    

                </tr>

                <?php   for ($i=0; $i<count($data); $i++) { ?>
                           
                        <tr>
                        <td class='div-back2'><?php echo $data[$i]['bill_id'] ?></td>
                        <td class='div-back2'><?php echo $data[$i]['customer_id']?></td>
                        <td class='div-back2'><?php echo $data[$i]['reading'] ?></td>
                        <td class='div-back2'><?php echo $data[$i]['total'] ?></td>
                        <td class='div-back2'><?php echo $data[$i]['bill_type'] ?></td>
                        <td class='div-back2'><?php echo $data[$i]['month'] ?></td>
                        <td class='div-back2'><?php echo $data[$i]['status'] ?></td>
                        

                    </tr>
                       
                   
                    
                    
                <?php }?>
              



            </table>

        </div>

    </div>
   
    <div class="clr-20"></div>
    <div class="clr-20"></div>

   




 