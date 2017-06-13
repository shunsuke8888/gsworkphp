<html>
<head>
<meta charset="utf-8">
<title>POST練習</title>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <h3>English-Innovations</h3>

<script src="js/jquery-3.1.1.min.js"></script>
<!--<script src="js/app.js"></script>-->
<tr>
<td>
<form action="write.php" method="post">
<tr>
	<th>名字:<input type="text" name="name1"></th>
	<th>名前:<input type="text" name="name2"><br></th>
   <th>カナ:<input type="text" name="name3"></th>
   <th>カナ:<input type="text" name="name4"><br></th>
    <th>年齢:<input type="text" name="age" width="30"></th>
    <th>所属:<input type="text" name="belong"><br></th>
    <th>連絡先<input type="text" name="tell"></th>
	<th>MAIL<input type="text" name="mail"><br></th>
	<th>現スコア<input type="text" name="nowscore"></th>
	<th>目標スコア<input type="text" name="future"><br></th>
	</tr>

	<input type="submit" value="申し込む">
</form>
</tr>


  <div id="videoList"></div>

<script>
// リクエストパラメータのセット
var KEY = 'AIzaSyAm61LHJ8bXok6oWqB2-CYUxRdFWVZJLmI';                           // API KEY
var url = 'https://www.googleapis.com/youtube/v3/search?'; // API URL
url += 'type=video';            // 動画を検索する
url += '&part=snippet';         // 検索結果にすべてのプロパティを含む
url += '&q=English-innovations';              // 検索ワード ここでは Tokyo に指定
url += '&videoEmbeddable=true'; // Webページに埋め込み可能な動画のみを検索
url += '&videoSyndicated=true'; // youtube.com 以外で再生できる動画のみに限定
url += '&maxResults=1';         // 動画の最大取得件数
url += '&key=' + KEY;           // API KEY

// HTMLが読み込まれてから実行する処理
$(function() {
  // youtubeの動画を検索して取得
  $.ajax({
    url: url,
    dataType : 'jsonp'
  }).done(function(data) {
    if (data.items) {
      setData(data);
    } else {
      console.log(data);
      alert('該当するデータが見つかりませんでした');
    }
  }).fail(function(data) {
    alert('通信に失敗しました');
  });
});

// データ取得が成功したときの処理
function setData(data) {
  var result = '';
  var video  = '';
  // 動画を表示するHTMLを作る
  for (var i = 0; i < data.items.length; i++) {
    video  = '<iframe src="https://www.youtube.com/embed/';
    video  +=  data.items[i].id.videoId;
    video  += '" allowfullscreen></iframe>';
    result += '<div class="video">' + video + '</div>'
  }
  // HTMLに反映する
  $('#videoList').html(result);
}

</script>

<!--
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
-->
</body>
</html>