<?php
require('fpdf.php');
//var_dump($_POST);
class PDF extends FPDF
{
function Header()
{
    global $title;
    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    $this->SetDrawColor(255, 255, 255, 0.842);
    $this->SetFillColor(255, 255, 255, 0.84);
    $this->SetTextColor(0, 0, 0, 0.674 );
    $this->Cell($w,9,$title,1,1,'C',true);
    // Line break
    $this->Ln(10);
}
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}
}
$recid = explode(',', $_GET['var']);
$mandays = explode(',', $_GET['var1'] );
$act = explode(',', $_GET['var2'] );
$table = array();
for ($row = 0; $row < count($recid)-1; $row++) {
    $table[$row][0] = $recid[$row];
    $table[$row][1] = $mandays[$row];
    $table[$row][2] = $act[$row];
}
$headers = array('RecID','Mandays','Activities');
$pdf = new PDF();
$title = 'SOW';
$pdf->SetTitle($title);
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$pdf->BasicTable($headers,$table);
$pdf->Output();

?>