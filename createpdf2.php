<?php
require('fpdf.php');

//var_dump($_POST);
//$_POST["total"];
//$_POST["recid"];
class PDF extends FPDF
{
function WordWrap(&$text, $maxwidth)
{
	$text = trim($text);
	if ($text==='')
		return 0;
	$space = $this->GetStringWidth(' ');
	$lines = explode("\n", $text);
	$text = '';
	$count = 0;

	foreach ($lines as $line)
	{
		$words = preg_split('/ +/', $line);
		$width = 0;

		foreach ($words as $word)
		{
			$wordwidth = $this->GetStringWidth($word);
			if ($wordwidth > $maxwidth)
			{
				// Word is too long, we cut it
				for($i=0; $i<strlen($word); $i++)
				{
					$wordwidth = $this->GetStringWidth(substr($word, $i, 1));
					if($width + $wordwidth <= $maxwidth)
					{
						$width += $wordwidth;
						$text .= substr($word, $i, 1);
					}
					else
					{
						$width = $wordwidth;
						$text = rtrim($text)."\n".substr($word, $i, 1);
						$count++;
					}
				}
			}
			elseif($width + $wordwidth <= $maxwidth)
			{
				$width += $wordwidth + $space;
				$text .= $word.' ';
			}
			else
			{
				$width = $wordwidth + $space;
				$text = rtrim($text)."\n".$word.' ';
				$count++;
			}
		}
		$text = rtrim($text)."\n";
		$count++;
	}
	$text = rtrim($text);
	return $count;
}
function Header()
{
    global $title;

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colors of frame, background and text
    $this->SetDrawColor(255, 255, 255, 0.842);
    $this->SetFillColor(255, 255, 255, 0.84);
    $this->SetTextColor(0, 0, 0, 0.674 );
    // Thickness of frame (1 mm)
//    $this->SetLineWidth(1);
    // Title
    $this->Cell($w,9,$title,1,1,'C',true);
    // Line break
    $this->Ln(10);
}
function BasicTable($header, $data)
{
    // Header
    $count = 1;
    foreach($header as $col){
        if($count==1){$width=20;}elseif($count==2){$width=60;}elseif($count==3){$width=90;}else{$width=20;}
        $count +=1;
        $this->Cell($width,7,$col,1);
    }           
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $count = 1;
        foreach($row as $col){
            if($count==1){$width=20;}elseif($count==2){$width=60;}elseif($count==3){$width=90;}else{$width=20;}
            $count +=1;
                $this->Cell($width,6,$col,1,0);
//            if(strlen($col)>60){
//                $this->MultiCell($width,6,WordWrap($col,40),1,0);
//            }else{
//                $this->Cell($width,6,$col,1,0);
//            }
            
        }
        $this->Ln();
    }
}
}
$headers = array('recid','activities','deliverables','mandays');
$pdf = new PDF();
$title = 'SOW';
$pdf->SetTitle($title);
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

$recid = explode(',', $_POST["recid"]);
$act = explode(',', $_POST["activities"]);
$deliver = explode(',', $_POST["deliver"]);
$mandays = explode(',', $_POST["mandays"]);
$table = array();
$x = 0;
//for ($i = 0; $x < count($recid)-1; $x++){
//    $deliver[$i] = $pdf->WordWrap($deliver[$i],70);
//    $pdf->Cell(0,7,$deliver[$i]);
//}
for ($row = 0; $row < count($recid)-1; $row++) {
    $table[$row][0] = $recid[$row];
    $table[$row][1] = $act[$row];
    $table[$row][2] = $deliver[$row];
    $table[$row][3] = $mandays[$row];
}
//$table = array_merge($recid,$mandays);
//var_dump($table);

//
//$data = $pdf->LoadData($_GET['var']);

$pdf->BasicTable($headers,$table);
$pdf->Output();

//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','',11);
//$pdf->Cell(0,7,$_GET['var']);
//$pdf->Output();

?>