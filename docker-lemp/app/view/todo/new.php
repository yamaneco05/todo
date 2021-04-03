<?php
require_once '/var/www/html/app/controller/TodoController.php';
require_once '/var/www/html/app/validation/TodoValidation.php';


//変数の初期化
$page_flag = 0;
if ( !empty($_POST['btn_confirm']) ) {
	$page_flag = 1;
	$controller = new TodoController;
	$params = $controller->new();
}

if( !empty($_POST['btn_submit']) ) {
	$page_flag = 2;
}

session_start();
if ( !empty($_SESSION['error']) ) {
	$errors = $_SESSION['error'];
	$page_flag = 3;
}
?>

<!DOCTYPE>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP TEST4</title>
  <style rel="stylesheet" type="text/css">
body {
	padding: 20px;
	text-align: center;
}

h1 {
	margin-bottom: 20px;
	padding: 20px 0;
	color: #209eff;
	font-size: 122%;
	border-top: 1px solid #999;
	border-bottom: 1px solid #999;
}

input[type=text] {
	padding: 5px 10px;
	font-size: 86%;
	border: none;
	border-radius: 3px;
	background: #ddf0ff;
}
input[type=datetime] {
	padding: 5px 10px;
	font-size: 86%;
	border: none;
	border-radius: 3px;
	background: #ddf0ff;
}

input[name=btn_confirm],
input[name=btn_submit],
input[name=btn_back] {
	margin-top: 10px;
	padding: 5px 20px;
	font-size: 100%;
	color: #fff;
	cursor: pointer;
	border: none;
	border-radius: 3px;
	box-shadow: 0 3px 0 #2887d1;
	background: #4eaaf1;
}

input[name=btn_back] {
	margin-right: 20px;
	box-shadow: 0 3px 0 #777;
	background: #999;
}

.element_wrap {
	margin-bottom: 10px;
	padding: 10px 0;
	border-bottom: 1px solid #ccc;
	text-align: left;
}

label {
	display: inline-block;
	margin-bottom: 10px;
	font-weight: bold;
	width: 150px;
}

.element_wrap p {
	display: inline-block;
	margin:  0;
	text-align: left;
}

textarea[name=detail] {
	padding: 5px 10px;
	width: 170px;
	height: 100px;
	font-size: 86%;
	border: none;
	border-radius: 3px;
	background: #ddf0ff;
}
</style>
</head>

<body>
  <h1>新しいタスクを追加する</h1>

	<?php if( $page_flag === 1 ): ?>

		<form method="post" action="">
			<div class="element_wrap">
				<label>タスク : </label>
				<p><?php echo $_POST['title']; ?></p>
			</div>

			<div class="element_wrap">
				<label>詳細 : </label>
				<p><?php echo $_POST['detail']; ?></p>
			</div>

			<div class="element_wrap">
				<label>期限 : </label>
				<p><?php echo $_POST['deadline_at']; ?></p>
			</div>

			<input type="submit" name="btn_back" value="戻る">
			<input type="submit" name="btn_submit" value="送信">
			<input type="hidden" name="title" value="<?php echo $_POST['title']; ?>">
			<input type="hidden" name="detail" value="<?php echo $_POST['detail']; ?>">
			<input type="hidden" name="deadline_at" value="<?php echo $_POST['deadline_at']; ?>">

		</form>

	<?php elseif( $page_flag === 2 ): ?>

		<p><?php echo "title:" . $_POST['title']; ?></p>
		<?php echo "<p>detail: " . $_POST['detail'] . "</p>"; ?>
		<?php echo "<p>deadline_at: " . $_POST['deadline_at'] . "</p>"; ?>

		<p><?php echo 'で登録しました。'; ?></p>

		<a href="/index.php">View My Task</a>

    <?php elseif( $page_flag === 3 ): ?>

		<?php foreach ($errors as $error): ?>

			<p><?php echo $error; ?></p>
		
		<?php endforeach; ?>
		<? $_SESSION = array(); session_destroy();?>

		<a href="/index.php">View My Task</a>

  	<?php else: ?>

    <form action="" method="POST">
      <div id="element_wrap">
        <label>タスク : </label>
        <input type="text" name="title" value="<?php if( !empty($_POST['title']) ){ echo $_POST['title']; } ?>">
      </div>

      <div id="element_wrap">
        <label>詳細 : </label>
        <input type="text" name="detail" value="<?php if( !empty($_POST['detail']) ){ echo $_POST['detail']; } ?>">
      </div>

	  <div id="element_wrap">
        <label>期限 : </label>
        <input type="datetime" name="deadline_at" value="<?php if( !empty($_POST['deadline_at']) ){ echo $_POST['deadline_at']; } ?>">
      </div>

      <input type="submit" name="btn_confirm" value="入力内容を確認する">
    </form>
  <a href="/index.php">View My Task</a>
  <?php endif; ?>
</body>
</html>