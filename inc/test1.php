<?php
$recid = explode(',', $_GET['var']);
$mandays = explode(',', $_GET['var1'] );
$x = 0;
echo "<table border=1>";
echo "<tr>";
echo "<td>recid Var = ".$_GET['var']."</td>";
echo "<td>mandays Var = ".$_GET['var1']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "recid Array:<br>";
$x = 0;
foreach ($recid as $value) {
    echo "[$x] = $value <br>";
    $x = $x + 1;
}
echo "</td>";
echo "<td>";
echo "mandays Array:<br>";
$x = 0;
foreach ($mandays as $value) {
    echo "[$x] = $value <br>";
    $x = $x + 1;
}
echo "</td>";
echo "</tr>";
echo "</table>";
//echo "recid Var = ".$var."<br>"; 
//echo "mandays Var = ".$var1."<br>recid Array:<br>"; 



?>