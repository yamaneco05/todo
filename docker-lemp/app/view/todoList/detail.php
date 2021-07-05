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
  	<link rel="stylesheet" href="/../../public/css/style.css" type="text/css" media="all">
  	<title>PHP TEST2</title>
</head>

<body>
    <h1>タスクの詳細</h1>

    <div class="element_wrap" id="c1">
        <ul id="c2">
            <li>Ｉ Ｄ  : <?php echo $todo['id']; ?></li>

            <li>タスク : <?php echo $todo['title']; ?></li>
            
            <li>詳 細   : <?php echo $todo['detail']; ?></li>
            
            <li>締切日 : <?php echo $todo['deadline_at'] ?></li>        
            <li>作成日 : <?php echo $todo['created_at']; ?></li>
            <li>更新日 : <?php echo $todo['updated_at']; ?></li>
            <li>実行日 : <?php echo $todo['deleted_at']; ?></li>
        </ul>
    </div>
    <a href="/view/todoList/edit.php?todo_id=<?php echo $todo['id']; ?>">編集する</a><br>
	<a href="/view/todoList/index.php" class="button">タスク一覧へ</a>
    
</body>

</html>