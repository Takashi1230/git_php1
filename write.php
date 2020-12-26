<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>
<?php
//post.phpから入力内容を受け取り
    $results = $_POST["result"]; //名前,emailをresultで指定し、まとめて配列に格納
    $present = $_POST["present"];
    $results_day = $_POST["result_day"]; //生年月日情報を配列に格納
    var_dump($results_day);

    //生年月日を0埋めしながら結合
    $birthday = $results_day[0];
    $birthday .= sprintf('%02d',$results_day[1]);
    $birthday .= sprintf('%02d',$results_day[2]);
    // echo "誕生日".$birthday."\n";
    // echo date("Y年n月j日", strtotime($birthday)); //日付形式に変換

    date_default_timezone_set('Asia/Tokyo');
    $results[] = date("Y年n月d日", strtotime($birthday));
    $results[] = $present;
    $results[] = date("Y/m/d H:i:s"); //回答時刻追加
// ファイルに書き込み
    $file = fopen("./result.txt", "a");
    fwrite($file, implode(",", $results)."\n");
    fclose($file);
//文字作成

function h($value){
    return htmlspecialchars($value, ENT_QUOTES);
}
?>

    <h1>以下のアンケート結果を受け取りました。ご回答ありがとうございました。</h1>
    <!-- <?php
    var_dump($results);
    ?> -->
    <ul>
        <li>名前：<?=h($results[0])?></li>
        <li>メールアドレス：<?=h($results[1])?></li>
        <li>生年月日：<?=$results[2]?></li>
        <li>クリスマスプレゼントに欲しいもの：<?=h($results[3])?></li>
        <li>回答時刻：<?=$results[4]?></li>
    </ul>
    <a href="post.php">入力画面に戻る</a>
    <a href="read.php">アンケート結果を見る</a>
</body>

</html>
