<?php

require_once("tcpdf.php");

$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

// 设置文档信息
$pdf->SetCreator('Helloweba');
$pdf->SetAuthor('yueguangguang');
$pdf->SetTitle('Welcome to helloweba.net!');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, PHP');

// 设置页眉和页脚信息
//$pdf->SetHeaderData('', 30, 'Helloweba.com', '致力于WEB前端技术在中国的应用', array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// 设置页眉和页脚字体
//$pdf->setHeaderFont(Array('stsongstdlight', '', '10'));
//$pdf->setFooterFont(Array('helvetica', '', '8'));

// 设置默认等宽字体
$pdf->SetDefaultMonospacedFont('stsongstdlight');

// 设置间距
$pdf->SetMargins(40, 27, 40);
$pdf->setPrintHeader(false);
//$pdf->SetHeaderMargin(5);
//$pdf->SetFooterMargin(10);

// 设置分页
$pdf->SetAutoPageBreak(TRUE, 25);

// set image scale factor

// set default font subsetting mode
$pdf->setFontSubsetting(true);

//设置字体
$pdf->SetFont('stsongstdlight', '', 25);
$pdf->AddPage();
$str1 = '全国教育教学信息化交流展示活动';
$pdf->Write(0,$str1,'', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('simli', '', 57);
$pdf->setColor('text',"255","0","0");
$pdf->SetAbsY(50);
$str1 = '获奖证书';
$pdf->Write(20,$str1,'', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('simli', '', 30);
$pdf->setColor('text');
$str1 = '史广海同志';
$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);
$str1 = '    报送的作品《旋转的图形》荣获第二十一届全国教育教学信息化大奖赛基础教育组课件';
$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('simli', '', 50);
$str1 = '三等奖';
$pdf->Write(30,$str1,'', 0, 'C', true, 0, false, false, 0);
//$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);
//$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);
require_once 'phpqrcode.php';
$fileName = "files/bb.png";
  // 纠错级别：L、M、Q、H
QRcode::png("lfq.gov.cn", $fileName, "H",10);

$pdf->Image($fileName,40,130,23,23,"png");
//输出PDF
$pdf->SetFont('simyou', '', 8);
$str1 = '证书编号：517231A01010016';
$pdf->SetAbsX(40);
$pdf->SetAbsY(155);
$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);
$str1 = '官方网站：http://www.mtsa1998.com.cn';
$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);
$str1 = '根据中央电化教育馆【教电馆[2017]197号】文件，此证书打印有效，可扫描二维码或登录网站验证 ';
$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);
$pdf->Image("jyjz.png",180,130,40,40,"png");
$pdf->SetAbsX(180);
$pdf->SetAbsY(130);
$pdf->SetFont('simli', '', 20);
$str1 = '中央电化教育馆';
$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);
$pdf->SetAbsX(180);
$str1 = '二○一七年十二月';
$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);
$pdf->Image('3.png',1,1,200,110,"png");

$pdf->Output('t.pdf', 'I');



