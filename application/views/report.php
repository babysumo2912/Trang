<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
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
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04 
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData();

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '
        <h1>Danh sách Sinh viên lớp ';

        if(isset($tenlop)){
            foreach ($tenlop as $tl) {
$html.=$tl->tenlop;
            }
        }
$html.='
</h1>
             <table border="1" cellpadding="5px">
                 <tr>
                     <td style="width:10% ">STT</td>
                     <td style="width:16%">Mã sinh viên</td>
                     <td style="width:15%">Tên sinh viên</td>
                     <td style="width:10%">Giới tính</td>
                     <td style="width:15%">Ngày sinh</td>
                     <td style="width:10%">Nơi sinh</td>
                     <td style="width:10%">Điểm hệ 4</td>
                     <td style="width:10%">Điểm rèn luyện</td>
                     <td style="width:10%">Học bổng</td>
                 </tr>
';
                 $hocki = $this->home_models->hocki();
                 foreach ($hocki as $hk) {};
                 if(isset($data1)){
                    $i = 0;
                    foreach($data1 as $row){
                        $tinchi_1ki = $this->sinhvien_models->gettinchi($hk->id_hocki,$row->masinhvien);
                        $sum = $this->sinhvien_models->get_tong($hk->id_hocki,$row->masinhvien);
                        $diemrl = $this->sinhvien_models->get_drl($hk->id_hocki,$row->masinhvien);
                        $i ++;
                        // $this->
$html.='
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$row->masinhvien.'</td>
                    <td>'.$row->tensinhvien.'</td>
                    <td>'.$row->phai.'</td>
                    <td>'.$row->ngaysinh.'</td>
                    <td>'.$row->quequan.'</td>
                    <td>';
                        if($tinchi_1ki == 0){
$html.=0;
                        }else {
$html.=round($sum/$tinchi_1ki,2);
                        }

$html.='
                    </td>
                    <td>'.$diemrl.'</td>
                    ';
                    if($diemrl >=85 && round($sum/$tinchi_1ki,2) >=3.6){

                    ;
$html.='
					<td>Loại 1</td>';
					}else{
						if($diemrl >=80 && round($sum/$tinchi_1ki,2) >=3.2){
$html.='<td>Loại 2</td>';
					}else{
$html.='<td></td>';
					}
				};
$html.='
                </tr>';
                    }
                 }


$html.='
             </table>



';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
