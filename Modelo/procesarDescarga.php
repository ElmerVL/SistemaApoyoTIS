<?php
$file = file("../Archivos/Doc1.pdf");
$file2 = implode("", $file);
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment:filename= Doc1.pdf");
echo $file2;