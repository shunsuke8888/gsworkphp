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
<!--    <div class="navbar-header"><a class="navbar-brand" href="show1.php">データ一覧</a></div>-->
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert2.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>生徒情報</legend>
     <label>氏：<input type="text" name="lastname" value=""></label><br>
     <label>名：<input type="text" name="firstname" value=""></label><br>
     <label>Email：<input type="text" name="mail" value=""></label><br>
     <label>PW：<input type="text" name="userpw" value=""></label><br>
     <label>コース：<input type="text" name="course" value=""></label><br>
    <label>現スコア：<input type="text" name="scores" value="">点</label><br>
     
     <label>
     <textArea name="comment" rows="4" cols="40">
     </textArea></label><br>
     <input type="file" name="picture">
   
     <input type="hidden" name="id" value="id">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>

<!--
<form method="post" action="insert.php" enctype="multipart/form-data">
    <input type="file" accept="image/*" capture="camera" name="upfile">
    <input type="submit" value="Fileアップロード">
-->
    
    


</body>
</html>