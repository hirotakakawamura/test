<?php
$henshu=$_POST['2-5Hnumber'];
echo $henshu."<br>";
$delete=$_POST['2-5Dnumber'];
$name=$_POST['2-5name'];
$comment=$_POST['2-5comment'];
$date=date("Y/m/d/H/i/s");
$defaultName="名無しさん";
$defaultComment="ここにコメントを入力してください";
$henshuMode=0;
if(isset($_POST['2-5mode'])){
  $henshuMode=$_POST['2-5mode'];
  //echo $henshuMode;
}
if(isset($henshu)){
  $texts=file("2-5.txt");
  foreach($texts as $line){
    $text=explode("<>",$line);
    if($text[0]==$henshu){
      $defaultName=$text[1];
      $defaultComment=$text[2];
    }
  }
}
if($henshuMode==1){
  $henshu2=$_POST['2-5henshu'];
  $texts=file("2-5.txt");
  $fp3=fopen("2-5.txt","w");
  foreach($texts as $line){
    $text=explode("<>",$line);
    if($text[0]==$henshu2){
      $text[1]=$name;
      $text[2]=$comment;
      //echo "heshuseikou";
    }
    fwrite($fp3,$text[0]."<>"
               .$text[1]."<>"
               .$text[2]."<>"
               .$text[3]);
  }
}else{

  if(isset($name)&&isset($comment)){
    if(is_file("2-5.txt")){
      $texts=file("2-5.txt");
      $line=explode("<>",$texts[count($texts)-1]);
      $num=$line[0];
      $count=$num+1;
      $fp2 = fopen("2-5.txt", "a");
      fwrite($fp2,$count."<>"
                .$name."<>"
                .$comment."<>"
                .$date
                ."\r\n");
      fclose($fp2);
    }else{
      $count=1;
      $fp2 = fopen("2-5.txt", "a");
      fclose($fp2);
    }
  }

}
if(isset($delete)){
  $texts=file("2-5.txt");
  $fp3=fopen("2-5.txt","w");
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
   <title>kadai_2-5</title>
 </head>
 <body>
   <form action="kadai_2-5.php" method="post">
     名前<br>
     <input type="text" name="2-5name" value=<?php echo $defaultName; ?>><br>
     コメント<br>
     <textarea name="2-5comment" cols="50" rows="5"><?php echo $defaultComment; ?></textarea><br>
     <?php
     if(isset($henshu)){
        echo '<input type="hidden" name="2-5mode" value="1">';
        echo '<input type="hidden" name="2-5henshu" value='.$henshu.'>';
        //echo "henshumodeon";
      }
      ?>
     <input type="submit" value="投稿">
   </form>
   <?php
   if(is_file("2-5.txt")){
   $texts=file("2-5.txt");
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
   <form action="kadai_2-5.php" method="post">
     編集番号
     <select name="2-5Hnumber">
       <option value="">未選択</option>
       <<?php
       foreach ($array as $value) {
           echo "<option value={$value}>{$value}</option>";
       }
        ?>
     </select>
     <input type="submit" value=送信>
   </form>
   <form action="kadai_2-5.php" method="post">
     削除番号
     <select name="2-5Dnumber">
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
