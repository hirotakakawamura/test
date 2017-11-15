<?php
$text=$_POST['1-5text'];
echo $text;
$fp = fopen("1-5.txt", "w");
fwrite($fp,$text);
fclose($fp);
 ?>
 <!DOCTYPE html>
 <html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>kadai_1-4</title>
 </head>
 <body>
   <form action="kadai_1-5.php" method="post">
     <input type="text" name="1-5text">
     <input type="submit" value="送信">
   </form>
 </body>
 </html>
