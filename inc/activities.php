<?php
$ss =$_GET['SS'];
$s = $_GET['S'];
//echo $ss;
//echo $s;
 
$con = mysqli_connect('localhost','root','','docgen');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"`sow activities`");
$sql="SELECT * FROM docgen.`sow activities` where `Solution Stream` = '".$ss."' and `Solution` = '".$s."' order by RecID desc";
$result = mysqli_query($con,$sql);
echo "<table id = 'tblact' class='table table-bordered'>";
echo "<tr>";
echo "<th width ='5%'><input type = 'checkbox' onClick='toggle(this);computeDays(this);'></th>";
echo "<th width='30%'>Activities</th>";
echo "<th width='50%'>Deliverables</th>";
echo "<th width='15%'>Mandays</th>";					    
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr id=".$row['RecID'].">";
    echo "<td><input type='checkbox' name='checkbox' onclick='computeDays(this)' value='".$row['RecID']."'</td><td>" .$row["Activities"]."</td><td>" .str_replace("\\r\\n","<br>",$row["Deliverables"])."</td><td>" .$row["Mandays"]."</td>";
    echo "</tr>";
}				
echo "</table>";

mysqli_close($con);
?>
