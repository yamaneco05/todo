<?php 
require_once '/var/www/html/app/controller/TodoController.php'; 
$controller = new TodoController;
$todo = $controller->detail();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>PHP TEST2</title>
</head>

<body>
  <h2>DETAIL</h2>

    <ul>
      <li><?php echo "タスク:" . $todo['title']; ?></li>
      <li><?php echo "詳細:" . $todo['detail']; ?></li><br>
      <li><?php echo "しめきり:" . $todo['deadline_at'] ?></li>
      <li><?php echo "作成日:" . $todo['created_at']; ?></li>
      <li><?php echo "更新済？:" . $todo['deadline_at']; ?></li>
      <li><?php echo "削除済？:" . $todo['delated_at']; ?></li>
      
    </ul>
  
    <a href="/index.php">View My Task</a>
    
</body>

</html>