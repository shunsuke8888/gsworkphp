//$(function(){
//  $('#btn').on('click', function() {
//    // 入力された郵便番号でWebAPIに住所情報をリクエスト
//    $.ajax({
//      url: 'http://zipcloud.ibsnet.co.jp/api/search?zipcode=' + $('#zipcode').val(),
//      dataType : 'jsonp',
//    }).done(function(data) {
//      if (data.results) {
//        setData(data.results[0]);
//      } else {
//        alert('該当するデータが見つかりませんでした');
//      }
//    }).fail(function(data) {
//      alert('通信に失敗しました');
//    });
//  });
//
//  // データ取得が成功したときの処理
//  function setData(data) {
//    //取得したデータを各HTML要素に代入
//    $('#prefecture').val(data.address1);  // 都道府県名
//    $('#city').val(data.address2);        // 市区町村名
//    $('#address').val(data.address3);     // 町域名
//  }
//});

$(function(){
    $('#btn').on('click', function() {
        //今後、ここにクリックされた時の処理を記述する。
    $.ajax({
        url: 'http://zipcloud.ibsnet.co.jp/api/search?zipcode=' + 
        $('#zipcode').val(),
        dataType : 'jsonp',
    }).done(function(data){
        if(data.results) {
            setData(data.results[0]);
        } else {
            alert('該当するデータが見つかりませんでした');
        }
    }).fail(function(data){
        alert('通信に失敗しました');
    });
    });
    
    // データ取得が成功した時の処理
    function setData(data) {
        //取得したデータを各HTML要素に代入
        $('#prefecture').val(data.address1); //都道府県名
        $('#city').val(data.address2);//市区町村名
        $('#address').val(data.address3);//町域名
    }
});

//$(function(){
//    $('btn2').on('click', function(){
//        $.getJSON("https://www.googleapis.com/books/v1/volumes?q=" +
//                 $("#search").val(),
//                 dataType : 'jsonp');
//    })
//})

 function Search(){
        var looking = Sample1_form.textbox.value;  //テキストエリアの値を取得
         
        //alert(""+ looking +"が入力できたぞ。");
    

var books = looking;
var url2 = 'https://www.googleapis.com/books/v1/volumes?';
$.getJSON( url2 += 'q=' + books,
function(data){
console.dir(data);
var view = "";
for(var i=0; i<data.items.length; i++){
    var item = data.items[i];
    view += '<ul>';
    view +='<li>書籍:' + item.volumeInfo.title + '</li>';
    view +='<li>URL:' + item.volumeInfo.infoLink + '</li>';
    view +='</ul>';

}

//2. id="content"に文字列を表示
$("#content").html( view );

    // 動画インサート リクエストパラメータのセット
var KEY = 'AIzaSyAm61LHJ8bXok6oWqB2-CYUxRdFWVZJLmI';                           // API KEY
//var book = 0;
var url = 'https://www.googleapis.com/youtube/v3/search?'; // API URL
url += 'type=video';            // 動画を検索する
url += '&part=snippet';         // 検索結果にすべてのプロパティを含む
url += '&q='+ data.items[0].volumeInfo.title;              // 検索ワード ここでは Tokyo に指定
url += '&videoEmbeddable=true'; // Webページに埋め込み可能な動画のみを検索
url += '&videoSyndicated=true'; // youtube.com 以外で再生できる動画のみに限定
url += '&maxResults=3';         // 動画の最大取得件数
url += '&key=' + KEY;           // API KEY

// HTMLが読み込まれてから実行する処理

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
    
    
    
    
    
}
);

 }
