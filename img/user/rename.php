<?php  
$old_name = "../tugas2-web-mini/index.php" ;  
   
// New Name For The File 
$new_name = "../../../tugas2-web-mini/amit.php" ;  
   
// Checking If File Already Exists 
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