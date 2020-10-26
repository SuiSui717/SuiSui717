<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>Post</p><br>
    <form class="" action="dbcontrol.php" method="post">
      <input type="text" name="name" value="name">
      <input type="text" name="comment" value="comment">
      <input type="text" name="pass" value="password">
      <input type="submit" name="" value="submit">
    </form>

    <p>Delete form</p><br>
    <form class="" action="dbcontrol[delete].php" method="post">
      <input type="number" name="delnum" value="post number">
      <input type="text" name="delpass" value="password">
      <input type="submit" name="" value="delate">

    </form>

      <p>Edit form</p><br>
      <form class="" action="dbcontrol[edit].php" method="post">
        <input type="number" name="editnumber" value="post number">
        <input type="text" name="editname" value="new name">
        <input type="text" name="editcomment" value="new comment">
        <input type="text" name="editpass" value="password">
        <input type="submit" name="" value="edit">
        </form>



        </form>

  </body>
<?php
ini_set('display_errors','On');



  require_once('config.php');




      // defineの値は環境によって変えてください。


      try {
        /// DB接続を試みる
        $dbh  = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);


        $sql = 'SELECT * FROM messege';
          $stmt = $dbh->query($sql);


          $results = $stmt->fetchAll();

          foreach ($results as $row){

            echo "<br>";
            //$rowの中にはテーブルのカラム名が入る
            echo $row['id'].',';
            echo $row['name'].',';
            echo $row['comment'].',';
            echo $row['post_at'].'<br>';
            echo "<hr>";
          }


      } catch (PDOException $e) {
        $isConnect = false;
        $msg       = "MySQL への接続に失敗しました。<br>(" . $e->getMessage() . ")";
      }

    ?>


    </html>
