<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';
require_once '/var/www/html/app/validation/TodoValidation.php';
$controller = new TodoController;
$todo = $controller->edit();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST6</title>
  	<link rel="stylesheet" href="/var/www/html/app/public/css/style.css" type="text/css" media="all">
</head>

<body>
  	<h1>タスクを編集する</h1>
  
  	<form action="editConfirm.php" method="POST">
      
    <div class="element_wrap">
		<p><?php echo "ID:" . $_POST['todoId']; ?></p>
 		<input type="hidden" name="todoId" value="<?php echo $_POST['todoId']; ?>">
   	</div>

    <div class="element_wrap">
      	<label>タスク : 
      		<input type="text" name="title" value="<?php echo $_POST['title']; ?>">
    	</label>
    </div>

    <div class="element_wrap">
      	<label>詳細 : 
      		<input type="text" name="detail" value="<?php echo $_POST['detail']; ?>">
      	</label>
    </div>

    <div class="element_wrap">
      	<label>期限 : 
      		<input type="datetime" name="deadline_at" value="<?php echo $_POST['deadline_at']; ?>">
      	</label>      
    </div>
        
    <p>編集内容を確認しますか？</p>
    <input type="submit" class="button" value="確認">
    
    </form>

    <button class="button" onclick="history.back()">戻る</button>
    <a href="/index.php" class="button">タスク一覧へ</a>

</body>
</html>