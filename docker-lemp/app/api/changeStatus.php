<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';

//POSTパラメータ取得
$todoId = $_POST['todo_id'];

//該当データが存在するのか確認
$response = array();
if($todoId) {
    $response['todo_id'] = 'success';
    
    //userId取得
    $todo = new Todo;
    $todoInfo = $todo->findById($todoId);
    $userId = $todoInfo['user_id'];

    //deletedに日付を入れステータス変更
    $executedTodo = $todo->executed($todoId, $userId);

    //実行済みリスト出力
    $controller = new TodoController;
    $todos = $controller->index($userId);

} else {
    $response['todo_id'] = 'fail';
}
echo json_encode($response);



