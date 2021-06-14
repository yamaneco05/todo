<?php
require_once '/var/www/html/app/controller/TodoController.php';
require_once '/var/www/html/app/validation/TodoValidation.php';
$controller = new TodoController;
$params = $controller->confirm();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST5</title>
  	<link rel="stylesheet" href="/var/www/html/app/public/css/style.css" type="text/css" media="all">
</head>

<body>
  	<h1>新しいタスクを追加する</h1>
  
  	<form action="complete.php" method="POST">
    
    <div class="element_wrap">
		<ul>
			<li>タスク : <?php echo $_POST['title']; ?>
			<input type="hidden" name="title" value="<?php echo $_POST['title']; ?>" />
				
			</li>

			<li>詳細 : <?php echo $_POST['detail']; ?>
			<input type="hidden" name="detail" value="<?php echo $_POST['detail']; ?>" />
				
			</li>

			<li>期限 : <?php echo $_POST['deadline_at']; ?>
			<input type="hidden" name="deadline_at" value="<?php echo $_POST['deadline_at']; ?>" />
				
			</li>
		</ul>
        
    	<p>登録しますか？</p>
    	<input type="submit" class="button" value="登録">
    </div>
    </form>

    <button class="button" onclick="history.back()">戻る</button>
    <a href="/index.php" class="button">タスク一覧へ</a>
</body>
</html>