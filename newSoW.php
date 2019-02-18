<?php
include("inc/functions.php");
?>


<html>

<head>
    <title>Statement of Work Estmiator</title>
    <link rel="stylesheet" href="css/newSoW.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script defer src="js/fontawesome-all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
</head>
<script>
    var filename;
    function getSolution(str) {
                document.getElementById("total").textContent = "0";
                document.getElementById("activity-table").innerHTML = "";
                document.getElementById("activities-title").setAttribute("style","display:none;");
            if (str == "--Select--") {
                document.getElementById("solution").innerHTML = "<select disabled title='Select Solution Stream'><option>--Select--</option></select>";
                document.getElementById("activity-table").innerHTML = "";
                document.getElementById("activities-title").setAttribute("style","display:none;");
                document.getElementById("total").textContent = "0";
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
                xmlhttp.open("GET", "inc/getSolutionStream.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    function getActivities(str1, str2) {
//        alert("test");
            if (str1 == "--Select--" || str2 == "--Select--") {
                document.getElementById("activity-table").innerHTML = "";
                document.getElementById("activities-title").setAttribute("style","display:none;");
                document.getElementById("total").textContent = "0";
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
                        document.getElementById("activity-table").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "inc/activities.php?SS=" + str1 + "&S=" + str2, true);
                xmlhttp.send();
                document.getElementById("activities-title").setAttribute("style","display:block;");
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
        var activities = "";
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            var x = document.getElementById(checkboxes[i].value).childNodes;
            if (recid == "" && mandays == "") {
                recid = x[0].childNodes[0].value;
                activities = x[1].textContent;
                mandays = x[3].textContent;
            } else {
                recid += "," + x[0].childNodes[0].value;
                activities += "," + x[1].textContent;
                mandays += "," + x[3].textContent;
            }
        }
        alert("recid's : "+recid);
        alert("activities : "+activities);
        alert("mandays : "+mandays);
    }
    function toggle(source) {
        checkboxes = document.getElementsByName('checkbox');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
            //                alert(checkboxes[i].value);
        }
    }
    function computeDays(source) {
        checkboxes = document.querySelectorAll('input[name=checkbox]:checked');
        var mandays1 = 0;
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            var x = document.getElementById(checkboxes[i].value).childNodes;
            mandays1 += parseInt(x[3].textContent);
        }          
        document.getElementById("total").textContent = mandays1;
        }
    function preview(){
///////////     SHOW MODAL
        document.getElementById("preview-modal").setAttribute("style","display:flex;");
        document.getElementById("body").setAttribute("style","overflow:hidden;");
        
    /////////   GET PARAMETERS
        ////////    Docu Details
        var info = {company:document.getElementById("txt_company").value,
                    author:document.getElementById("txt_author").value,
                    date:document.getElementById("txt_date").value,
                    version:document.getElementById("txt_version").value,
                    address:document.getElementById("txt_address").value,
                    tel:document.getElementById("txt_tel").value,
                    fax:document.getElementById("txt_fax").value,
                    web:document.getElementById("txt_web").value,
                    project:document.getElementById("txt_project").value,
                    client:document.getElementById("txt_client").value};
        var obj = Object.getOwnPropertyNames(info);
        ///////     STAKEHOLDERS        
        var sitSHName = document.getElementsByClassName("sit-name");            //class
        var sitSHDesig = document.getElementsByClassName("sit-desig");          //class
        var clientSHName = document.getElementsByClassName("client-name");      //class
        var clientSHDesig = document.getElementsByClassName("client-desig");    //class
        var sitSHNames = "";           
        var sitSHDesigs = "";
        var clientSHNames = "";
        var clientSHDesigs = "";
//        alert(sitSHName[0].textContent);
        for (var i = 0; i < sitSHName.length; i++) { 
          sitSHNames += sitSHName[i].textContent + ",";
          sitSHDesigs += sitSHDesig[i].textContent + ",";
        }
        sitSHNames = sitSHNames.substring(0,sitSHNames.length-1);
        sitSHDesigs = sitSHDesigs.substring(0,sitSHDesigs.length-1);
        for (var i = 0; i < clientSHName.length; i++) { 
          clientSHNames += clientSHName[i].textContent + ",";
          clientSHDesigs += clientSHDesig[i].textContent + ",";
        }
        clientSHNames = clientSHNames.substring(0,clientSHNames.length-1);
        clientSHDesigs = clientSHDesigs.substring(0,clientSHDesigs.length-1);
//        alert(clientSHNames);
//        alert(clientSHDesigs);
        
        var params = "";
        params="sitSHNames=" + sitSHNames + "&sitSHDesigs=" + sitSHDesigs + "&clientSHNames=" + clientSHNames + "&clientSHDesigs=" + clientSHDesigs + "&";
        for (var i = 0; i < Object.getOwnPropertyNames(info).length; i++) { 
          params += obj[i] + "=" + info[obj[i]] + "&";
        }
        var number = Math.random() // 0.9394456857981651
        filename = number.toString(36) + ".pdf";
        params += "filename=" + filename;
//        alert(params);
        
        ///     POST VALUES TO PDF
        var http = new XMLHttpRequest();
        var url = "createpdf.php";
//        var url = "inc/preview.php";
        http.open('POST', url, true);
        //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
//                document.getElementById("preview-container").innerHTML = http.responseText;
                document.getElementById("preview-container").innerHTML = "<embed src='test/" + filename + "' width='100%' height='100%' />";
//                alert(http.responseText);
            }
        }
        http.send(params);
    }
    function closePreview(x){
        x.setAttribute('style','display:none;');        
        document.getElementById('body').setAttribute('style','overflow:visible;');
        deleteFile();
        
    }
    function deleteFile(){
        var params = "filename=" + filename;
        var http = new XMLHttpRequest();
        var url = "inc/delete.php";
//        var url = "inc/preview.php";
        http.open('POST', url, true);
        //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                document.getElementById("preview-container").innerHTML = http.responseText;
            }
        }
        http.send(params);
        filename="";
    }
    function addSH(y){
        var added = document.getElementsByClassName("Added");
        var name = document.getElementsByClassName("txt_name")[y];
        var desig = document.getElementsByClassName("txt_desig")[y];
        var class1 = "";
        var class2 = "";
        if(name.value=="" || desig.value==""){
            alert("Name and Designation must not be blank");
        }else{
            var z = added[y].childNodes[1].childNodes[1].innerHTML;
            if(y==0){
                class1="sit-name";
                class2="sit-desig";
            }else{
                class1="client-name";
                class2="client-desig";
            }
            z = z.replace('<tr><td colspan="3" align="center">No Entries Yet</td></tr>','');
            z += "<tr>"+
                    "<td class='item-added "+ class1 +"'>"+ name.value +"</td>" +
                    "<td class='item-added "+ class2 +"'>"+ desig.value +"</td>" +
                "</tr>";
            added[y].childNodes[1].childNodes[1].innerHTML = z;
            name.value = "";
            desig.value = "";  
        }
    }
