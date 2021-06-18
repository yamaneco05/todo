<?php 
require_once '/var/www/html/app/controller/TodoController.php'; 
require_once '/var/www/html/app/model/Todo.php';
$controller = new TodoController;
$todo = $controller->detail();
?>

<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
  	<link rel="stylesheet" href="/var/www/html/app/public/css/style.css" type="text/css" media="all">
  	<title>PHP TEST9</title>
</head>

<body>
    <h1>タスクの削除</h1>

    <div class="element_wrap">
    	<ul>
			<li>Ｉ Ｄ  : <?php echo $todo['id']; ?></li>

			<li>タスク : <?php echo $todo['title']; ?></li>

			<li>詳 細   : <?php echo $todo['detail']; ?></li>

			<li>締切日 : <?php echo $todo['deadline_at'] ?></li>        
			<li>作成日 : <?php echo $todo['created_at']; ?></li>
			<li>更新日 : <?php echo $todo['updated_at']; ?></li>
			<li>実行日 : <?php echo $todo['deleted_at']; ?></li>
			
			<p>この内容を削除しますか？</p>
			<button type="button" onclick="location.href='/deleteComplete.php?todo_id=<?php echo $todo['id']; ?>'" 
			style="position: relative; left: 12%; top: 0px;">削除</button>
		</ul>
    </div>
	</form>
	<a href="/executed.php" class="button">実行済みリストへ</a><br>
	<a href="/index.php" class="button">タスク一覧へ</a>
    
</body>

</html>