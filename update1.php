<?php
//1.POSTでParamを取得
$id     = $_POST["id"];
$firstname   = $_POST["firstname"];
$lastname   = $_POST["lastname"];
$mail  = $_POST["mail"];
$userpw  = $_POST["userpw"];
$course  = $_POST["course"];
$comment = $_POST["comment"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE students_table SET firstname=:firstname,
lastname=:lastname,mail=:mail,userpw=:userpw,course=:course, comment=:comment WHERE id=:id");
$stmt->bindValue(':firstname',   $firstname,   PDO::PARAM_STR);
$stmt->bindValue(':lastname',   $lastname,   PDO::PARAM_STR);
$stmt->bindValue(':mail',   $mail,   PDO::PARAM_STR);
$stmt->bindValue(':userpw',  $userpw,  PDO::PARAM_STR);
$stmt->bindValue(':course', $course, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  header("Location: show1.php");
  exit;
}




?>
