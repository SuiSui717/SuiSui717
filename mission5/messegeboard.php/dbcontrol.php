<?php
ini_set('display_errors','On');
if (isset($_POST['name'])&& isset($_POST['comment']) && $_POST['pass']=='test') {

  require_once('config.php');


  $name = $_POST['name'];
  $comment = $_POST['comment'];

  try {
    /// DB接続を試みる
    $dbh  = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);


    $sql = "INSERT INTO messege (name, comment, post_at) VALUES (:name, :comment, now())";
    $stmt = $dbh->prepare($sql);
    $params = array(':name' => $name, ':comment' => $comment);
    $stmt->execute($params);

    $dbh = NULL;//データベース接続を解除
    require('index.php');



  } catch (PDOException $e) {
    $isConnect = false;
    $msg       = "MySQL への接続に失敗しました。<br>(" . $e->getMessage() . ")";
  }

}







?>
　
