<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/view/login/LoginController.php';
require_once '/var/www/html/app/controller/TodoController.php';

session_start();
if ( !empty($_SESSION['userInfo']) ) {
  	$userInfo = $_SESSION['userInfo'];
}
$userId = $userInfo['id'];
$todo = new Todo;
$todos = $todo->findAll($userId);

if ( empty($_SESSION['userInfo']) ) {
	header( "Location: ../../view/login/login.php" );
}

?>

<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST</title>
  	<link rel="stylesheet" type="text/css" href="/../../public/css/style.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
  	<h1>TODOリスト</h1>

  	<a href="/view/todoList/new.php" class="button">新しいタスクを追加する</a><br>
	<a href="/view/todoList/executed.php" class="button">実行済みリストへ</a>

  	<?php foreach($todos as $todo): ?>
    	
		<div id="ajax" class="c1" >

			<ul id="c2">
				<li id="c3">ID : <?php echo $todo['id']; ?></li>
				
				<li id="c4"><button type="submit" name="delete-botton" value="<?php echo $todo['id']; ?>"
				style="position: relative; left: 12%; top: 0px;">削除</button>
				</li>

				<li><input type="checkbox" name="status-checkbox" value="<?php echo $todo['id']; ?>" />
				タスク : <a href="/view/todoList/detail.php?todo_id=<?php echo $todo['id']; ?>">
				<?php echo $todo['title']; ?></a></li>

				<li>詳細 : <?php echo $todo['detail']; ?></li>
				<li>しめきり : <?php echo $todo['deadline_at']?></li>
			</ul>
		
   		</div>
		   <?php endforeach; ?>
	<script>
		$('[name="delete-botton"]').on('click', function(){
			let todo_id = $(this).val();
			window.confirm('ID: '+ todo_id +
			'の「タスク内容」を削除してもよろしいですか？');

			//ここでdata を作る
			let data = {todo_id};
				
			$.ajax({        
				url: "/../../api/delete.php",
				type: 'POST',
				data: data, //dataを渡す
				timeout: 10000,
				dataType: 'json'
			}).done(function (data) { //Ajax通信に成功したときの処理
				console.log("success", data);
				window.location.href = `/view/todoList/deleteComplete.php?todo_id=${todo_id}`;
			}).fail(function (data) { //Ajax通信に失敗したときの処理
				console.log("fail", data);

			}).always(function (data) { //処理が完了した場合の処理
				console.log("always", data);
			})
		});

		$('[name="status-checkbox"]').change(function(){
			let todo_id = $(this).val();
			
			//ここでdata を作る
			let data = {todo_id};
				
			$.ajax({        
				url: "/../../api/changeStatus.php",
				type: 'POST',
				data: data, //dataを渡す
				timeout: 10000,
				dataType: 'json'
			}).done(function (data) { //Ajax通信に成功したときの処理
				$("#ajax").html(data);
				console.log("success", data);
				window.location.href = './index.php';
			}).fail(function (data) { //Ajax通信に失敗したときの処理
				console.log("fail", data);
			}).always(function (data) { //処理が完了した場合の処理
				console.log("always", data);
			})
		});
	

	</script>
</body>
</html>