<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>結果</title>
</head>
<body>

<?php
//XSS対策
function h($value){
    return htmlspecialchars($value, ENT_QUOTES);
}

// ファイルを開く
    $file = fopen("./result.txt", "r");
// ファイル内容を1行ずつ読み込んで出力
    $row = 1;
    if($file){
        echo "<table>
                <tr>
                    <th>#</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>生年月日</th>
                    <th>クリスマスプレゼントに欲しいもの</th>
                    <th>回答時刻</th>
                </tr>
            ";

        while($line = fgetcsv($file)){
            $num = 1;
            echo "
                <tr>
                    <td>$row</td>";
            $row++;
            foreach($line as $value){
                if($num == 4){ //プレゼントのリンク作成
                    echo "<td><a href=\"https://www.amazon.co.jp/s?k=".h($value)."\" target=\"_blank\">".h($value)."</a></td>";
                }else{
                    echo "<td>".h($value)."</td>";
                }
                $num++;
            }
            echo "
                </tr>";
         }
        echo "</table>";
    }
    
// ファイルを閉じる
    fclose($file);
    echo "<a href=\"post.php\">入力画面に戻る</a>";
//jpgraphを使用して回答した年代別の円グラフ描写を実現したく、まずはサンプルプログラムが表示できるか試しましたが動きませんでした。。。
//下記コードをプログラムの冒頭に持ってくれば表示はできたのですが理由がわからず。。
//ただしこの場合は、<html>~</html>などと併用すると表示できず。
    // require_once ('library/jpgraph-4.3.4/src/jpgraph.php');
    // require_once ('library/jpgraph-4.3.4/src/jpgraph_pie.php');
    // // Some data
    // $data = array(40,21,17,14,23);
    
    // // Create the Pie Graph. 
    // $graph = new PieGraph(300,200,'auto');
    // $graph->SetShadow();
    
    // // Set A title for the plot
    // $graph->title->Set("Client side image map");
    // // $graph->title->SetFont(FF_FONT1,FS_BOLD);
    
    // // Create
    // $p1 = new PiePlot($data);
    // $p1->SetCenter(0.4,0.5);
    
    // $p1->SetLegends(array("Jan","Feb","Mar","Apr","May","Jun","Jul"));
    // $targ=array("test1.php#1","test1.php#2","test1.php#3",
    // "test1.php#4","test1.php#5","test1.php#6");
    // $alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
    // $p1->SetCSIMTargets($targ,$alts);
    
    // $graph->Add($p1);
    
    
    // // Send back the HTML page which will call this script again
    // // to retrieve the image.
    // $graph->StrokeCSIM();
?>

    
</body>
</html>