<?php
require_once '/var/www/html/app/config/database.php';

try {
  $db = new PDO(DSH, USER, PASSWORD);

  $sql = "SELECT * FROM todos";

  $stmt = $db->prepare($sql);
  $stmt->execute();
  $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  print ("Error:" .$e->getMessage());
  exit;
}
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