</script>

<body id="body">
    <div class="wrapperr">
        <div class="containerr">
            <div class="docu-details">
                <div class="title"><a href="#docudetails" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="docudetails">Document Details</a></div>
                <div class="details-values collapse multi-collapse" id="docudetails">
                    <table>
                        <tr>
                            <td>Company</td>
                            <td><input type="text" id="txt_company" value="ServiceIT+ Inc"></td>
                            <td>Telephone No.</td>
                            <td><input type="text" id="txt_tel" value="+(632) 949 8109"></td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td><input type="text" id="txt_author" placeholder="Author Name"></td>
                            <td>Fax No.</td>
                            <td><input type="text" id="txt_fax" value="+(632) 621 6323 loc 116"></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><input type="date" id="txt_date" value="<?php echo date("Y-m-d"); ?>"></td>
                            <td>Web</td>
                            <td><input type="text" id="txt_web" value="www.serviceitplus.com"></td>
                        </tr>
                        <tr>
                            <td>Version</td>
                            <td><input type="number" id="txt_version" value="1"></td>
                            <td>Client Name</td>
                            <td><input type="text" placeholder="Client name" id="txt_client" value=""></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><textarea id="txt_address" rows="2" cols="40">Suite 604 VGP Center 6772, Ayala Avenue, Makati City, 1200 Philippines</textarea></td>
                            <td>Project Name</td>
                            <td><input type="text" placeholder="Project Name" id="txt_project" value=""></td>
                        </tr>
                    </table>
                </div>
<!--                <br><br>-->
                <div class="title"><a href="#shcont" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="shcont">StakeHolders</a></div>
                <div class="SHCont collapse multi-collapse" id="shcont">
                    <div class="SHContainer">
                        <div class="added" id="sit_SHContainer">
                            <table>
                               <tr>
                                   <td colspan = 2>ServiceIT+ Steakholders</td>
                               </tr>
                                <tr>
                                    <th>Name</th>
                                    <th colspan=2>Designation</th>
                                </tr>
                                <tr><td colspan="3" align="center">No Entries Yet</td></tr>
                            </table>
                        </div>
                        <div class="add-entry">
                            <table>
                                <tr>
                                    <td><input type="text" class="txt_name" placeholder="Name"></td>
                                    <td><input type="text" class="txt_desig" placeholder="Designation"></td>
                                    <td><button onclick="addSH(0)">+</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br><br>
                    <div class="SHContainer">
                        <div class="added" id="sit_SHContainer">
                            <table>
                               <tr>
                                   <td colspan = 2>Client Steakholders</td>
                               </tr>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                </tr>
                                <tr><td colspan="3" align="center">No Entries Yet</td></tr>
                            </table>
                        </div>
                        <div class="add-entry">
                            <table>
                                <tr>
                                    <td><input type="text" class="txt_name" placeholder="Name"></td>
                                    <td><input type="text" class="txt_desig" placeholder="Designation"></td>
                                    <td><button onclick="addSH(1)">+</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>  
                </div>
                
                
                <div class="title">Activities</div>
                <div class="activities-container">
                    <table id="table1">
                        <tr>
                            <td>Solution Stream</td>
                            <td>Solution</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="solutionStream" id="solutionStream" onchange='getSolution(this.value)'>
                                    <option>--Select--</option>
                                    <?php
                                       $ss = new displaySS();
                                       $ss->showSS();
                                    ?>
                                </select>
                            </td>
                            <td>
                                <div id="solution">
                                    <select disabled title="Select Solution Stream">
                                        <option>--Select--</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <!--////////////////////////////////////        ACTIVITIES SELECTION                    -->
                    <div id="table-container">
                        <div id="activities-title">
                            <div>Activities Selection</div>
                            <div>Mandays : <span id="total">0</span></div>
                        </div>
                        <div id="activity-table"></div>
                    </div>
                    </Select>
                </div>

            </div>
            <div class="buttons">
                   <button class="btn btn-success" onclick="preview()">Preview</button>
                    <button class="btn btn-primary" onclick="showSelected(this)">Save</button>
            </div>
        </div>
    </div>
    
<!--////////////////////////    PREVIEW MODAL         -->
<div id="preview-modal" onClick="closePreview(this)">
    <div id="preview-container">
        
    </div>
</div>
</body>

</html>