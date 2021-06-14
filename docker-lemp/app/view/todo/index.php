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
  	<link rel="stylesheet" type="text/css" href="../../public/css/style.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
  	<h1>TODOリスト</h1>

  	<a href="/new.php" class="button">新しいタスクを追加する</a><br>
	<a href="/executed.php" class="button">実行済みリストへ</a>

  	<?php foreach($todos as $todo): ?>
    	
		<div class="element_wrap">

			<ul>
				<li>ID : <?php echo $todo['id']; ?></li>
				
				<li><button type="button" onclick="location.href='/delete.php?todo_id=<?php echo $todo['id']; ?>'"
				style="position: relative; left: 12%; top: 0px;">削除</button>
				</li>

				<li><input type="checkbox" name="status-checkbox" value="<?php echo $todo['id']; ?>" />
				タスク : <a href="/detail.php?todo_id=<?php echo $todo['id']; ?>">
				<?php echo $todo['title']; ?></a></li>

				<li>詳細 : <?php echo $todo['detail']; ?></li>
				<li>しめきり : <?php echo $todo['deadline_at']?></li>
			</ul>
		
   		</div>
		   <?php endforeach; ?>
	<script>
		//$(document).ready(function(){
			$('[name="status-checkbox"]').change(function(){
				let todo_id = <?php echo $todo['id']; ?>

				//わかりにくかったら、ここでdata を作る
				let data = {todo_id};
				//console.log(data);
				
				$.ajax({        
					url: "ajax.php",
					type: 'POST',
					data: data, //dataを渡す
					timeout: 10000,
					dataType: 'json'
				}).done(function (data) { //Ajax通信に成功したときの処理
					console.log("success", data);
					
				}).fail(function (data) { //Ajax通信に失敗したときの処理
					console.log("fail", data);
					alert('error');
				}).always(function (data) { //処理が完了した場合の処理
					console.log("always", data);
					alert('always');
				})
				});
		//});

	</script>
</body>
</html>