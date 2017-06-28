<?php
//1. POSTデータ取得
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$mail = $_POST["mail"];
$userpw = $_POST["userpw"];
$course = $_POST["course"];
$comment = $_POST["comment"];
$picture = $_POST["picture"];
//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO students_table (id, firstname, lastname, mail, userpw, course, comment, picture, indate )VALUES(NULL, :firstname, :lastname, :mail, :userpw, :course, :comment, :picture, sysdate())");
$stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userpw', $userpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':course', $course, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":picture", $picture, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: regist1.php");
  exit;

}
?>
