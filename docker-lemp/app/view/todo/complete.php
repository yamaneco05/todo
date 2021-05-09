<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';
$controller = new TodoController;
$todo = $controller->register();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST6</title>
  	<link rel="stylesheet" href="/var/www/html/app/public/css/style.css" type="text/css" media="all">
</head>

<body>
	<h1>新しいタスクを追加する</h1>

    <div class="element_wrap">
		<ul>
			<li><?php echo "タスク : " . $todo['title'] ?></li>

			<li><?php echo "詳細 : " .  $todo['detail'] ?></li>

			<li><?php echo "期限 : " . $todo['deadline_at'] ?></li>
		</ul>
	</div>
		
	<p>登録しました。</p>

	<a href="/new.php" class="button">タスクを追加する</a>
	<a href="/index.php" class="button">タスク一覧へ</a>
</body>
</html>