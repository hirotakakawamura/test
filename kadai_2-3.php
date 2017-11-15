<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>kadai_2-3</title>
</head>
<body>
  <form action="kadai_2-2.php" method="post">
    名前
    <input type="text" name="2-2name"><br>
    コメント
    <input type="text" name="2-2comment"><br>
    <input type="submit" value="送信">
  </form>
  <?php
  $texts=file("2-2.txt");
  //print_r($texts);
  foreach ($texts as $line) {
    $text=explode("<>",$line);
    //print_r($text);
    foreach ($text as $value) {
      echo $value."<br>";
    }
  }
   ?>
</body>
</html>
