<?php 
require_once '/var/www/html/app/controller/TodoController.php'; 
$todos = TodoController::index();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>PHP TEST</title>
</head>

<body>
  <h1>TODOリスト</h1>

  <?php foreach($todos as $todo): ?>

    <ul>
      <li><?php echo $todo['id']; ?></li>

      <li><a href="/detail.php?todo_id=<?php echo $todo['id']; ?>">
      <?php echo $todo['title']; ?></a></li>
      <li><?php echo $todo['detail']; ?></li>
      <li><?php echo $todo['deadline_at'] . "までにやる"; ?></li>
    </ul>

  <?php endforeach; ?>

  <a href="/new.php">Create New Task</a>
  
</body>

</html>