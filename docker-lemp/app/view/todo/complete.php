<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';
$controller = new TodoController;
$params = $controller->register();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST6</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>

<body>
	<h1>新しいタスクを追加する</h1>

    <div class="element_wrap">
		<label>タスク : 
		<p><?php echo $params[':title'] ?></p>
		</label>
	</div>

	<div class="element_wrap">
		<label>詳細 : 
		<p><?php echo $params[':detail'] ?></p>
		</label>
	</div>

	<div class="element_wrap">
		<label>期限 : 
		<p><?php echo $params[':deadline_at'] ?></p>
		</label>
	</div>
		
	<p>登録しました。</p>

	<a href="/new.php" class="button">タスクを追加する</a>
	<a href="/index.php" class="button">タスク一覧へ</a>
</body>
</html>