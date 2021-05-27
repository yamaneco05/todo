<?php 
require_once '/var/www/html/app/controller/TodoController.php'; 
$controller = new TodoController;
$todos = array();
$todos = $controller->index();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST</title>
  	<link rel="stylesheet" href="http://localhost:8000/var/www/html/app/public/css/style.css?<?php echo date('Ymd-His');?>" type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  	<h1>TODOリスト</h1>

  	<a href="/new.php" class="button">新しいタスクを追加する</a>

  	<?php foreach($todos as $todo): ?>
    	<div class="element_wrap">

      	<ul>
        	<li>ID : <?php echo $todo['id']; ?></li>
        	
			<li><button type="button" onclick="location.href='/delete.php?todo_id=<?php echo $todo['id']; ?>'" 
			style="position: relative; left: 12%; top: 0px;">削除</button>
			</li>
			<li><input type="checkbox" name="check[]" value="<?php echo $todo['id']; ?>" />
			タスク : <a href="/detail.php?todo_id=<?php echo $todo['id']; ?>">
        	<?php echo $todo['title']; ?></a></li>

        	<li>詳細 : <?php echo $todo['detail']; ?></li>
        	
			<li>しめきり : <?php echo $todo['deadline_at']?></li>
      	</ul>
		
   		</div>
  	<?php endforeach; ?>
  
</body>
</html>