<?php
require('fpdf.php');

//var_dump($_POST);
//$_POST[""];
//$_POST["recid"];
$sitSHNames = explode(",",$_POST["sitSHNames"]);
$sitSHDesigs = explode(",",$_POST["sitSHDesigs"]);
$clientSHNames = explode(",",$_POST["clientSHNames"]);
$clientSHDesigs = explode(",",$_POST["clientSHDesigs"]);
class PDF extends FPDF
{
//function Header()
//{
//    $this->Image('images/header.png',20,5,165,15);
//    $this->Ln(10);
//}
//function BasicTable($header, $data)
//{
//    // Header
//    $count = 1;
//    foreach($header as $col){
//        if($count==1){$width=20;}elseif($count==2){$width=60;}elseif($count==3){$width=90;}else{$width=20;}
//        $count +=1;
//        $this->Cell($width,7,$col,1);
//    }           
//    $this->Ln();
//    // Data
//    foreach($data as $row)
//    {
//        $count = 1;
//        foreach($row as $col){
//            if($count==1){$width=20;}elseif($count==2){$width=60;}elseif($count==3){$width=90;}else{$width=20;}
//            $count +=1;
//                $this->Cell($width,6,$col,1,0);
////            if(strlen($col)>60){
////                $this->MultiCell($width,6,WordWrap($col,40),1,0);
////            }else{
////                $this->Cell($width,6,$col,1,0);
////            }
//            
//        }
//        $this->Ln();
//    }
//}
function Table1($data)
{
    // Header
//    foreach($header as $col)
//        $this->Cell(40,7,$col,1);
//    $this->Ln();
    // Data
    $this->SetFont('Arial','',10);
    $this->SetY(50);
//    $this->SetX(100);
    $this->Image('images/sitlogo.png',125,40,60,10);
    $c = 1;
    foreach($data as $row)
    {
        $count = 1;
        foreach($row as $col){
            if($c<3){if($count==1){$this->SetX(110); $this->Cell(20,5,$col,'T');}else{ $this->MultiCell(60,5,$col,'T');}$c+=1;}
//            else if($c>14){if($count==1){$this->SetX(120); $this->Cell(20,5,$col,'B');}else{ $this->MultiCell(50,5,$col,'B');}$c+=1;}
            else{if($count==1){$this->SetX(110); $this->Cell(20,5,$col,0);}else{ $this->MultiCell(60,5,$col,0);}$c+=1;}
            $count=0;           
        }            
//        $this->Ln();
    }
}
function Table2($header1,$data1,$header2,$data2,$coc)
{
    // Header 1
    $this->SetFillColor(0, 0, 0);
    $this->SetTextColor(255);
    $this->SetFont('Arial','',10);
    $this->SetXY(25,150);
    $this->Cell(160,5,$header1,1,0,'C',true);
    $this->Ln();
    // Data1
    foreach($data1 as $row)
    {
        $this->SetX(25);
        $this->SetTextColor(0);
        foreach($row as $col){
            $this->Cell(80,5,$col,1);
        }
        $this->Ln();
    }
    $this->SetFillColor(0, 0, 0);
    $this->SetTextColor(255);
    $this->SetFont('Arial','',10);
    $this->SetX(25);
    $this->Cell(160,5,$header2,1,0,'C',true);
    $this->Ln();
    foreach($data2 as $row)
    {
        $this->SetX(25);
        $this->SetTextColor(0);
        foreach($row as $col){
            $this->Cell(80,5,$col,1);
        }
        $this->Ln();
    }
    $this->Ln();
    $this->SetFont('Arial','BU',8);
    $this->SetX(25);
    $this->Cell(160,5,'Commercial in Confidence',0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',8);
    $this->SetX(25);
    $this->MultiCell(160,3,$coc,0,'J');
    
}
}

//$headers = array('recid','activities','deliverables','mandays');
//$pdf = new PDF();
//FORM DATA
$companyinfo = array();
$companyinfo[0][0] = "Company:";
$companyinfo[0][1] = $_POST["company"];
$companyinfo[1][0] = "Author:";
$companyinfo[1][1] = $_POST["author"]; //------------AUTHOR
$companyinfo[2][0] = "Date:";
$companyinfo[2][1] = $_POST["date"]; //------------DATE?
$companyinfo[3][0] = "Version:";
$companyinfo[3][1] = $_POST["version"]; //------------VERSION
$companyinfo[4][0] = "Address:";
$companyinfo[4][1] = $_POST["address"];
$companyinfo[5][0] = "Tel:";
$companyinfo[5][1] = $_POST["tel"];
$companyinfo[6][0] = "Fax:";
$companyinfo[6][1] = $_POST["fax"];
$companyinfo[7][0] = "Web:";
$companyinfo[7][1] = $_POST["web"];

$clients = array();
foreach($clientSHNames as $col){
    
}
$y = 0;
for ($x = 0; $x < count($clientSHNames); $x++) {
    $clients[$x][$y] = $clientSHNames[$x];
    ($y == 0 ? $y=1 : $y=0);    
    $clients[$x][$y] = $clientSHDesigs[$x];
} 
//$clients[0][0] = "Joseph Din";
//$clients[0][1] = "IAM Ops Head";
//$clients[1][0] = "Pete Paulyn Penetrante";
//$clients[1][1] = "IAM Ops Senior Expert";

$sit_peeps = array();
$y = 0;
for ($x = 0; $x < count($sitSHNames); $x++) {
    $sit_peeps[$x][$y] = $sitSHNames[$x];
    ($y == 0 ? $y=1 : $y=0);    
    $sit_peeps[$x][$y] = $sitSHDesigs[$x];
} 
//$sit_peeps[0][0] = "Benz Abadilla";
//$sit_peeps[0][1] = "Pre-sales Consultant";
//$sit_peeps[1][0] = "Jason Calora";
//$sit_peeps[1][1] = "Technical Consultant";
//$sit_peeps[2][0] = "Glicerio Catholico";
//$sit_peeps[2][1] = "Technical Consultant";
//$sit_peeps[3][0] = "Shadrach Gonzales";
//$sit_peeps[3][1] = "Project Manager";
//$sit_peeps[4][0] = "Alex Baltazar";
//$sit_peeps[4][1] = "Account Manager";

$coc = "The contents of this document are private and confidential and intended specifically for Globe Telecom, Inc. and ServiceIT+ Inc. (SIT+) No content from this document, in full or in part, shall be disclosed to any third party or individual without the prior explicit written consent of both parties.";
$pdf = new PDF('P','mm','A4');
//$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Table1($companyinfo);
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(110);
$pdf->MultiCell(80,4,'All Trademarks are acknowledged to be the property of their respective owners','B');
$pdf->SetFont('Arial','',25);
$pdf->Cell(130,50,'Statement Of Work','','','R');
$pdf->Image('images/logo.png',45,65,40,30);
$pdf->Table2($_POST["client"],$clients,'ServiceIT+ Inc',$sit_peeps,$coc);
//$pdf->Table1($table);
//$pdf->Cell(150,50,'Statement Of Work','','','R');z
//$pdf->AddPage();
//$pdf->Table1($table);
$filename="test/".$_POST["filename"];;
$pdf->Output($filename,'F');
//$pdf->Output();
//$title = 'SOW';
//$pdf->SetTitle($title);
//$recid = explode(',', $_POST["recid"]);
//$table = array();
//$x = 0;
////for ($i = 0; $x < count($recid)-1; $x++){
////    $deliver[$i] = $pdf->WordWrap($deliver[$i],70);
////    $pdf->Cell(0,7,$deliver[$i]);
////}
//for ($row = 0; $row < count($recid)-1; $row++) {
//    $table[$row][0] = $recid[$row];
//    $table[$row][1] = $act[$row];
//    $table[$row][2] = $deliver[$row];
//    $table[$row][3] = $mandays[$row];
//}
//$table = array_merge($recid,$mandays);
//var_dump($table);

//
//$data = $pdf->LoadData($_GET['var']);

//$pdf->BasicTable($headers,$table);
//$pdf->Output();

//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','',11);
//$pdf->Cell(0,7,$_GET['var']);
//$pdf->Output();

?>