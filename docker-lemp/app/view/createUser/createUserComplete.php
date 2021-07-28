<?php
require_once '/var/www/html/app/model/User.php';
require_once '/var/www/html/app/controller/TodoController.php';

$controller = new User;
$todo = $controller->hashPass();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ユーザー情報の登録完了</title>
    <link rel="stylesheet" type="text/css" href="/../../public/css/style.css" />
</head>

<body>

    <h1>ユーザーの新規登録</h1>
    <div class="element_wrap" id="c1">
		<ul id="c2">

            <li>e-mail : <?php echo $todo['mail'] ?></li>

            <li>PASS:<?php echo $todo['password'] ?></li>

        </form>
        </ul>
    </div>

    <p>登録しました。</p>


</body>
</html>