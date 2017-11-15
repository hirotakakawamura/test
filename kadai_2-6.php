<?php
//日本語でコメント
$pass=trim($_POST['2-6pass']);
$inputPass=trim($_POST['2-6inputPass']);
$henshu=$_POST['2-6Hnumber'];
echo $henshu."<br>";
$delete=$_POST['2-6Dnumber'];
$name=$_POST['2-6name'];
$comment=$_POST['2-6comment'];
$date=date("Y/m/d/H/i/s");
$defaultName="名無しさん";
$defaultComment="ここにコメントを入力してください";
$henshuMode=0;
if(isset($_POST['2-6mode'])){
  $henshuMode=$_POST['2-6mode'];
  //echo $henshuMode;
}

if(isset($henshu)){
  $texts=file("2-6.txt");
  foreach($texts as $line){
    $text=explode("<>",$line);
    if($text[0]==$henshu){
      if($inputPass!=trim($text[4])){
        echo "passIsWrong";
      }else{
        $defaultName=$text[1];
        $defaultComment=$text[2];
        $defaultPass=$text[4];
      }
    }
  }
}
if($henshuMode==1){
  $henshu2=$_POST['2-6henshu'];
  $texts=file("2-6.txt");
  $fp3=fopen("2-6.txt","w");
  foreach($texts as $line){
    $text=explode("<>",$line);
    if($text[0]==$henshu2){
      $text[1]=$name;
      $text[2]=$comment;
      $text[4]=$pass;
      //echo "heshuseikou";
    }
    fwrite($fp3,$text[0]."<>"
               .$text[1]."<>"
               .$text[2]."<>"
               .$text[3]."<>"
               .trim($text[4])
               ."\r\n");
  }
  fclose($fp3);
}else{

  if(isset($name)&&isset($comment)&&isset($pass)){
  //名前、コメント、パスワードが存在する場合
    if(is_file("2-6.txt")){
      $texts=file("2-6.txt");
      $line=explode("<>",$texts[count($texts)-1]);
      $num=$line[0];
      $count=$num+1;
      $fp2 = fopen("2-6.txt", "a");
      fwrite($fp2,$count."<>"
                .$name."<>"
                .$comment."<>"
                .$date."<>"
                .$pass
                ."\r\n");
      fclose($fp2);
    }else{
      $count=1;
      $fp2 = fopen("2-6.txt", "a");
      fclose($fp2);
    }
  }

}
if(isset($delete)){
  $texts=file("2-6.txt");
  $fp3=fopen("2-6.txt","w");
  foreach ($texts as $line) {
    $text=explode("<>",$line);
      if($text[0]==$delete){
        if($inputPass==trim($text[4])){
        }else{
          echo "passIsWrong";
          fwrite($fp3,$text[0]."<>"
                    .$text[1]."<>"
                    .$text[2]."<>"
                    .$text[3]."<>"
                    .$text[4]);
        }
      }else{
        fwrite($fp3,$text[0]."<>"
                  .$text[1]."<>"
                  .$text[2]."<>"
                  .$text[3]."<>"
                  .$text[4]);
                }
            }
}



 ?>
 <!DOCTYPE html>
 <html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>kadai_2-6</title>
 </head>
 <body>
   <form action="kadai_2-6.php" method="post">
     名前<br>
     <input type="text" name="2-6name" value=<?php echo $defaultName; ?>><br>
     コメント<br>
     <textarea name="2-6comment" cols="50" rows="5"><?php echo $defaultComment; ?></textarea><br>
     <?php
     if(isset($henshu)){
        echo '<input type="hidden" name="2-6mode" value="1">';
        echo '<input type="hidden" name="2-6henshu" value='.$henshu.'>';
        //echo "henshumodeon";
      }
      ?>
      パスワード<br>
     <input type="password" name="2-6pass" maxlength="4" value=<?php
     if(isset($defaultPass)){ echo $defaultPass;}
     ?>><br>
     <input type="submit" value="投稿">
   </form>
   <?php
   if(is_file("2-6.txt")){
   $texts=file("2-6.txt");
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
   <form action="kadai_2-6.php" method="post">
     編集番号
     <select name="2-6Hnumber">
       <option value="">未選択</option>
       <<?php
       foreach ($array as $value) {
           echo "<option value={$value}>{$value}</option>";
       }
        ?>
     </select>
     パスワード
     <input type="password" name="2-6inputPass" maxlength="4">
     <input type="submit" value=送信>
   </form>
   <form action="kadai_2-6.php" method="post">
     削除番号
     <select name="2-6Dnumber">
       <option value="">未選択</option>
       <<?php
       foreach ($array as $value) {
           echo "<option value={$value}>{$value}</option>";
       }
        ?>
     </select>
     パスワード
     <input type="password" name="2-6inputPass" maxlength="4">
     <input type="submit" value=送信>
   </form>
 </body>
 </html>
