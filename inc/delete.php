<?php
$myFile = "../test/".$_POST["filename"];
//$myFile = "../test/0.7nvvgi9gnwy.pdf";
unlink($myFile) or die("Couldn't delete file");
?>