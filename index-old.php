<?php
// include 'inc\SS.inc.php';
//include 'inc\S.inc.php';
include 'inc/view.inc.php';
require('fpdf.php');
//include 'inc/grid.inc.php';
?>


<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
    <script src="/fpdf181/js/myjs.js"></script>
    <script>
        function getSolution(str) {
            if (str == "") {
                document.getElementById("solution").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("solution").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "inc/getS.inc.php?q=" + str, true);
                xmlhttp.send();
            }
        }
        function getGrid(str1, str2) {
            if (str1 == "" || str2 == "") {
                document.getElementById("grid-container").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("grid-container").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "inc/grid.inc.php?SS=" + str1 + "&S=" + str2, true);
                xmlhttp.send();
            }
        }
        function toggle(source) {
            checkboxes = document.getElementsByName('checkbox');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
                //                alert(checkboxes[i].value);
            }
        }
        function showSelected(source) {
            checkboxes = document.querySelectorAll('input[name=checkbox]:checked');
            var recid = "";
            var mandays = "";
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                var x = document.getElementById(checkboxes[i].value).childNodes;
                if (recid == "" && mandays == "") {
                    recid = x[0].childNodes[0].value;
                    mandays = x[3].textContent;
                } else {
                    recid += "," + x[0].childNodes[0].value;
                    mandays += "," + x[3].textContent;
                }
            }
            alert("recid's : "+recid);
            alert("mandays : "+mandays);
        }
        function showSelected2(source) {
//            checkboxes = document.querySelectorAll('input[name=checkbox]:checked');
//            var recid = "";
//            var mandays = "";
//            var act = "";
//            var deliver = "";
//            for (var i = 0, n = checkboxes.length; i < n; i++) {
//                var x = document.getElementById(checkboxes[i].value).childNodes;
//                if (recid == "" && mandays == "") {
//                    recid = x[0].childNodes[0].value;
//                    act = x[1].textContent;
//                    deliver = x[2].textContent;
//                    mandays = x[3].textContent;
////            alert();
//                } else {
//                    recid += "," + x[0].childNodes[0].value;
//                    act += "," + x[1].textContent;
//                    deliver += "," + x[2].textContent;
//                    mandays += "," + x[3].textContent;
////            alert();
//                }
//            }             
//            window.location.replace("createpdf.php?var="+recid+"&var1="+mandays+"&var2="+act);
            window.open("createpdf2.php");
        }
        function computeDays(source) {
            checkboxes = document.querySelectorAll('input[name=checkbox]:checked');
            var mandays1 = 0;
            var recid = "";
            var mandays = "";
            var act = "";
            var deliver = "";
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                var x = document.getElementById(checkboxes[i].value).childNodes;
                mandays1 += parseInt(x[3].textContent);
                if (recid == "" && mandays == "" && act == "" && deliver == "") {
                    recid = x[0].childNodes[0].value;
                    act = x[1].textContent;
                    deliver = x[2].textContent;
                    mandays = x[3].textContent;
//            alert();
                } else {
                    recid += "," + x[0].childNodes[0].value;
                    act += "," + x[1].textContent;
                    deliver += "," + x[2].textContent;
                    mandays += "," + x[3].textContent;
//            alert();
                }
            }
            document.getElementById("mandays").textContent = mandays;            
            document.getElementById("total").value = mandays1;      
            
            document.getElementById("recid").value = recid;  
            document.getElementById("activities").value = act;  
            document.getElementById("deliver").value = deliver; 
            document.getElementById("mandays").value = mandays; 
        }
    </script>
    <title>
    </title>
</head>

<body>
   
    <br />
    <div class="container">
        <h1 align="center">SOW Activities</h1>
        <div class="cont1">
<!--            <button onClick="showSelected(this)">Display Selected</button>-->
            <form id="sampleForm" name="sampleForm" method="post" action="createpdf2.php" target="_blank">
                <input type="hidden" placeholder="total" name="total" id="total" value="">
                <input type="hidden" placeholder="recid" name="recid" id="recid" value="">
                <input type="hidden" placeholder="deliver" name="deliver" id="deliver" value="">
                <input type="hidden" placeholder="activities" name="activities" id="activities" value="">
                <input type="hidden" placeholder="mandays" name="mandays" id="mandays" value="">
                <button>Pass to next page</button>
            </form>
<!--            <button onClick="showSelected2(this)">Pass to next page</button>-->
            <p>Mandays : <span id="mandays">0</span></p>
        </div>
        <div style="clear:both" style="float:left">
            <br />
            <table>
                <th>
                    <h4>Solution Stream</h4>
                    <Select id="sscombobox" onchange='getSolution(this.value)'>
                        <option selected='selected'>--Select--</option>
                        <?php
                           $ss = new getSS();
                           $ss->showSS();
                        ?>
                    </Select>
                </th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>
                    <!--                   <h4>Solution</h4> -->
                    <div id="solution">
                        <h4>Solution</h4>
                        <select>
                            <option>--Select--</option>
                        </select>
                    </div>
                </th>
            </table>
        </div>
        <h3>SOW activities selection</h3>
        <div class="table-responsive" id="grid-container">

        </div>
    </div>
</body>

</html>
<style>
    .cont1{
        display:float;
    }
    p{
/*        border:1px solid black;*/
        font-size:2rem;
        float:right;
    }
    p span{
        font-weight:600;
    }
</style>