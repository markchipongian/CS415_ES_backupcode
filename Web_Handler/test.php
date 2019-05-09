<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */
// echo "WEB HANDLER";
require_once("../Auth/web_authservice.php"); 
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

if(isset($_POST['submit_report'])){

     $dateFrom = $_POST['report_startDate'];
     $dateTo = $_POST['report_endDate'];

     

     $type='report_date';
     $dates = array('report_startDate' => $dateFrom, 'report_endDate' => $dateTo);
     $data = json_encode($dates);
     // print_r(APICall($data,$type));
     $result = json_decode(APICall($data,$type), true); 
     // echo $result;

     // create new PDF document
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
     $obj_pdf->SetCreator(PDF_CREATOR);  
     $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
     $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
     $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
     $obj_pdf->SetDefaultMonospacedFont('helvetica');  
     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
     $obj_pdf->setPrintHeader(false);  
     $obj_pdf->setPrintFooter(false);  
     $obj_pdf->SetAutoPageBreak(TRUE, 10);  
     $obj_pdf->SetFont('helvetica', '', 12);  
     $obj_pdf->AddPage();  
     $content = '';  
     $content .= '  
     <h3 align="center">Report On Selected Date ('.$dateFrom.') to ('.$dateTo.') </h3><br /><br />  
     <table border="1" cellspacing="0" cellpadding="5">  
          <tr>  
               <th width="33.3%"><u><b>ID</b></u></th>  
               <th width="33.3%"><u><b>COURSE CODE</b></u></th>  
               <th width="33.3%"><u><b>FEE(FJD)</b></u></th> 
          </tr>  
     ';  
     $content .= $result;  
     $content .= '</table>';  
     $obj_pdf->writeHTML($content);  
     $obj_pdf->Output('sample.pdf', 'I');  



}

