<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/validation/TodoValidation.php';
require_once '/var/www/html/app/controller/TodoController.php';

// $controller = new TodoController;
// $deleteTodo = $controller->deleteComplete();
$todoId = $_GET['todo_id'];
?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST10</title>
  <link rel="stylesheet" href="/../../public/css/style.css" type="text/css" media="all">
</head>

<body>
	<h1 id="c1">削除完了</h1>



	<p>ID : <?php echo $todoId; ?>を削除しました。</p>

	<a href="/view/todoList/executed.php" class="button">実行済みリストへ</a><br>
	<a href="/view/todoList/index.php" class="button">タスク一覧へ</a><br>
	<a href="/view/todoList/new.php" class="button">タスクを追加する</a>
	
</body>
</html>