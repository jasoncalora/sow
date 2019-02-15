<html>

<head></head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script>
    function test(){
        alert();
        if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("test123").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "createpdf3.php", true);
                xmlhttp.send();
    }
</script>
<style>
    input{
        border-radius:10%;
    }
    textarea{
        border-radius:5%;
    }
</style>
<body>
    <form id="companyinfo" name="companyinfo" method="post" action="test.php" target="_blank">
        <table>
            <tr>
                <td colspan=2 align="center">SOW Details</td>
            </tr>
            <tr>
                <td>Company</td>
                <td><input type="text" placeholder="company" name="company" id="company" value="ServiceIT+ Inc"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type="text" placeholder="Author Name" name="author" id="author" value=""></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="date" placeholder="<?php echo date(" m/d/Y"); ?>" name="date" id="date" value="
                    <?php echo date("m/d/Y"); ?>"></td>
            </tr>
            <tr>
                <td>Version</td>
                <td><input type="number" placeholder="1" name="version" id="version" value=""></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea id=address name="address" rows="2" cols="40">Suite 604 VGP Center 6772, Ayala Avenue, Makati City, 1200 Philippines</textarea>
            </tr>
            <tr>
                <td>Tel</td>
                <td><input type="text" placeholder="tel" name="tel" id="tel" value="+(632) 949 8109"></td>
            </tr>
            <tr>
                <td>Fax</td>
                <td><input type="text" placeholder="fax" name="fax" id="fax" value="+(632) 621 6323 loc 116"></td>
            </tr>
            <tr>
                <td>Web</td>
                <td><input type="text" placeholder="web" name="web" id="web" value="www.serviceitplus.com"></td>
            </tr>
            <tr>
                <td>Client</td>
                <td><input type="text" placeholder="client name" name="client" id="client" value=""></td>
            </tr>
        </table>
        <button>Pass to next page</button>
    </form>
    <button onclick="test()">Preview</button>
    <div id="test123" style="height:100;width:100;"></div>
    <embed src="createpdf3.php" width="600px" height="800px" />
</body>

</html>