<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ユーザー情報の登録画面</title>
    <link rel="stylesheet" type="text/css" href="/../../public/css/style.css" />
</head>

<body>

    <h1>ユーザーの新規登録</h1>
    <div class="element_wrap" id="c1">
		<ul id="c2">

        <form action="createUserComplete.php" method="post">
            <li>e-mail : <input type="text" name="mail" /></li>

            <li>PASS:<input type="text" name="pass" /></li>
            <input type="submit" value="登録"><br><br>
            <a href="/view/login/login.php" class="button">ログイン画面へ</a>

        </form>
        </ul>
    </div>

</body>
</html>