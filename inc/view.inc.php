<?php
require 'dbh.php';
//$q =$_GET['getgrid'];


class grid extends dbh{  
    public function getactivities() {
        $sql = "SELECT * FROM docgen.`sow activities`  order by RecID desc";
        $result = $this->connect()->query($sql);
        $numRows = $result ->num_rows;
        if($numRows > 0){
            While ($row = $result->fetch_array()){
                $data[] = $row;
            }
            return $data;  
     }
        mysqli_close($conn);
    } 
    
    
    
     public function showactivities() {
        $datas = $this->getactivities();
        foreach ($datas as $data) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='checkbox[]' value='".$data['RecID']."'</td><td>" .$data["Activities"]."</td><td>" .$data["Deliverables"]."</td><td>" .$data["Mandays"]."</td>";
            echo "</tr>";        
        }
    }
 }  


    
    
 class getSS extends dbh{
    
       public function getSSfunction() {
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
        $datas = $this->getSSfunction();
        foreach ($datas as $data) {    
        echo "<option value = '{$data['Solution Stream']}'>{$data['Solution Stream']}</option>";  
        }
    }  
    
 }   
    

?>