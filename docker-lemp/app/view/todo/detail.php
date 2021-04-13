<?php 
require_once '/var/www/html/app/controller/TodoController.php'; 
$controller = new TodoController;
$todo = $controller->detail();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <title>PHP TEST2</title>
</head>

<body>
  <h1>タスクの詳細</h1>
    <div class="element_wrap">
      <ul>
        <li><?php echo "タスク:" . $todo['title']; ?></li>
        <li><?php echo "詳細:" . $todo['detail']; ?></li><br>
        <li><?php echo "しめきり:" . $todo['deadline_at'] ?></li>
        <li><?php echo "作成日:" . $todo['created_at']; ?></li>
        <li><?php echo "更新済？:" . $todo['deadline_at']; ?></li>
        <li><?php echo "削除済？:" . $todo['delated_at']; ?></li>
        
      </ul>
    </div>
  <a href="/index.php" class="button">タスク一覧へ</a>
    
</body>

</html>