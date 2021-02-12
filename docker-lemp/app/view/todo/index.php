<?php
require_once '/var/www/html/app/config/database.php';
require_once '/var/www/html/app/model/Todo.php';
$todos = Todo::findAll();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>PHP TEST</title>
</head>

<body>
  <h1>TODOリスト</h1>

<?php foreach($todos as $todo):?>

  <ul>
    <li><?php echo $todo['id']; ?></li>
    <li><?php echo $todo['title']; ?></li>
    <li><?php echo $todo['deadline_at']; ?></li>
    <li><?php echo $todo['detail'];?></li>
  </ul>

<?php endforeach; ?>
</body>

</html>