<?php
$text=$_POST['1-6text'];
echo $text;
$fp = fopen("1-6.txt", "a");
fwrite($fp,$text."\r\n");
fclose($fp);
 ?>
 <!DOCTYPE html>
 <html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>kadai_1-6</title>
 </head>
 <body>
   <form action="kadai_1-6.php" method="post">
     <input type="text" name="1-6text">
     <input type="submit" value="送信">
   </form>
 </body>
 </html>
