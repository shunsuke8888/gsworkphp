<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規登録</title>
<!--
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
-->
</head>
<body>
<div class="pictures">

    <h1>新規スタッフ登録</h1>

<div>
<form method="post" action="insert.php">
<label><p>氏<input type="text" name="" size="20">
<label><p>名<input type="text" name="" size="20"></p></label>
   </p></label>
    <label><p>メールアドレス<input type="text" name="mail" size="20"></p></label>
    <label><p>ログインID<input type="text" name="loginID" size="20"></p></label>
    <label><p>PW<input type="text" name="password" size="20"></p></label>
    
    <p>コース：<br>
<select name="course">
<option value="TOEFL">TOEFL</option>
<option value="TOEIC">TOEIC</option>
</select></p>
  
   <input type="submit" value="送信">
    
</form>
</div>
<a href="login1.php">ログイン画面へ</a>
<script src="js/jquery-2.1.3.min.js"></script>

</div>
</body>
</html>
