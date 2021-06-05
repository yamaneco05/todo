<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';

//POSTパラメータ取得
$todoId = $_POST['#executed'];
echo $todoId;

//該当データが存在するのか確認
$todo = new Todo;
$isExist = $todo->isExistById($todoId);
if ( $isExist === false ) {
    header( "Location: ../error/404.php;" );
    return;
}
//deletedに日付を入れステータス変更
$executedTodo = $todo->executed($todoId);
$controller = new TodoController;
$todos = array();
$todos = $controller->index();

