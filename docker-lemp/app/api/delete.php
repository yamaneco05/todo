<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';

//POSTパラメータ取得
$todoId = $_POST['todo_id'];

//該当データが存在するのか確認
$response = array();
if($todoId) {
    $response['todo_id'] = 'success';
    
    //TODOを削除する
    $controller = new TodoController;
    $deleteTodo = $controller->deleteComplete($todoId);

} else {
    $response['todo_id'] = 'fail';
}
echo json_encode($response);