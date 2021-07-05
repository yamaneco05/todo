<!DOCTYPE>
<html lang="ja">
<head>
  	<meta charset="UTF-8">
  	<title>PHP TEST11</title>
  	<link rel="stylesheet" href="/../../public/css/style.css" type="text/css" media="all">
</head>

<body>
	<h1>ログインする</h1>

    <div class="element_wrap" id="c1">
		<ul id="c2">
			<form action="/../../view/login/loginResult.php" method="POST">

			<li>e-mail : <input type="text" name="mail" /></li>

			<li>password : <input type="text" name="password" /></li>

			<li>メール : mailaddress1@sample.com<br>
			  パスワード : password1<br>
			  でログインできます
			</li>

			<input type="submit" class="button" value="ログインする" />
			</form>
		</ul>
	</div>
		
</body>
</html>