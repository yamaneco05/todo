<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/validation/TodoValidation.php';
require_once '/var/www/html/app/controller/TodoController.php';

$controller = new TodoController;
$params = $controller->editComplete();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST6</title>
  <link rel="stylesheet" href="/var/www/html/app/public/css/style.css" type="text/css" media="all">
</head>

<body>

	
	<h1>登録完了</h1>

    <div class="element_wrap">
		<label>タスク : 
		<p><?php echo $editTodo[':title'] ?></p>
		</label>
	</div>

	<div class="element_wrap">
		<label>詳細 : 
		<p><?php echo $editTodo[':detail'] ?></p>
		</label>
	</div>

	<div class="element_wrap">
		<label>期限 : 
		<p><?php echo $editTodo[':deadline_at'] ?></p>
		</label>
	</div>
		
	<div class="element_wrap">
		<label>更新日時 : 
		<p><?php echo $editTodo[':updated_at'] ?></p>
		</label>
	</div>

	<p>編集内容を登録しました。</p>

	<a href="/new.php" class="button">タスクを追加する</a>
	<a href="/index.php" class="button">タスク一覧へ</a>
	
</body>
</html>