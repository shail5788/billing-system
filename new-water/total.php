<?php
    include("db/connect.php");
      $reading=$_POST['mread'];
      $type=$_POST['type'];
      $previous_m=$_POST['previous_m'];
      $actual_reading=$reading-$previous_m;
   		$str1="select * from extra_charge where id='1'";
     	$row1=$con->query($str1);
     	$result1=$row1->fetch_assoc();
     	$sanitry_cost=$result1['sanitary'];
     	$meter_cost=$result1['meter_charge'];
     	$other_charge=$result1['other_charge'];
        $str8d="select * from tariff where consumption='8' AND ctype='Domestic' ";
        $s8d=$con->query($str8d);
        $r88=$s8d->fetch_assoc();
        $price8=$r88['price'];
        //For 15 Slab 
        $str15d="select * from tariff where consumption='15' AND ctype='Domestic' ";
        $s15d=$con->query($str15d);
        $r15=$s15d->fetch_assoc();
        $price15=$r15['price'];
        //greater than 15 slab
        $str25d="select * from tariff where consumption='25' AND ctype='Domestic' ";
        $s25d=$con->query($str25d);
        $r25=$s25d->fetch_assoc();
        $price25=$r25['price'];
        //greater than 25 
        $str26d="select * from tariff where consumption='26' AND ctype='Domestic' ";
        $s26d=$con->query($str26d);
        $r26=$s26d->fetch_assoc();
        $price26=$r26['price'];
        //Comercial type 
        $str8c="select * from tariff where consumption='8' AND ctype='Commercial' ";
        $s8c=$con->query($str8c);
        $r88c=$s8c->fetch_assoc();
        $price8c=$r88c['price'];
        // For 15 slab 
        $str15c="select * from tariff where consumption='15' AND ctype='Commercial' ";
        $s15c=$con->query($str15c);
        $r15c=$s15c->fetch_assoc();
        $price15c=$r15c['price'];
        // Form 25 slab
        $str25c="select * from tariff where consumption='25' AND ctype='Commercial' ";
        $s25c=$con->query($str25c);
        $r25c=$s25c->fetch_assoc();
        $price25c=$r25c['price'];
        // for more than 25 
        $str26c="select * from tariff where consumption='26' AND ctype='Commercial' ";
        $s26c=$con->query($str26c);
        $r26c=$s26c->fetch_assoc();
        $price26c=$r26c['price'];

        // for non-commercial user *****************
         $str8nc="select * from tariff where consumption='8' AND ctype='Non-Commercial' ";
        $s8nc=$con->query($str8nc);
        $r88nc=$s8nc->fetch_assoc();
        $price8nc=$r88nc['price'];
        // For 15 slab 
        $str15nc="select * from tariff where consumption='15' AND ctype='Non-Commercial' ";
        $s15nc=$con->query($str15c);
        $r15nc=$s15nc->fetch_assoc();
        $price15c=$r15nc['price'];
        // Form 25 slab
        $str25nc="select * from tariff where consumption='25' AND ctype='Non-Commercial' ";
        $s25nc=$con->query($str25nc);
        $r25nc=$s25nc->fetch_assoc();
        $price25nc=$r25nc['price'];
        // for more than 25 
        $str26nc="select * from tariff where consumption='26' AND ctype='Non-Commercial' ";
        $s26nc=$con->query($str26nc);
        $r26nc=$s26nc->fetch_assoc();
        $price26nc=$r26nc['price'];

   if($actual_reading<=8 && $type=='Domestic')
   {
     
      $str="select price from tariff where consumption='8' AND ctype='Domestic' ";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $total_water_price=($actual_reading*$price); 
      echo $grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);

   }
   else if($actual_reading >8 && $actual_reading<=15 && $type=='Domestic')
   {
      

      $str="select price from tariff where consumption='15' AND ctype='Domestic'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $a_reading=$actual_reading-8;
      $price1=$a_reading*$price;
      $price2=8*$price8;
      $total_water_price=($price1+$price2); 
      echo $grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge); 

   }
   else if($actual_reading>15 && $actual_reading<=25 && $type=='Domestic')
   {

      $str="select price from tariff where consumption='25' AND ctype='Domestic' ";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $slab=8;
      $slab1=15;
      $r25=$actual_reading-$slab1;
      $price1=$r25*$price25;
      $actual_reading=$actual_reading-$r25;
      $r15=$actual_reading-$slab;
      $price2=$r15*$price15;  
      $actual_reading=$actual_reading-$r15;
      $price3=$actual_reading*$price8;
       

      $total_water_price=($price1+$price2+$price3);   
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);

   }
   else if($actual_reading >=25 && $type=='Domestic')
   {
      $str="select price from tariff where consumption='26' AND ctype='Domestic'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $slab=8;
      $slab1=15;
      $slab2=25;  
      $r26=$actual_reading-$slab2;
      $price1=$r26*$price;
      $actual_reading=$actual_reading-$r26;
      $r25=$actual_reading-$slab1;
      $price2=$r25*$price25;
      $actual_reading=$actual_reading-$r25;
      $r15=$actual_reading-$slab;
      $price3=$r15*$price15;
      $actual_reading=$actual_reading-$r15;
      $price4=$actual_reading*$price8;
      $total_water_price=($price1+$price2+$price3+$price4);
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);
   }  
   else if($actual_reading<=8 && $type=='Commercial')
   {
      $str="select price from tariff where consumption='8' AND ctype='Commercial'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $total_water_price=($actual_reading*$price); 
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);
   }
   else if($actual_reading>8 && $actual_reading<=15 && $type=='Commercial')
   {

      $str="select price from tariff where consumption='15' AND  ctype='Commercial'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $a_reading=$actual_reading-8;
      $price1=$a_reading*$price;
      $price2=8*$price8c;
      $total_water_price=($price1+$price2); 
      //$total_water_price=($actual_reading*$price);   
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);
   }
    else if($actual_reading>15 && $actual_reading<=25 && $type=='Commercial')
   {

      $str="select price from tariff where consumption='25' AND  ctype='Commercial'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $slab=8;
      $slab1=15;
      $r25c=$actual_reading-$slab1;
      $price1=$r25c*$price25c;
      $actual_reading=$actual_reading-$r25c;
      $r15c=$actual_reading-$slab;
      $price2=$r15c*$price15c;  
      $actual_reading=$actual_reading-$r15c;
      $price3=$actual_reading*$price8c;
       

      $total_water_price=($price1+$price2+$price3); 
      //$total_water_price=($actual_reading*$price);   
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);
   }
    else if($actual_reading>25 && $type=='Commercial')
   {

      $str="select price from tariff where consumption='26' AND  ctype='Commercial'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $slab=8;
      $slab1=15;
      $slab2=25;  
      $r26c=$actual_reading-$slab2;
      $price1=$r26c*$price;
      $actual_reading=$actual_reading-$r26c;
      $r25c=$actual_reading-$slab1;
      $price2=$r25c*$price25c;
      $actual_reading=$actual_reading-$r25c;
      $r15c=$actual_reading-$slab;
      $price3=$r15c*$price15c;
      $actual_reading=$actual_reading-$r15c;
      $price4=$actual_reading*$price8c;
      $total_water_price=($price1+$price2+$price3+$price4);
      //$total_water_price=($actual_reading*$price);   
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);
   }
    else if($actual_reading<=8&& $type=='Non-Commercial')
   {

      $str="select price from tariff where consumption='8' AND  ctype='Non-Commercial'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $total_water_price=($actual_reading*$price);   
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);

   }
    else if($actual_reading>8 && $actual_reading<=15 && $type=='Non-Commercial')
   {

      $str="select price from tariff where consumption='15' AND  ctype='Non-Commercial'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $a_reading=$actual_reading-8;
      $price1=$a_reading*$price;
      $price2=8*$price8nc;
      $total_water_price=($price1+$price2); 

      //$total_water_price=($actual_reading*$price);   
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);
   }
     else if($actual_reading>15 && $actual_reading<=25 && $type=='Non-Commercial')
   {

      $str="select price from tariff where consumption='25' AND  ctype='Non-Commercial'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $slab=8;
      $slab1=15;
      $r25nc=$actual_reading-$slab1;
      $price1=$r25nc*$price25nc;
      $actual_reading=$actual_reading-$r25nc;
      $r15nc=$actual_reading-$slab;
      $price2=$r15nc*$price15nc;  
      $actual_reading=$actual_reading-$r15nc;
      $price3=$actual_reading*$price8nc;
       

      $total_water_price=($price1+$price2+$price3); 
      //$total_water_price=($actual_reading*$price);   
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);
   }
     else if($actual_reading>25 && $type=='non-commercial')
   {

      $str="select price from tariff where consumption='26' AND  ctype='Non-Commercial'";
      $row=$con->query($str);
      $result=$row->fetch_assoc();
      $price=$result['price'];
      $slab=8;
      $slab1=15;
      $slab2=25;  
      $r26nc=$actual_reading-$slab2;
      $price1=$r26nc*$price;
      $actual_reading=$actual_reading-$r26nc;
      $r25nc=$actual_reading-$slab1;
      $price2=$r25c*$price25nc;
      $actual_reading=$actual_reading-$r25nc;
      $r15nc=$actual_reading-$slab;
      $price3=$r15nc*$price15c;
      $actual_reading=$actual_reading-$r15nc;
      $price4=$actual_reading*$price8nc;
      $total_water_price=($price1+$price2+$price3+$price4);
      //$total_water_price=($actual_reading*$price);   
      echo$grand_total=($total_water_price+$sanitry_cost+$meter_cost+$other_charge);
   }

  







  

?>