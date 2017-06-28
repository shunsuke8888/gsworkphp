<?php
/** 共通で使うものを別ファイルにしておきましょう。*/

//DB接続関数（PDO）
function db_con(){
  $dbname='gs_db';
  try {
    $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

//SQL処理エラー
function queryError($stmt){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

function chkSSID(){
if(

!isset($_SESSION["chk_ssid"]) || 
    $_SESSION["chk_ssid"]!=session_id()

){
    echo "Login Error.";
    exit;
    
}

}

//LOGIN認証チェック関数
function loginCheck(){
    if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    echo "LOGIN Error!";
    exit();
}else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
    echo $_SESSION["chk_ssid"];
}
    
    
}


/**
* chkSSID
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}


?>
