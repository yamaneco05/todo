<?php
require_once '/var/www/html/app/controller/TodoController.php';
require_once '/var/www/html/app/validation/TodoValidation.php';

session_start();
if ( !empty($_SESSION['error']) ) {
  $errors = $_SESSION['error'];
	$page_flag = 1;
	$_SESSION['error'] = array();  //セッションのエラーメッセージ削除
}

?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST4</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>

<body>
  <h1>新しいタスクを追加する</h1>
    
    <?php if( $page_flag === 1 ): ?>
		
		  <?php foreach ($errors as $error): ?>

			  <p><?php echo $error; ?></p>
		
		  <?php endforeach; ?>
		
      <?php $_SESSION = array(); session_destroy();?>

		<button class="button" onclick="history.back()">戻る</button>
    <?php else: ?>
        
      <form action="confirm.php" method="POST">
        
        <div id="element_wrap">
          <label>タスク : </label>
          <input type="text" name="title" value="<?php echo $_POST['title']; ?>">
        </div>

        <div id="element_wrap">
          <label>詳細 : </label>
          <input type="text" name="detail" value="<?php echo $_POST['detail']; ?>">
        </div>

	      <div id="element_wrap">
          <label>期限 : </label>
          <input type="datetime" name="deadline_at" value="<?php echo $_POST['deadline_at']; ?>">
        </div>

		    <p>※期限の入力例 : 2021年5月3日10時30分 → 2021.05.03.10.30</p>

        <input type="submit" class="button" value="入力内容を確認する">
      
      </form>

      <a href="/index.php" class="button">タスク一覧へ</a>
    
    <?php endif; ?>
</body>
</html>