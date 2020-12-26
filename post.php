<html>

<head>
    <meta charset="utf-8">
    <style>
        .menu {
            background-color: #2FA6E9;
        }
    </style>
    <title>POST練習</title>
</head>

<body>
    <div class="menu">
        <h3>menu</h3>
        <ul>
            <li>アンケートに回答してください</li>
            <li><a href="index.php">index.php</a></li>
        </ul>
    </div>
    <P>※post_confirm.phpにpostで送ってください。</P>

    <form action="write.php" method="post">
        <p>お名前: <input type="text" name="result[]"></p>
        <p>EMAIL: <input type="text" name="result[]"></p>
        <p>生年月日：
        <select name="result_day[]">
            <option value="">--</option>
        <?php
            for($year = 1960; $year <= 2020; $year++){
                print('<option value="'.$year.'">'.$year.'</option>');
            }
        ?>
        </select>
        年
        <select name="result_day[]">
            <option value="">--</option>
        <?php
            for($month = 1; $month <= 12; $month++){
                print('<option value="'.$month.'">'.$month.'</option>');
            }
        ?>
        </select>
        月
        <select name="result_day[]">
            <option value="">--</option>
        <?php
            for($date = 1; $date <= 31; $date++){
                print('<option value="'.$date.'">'.$date.'</option>');
            }
        ?>
        </select>
        日
        </p>
        <p>クリスマスプレゼントで欲しいもの：<input type="text" name="present"></p>
        <input type="submit" value="送信">
    </form>
</body>

</html>
