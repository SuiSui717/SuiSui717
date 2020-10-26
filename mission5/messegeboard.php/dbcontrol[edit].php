<?php

ini_set('display_errors','On');

if (isset($_POST['editnumber']) && isset($_POST['editname']) && isset($_POST['editcomment'])&& $_POST['editpass']=='test') {

  require_once('config.php');

  try {
    /// DB接続を試みる
    $dbh  = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);

    $editnumber = $_POST['editnumber'];
    $editname = $_POST['editname'];
    $editcomment = $_POST['editcomment'];

    $sql = "UPDATE messege SET name = :name, comment = :comment WHERE id = :id";

    // 更新する値と該当のIDは空のまま、SQL実行の準備をする
    $stmt = $dbh->prepare($sql);

    // 更新する値と該当のIDを配列に格納する
    $params = array(':name' => $editname, ':comment' => $editcomment,':id' => $editnumber);

    // 更新する値と該当のIDが入った変数をexecuteにセットしてSQLを実行
    $stmt->execute($params);


    $dbh = NULL;//データベース接続を解除
    echo 'Your post has been edited';





  } catch (PDOException $e) {
    $isConnect = false;
    $msg       = "MySQL への接続に失敗しました。<br>(" . $e->getMessage() . ")";
  }



}



 ?>

 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>更新完了</title>
  </head>
  <body>
  <p>
      <a href="index.php">Back to the top page</a>
  </p>
  </body>
</html>
