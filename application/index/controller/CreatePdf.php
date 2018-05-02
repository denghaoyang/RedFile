<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\index\controller;

/**
 * Description of Createpdf
 *
 * @author idea
 */
class CreatePdf {

    public function creRelayPdf($post)
    {
        //引入核心文件
        require_once(__DIR__.'/../../../vendor/tcpdf/tcpdf/tcpdf.php');
        //初始化参数 A4纸 UTF-8编码
        $pdf = new \TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);


        $pdf->SetAuthor('Denghy');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, PHP');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // 设置间距
        $pdf->SetMargins(20, 30, 20);
        // 取消打印的头部
        $pdf->setPrintHeader(false);
        $pdf->SetFooterMargin(1);
        $pdf->setPrintFooter(false);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // 设置仿宋字体 32号字
        $pdf->SetFont('simfang', '', 32);

        // add a page
        $pdf->AddPage();

        $pdf->Write(0, '收文处理专用笺', '', 0, 'C', true, 0, false, false, 0);

        $pdf->SetFont('simfang', '', 16);

        $pdf->Write(0, '收文第'.$post['receiveNumber'].'号', '', 0, 'L', true, 0, false, false, 0);

        $pdf->Write(0,date('Y年n月d日',strtotime($post['receiveTime'])).'收', '', 0, 'R', true, 0, false, false, 0);

// -----------------------------------------------------------------------------

        $tbl = '
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td style="height: 30px;">来文机关及文件标题:</td>
        <td rowspan="2">'.'来文第'.$post['sendNumber'].'号'.'<br>'.date('Y年n月d日',strtotime($post['sendTime'])).'</td>
    </tr>
    <tr><td style="height: 100px;">'.$post['title'].'</td></tr>
    <tr><td colspan="2" style="height: 300px;" text-align="right"></td></tr>
    <tr><td colspan="2" style="height: 150px;display: flex;flex-wrap: wrap;align-items: center;" text-align="left"></td></tr>
</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');

        //返回绝对路径
        return $pdf->Output(__DIR__ . '/../../../public/uploads/pdf/'.time().'.pdf', 'F');
    }
}