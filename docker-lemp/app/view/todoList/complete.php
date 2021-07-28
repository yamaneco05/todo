<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';
if ( !empty($_SESSION['userInfo']) ) {
	$userInfo = $_SESSION['userInfo'];
}

$controller = new TodoController;
$todo = $controller->register();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST6</title>
  	<link rel="stylesheet" href="/../../public/css/style.css" type="text/css" media="all">
</head>

<body>
	<h1>新しいタスクを追加する</h1>

    <div class="element_wrap" id="c1">
		<ul id="c2">
			<li>タスク : <?php echo $todo['title'] ?></li>

			<li>詳細 : <?php echo $todo['detail'] ?></li>

			<li>期限 : <?php echo $todo['deadline_at'] ?></li>
		</ul>
	</div>
		
	<p>登録しました。</p>

	<a href="/view/todoList/new.php?user_id=<?php echo $todo['user_id'] ?>" class="button">タスクを追加する</a><br>
	<a href="/view/todoList/index.php" class="button">タスク一覧へ</a>
</body>
</html>