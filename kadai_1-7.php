<?php
header('Content-Type: text/html; charset=UTF-8');
$fp = fopen("1-6.txt", "r");
while (!feof($fp)) {
  $texts[] = fgets($fp);
}
for($i = 0 ; $i < count($texts); $i++){
    echo $texts[$i];
    echo "<br>";
}
fclose($fp);
?>
