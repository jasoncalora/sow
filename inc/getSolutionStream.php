

<?php
$q =$_GET['q'];
//echo $q;
$con = mysqli_connect('localhost','root','','docgen');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"`sow activities`");
$sql="SELECT `Solution` FROM docgen.`sow activities` where `Solution Stream` = '".$q."'  group by `Solution` desc";
$result = mysqli_query($con,$sql);

echo "<select onchange = getActivities('".$q."',this.value)>";
    echo "<option>--Select--</option>";

while($row = mysqli_fetch_array($result)) {
    echo "<option value='".$row['Solution']."'>".$row['Solution']."</option>";
}
echo "</select>";
mysqli_close($con);
?>
