<?php 
require_once '/var/www/html/app/controller/TodoController.php'; 
$todos = TodoController::index();
?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>

<body>
  <h1>TODOリスト</h1>

  <a href="/new.php" class="button">新しいタスクを追加する</a>
  
  <?php foreach($todos as $todo): ?>
    <div class="element_wrap">
      <ul>
        <li><?php echo $todo['id']; ?></li>

        <label><a href="/detail.php?todo_id=<?php echo $todo['id']; ?>">
        <?php echo $todo['title']; ?></a></label>
        <li><?php echo $todo['detail']; ?></li>
        <li><?php echo $todo['deadline_at'] . "までにやる"; ?></li>
        
      </ul>
    </div>
  <?php endforeach; ?>
  
</body>
</html>