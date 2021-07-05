<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';
require_once '/var/www/html/app/validation/TodoValidation.php';
$controller = new TodoController;
$todo = $controller->detail();

session_start();
if ( !empty($_SESSION['error']) ) {
  	$errors = $_SESSION['error'];
	$page_flag = 1;
	$_SESSION['error'] = array();  //セッションのエラーメッセージ削除
}
?>

<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST6</title>
  	<link rel="stylesheet" href="/../../public/css/style.css">
</head>

<body>
  	<h1>タスクを編集する</h1>

	  <?php if( $page_flag === 1 ): ?>
		
		<?php foreach ($errors as $error): ?>

			<p><?php echo $error; ?></p>
		
		<?php endforeach; ?>
		
    	<?php $_SESSION = array(); session_destroy();?>

		<button class="button" onclick="history.back()">戻る</button>
    
	<?php else: ?>
  
  	<form action="/view/todoList/editConfirm.php" method="POST">
    <div class="element_wrap" id="c1">
		<ul id="c2">
			<li>ID:<?php echo $todo['id']; ?>
			<input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
			</li>

			<li>タスク : 
				<input type="text" name="title" value="<?php echo $todo['title']; ?>"><br>
			</li>

			<li>詳細 : 
				<input type="text" name="detail" value="<?php echo $todo['detail']; ?>"><br>
			</li>

			<li>しめきり: 
				<input type="datetime-local" name="deadline_at" value="<?php echo $todo['deadline_at']; ?>">
			</li>
			
			<li>作成日 : <?php echo $todo['created_at']; ?></li>
			<li>更新日 : <?php echo $todo['updated_at']; ?></li>
			<li>実行日 : <?php echo $todo['deleted_at']; ?></li>
		</ul>
		<p>編集内容を確認しますか？</p>
		<input type="submit" class="button" value="確認">
		<button class="button" onclick="history.back()">戻る</button>	
    </div>
    </form>
    <a href="/view/todoList/index.php" class="button">タスク一覧へ</a>
	<?php endif; ?>
</body>
</html>