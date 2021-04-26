<?php 
require_once '/var/www/html/app/controller/TodoController.php'; 
$controller = new TodoController;
$todo = $controller->detail();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/var/www/html/app/public/css/style.css" type="text/css" media="all">
  <title>PHP TEST2</title>
</head>

<body>
    <h1>タスクの詳細</h1>

    <form action="edit.php" method="POST">
    <div class="element_wrap">
    <ul>
        <li><?php echo "ID:" . $todo['id']; ?></li>
        <input type="hidden" name="todoId" value="<?php echo $todo['id']; ?>">

        <li><?php echo "タスク:" . $todo['title']; ?></li>
        <input type="hidden" name="title" value="<?php echo $todo['title']; ?>">
        
        <li><?php echo "詳細:" . $todo['detail']; ?></li>
        <input type="hidden" name="detail" value="<?php echo $todo['detail']; ?>">
        
        <li><?php echo "しめきり:" . $todo['deadline_at'] ?></li>
        <input type="hidden" name="deadline_at" value="<?php echo $todo['deadline_at']; ?>">
        
        
        <li><?php echo "作成日:" . $todo['created_at']; ?></li>
        <li><?php echo "更新済？:" . $todo['updated_at']; ?></li>
        <li><?php echo "削除済？:" . $todo['delated_at']; ?></li>
    </ul>
    </div>
    <input type="submit" class="button" value="編集する">
    </form>
<a href="/index.php" class="button">タスク一覧へ</a>
    
</body>

</html>