<?php
require_once '/var/www/html/app/controller/TodoController.php';
require_once '/var/www/html/app/validation/TodoValidation.php';
$controller = new TodoController;
$params = $controller->new();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST5</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>

<body>
  <h1>新しいタスクを追加する</h1>
  
  <form action="complete.php" method="POST">
    
    <div class="element_wrap">
      <label>タスク : </label>
      <input type="text" name="title" value="<?php echo $_POST['title']; ?>">
    </div>

    <div class="element_wrap">
      <label>詳細 : </label>
      <input type="text" name="detail" value="<?php echo $_POST['detail']; ?>">
    </div>

    <div class="element_wrap">
      <label>期限 : </label>
      <input type="datetime" name="deadline_at" value="<?php echo $_POST['deadline_at']; ?>">
    </div>
        
    <p>登録しますか？</p>
    <input type="submit" class="button" value="登録">
    
    </form>

    <button class="button" onclick="history.back()">戻る</button>
    <a href="/index.php" class="button">タスク一覧へ</a>

</body>
</html>