<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>生徒情報管理画面</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">生徒情報管理画面</nav>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act1.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>

<a class="navbar-brand" href="show2.php">生徒の一覧はこちら</a><br>
<a class="navbar-brand" href="regist1.php">生徒の登録はこちら</a><br>
<a class="navbar-brand" href="index3.php">スタッフの登録はこちら</a><br>
<a class="navbar-brand" href="booklist.php">調べ物</a><br>
<img src="images/--www.pakutaso.com-shared-img-thumb-YMD96_bakansuokinawa20120729.jpg" width="50%">


</body>
</html>