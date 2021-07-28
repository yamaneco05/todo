<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';

// session_start();
// if ( !empty($_SESSION['userInfo']) ) {
//   	$userInfo = $_SESSION['userInfo'];
// }
// $userId = $userInfo['id'];

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

    //TODOを削除する
    $controller = new TodoController;
    $deleteTodo = $controller->deleteComplete($todoId, $userId);

} else {
    $response['todo_id'] = 'fail';
}
echo json_encode($response);