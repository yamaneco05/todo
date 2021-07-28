<?php
require_once '/var/www/html/app/validation/LoginValidation.php';
require_once '/var/www/html/app/controller/LoginController.php';

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
  	<title>PHP TEST11</title>
  	<link rel="stylesheet" href="/../../public/css/style.css" type="text/css" media="all">
</head>

<body>
	<h1>ログインする</h1>

	<?php if( $page_flag === 1 ): ?>
		
		<?php foreach ($errors as $error): ?>

			<p><?php echo $error; ?></p>
		
		<?php endforeach; ?>
		
    	<?php $_SESSION = array(); session_destroy();?>

		<button class="button" onclick="history.back()">戻る</button>
    <?php else: ?>

    <div class="element_wrap" id="c1">
		<ul id="c2">
			<form action="/../../view/login/loginResult.php" method="POST">

			<li>e-mail : <input type="text" name="mail" /></li>

			<li>password : <input type="text" name="password" /></li>

			<li>メール : mailaddress1@sample.com<br>
			  パスワード : password1<br>
			  でログインできます
			</li>

			<input type="submit" class="button" value="ログインする" /><br><br>
			
			<a href="/view/createUser/createUserIndex.php" class="button">ユーザーの新規登録</a>

			</form>
		</ul>
	</div>
	<?php endif; ?>	
</body>
</html>