<?php
session_start();
include("functions.php");
loginCheck();
//if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
//    echo "LOGIN Error!";
//    exit();
//}else{
//    session_regenerate_id(true);
//    $_SESSION["chk_ssid"] = session_id();
//    echo $_SESSION["chk_ssid"];
//}




//0.外部ファイル読み込み
//include("functions.php");
chkSSID();

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["name"]."[".h($result["life_flg"])."]";
    $view .= '</a>　';
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
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
<title>スタッフ表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
      <div class="container-fluid"></div>
      <div class="navbar-header">
      <a class="navbar-brand" href="show1.php">生徒管理画面</a>
       <a class="navbar-brand" href="logout1.php">ログアウト</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>

<!-- Main[End] -->

</body>
</html>
