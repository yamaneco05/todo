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
  	<link rel="stylesheet" href="/var/www/html/app/public/css/style.css" type="text/css" media="all">
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
        <div class="element_wrap">
        <ul>
            <li> 
				タスク : <input type="text" name="title" /><br />
        	</li>

            <li>
                詳細 : <input type="text" name="detail" /><br />
            </li>

            <li>
                期限 : <input type="datetime-local" name="deadline_at" /><br />
            </li>

        	<input type="submit" class="button" value="入力内容を確認する">
		</ul>    
		</div>
    </form>
    <a href="/index.php" class="button">タスク一覧へ</a>
    
    <?php endif; ?>
</body>
</html>