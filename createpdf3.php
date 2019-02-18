<?php
require('fpdf.php');

//var_dump($_POST);
//$_POST["total"];
//$_POST["recid"];
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
    $this->SetXY(25,160);
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
    $this->MultiCell(160,3,$coc,0,'');
    
}
function headerTable($x)
{
    // Header
//    foreach($header as $col)
//        $this->Cell(40,7,$col,1);
//    $this->Ln();
    // Data
    $this->SetDrawColor(145, 145, 145, 0.893);
    $this->SetFont('Arial','',10);
    $this->SetXY(20,10);
//    $this->SetX(100);
    $this->MultiCell(48,20,"",1,'');
    $this->SetXY(68,10);
    $this->MultiCell(100,10,"",1,'');
    $this->SetXY(68,20);
    $this->MultiCell(100,10,"",1,'');
    $this->SetXY(168,10);
    $this->MultiCell(20,20,"",1,'');
    
    $this->SetFont('Arial','',7);
    $this->SetXY(68,10);
    $this->SetTextColor(145, 145, 145, 0.893);
    $this->Cell(100,5,"Project Title:",0,'');
    $this->SetXY(68,20);
    $this->SetTextColor(145, 145, 145, 0.893);
    $this->Cell(100,5,"Document Title:",0,'');
    
    $this->SetFont('Arial','',11);
    $this->SetXY(168,15);
    $this->SetTextColor(145, 145, 145, 0.893);
    $this->Cell(20,5,"Page",0,'','C');
    $this->SetXY(168,20);
    $this->SetTextColor(145, 145, 145, 0.893);
    $this->Cell(20,5,$x." of 11",0,'','C');
    $this->SetFont('Arial','',14);
    $this->SetXY(68,15);
    $this->SetTextColor(145, 145, 145, 0.893);
    $this->Cell(100,5,"Bluestreak 2",0,'','C');
    $this->SetXY(68,25);
    $this->SetTextColor(145, 145, 145, 0.893);
    $this->Cell(100,5,"Statement of Work",0,'','C');
    
    $this->SetDrawColor(0, 0, 0, 0.924);
}
function reviewGroup($data)
{
    $this->SetXY(20,50);
    $this->SetTextColor(0, 0, 0, 0.893 );
    $this->SetFont('Arial','B',16,'');
    $this->Cell(100,5,"Review Group",0,'');
    $this->SetXY(20,60);
    $this->SetFont('Arial','B',11,'');
    $this->Cell(48,7,"Name",1,'');
    $this->SetXY(68,60);
    $this->Cell(70,7,"Organization/Location",1,'');
    $this->SetXY(138,60);
    $this->Cell(60,7,"Title",1,'');
    
    $this->SetFont('Arial','',10,'');
    $this->Ln();
    foreach($data as $row)
    {
        $count = 1;
                $testy = $this->getY();
        foreach($row as $col){
            if($count==1){
                $testy = $this->getY();
                $col1 = (strlen($col) > 24 ? (floor(strlen($col)/24)+1)*7 : 7);
                $this->SetX(20); $this->MultiCell(48,7,$col.$col1." ".strlen($col),1);$count+=1;
            }else if($count==2){                
                $this->SetXY(68,$testy); $this->MultiCell(70,$col1,$col,1);$count+=1;
            }else{
                $this->SetXY(138,$testy); $this->MultiCell(60,$col1,$col,1);$count=1;         
//                $this->Ln();
            }
//            if($count==1){$this->SetXY(20,67); $this->Cell(20,5,$col,'T');}else if($count==2){$this->SetXY(68,67);$this->Cell(20,5,$col,'T');}else{ $this->SetXY(68,60);$this->Cell(60,5,$col,'T');}$c+=1;
//            else if($c>14){if($count==1){$this->SetX(120); $this->Cell(20,5,$col,'B');}else{ $this->MultiCell(50,5,$col,'B');}$c+=1;}
//            else{if($count==1){$this->SetX(110); $this->Cell(20,5,$col,0);}else{ $this->MultiCell(60,5,$col,0);}$c+=1;}x       
        }            
//        $this->Ln();
    }
}   
function revHistory($data)
{
    $this->Ln();
    $this->Ln();
    $this->Ln();
    $this->SetX(20);
    $this->SetTextColor(0, 0, 0, 0.893 );
    $this->SetFont('Arial','B',16,'');
    $this->Cell(100,5,"Revision History",0,'');
    $this->SetFont('Arial','B',10,'');
    $this->Ln();
    $this->Ln();
    $this->SetX(20);
    $this->Cell(15,7,"Version",1,'');
    $this->SetX(35);
    $this->Cell(36,7,"Date (DD/MM/YYYY)",1,'');
    $this->SetX(71);
    $this->Cell(50,7,"Revision Author",1,'');
    $this->SetX(121);
    $this->Cell(77,7,"Description of Amendments",1,'');
    $this->SetX(20);
    $this->SetFont('Arial','',10,'');
//    $this->Cell(60,7,"Title",1,'');
                  
    $this->Ln();
    foreach($data as $row)
    {
        $count = 1;
        foreach($row as $col){
            if($count==1){
                $this->SetX(20); $this->Cell(15,7,$col,1);$count+=1;
            }else if($count==2){                
                $this->SetX(35); $this->Cell(36,7,$col,1);$count+=1;
            }else if($count==3){                
                $this->SetX(71); $this->Cell(50,7,$col,1);$count+=1;
            }else{
                $this->SetX(121); $this->Cell(77,7,$col,1);$count+=1;                
                $this->Ln();
            }
//            if($count==1){$this->SetXY(20,67); $this->Cell(20,5,$col,'T');}else if($count==2){$this->SetXY(68,67);$this->Cell(20,5,$col,'T');}else{ $this->SetXY(68,60);$this->Cell(60,5,$col,'T');}$c+=1;
//            else if($c>14){if($count==1){$this->SetX(120); $this->Cell(20,5,$col,'B');}else{ $this->MultiCell(50,5,$col,'B');}$c+=1;}
//            else{if($count==1){$this->SetX(110); $this->Cell(20,5,$col,0);}else{ $this->MultiCell(60,5,$col,0);}$c+=1;}x       
        }            
//        $this->Ln();
    }
}
function distroList(){
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->SetX(20);
        $this->SetTextColor(0, 0, 0, 0.893 );
        $this->SetFont('Arial','B',16,'');
        $this->Cell(100,5,"Distribution List",0,'');
        $this->SetFont('Arial','B',10,'');
        $this->Ln();
        $this->Ln();
        $this->SetX(20);
        $this->Cell(25,7,"Company",1,'');
        $this->SetX(45);
        $this->Cell(40,7,"Project Role",1,'');
        $this->SetX(85);
        $this->Cell(40,7,"Contact number",1,'');
        $this->SetX(125);
        $this->Cell(65,7,"Email Address",1,'');
        $this->SetX(20);
        $this->SetFont('Arial','',10,'');
        for($i=0; $i<=5;$i++){
            $this->Ln();
        $this->SetX(20);
        $this->Cell(25,7,"",1,'');
        $this->SetX(45);
        $this->Cell(40,7,"",1,'');
        $this->SetX(85);
        $this->Cell(40,7,"",1,'');
        $this->SetX(125);
        $this->Cell(65,7,"",1,'');
        $this->SetX(20);
        }
        
}
}

