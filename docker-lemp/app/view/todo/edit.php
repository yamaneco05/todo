<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';
require_once '/var/www/html/app/validation/TodoValidation.php';
$controller = new TodoController;
$todo = $controller->edit();

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
  	<link rel="stylesheet" href="/var/www/html/app/public/css/style.css" type="text/css">
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
  
  	<form action="editConfirm.php" method="POST">
    <div class="element_wrap">
    <ul>
        <li><?php echo "ID:" . $todo['id']; ?></li>
        <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">

        <li><?php echo "タスク:" ?>
        	<input type="text" name="title" value="<?php echo $todo['title']; ?>">
        </li>

        <li><?php echo "詳細:" ?>
        	<input type="text" name="detail" value="<?php echo $todo['detail']; ?>">
        </li>

        <li><?php echo "しめきり:" ?>
        	<input type="datetime" name="deadline_at" value="<?php echo $todo['deadline_at']; ?>">
        </li>
        
        <li><?php echo "作成日:" . $todo['created_at']; ?></li>
        <li><?php echo "更新日:" . $todo['updated_at']; ?></li>
        <li><?php echo "削除日:" . $todo['delated_at']; ?></li>
		
		<p>編集内容を確認しますか？</p>
    	<input type="submit" class="button" value="確認">
		<button class="button" onclick="history.back()">戻る</button>
    </ul>
    </div>
    </form>
    <a href="/index.php" class="button">タスク一覧へ</a>
	<?php endif; ?>
</body>
</html>