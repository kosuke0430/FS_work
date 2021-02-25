<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Page</title>
</head>
    <body>
    <h1>
        ToDo List Page
    </h1>
        <?php

        try
        {
        $add_title = $_POST['title'];
        $add_contents = $_POST['contents'];
        $add_date = date("Y年m月d日");

        $add_title = htmlspecialchars($add_title,ENT_QUOTES,'UTF-8');
        $add_contents = htmlspecialchars($add_contents,ENT_QUOTES,'UTF-8');
        $add_date =htmlspecialchars($add_date,ENT_QUOTES,'UTF-8');

        $dsn = 'mysql:dbname=ToDo;host=localhost;charset=utf8';
        $user ='root';
        $password = '';
        $dbh = new PDO($dsn,$user,$password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql ='INSERT INTO List(title,contents,day) VALUES (?,?,?)';
        $stmt = $dbh -> prepare($sql);
        $data[] = $add_title;
        $data[] = $add_contents;
        $data[] = $add_date;
        $stmt -> execute($data);
        $user_id = $pdo->lastInsertId();
        $dbh = null;

        print 'タイトル';
        print '$add_title <br />';
        print '内容';
        print '$add_contents <br />';
        print '作成日時';
        print '$add_date <br />';
        print '<br /><br />';
        print 'を追加します。<br />';
            
        
        ?>

        <a href = "index.php">戻る</a>

    </body>
</html>