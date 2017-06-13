<!--
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
</head>
<body>
<h1>TOEIC短期講習</h1>

-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>



<?php
// ファイルを変数に格納
$filename = 'data/data.txt';
$ar = array();               //配列格納用

// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');//ファイル開ける
//グラフにスコア分けするために、変数を設定・初めは0;
    $num1 = 0;//グラフに反映させたい数字だよ。
    $num2 = 0;
    $num3 = 0;
    $num4 = 0;
    $num5 = 0;
    $num6 = 0;
    $num7 = 0;
    

// whileで行末までループ処理
while (!feof($fp)) {

  // fgetsでファイルを読み込み、変数に格納
  $txt = fgets($fp);
$str = explode(",", $txt);
if($str[0]==""){
    break;
    
}
    if($str[5]<=400){
        $num1++;
    }
    if($str[5]>=401 && $str[5]<=500){
        $num2++;
    }
    if($str[5]>=501 && $str[5]<=600){
        $num3++;
    }
    if($str[5]>=601 && $str[5]<=700){
        $num4++;
    }
    if($str[5]>=701 && $str[5]<=800){
        $num5++;
    }
    if($str[5]>=801 && $str[5]<=900){
        $num6++;
    }
    if($str[5]>=901 && $str[5]<=990){
        $num7++;
    }
    
    array_push($ar, $str);
  // ファイルを読み込んだ変数を出力

  //var_dump($str);
//    if($str[5]==""){
////    break;
//        $str[5] = "なし";
//    };
    //echo "名前：".$str[0]." ";
    //echo "|現スコア:".$str[5]."<tr>";
    //echo "☆目標スコア:".$str[6]."<th>"."<br>";
}
// fcloseでファイルを閉じる
fclose($fp);

//JSON形式に変換
$json =json_encode($ar);
//echo $json;
?>

<html>
    <body>
        <div id="stage"></div>
        
        
        <script>
            //「申込データ」
var data = [
  { label: "000-400", y: <?php echo $num1;?> },
  { label: "400-500", y: <?php echo $num2;?>  },
  { label: "500-600", y: <?php echo $num3;?>  },
  { label: "600-700", y: <?php echo $num4;?>  },
  { label: "700-800", y: <?php echo $num5;?>  },
  { label: "801-900", y: <?php echo $num6;?>  },
  { label: "901-990", y: <?php echo $num7;?>  }
];
            
            
        var stage = document.getElementById('stage');
var chart = new CanvasJS.Chart(stage, {
  title: {
    text: "TOEIC短期講座：申込状況（MAX16名）"  //グラフタイトル
  },
  theme: "theme4",  //テーマ設定
  data: [{
    type: 'column',  //グラフの種類
    dataPoints: data  //表示するデータ
  }]
});
chart.render();
        </script>
        


<script src="https://www.gstatic.com/charts/loader.js"></script>

<div id="stage2"></div>
<!--
<script>
        
Result EDIT ON//必要なパッケージの読み込み
google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  //オプション設定
  var options = {
    'title': 'サンプルチャート',
    'width': window.innerWidth,
    'height': window.innerHeight
  };
  
  //月別データ
  var data2 = google.visualization.arrayToDataTable([
    ['月', '数量'],
    ['１月', 65],
    ['２月', 59],
    ['３月', 80],
    ['４月', 81],
    ['５月', 56],
    ['６月', 55],
    ['７月', 48]
  ]);

  var stage2 = document.getElementById('stage2');
  
  //グラフの種類を設定
  var chart = new google.visualization.ColumnChart(stage);
  
  //データとオプションを設定
  chart.draw(data2, options);
}

    var hiduke = new data();
    
        </script>
-->
   

   
    </body>
    
    
</html>

<!--

    
</body>
</html>-->
