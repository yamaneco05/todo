<?php
require_once '/var/www/html/app/view/login/LoginController.php';

$login = new LoginController;
$userInfo = $login->login();
print_r($userInfo);
$name = $userInfo['name'];
echo $name;

?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST15</title>
  <link rel="stylesheet" href="/../../public/css/style.css" type="text/css" media="all">
</head>

<body>
	<h1>ログインしました</h1>

	<p>ようこそ！<?php $res = print "$name"; echo $res; ?>さん</p>
	<p>3秒後にTODOリストへ遷移します</p>
	<META http-equiv="Refresh" content="3;URL=/view/todoList/index.php">
	<a href="/view/todoList/index.php" class="button">TODOリストへ</a><br>

	<a href="/view/todoList/executed.php" class="button">実行済みリストへ</a><br>
	<a href="/view/todoList/new.php" class="button">タスクを追加する</a>
	
</body>
</html>