//$headers = array('recid','activities','deliverables','mandays');
//$pdf = new PDF();
//FORM DATA
$companyinfo = array();
$companyinfo[0][0] = "Company:";
$companyinfo[0][1] = "ServiceIT+, Inc.";
$companyinfo[1][0] = "Author:";
$companyinfo[1][1] = "Benjamin Abadilla"; //------------AUTHOR
$companyinfo[2][0] = "Date:";
$companyinfo[2][1] = date("d F Y"); //------------DATE?
$companyinfo[3][0] = "Version:";
$companyinfo[3][1] = "1"; //------------VERSION
$companyinfo[4][0] = "Address:";
$companyinfo[4][1] = "Suite 604 VGP Center 6772, Ayala Avenue, Makati City, 1200 Philippines";
$companyinfo[5][0] = "Tel:";
$companyinfo[5][1] = "+(632) 949 8109";
$companyinfo[6][0] = "Fax:";
$companyinfo[6][1] = "+(632) 621 6323 loc 116";
$companyinfo[7][0] = "Web:";
$companyinfo[7][1] = "www.serviceitplus.com";

$clients = array();             //  CLIENT STAKEHOLDERS ARRAY
$clients[0][0] = "Joseph Din";
$clients[0][1] = "IAM Ops Head";
$clients[1][0] = "Pete Paulyn Penetrante";
$clients[1][1] = "IAM Ops Senior Expert";

