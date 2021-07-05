<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';


class LoginController {

    public $mail;
    public $password;
    public $user;
    public $userInfo;
    public $enterPassword;

    public function login() {

        $mail = $_POST['mail'];
        $enterPassword = $_POST['password'];

        $user = new Todo;
        $userInfo = array();
        $userInfo = $user->findByMail($mail);

        $password = $userInfo['password'];

        if ( $password == $enterPassword ) {
            
                session_start();
                $_SESSION['userInfo'] = array();  //セッションの内容削除
       
                $_SESSION['userInfo'] = $user->findByMail($mail); 
                //header( "Location: /../../view/todoList/index.php" );
                return;
            
        }
        return $userInfo;
    }


}