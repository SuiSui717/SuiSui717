<?php
ini_set('display_errors','On');
if (isset($_POST['delnum'])&& $_POST['delpass']=='test') {



  require_once('config.php');



        try {
          /// DB接続を試みる
          $dbh  = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);



          $delnum = $_POST['delnum'];

          $sql = "DELETE FROM messege WHERE id = :id";

          $stmt = $dbh->prepare($sql);

          $params = array(':id'=>$delnum);

          $stmt->execute($params);

          $dbh = NULL;//データベース接続を解除
          echo 'Your post has been deleted';


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
      <a href="index.php">back to the top page</a>
  </p>
  </body>
</html>
