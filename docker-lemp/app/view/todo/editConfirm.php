<?php
require_once '/var/www/html/app/controller/TodoController.php';
require_once '/var/www/html/app/validation/TodoValidation.php';
require_once '/var/www/html/app/model/Todo.php';
// session_start();
// if ( !empty($_SESSION['error']) ) {
//   	$errors = $_SESSION['error'];
// 	$page_flag = 1;
// 	$_SESSION['error'] = array();  //セッションのエラーメッセージ削除
// }

$controller = new TodoController;
$params = $controller->editConfirm();

?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST7</title>
  <link rel="stylesheet" href="/var/www/html/app/public/css/style.css" type="text/css" media="all">
</head>

<body>


  	<h1>編集内容を確認する</h1>
	
  	<form action="editComplete.php" method="POST">
  	
	<div class="element_wrap">
		<p><?php echo "ID:" . $_POST['todoId']; ?></p>
 		<input type="hidden" name="todoId" value="<?php echo $_POST['todoId']; ?>">
   	</div>

    <div class="element_wrap">
    	<label>タスク : 
      		<input type="hidden" name="title" value="<?php echo $_POST['title']; ?>">
      	</label>
      	<p><?php echo $_POST['title']; ?></p>
    </div>

    <div class="element_wrap">
      	<label>詳細 : 
      		<input type="hidden" name="detail" value="<?php echo $_POST['detail']; ?>">
      	</label>
      	<p><?php echo $_POST['detail']; ?></p>
    </div>

    <div class="element_wrap">
      	<label>期限 : 
      		<input type="hidden" name="deadline_at" value="<?php echo $_POST['deadline_at']; ?>">
      	</label>
      	<p><?php echo $_POST['deadline_at']; ?></p>
    </div>
        
    <p>この編集内容を登録しますか？</p>
    <input type="submit" class="button" value="登録">
    
    </form>

    <button class="button" onclick="history.back()">戻る</button>
    <a href="/index.php" class="button">タスク一覧へ</a>
	
	
</body>
</html>