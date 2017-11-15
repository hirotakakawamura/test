<?php
$fp = fopen("sample.txt", "r");
echo fread($fp, filesize("sample.txt"));
fclose($fp);
?>
