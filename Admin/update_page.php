<?php include"../database/databases.php";?> 
<?php include"../database/dataconfig.php"?>
<?php
        $db = new Database();
        if(isset($_REQUEST['d_page'])){
            $did = $_GET['d_page'];
            $query = "DELETE FROM pages WHERE id = $did ";
            $d_result = $db->delete($query);
            if($d_result == true){
             echo 'Delete successfully Done'."<br>";
            // header('Location:create_page.php');
            }else{
             echo 'Unable to Delete';
            }
      
        }
    
    
    ?>