<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>読書ブックマーク</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="pictures">

   
    <h1>読書リスト</h1>

  <main>
<div id="bookmarklist"></div>

  </main>
<div id="videoList"></div>
<!--<ul><li><button id="btn">検索</button></li></ul>-->
<div id="content"></div>

<div>
<form name="Sample1_form" action="">
<input type="text" name="textbox">
<input type="button" value="Search" onclick="Search()">
</form>
</div>

<div>
<form method="post" action="insert.php">
<label><p>書籍名:<input type="text" name="bookname" size="20"></p></label>
    <label><p>書籍URL:<input type="text" name="address" size="20"></p></label>
   <label><p>コメント欄<textArea name="comenet" rows="4" cols="60"></textArea>
   </label><br>
   <input type="submit" value="送信">
    
</form>
</div>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/app.js"></script>

</div>
</body>
</html>
