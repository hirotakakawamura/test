<?php
$delete=$_POST['2-4number'];
if(isset($_POST['mainSubmit'])){
  $error_message=array();
  if(isset($_POST['2-4name'])&&!empty($_POST['2-4name'])){
    $name=$_POST['2-4name'];
  }else{
    $error_message[]="名前が入力されていません";
    $name=NULL;
  }
  if(isset($_POST['2-4comment'])&&!empty($_POST['2-4comment'])){
    $comment=$_POST['2-4comment'];
  }else{
    $error_message[]="コメントが入力されていません";
    $comment=NULL;
  }
  if(count($error_message)){
    echo "エラー！！！<br><br>";
    foreach($error_message as $message){
      print($message."<br>");
    }
    echo "正しく入力してください";
    //exit;
  }
}

$date=date("Y/m/d/H/i/s");
if(isset($name)&&isset($comment)){
  if(is_file("2-4.txt")){
    $texts=file("2-4.txt");
    $line=explode("<>",$texts[count($texts)-1]);
    $num=$line[0];
    $count=$num+1;
    $fp2 = fopen("2-4.txt", "a");
    fwrite($fp2,$count."<>"
              .$name."<>"
              .$comment."<>"
              .$date
              ."\r\n");
    fclose($fp2);
  }else{
    $count=1;
    $fp2 = fopen("2-4.txt", "a");
    fclose($fp2);
  }
}else{
}
if(isset($delete)){
  $texts=file("2-4.txt");
  $fp3=fopen("2-4.txt","w");
  foreach ($texts as $line) {
    $text=explode("<>",$line);
    if($text[0]==$delete){
    }else{
      fwrite($fp3,$text[0]."<>"
                 .$text[1]."<>"
                 .$text[2]."<>"
                 .$text[3]);
    }
  }
}



 ?>
 <!DOCTYPE html>
 <html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>kadai_2-4</title>
 </head>
 <body>
   <form action="kadai_2-4.php" method="post">
     名前<br>
     <input type="text" name="2-4name" value="名無しさん"><br>
     コメント<br>
     <textarea name="2-4comment" cols="50" rows="5">ここにコメントを入力してください</textarea><br>
     <input type="submit" value="投稿" name="mainSubmit">
   </form>
   <?php
   if(is_file("2-4.txt")){
   $texts=file("2-4.txt");
   $array=array();
   foreach ($texts as $line) {
     $text=explode("<>",$line);
     $array[]=$text[0];
     echo $text[0].":";
     echo $text[1]."-";
     echo $text[3]."<br>";
     echo $text[2];
     /*foreach ($text as $key=>$value) {
       echo $value.":";
     }*/
     echo "<br><br>";
   }
   }
    ?>
   <form action="kadai_2-4.php" method="post">
     削除番号
     <select name="2-4number">
       <option value="">未選択</option>
       <<?php
       foreach ($array as $value) {
           echo "<option value={$value}>{$value}</option>";
       }
        ?>
     </select>
     <input type="submit" value=送信>
   </form>
 </body>
 </html>