$sit_peeps = array();           //SIT PROJECT TEAM ARRAY
$sit_peeps[0][0] = "Benz Abadilla";
$sit_peeps[0][1] = "Pre-sales Consultant";
$sit_peeps[1][0] = "Jason Calora";
$sit_peeps[1][1] = "Technical Consultant";
$sit_peeps[2][0] = "Glicerio Catholico";
$sit_peeps[2][1] = "Technical Consultant";
$sit_peeps[3][0] = "Shadrach Gonzales";
$sit_peeps[3][1] = "Project Manager";
$sit_peeps[4][0] = "Alex Baltazar";
$sit_peeps[4][1] = "Account Manager";

$rev_group = array();
$rev_group[0][0] = "Benz Abadilla test asdasd asda sdasd ";
$rev_group[0][1] = "ServiceIT+ Inc";
$rev_group[0][2] = "Presales Consultant";
$rev_group[1][0] = "Jason calora";
$rev_group[1][1] = "ServiceIT+ Inc";
$rev_group[1][2] = "Technical Consultant";
$rev_group[3][0] = "Shadrach Gonzalesssseses aasdadasdasdsdasdasd asdasdasdasd";
$rev_group[3][1] = "ServiceIT+ Inc";
$rev_group[3][2] = "Project Manager";
$rev_group[4][0] = "Benz Abadilla";
$rev_group[4][1] = "ServiceIT+ Inc";
$rev_group[4][2] = "Presales Consultant";
$rev_group[5][0] = "Jason calora";
$rev_group[5][1] = "ServiceIT+ Inc";
$rev_group[5][2] = "Technical Consultant";

$rev_history = array();
$rev_history[0][1] = "1";
$rev_history[0][2] = "25/01/2019";
$rev_history[0][3] = "Jason calora asdasdasd asdasdasd";
$rev_history[0][4] = "asdasdasdasd asdasdasd";
$rev_history[1][1] = "1.1";
$rev_history[1][2] = "31/01/2019";
$rev_history[1][3] = "Markus Punzalan asdasdas asdasdaasdasd";
$rev_history[1][4] = "asdasdasdasd asdasdasd";
$rev_history[2][1] = "1.2";
$rev_history[2][2] = "09/02/2019";
$rev_history[2][3] = "Jason calora";
$rev_history[2][4] = "asdasdasdasd asdasdasd";

$coc = "The contents of this document are private and confidential and intended specifically for Globe Telecom, Inc. and ServiceIT+ Inc. (SIT+) No content from this document, in full or in part, shall be disclosed to any third party or individual without the prior explicit written consent of both parties.";
$pdf = new PDF('P','mm','A4');
//$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->headerTable(2);
$pdf->reviewGroup($rev_group);
$pdf->revHistory($rev_history);
$pdf->AddPage();
$pdf->headerTable(3);
$pdf->distroList();
/////////////////////////   PAGE 1
$pdf->AddPage();
$pdf->Table1($companyinfo);
$pdf->SetFont('Arial','',9);
$pdf->Ln();
$pdf->SetX(120);
$pdf->MultiCell(80,4,'NOT FOR GENERAL DISTRIBUTION','');
$pdf->SetX(120);
$pdf->MultiCell(80,4,'© Service IT Plus','');
$pdf->SetX(120);
$pdf->MultiCell(80,4,'ALL RIGHTS RESERVED','');
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->SetX(110);
$pdf->MultiCell(80,4,'All Trademarks are acknowledged to be the property of their respective owners','B');
$pdf->SetFont('Arial','',25);
$pdf->Cell(130,40,'Statement Of Work','','','R');
$pdf->Image('images/logo.png',45,65,40,30);
$pdf->Table2('Globe Telecom',$clients,'ServiceIT+ Inc',$sit_peeps,$coc);
/////////////////////////   PAGE 2

//$pdf->Table1($table);
//$pdf->Cell(150,50,'Statement Of Work','','','R');z
//$pdf->AddPage();
//$pdf->Table1($table);
$pdf->Output();
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