<?php  
$old_name = "../../../tugas2-web-mini/index.php" ;
$new_name = "../../../tugas2-web-mini/misimas.txt" ;
if(file_exists($new_name)) 
 {  
   echo "Error While Renaming $old_name" ; 
 } 
else
 { 
   if(rename( $old_name, $new_name)) 
     {  
        echo "Successfully Renamed $old_name to $new_name" ; 
     } 
     else
     { 
        echo "A File With The Same Name Already Exists" ; 
     } 
  }

?>