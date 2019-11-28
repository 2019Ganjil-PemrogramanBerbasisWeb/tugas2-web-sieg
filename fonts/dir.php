<?php

$directory = "../../../tugas2-web-mini/";
$filecount = 0;
$files = glob($directory . "*");
if ($files){
 $filecount = count($files);
}
echo "There were $filecount files";

?>