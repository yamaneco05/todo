<?php 
require_once '/var/www/html/app/controller/TodoController.php'; 
$controller = new TodoController;
$todos = array();
$todos = $controller->executedList();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST10</title>
  	<link rel="stylesheet" href="http://localhost:8000/var/www/html/app/public/css/style.css?<?php echo date('Ymd-His');?>" type='text/css'>
</head>
<body>
  	<h1>実行済リスト</h1>

  	<a href="/new.php" class="button">新しいタスクを追加する</a><br>
	<a href="/index.php" class="button">TODOリストへ</a>


  	<?php foreach($todos as $todo): ?>
    	
		<div class="element_wrap">

			<ul>
				<li>ID : <?php echo $todo['id']; ?></li>
				
				<li><button type="button" onclick="location.href='/delete.php?todo_id=<?php echo $todo['id']; ?>'" 
				style="position: relative; left: 12%; top: 0px;">削除</button>
				</li>

				<li>タスク : <a href="/detail.php?todo_id=<?php echo $todo['id']; ?>">
				<?php echo $todo['title']; ?></a></li>

				<li>詳細 : <?php echo $todo['detail']; ?></li>
				
				<li>しめきり : <?php echo $todo['deadline_at']?></li>

				<li>実行日 : <?php echo $todo['deleted_at']?></li>

			</ul>
		
   		</div>
  	<?php endforeach; ?>
  
</body>
</html>