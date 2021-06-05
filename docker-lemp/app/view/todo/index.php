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

				<li><input type="checkbox" name="id" value="<?php echo $todo['id']; ?>" />
				<div id="executed"></div>
				タスク : <a href="/detail.php?todo_id=<?php echo $todo['id']; ?>">
				<?php echo $todo['title']; ?></a></li>

				<li>詳細 : <?php echo $todo['detail']; ?></li>
				
				<li>しめきり : <?php echo $todo['deadline_at']?></li>
			</ul>
		
   		</div>
  	<?php endforeach; ?>

	<script>

		$('[name="id"]').change(function(){
			var aryCmp = [];
            $('[name="id"]:checked').each(function(index, element){
                aryCmp.push($(element).val());
            });
            $('#executed').html(aryCmp.join(','));
        	
		$.ajax({        
        	url: "ajax.php",
        	type: 'POST',
        	data: {val:'aryCmp'},
        	timeout: 10000,
        	dataType: 'number'
    	}).done(function (data) { //Ajax通信に成功したときの処理
        	$('#executed').html(data);
    	}).fail(function (data) { //Ajax通信に失敗したときの処理
        	alert('error');
    	}).always(function (data) { //処理が完了した場合の処理
        	alert('always');    
   		});
	});

	</script>
  
</body>
</html>