<?php



//1.GETでidを取得
$id = $_GET["id"];
//echo $id;
//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM students_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
//$img='<img src="'. $file_dir_path . $file_name .'" >';
$status = $stmt->execute();


//4.select.phpと同じようにデータを取得（以下はイチ例）
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $result = $stmt->fetch(); //$result["id"];
}

//if(isset($_FILES['picture']) && $_FILES['picture']['error']==0){
    
    //***File名の変更***
//    $file_name = $_FILES["picture"]["firstname"]; //"1.jpg"ファイル名取得
//    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得
//    $uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成
//
//    //2. アップロード先とファイル名を作成
//    $upload_file = "./upload/".$uniq_name; //ユニークファイル名とパス
//    
//    // アップロードしたファイルを指定のパスへ移動
//    //例）move_uploaded_file("一時保存場所","成功後に正しい場所に移動");
//    if (move_uploaded_file($_FILES["picture"]['tmp_name'],$upload_file)){
//        
//        //パーミッションを変更（ファイルの読み込み権限を付けてあげる）
//        chmod($upload_file,0644);
//        
//        //アップロード成功したら文字と画像を表示
//        echo 'アップロード成功';
//        echo '<img src="'.$upload_file.'">';
//        
//    }else{
//        echo "fileuploadOK...Failed";
//    }
//}else{
//    echo "fileupload失敗";
//}
print date('Y年m月d日');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
      <div class="container-fluid"></div>
    <div class="navbar-header"><a class="navbar-brand" href="show1.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update1.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>生徒情報</legend>
    <tr><img src="<?=$result["picture"]?>" width="200"><br></tr>
     <td><label>Name:<input type="text" name="firstname" value="<?=$result["firstname"]?>" width="30"></label></td>
     <td><label><input type="text" name="lastname" value="<?=$result["lastname"]?>"></label><br></td>
     <td><label>Email：<input type="text" name="mail" value="<?=$result["mail"]?>"></label><br></td>
     <td><label>PW：<input type="text" name="userpw" value="<?=$result["userpw"]?>"></label><br></td>
     <td><label>コース：<input type="text" name="course" value="<?=$result["course"]?>"></label><br></td>
     <label>現スコア：<input type="text" name="scores" value="<?=$result["scores"]?>">点</label><br>
    
     <label>コメント：
     <textArea name="comment" rows="4" cols="40">
     <?=$result["comment"]?>
     </textArea></label><br>

     
    
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="送信">
     
    </fieldset>
    
    
  </div>
</form>
<!--
 <div class="container jumbotron"><?=$view?></div>
<?php var_dump($view);?>
-->
<!-- Main[End] -->


</body>
</html>






