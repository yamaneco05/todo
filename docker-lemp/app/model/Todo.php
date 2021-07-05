<?php
require_once '/var/www/html/app/config/database.php';
require_once '/var/www/html/app/controller/TodoController.php';

class Todo {
    public $todos;
    public $todoId;
    public $title;
    public $detail;
    public $deadline_at;
    public $deleted_at;
    public $userId;


    public function findAll($userId) {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $sql = "SELECT * FROM todos WHERE user_id = $userId && deleted_at = '2021-01-01 00:00:00'";
            
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
        } catch (PDOException $e) {
            print ("Error:" .$e->getMessage());
            exit;
        }
        return $todos;
    }

    public function findExecuted() {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $sql = "SELECT * FROM todos WHERE user_id = 1 && deleted_at != '2021-01-01 00:00:00'";
            
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

    public function findByMail($mail) {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $sql = "SELECT * FROM users WHERE mail = '$mail'";

            $stmt = $db->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
          
        } catch (PDOException $e) {
            print ("Error:" .$e->getMessage());
            exit;
        }
        return $user;
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

    public function create() {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //トランザクション開始
	        $db->beginTransaction();
            
            $sql = "INSERT INTO todos(user_id, 
                    title, 
                    detail, 
                    deadline_at, 
                    created_at, updated_at, deleted_at)
                    VALUES (1, 
                    '" . $this->getData()['title'] . "', 
                    '" . $this->getData()['detail'] . "', 
                    '" . $this->getData()['deadline_at'] ."', 
                    now(), now(), '2021-01-01')";

            $stmt = $db->prepare($sql);
            $stmt->execute();
         
           
            //最新の配列の取得
            $sql = "SELECT * FROM todos ORDER BY id DESC LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $todo = $stmt->fetch(PDO::FETCH_ASSOC);

            // トランザクション完了（コミット）
            $db->commit();

        } catch (PDOException $e) {
            //トランザクション取り消し（ロールバック）
	        $db->rollBack();
            print ("Error:" .$e->getMessage());
            exit;
        }
        //データベース接続切断
        $db = null;
        if( $todo == null ) {
            return false;
        }
        return $todo;
    }

    public function update() {
        try {
            $db = new PDO(DSH, USER, PASSWORD);
            //ネイティブのプリペアドステートメントを使う
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // 例外 を投げる
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //トランザクション開始
	        $db->beginTransaction();
            
            // 現在の日付を取得
            $updated_at = date('Y-m-d H:i:s');
            //更新
            $sql = "UPDATE todos SET 
                                title = '" . $this->getData()['title'] . "',
                                detail = '" . $this->getData()['detail'] . "',
                                deadline_at = '" . $this->getData()['deadline_at'] . "',
                                updated_at = '$updated_at'
                    WHERE id = '" . $this->getData()['id'] . "' && user_id = 1";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            
            // トランザクション完了（コミット）
            $db->commit();

        } catch (PDOException $e) {
            //トランザクション取り消し（ロールバック）
	        $db->rollBack();
            print ("Error:" .$e->getMessage());
            exit;
        }
        //配列を取得する
        $todo = $this->findById($this->getData()['id']);

        //データベース接続切断
        $db = null;
        if( $todo == null ) {
            return false;
        }
        return $todo;
    }

    public function delete($todoId) {
        try {
            $db = new PDO(DSH, USER, PASSWORD);
            //ネイティブのプリペアドステートメントを使う
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // 例外 を投げる
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //トランザクション開始
	        $db->beginTransaction();

            //該当データを削除
            $sql = "DELETE FROM todos WHERE id = $todoId && user_id = 1";
            $db->exec($sql);

            //トランザクション完了（コミット）
            $db->commit();
        } catch (PDOException $e) {
            //トランザクション取り消し（ロールバック）
	        $db->rollBack();
            print ("Error:" .$e->getMessage());
            exit;
        }

        //データベース接続切断
        $db = null;
        return true;
    }
    public function getData() {
        return $this->data;
    }
    public function setData($data) {
        $this->data = $data;
    }

    public function executed($todoId) {
        try {
            $db = new PDO(DSH, USER, PASSWORD);
            //ネイティブのプリペアドステートメントを使う
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // 例外 を投げる
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //トランザクション開始
	        $db->beginTransaction();
            
            // 実行した日付を取得
            $deleted_at = date('Y-m-d H:i:s');
            //更新
            $sql = "UPDATE todos SET deleted_at = '$deleted_at' 
            WHERE id = $todoId && user_id = 1";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            
            // トランザクション完了（コミット）
            $db->commit();

        } catch (PDOException $e) {
            //トランザクション取り消し（ロールバック）
	        $db->rollBack();
            print ("Error:" .$e->getMessage());
            exit;
        }

        //データベース接続切断
        $db = null;
        return $todoId;
    }

}

?>