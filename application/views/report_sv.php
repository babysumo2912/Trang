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
$masinhvien = $this->session->userdata("masinhvien");
$html = '

        <div style="max-width: 500px; border: 1px #ccc solid; margin: 0 auto;padding: 10px; margin-bottom: 10px;margin-top: 20px;">';
        if(isset($sinhvien) && $sinhvien!=''){
                foreach ($sinhvien as $row){;
$html.='
                    <div style=" font-size: 17; line-height: 0.7;">
                    <p>Mã sinh viên:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> '.$row->masinhvien.'</b></p>
                    <p>Tên sinh viên:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$row->tensinhvien.'</b></p>
                    <p>Phái:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$row->phai.'</b></p>
                    <p>Ngày sinh:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$row->ngaysinh.'</b></p>
                    <p>Nơi sinh:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$row->quequan.'</b></p>
                    <p>Hệ đào tạo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <p>Lớp:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <p>Khoa: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <p>Chuyên ngành:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </div>';
                }
            };
$html.='
            <hr> ';
            $danhsachsinhvien_hk = $this->sinhvien_models->danhsachmonhoc($masinhvien);
             // $danhsachsinhvien_hk = $this->sinhvien_models->danhsachmonhoc_hk($masinhvien,'1');
            if($danhsachsinhvien_hk){
            $sotinchidat = 0;
            $tongdiem = 0;
            $tongdiem10 = 0;

                foreach ($danhsachmonhoc_sinhvien as $svhk) {
                    if($svhk->TK10 >=4.0){
                        if($svhk->TKCH == "A"){
                            $heso = 4;
                        }
                        if($svhk->TKCH == "B+"){
                            $heso = 3.5;
                        }
                        if($svhk->TKCH == "B"){
                            $heso = 3;
                        }
                        if($svhk->TKCH == "C+"){
                            $heso = 2.5;
                        }
                        if($svhk->TKCH == "C"){
                            $heso = 2;
                        }
                        if($svhk->TKCH == "D+"){
                            $heso = 1.5;
                        }
                        if($svhk->TKCH == "D"){
                            $heso = 1;
                        }
                        if($svhk->TKCH == "F"){
                            $heso = 0;
                        }
                         $monhoc = $this->monhoc_models->getinfo($svhk->mamh);
                        foreach($monhoc as $mh){};
                        $tenmonhoc = $mh->tenmonhoc;
                        $tinchi = $tinchi->sotinchi;
                        $sotinchidat += $mh->sotinchi;
                        $tongdiem += ($heso*$mh->sotinchi);
                        $tongdiem10+=($svhk->TK10*$mh->sotinchi);
                    }
                }

            }else{
                $sotinchidat = 0;
            $tongdiem = 0;
            $tongdiem10 = 0;
            }
            
             if($danhsachsinhvien_hk==false){
$html.='
            <div style=" font-size: 17; line-height: 0.7;">
             <p>Số tín chỉ đạt: <b>0</b><br></p>
             <p>Điểm trung bình tích lũy (hệ 4): <b>0</b><br></p>
             <p>Điểm trung bình tích lũy (hệ 10): <b>0</b><br></p>
             </div>
                ';
             }else{

              if($sotinchidat == 0){;
$html.='
            <div style="font-family: Times; font-size: 17; line-height: 0.7;">
             <p>Số tín chỉ đạt: <b><?php echo $sotinchidat; ?></b><br></p>
             <p>Điểm trung bình tích lũy (hệ 4): <b>0</b><br></p>
             <p>Điểm trung bình tích lũy (hệ 10): <b>0</b><br></p>
             </div>';

              }else{

$html.='
             <div style=" font-size: 17; line-height: 0.7;">
             <p>Số tín chỉ đạt: <b>'.$sotinchidat .'</b><br></p>
             <p>Điểm trung bình tích lũy (hệ 4): <b>'.round($tongdiem/$sotinchidat,2).'</b><br></p>
             <p>Điểm trung bình tích lũy (hệ 10): <b>'.round($tongdiem10/$sotinchidat,2).'</b><br></p>
             </div>';

             }
         }
$html.='
        </div>
        <div>';
            

            if($danhsachmonhoc_sinhvien && $danhsachmonhoc_sinhvien!=''){
                foreach ($danhsachmonhoc_sinhvien as $key) {};
                    $hocki = $this->home_models->get_info($key->id_hocki,'id_hocki','tb_hocki');
                    foreach ($hocki as $hk) {};
$html.='
                <div style="border: 1px white solid; box-shadow: 5px 5px 15px #ccc; padding:20px; margin-bottom: 30px">
                <table border="1px" cellpadding="10px" style="font-family: times">
                <caption style="font-family: Times; font-size: 18; color: black;">Học kì '.$hk->tenhocki.'Năm học: '.$hk->nambatdau.'-'.$hk->namketthuc .'</caption>
                <tr style=" font-size: 18;font-weight: bold; text-align: center;">
                    <td>
                        Mã môn học
                    </td>
                    <td>Tên môn học</td>
                    <td>Nhóm môn học</td>
                    <td>Số tín chỉ</td>
                    <td>Điểm A(1)</td>
                    <td>Điểm A(2)</td>
                    <td>Điểm B</td>
                    <td>Điểm C</td>
                    <td>Điểm TK(10)</td>
                    <td>Điểm TK(CH)</td>
                </tr>
';

                
$html.='
                <tr>
                    <td>
                        '.$svhk->mamh.'
                    </td>
                    <td>'.$tenmonhoc.'</td>
                    <td><?php echo $svhk->nhommonhoc ?></td>
                    <td style="text-align: center">'.$tinchi .'</td>
                    <td style="text-align: center">'.$svhk->diemA .'</td>
                    <td style="text-align: center">'.$svhk->diemA_2 .'</td>
                    <td style="text-align: center">'.$svhk->diemB .'</td>
                    <td style="text-align: center">'.$svhk->diemC .'</td>
                    <td style="text-align: center">'.$svhk->TK10 .'</td>
                    <td style="text-align: center">'.$svhk->TKCH .'</td>
                </tr>
            </table>'; 
            $hocki = $this->home_models->hocki();
            foreach ($hocki as $hk) {};
            $session_login = $this->session->userdata('masinhvien');
            $diemrl = $this->sinhvien_models->get_drl($hk->id_hocki,$session_login);
$html.='Điểm rèn luyện: '.$diemrl;
            $tinchi_1ki = $this->sinhvien_models->gettinchi($hk->id_hocki,$session_login);
            $sum = $this->sinhvien_models->get_tong($hk->id_hocki,$session_login);
$html.= '<br>';
            $html.='Điểm trung binh hoc ki: '.round($sum/$tinchi_1ki,2);
$html.='</div>';
           
                };
$html.='
                </table>
                
        </div>
        </div>


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
