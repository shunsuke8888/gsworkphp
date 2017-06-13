<?php
$name1 = $_POST["name1"];
$name2 = $_POST["name2"];
$mail = $_POST["mail"];
$age = $_POST["age"];
$belong = $_POST["belong"];
$nowscore = $_POST["nowscore"];
$future = $_POST["future"];
$tell = $_POST["tell"];

$str = $name1.",".$name2.",".$mail.",".$age.",". $belong.",".$nowscore.",".$future.",".$tell.",";
?>

<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
<p class="logo"><a href="#"><img src="cheese_ans/images/companylogo.jpg" alt="English-Innovations"></a></p><br>
お申し込み頂きありがとうございました。<br>
本日中にご連絡させて頂きます。

<?php

$file = fopen("data/data.txt","a");	// ファイル読み込み
flock($file, LOCK_EX);			// ファイルロック
fwrite($file, $str."\n");
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>
<!--
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
-->
</body>
</html>