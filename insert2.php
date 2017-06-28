<?php
//入力チェック(受信確認処理追加)
//if(
//  !isset($_POST["name"]) || $_POST["name"]=="" ||
//  !isset($_POST["email"]) || $_POST["email"]=="" ||
//  !isset($_POST["naiyou"]) || $_POST["naiyou"]==""
    
if(
!isset($_POST["firstname"]) || $_POST["firstname"]=="" ||
!isset($_POST["lastname"]) || $_POST["lastname"]=="" ||
!isset($_POST["mail"]) || $_POST["mail"]=="" ||
!isset($_POST["userpw"]) || $_POST["userpw"]=="" ||
!isset($_POST["course"]) || $_POST["course"]=="" ||
!isset($_POST["comment"]) || $_POST["comment"]=="" ||
!isset($_POST["scores"]) || $_POST["scores"]==""
//!isset($_POST["picture"]) || $_POST["picture"]==""
    
){
  exit('ParamError');
}

//1. POSTデータ取得
//$name   = $_POST["name"];
//$email  = $_POST["email"];
//$naiyou = $_POST["naiyou"];

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$mail = $_POST["mail"];
$userpw = $_POST["userpw"];
$course = $_POST["course"];
$comment = $_POST["comment"];
$scores = $_POST["scores"];
//$picture = $_POST["picture"];

//1.アップロードが正常に行われたかチェック
//isset();でファイルが送られてきてるかチェック！そしてErrorが発生してないかチェック
if(isset($_FILES['picture']) && $_FILES['picture']['error']==0){
    
    //***File名の変更***
    $file_name = $_FILES["picture"]["firstname"]; //"1.jpg"ファイル名取得
    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得
    $uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成

    //2. アップロード先とファイル名を作成
    $upload_file = "./upload/".$uniq_name; //ユニークファイル名とパス
    
    // アップロードしたファイルを指定のパスへ移動
    //例）move_uploaded_file("一時保存場所","成功後に正しい場所に移動");
    if (move_uploaded_file($_FILES["picture"]['tmp_name'],$upload_file)){
        
        //パーミッションを変更（ファイルの読み込み権限を付けてあげる）
        chmod($upload_file,0644);
        
        //アップロード成功したら文字と画像を表示
        echo 'アップロード成功';
        echo '<img src="'.$upload_file.'">';
        
    }else{
        echo "fileuploadOK...Failed";
    }
}else{
    echo "fileupload失敗";
}


//2. DB接続します(エラー処理追加)
//2.DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//３．データ登録SQL作成
//$stmt = $pdo->prepare("INSERT INTO stundents_table(id, name, email, naiyou,
//indate, image )VALUES(NULL, :a1, :a2, :a3, sysdate(), :image)");
//$stmt->bindValue(':a1', $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':a2', $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':a3', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':image', $upload_file, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$status = $stmt->execute();

$stmt = $pdo->prepare("INSERT INTO students_table (id, firstname, lastname, mail, userpw, course, comment, picture, scores, indate )VALUES(NULL, :firstname, :lastname, :mail, :userpw, :course, :comment, :picture, :scores, sysdate())");
$stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userpw', $userpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':course', $course, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':picture', $upload_file, PDO::PARAM_STR);
$stmt->bindValue(':scores', $scores, PDO::PARAM_STR);
$status = $stmt->execute();





//４．データ登録処理後
if($status==false){
  queryError($stmt);

}else{
  //５．index.phpへリダイレクト
  header("Location: regist1.php");
  exit;
}
?>
