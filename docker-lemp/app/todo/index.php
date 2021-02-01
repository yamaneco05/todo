<html>
<head>
  <meta charset="UTF-8">
  <title>PHP TEST</title>
</head>
<body>
<h1>TODOリスト</h1>

<?php
//phpinfo();
$dsh = "mysql:host=mysql;dbname=todo;charset=utf8mb4";
$user = "root";
$password = "root";

try {
  # hostには「docker-compose.yml」で指定したコンテナ名を記載
  $db = new PDO($dsh, $user, $password);

  $sql = "SELECT * FROM todos";
  
  $stmt = $db->prepare($sql);
  $stmt->execute();

  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    print($result['id'].'<br>');
    print($result['title'].'<br>');
    print($result['deadline_at'].'までにやる' . '<br>');
    print($result['detail'].'<br>');
  }
  
} catch (PDOException $e) {
  print ("Error:" .$e->getMessage());
  exit;
}

?>

</body>
</html>