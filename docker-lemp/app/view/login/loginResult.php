<?php
require_once '/var/www/html/app/controller/LoginController.php';
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/validation/LoginValidation.php';

$login = new LoginController;
$userInfo = $login->login();

if ( empty($_SESSION['userInfo']) ) {
	$page_flag = 1;
}
$userInfo = $_SESSION['userInfo'];
$name = $userInfo['name'];

?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST15</title>
  <link rel="stylesheet" href="/../../public/css/style.css" type="text/css" media="all">
</head>

<body>
 	<?php if( $page_flag === 1 ): ?>
		
			<p>パスワードが違います。</p>
			<p>戻るボタンで戻り、正しいパスワードを入力してください。</p>
				
		<button class="button" onclick="history.back()">戻る</button>
    
		<?php else: ?>
	<h1>ログインしました</h1>

	<p>ようこそ！<?php echo $name; ?>さん</p>
	<p>3秒後にTODOリストへ遷移します</p>
	<META http-equiv="Refresh" content="3;URL=/view/todoList/index.php">
	<a href="/view/todoList/index.php" class="button">TODOリストへ</a><br>

	<a href="/view/todoList/executed.php" class="button">実行済みリストへ</a><br>
	<a href="/view/todoList/new.php" class="button">タスクを追加する</a>
	<?php endif; ?>
</body>
</html>