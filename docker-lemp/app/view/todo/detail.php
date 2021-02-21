<?php 
$todoId = htmlspecialchars($_GET['todo_id']); 
require_once '/var/www/html/app/controller/TodoController.php'; 
$todo_personals = TodoController::detail($todoId);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>PHP TEST2</title>
</head>

<body>
  <h2>DETAIL</h2>

  <?php foreach($todo_personals as $todo_personal): ?>

    <ul>
      <li><?php echo $todo_personal['title']; ?></li>
      <li><?php echo "しめきり:" . $todo_personal['deadline_at'] ?></li>
      <li><?php echo "作成日:" . $todo_personal['created_at']; ?></li>
      <li><?php echo "更新済？:" . $todo_personal['deadline_at']; ?></li>
      <li><?php echo "削除済？:" . $todo_personal['delated_at']; ?></li>
      <li><?php echo "詳細:"; ?><br>
      <?php echo $todo_personal['detail']; ?></li>
    </ul>
    
  <?php endforeach; ?>

</body>

</html>