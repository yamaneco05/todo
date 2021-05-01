<?php
require_once '/var/www/html/app/config/database.php';
require_once '/var/www/html/app/controller/TodoController.php';


class Todo {
    public $todos;

    public function findAll() {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $sql = "SELECT * FROM todos WHERE user_id = 1";
          
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
        } catch (PDOException $e) {
            print ("Error:" .$e->getMessage());
            exit;
        }
        return $todos;
    }

    public function findById($todoId) {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $sql = "SELECT * FROM todos WHERE id = $todoId";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $todo = $stmt->fetch(PDO::FETCH_ASSOC);
          
        } catch (PDOException $e) {
            print ("Error:" .$e->getMessage());
            exit;
        }
        return $todo;
    }

    public function isExistById($todoId) {

        $db = new PDO(DSH, USER, PASSWORD);
        $sql = "SELECT * FROM todos WHERE id = $todoId && user_id = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $todo = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if( $todo == null ) {
            return false;
        }
        return true;
    }

    public function create($title, $detail, $deadline_at) {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "INSERT INTO todos(user_id, title, detail, deadline_at, created_at, updated_at) VALUES (:user_id, :title, :detail, :deadline_at, now(), now())";
            $stmt = $db->prepare($sql);
            $params = array('user_id' => 1, ':title' => $title, ':detail' => $detail, ':deadline_at' => $deadline_at);
            $stmt->execute($params);
            //echo '登録完了しました';

        } catch (PDOException $e) {
            print ("Error:" .$e->getMessage());
            exit;
        }

        if( $params == null ) {
            return false;
        }
        return $params;
    }

    public function change($todoId, $title, $detail, $deadline_at) {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            //ネイティブのプリペアドステートメントを使う
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // 例外 を投げる
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$sql = "SELECT * FROM todos WHERE id = $todoId";
            
            // 現在の日付を取得
            $updated_at = date('Y-m-d H:i:s');
            //更新
            $sql = "UPDATE todos SET  title = '$title', detail = '$detail', deadline_at = '$deadline_at', updated_at = '$updated_at' WHERE id = $todoId && user_id = 1";            
            $stmt = $db->prepare($sql);
            $stmt->execute();
            //配列の取得
            $sql = "SELECT * FROM todos WHERE id = $todoId && user_id = 1";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $todo = $stmt->fetch(PDO::FETCH_ASSOC);
          
        } catch (PDOException $e) {
            print ("Error:" .$e->getMessage());
            exit;
        }

        if( $todo == null ) {
            return false;
        }
        return $todo;
    }
}

?>