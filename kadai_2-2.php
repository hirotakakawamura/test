<?php
$count;
$name=$_POST['2-2name'];
$comment=$_POST['2-2comment'];
$date=date("Y/m/d/H/i/s");
if(is_file("2-2.txt")){
  $texts=file("2-2.txt");
  $line=explode("<>",$texts[count($texts)-1]);
  $num=$line[0];
  $count=$num+1;
  $fp2 = fopen("2-2.txt", "a");
  fwrite($fp2,$count."<>"
             .$name."<>"
             .$comment."<>"
             .$date
             ."\r\n");
  fclose($fp2);
}else{
  $fp2 = fopen("2-2.txt", "a");
  fclose($fp2);
  $count=1;
  echo "filesakusei";
}
echo $count;
echo "<br>";
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
   <form action="kadai_2-2.php" method="post">
     名前
     <input type="text" name="2-2name"><br>
     コメント
     <input type="text" name="2-2comment"><br>
     <input type="submit" value="送信">
   </form>
 </body>
 </html>
