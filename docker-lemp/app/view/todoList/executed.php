<?php
require_once '/var/www/html/app/controller/TodoController.php'; 
session_start();
if ( !empty($_SESSION['userInfo']) ) {
	$userInfo = $_SESSION['userInfo'];
}

$userId = $userInfo['id'];

$controller = new TodoController;
$todos = $controller->executedList($userId);
?>

<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST10</title>
  	<link rel="stylesheet" href="/../../public/css/style.css" type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
  	<h1>実行済リスト</h1>

  	<a href="/view/todoList/new.php?user_id=<?php echo $userId; ?>" class="button">新しいタスクを追加する</a><br>
	<a href="/view/todoList/index.php" class="button">TODOリストへ</a><br>
	<a href="/view/login/login.php" class="button">ログアウト</a>

  	<?php foreach($todos as $todo): ?>
    	
		<div class="c1">

			<ul id="c2">
				<li><ul class="side">
					<li>ID : <?php echo $todo['id']; ?></li>
					
					<li><button type="submit" name="delete-botton" value="<?php echo $todo['id']; ?>"
					style="position: relative; left: 12%; top: 0px;">削除</button>
					</li>
				</ul></li>

				<li>タスク : <a href="/view/todoList/detail.php?todo_id=<?php echo $todo['id']; ?>">
				<?php echo $todo['title']; ?></a></li>

				<li>詳細 : <?php echo $todo['detail']; ?></li>
				
				<li>しめきり : <?php echo $todo['deadline_at']; ?></li>

				<li>実行日 : <?php echo $todo['deleted_at']; ?></li>

			</ul>
		
   		</div>
  	<?php endforeach; ?>

	  <script>
	  		$('[name="delete-botton"]').on('click', function(){
			let todo_id = $(this).val();
			if(window.confirm('ID: '+ todo_id +
			'の「タスク内容」を削除してもよろしいですか？')) {

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

			} else {
				window.alert('キャンセルされました');
				return false;
			}
		});
	  </script>
  
</body>
</html>