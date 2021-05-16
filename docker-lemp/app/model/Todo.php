<?php
require_once '/var/www/html/app/config/database.php';
require_once '/var/www/html/app/controller/TodoController.php';

class Todo {
    public $todos;
    private $todoId;
    private $title;
    private $detail;
    private $deadline_at;

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

    public function create() {
        $todo = new Todo;
        $todo->setId($_POST['id']);
        $todo->setTitle($_POST['title']);
        $todo->setDetail($_POST['detail']);
        $todo->setDeadline($_POST['deadline_at']);

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
                    created_at, updated_at) 
                    VALUES (1, 
                    '" . $todo->getTitle() . "', 
                    '" . $todo->getDetail() . "', 
                    '" . $todo->getDeadline() . "', 
                    now(), now())";
            $db->exec($sql);
            // トランザクション完了（コミット）
            $db->commit();
            $stmt = $db->prepare($sql);
            $stmt->execute();
            //最新の配列の取得
            $sql = "SELECT * FROM todos ORDER BY id DESC LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $todo = $stmt->fetch(PDO::FETCH_ASSOC);

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
                                title = '" . $this->getTitle() . "',
                                detail = '" . $this->getDetail() . "',
                                deadline_at = '" . $this->getDeadline() . "',
                                updated_at = '$updated_at'
                    WHERE id = '" . $this->getId() . "' && user_id = 1";
            $db->exec($sql);
            // トランザクション完了（コミット）
	        $db->commit();
            $stmt = $db->prepare($sql);
            $stmt->execute();

        } catch (PDOException $e) {
            //トランザクション取り消し（ロールバック）
	        $db->rollBack();
            print ("Error:" .$e->getMessage());
            exit;
        }
        $todo = self::findById($this->getId());
        
        //データベース接続切断
        $db = null;
        if( $todo == null ) {
            return false;
        }
        return $todo;
    }

    public function getId() {
        return $this->todoId;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getDetail() {
        return $this->detail;
    }
    public function getDeadline() {
        return $this->deadline_at;
    }
    public function setId($todoId) {
        $this->todoId = $todoId;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setDetail($detail) {
        $this->detail = $detail;
    }
    public function setDeadline($deadline_at) {
        $this->deadline_at = $deadline_at;
    }

}

?>