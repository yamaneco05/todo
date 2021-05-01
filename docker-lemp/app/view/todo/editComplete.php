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
		<li><?php echo "タスク : " . $params['title'] ?></li>

		<li><?php echo "詳細 : " .  $params['detail'] ?></li>

		<li><?php echo "期限 : " . $params['deadline_at'] ?></li>
		
		<li><?php echo "更新日時 : " . $params['updated_at'] ?></li>
	</div>

	<p>編集内容を登録しました。</p>

	<a href="/new.php" class="button">タスクを追加する</a>
	<a href="/index.php" class="button">タスク一覧へ</a>
	
</body>
</html>