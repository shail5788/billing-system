<?php
      require_once("dompdf/dompdf_config.inc.php");
      $data=$_POST['data'];
      spl_autoload_register('DOMPDF_autoload');
     function pdf_create($html,$filename,$paper,$orientation,$stream=true){
           $dompdf=new DOMPDF();
           $dompdf->set_paper($paper,$orientation);
           $dompdf->load_html($html);
           $dompdf->render();
           $dompdf->stream($filename.".pdf");
     }
    $filename='file_name';
    $dompdf=new DOMPDF();
    $html=file_get_contents('generateBillPdf.php?data[]='.$data );
    pdf_create($html,$filename,'A4','portrait');



?>
