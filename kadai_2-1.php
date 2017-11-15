<?php
$name=$_POST['2-1name'];
$comment=$_POST['2-1comment'];
echo $name;
echo "<br>";
echo $comment;
 ?>
 <!DOCTYPE html>
 <html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>kadai_2-1</title>
 </head>
 <body>
   <form action="kadai_2-1.php" method="post">
     名前
     <input type="text" name="2-1name"><br>
     コメント
     <input type="text" name="2-1comment"><br>
     <input type="submit" value="送信">
   </form>
 </body>
 </html>
