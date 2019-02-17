<?php
class dbh {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    
    
    protected function connect() {
        $this -> servername = "localhost";
        $this -> username = "root";
        $this -> password = "";
        $this -> dbname = "docgen";
        
        $conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        return $conn;
    }
    
   
}


class displaySS extends dbh{
    public function getSS(){
        $sql = "SELECT `Solution Stream` FROM docgen.`sow activities` group by `Solution Stream`  desc";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            
            While ($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
          
        }
         mysqli_close($conn);
    }
    public function showSS() {
        $datas = $this->getSS();
        foreach ($datas as $data) {    
        echo "<option value = '{$data['Solution Stream']}'>{$data['Solution Stream']}</option>";  
        }
    }  
}
?>