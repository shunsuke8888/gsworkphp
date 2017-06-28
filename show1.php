<?php
session_start();
include("functions.php");
loginCheck();
//$id = $_GET["id"];
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM students_table");
$status = $stmt->execute();

//$stmt = $pdo->prepare("SELECT * FROM students_table WHERE id=:id");
//$stmt->bindValue(":id", $id, PDO::PARAM_INT);
//$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    $view .= "<fieldset><legend>生徒さん</legend>：";
    $view .='<a href="detail1.php?id='. $result["id"].'">';
    $view .= "ID".$result["id"]."◆".$result["lastname"]." ".$result["firstname"]."◆".$result["mail"]."★英語コース：".$result["course"]."｜現在のスコア＝".$result["scores"]."|登録日".$result["indate"];
    $view .= '</a>';
    $view .='　　';
    $view .='<backgroundColor="green">';
    //$view .= '<img src="'.$result["picture"].'" width="200">';
    $view .= '<a href="delete1.php?id='.$result["id"].'">';
    $view .= "[削除]";
    $view .= '</a>';
    $view .= '</fieldset>';
    $view .= '</p>';

      

  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>会員一覧</title>
<link rel="stylesheet" href="css/style.css">
<link href="css/style.css">

<style>div{padding: 10px;font-size:16px;}</style>
</head>
<a class="navbar-brand" href="logout1.php">ログアウト</a>



<body id="main">
<h1>生徒一覧：コメント管理</h1>
<div class="navbar-header"><a class="navbar-brand" href="select.php">スタッフ一覧</a></div>
<!-- Head[Start] -->
<!--
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
-->
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
