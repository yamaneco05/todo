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
      <li><?php echo $todo['title']; ?></li>
      <li><?php echo "しめきり:" . $todo['deadline_at'] ?></li>
      <li><?php echo "作成日:" . $todo['created_at']; ?></li>
      <li><?php echo "更新済？:" . $todo['deadline_at']; ?></li>
      <li><?php echo "削除済？:" . $todo['delated_at']; ?></li>
      <li><?php echo "詳細:"; ?><br>
      <?php echo $todo['detail']; ?></li>
    </ul>
    
</body>

</html>