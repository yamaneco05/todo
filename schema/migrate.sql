mysql -u root -p
(pw:root)
//username:yamaneco だとデータベース及びテーブル作成の際に
ERROR 1044 (42000): Access deniedになってしまった為rootでログインした

create database todo;
USE todo;

create table todo.users(
    id int, 
    name varchar(20), 
    mail varchar(40), 
    password varchar(20), 
    create_at datetime, 
    update_at datetime, 
    delated_at datetime
);

create table todo.todos(
    id int, 
    user_id int, 
    title varchar(20), 
    detail text, 
    deadline_at datetime, 
    update_at datetime, 
    create_at datetime, 
    delated_at datetime
);

ALTER TABLE users CHANGE id id INTEGER PRIMARY KEY AUTO_INCREMENT;
ALTER TABLE todos CHANGE id id INTEGER PRIMARY KEY AUTO_INCREMENT;

//スペル修正
ALTER TABLE users CHANGE create_at created_at datetime;
ALTER TABLE todos CHANGE create_at created_at datetime;

ALTER TABLE users CHANGE update_at updated_at datetime;
ALTER TABLE todos CHANGE update_at updated_at datetime;

ALTER TABLE users CHANGE delated_at deleted_at datetime;
ALTER TABLE todos CHANGE delated_at deleted_at datetime;


insert into users () values ();

INSERT INTO users (id) SELECT 0 FROM users; 
//5回繰り返し 32行になった


UPDATE users SET name = CONCAT('UserName', id);
UPDATE users SET mail = CONCAT('mailaddress', id, '@sample.com');
UPDATE users SET password = CONCAT('password',id);
UPDATE users SET created_at = ADDTIME(CONCAT_WS(' ','2020-01-01' + INTERVAL RAND() * 180 DAY, '00:00:00'), SEC_TO_TIME(FLOOR(0 + (RAND() * 86401))));
UPDATE users SET updated_at = ADDTIME(CONCAT_WS(' ','2020-01-01' + INTERVAL RAND() * 180 DAY, '00:00:00'), SEC_TO_TIME(FLOOR(0 + (RAND() * 86401))));
UPDATE todos SET deleted_at = ADDTIME(CONCAT_WS(' ','2020-01-01' + INTERVAL RAND() * 180 DAY, '00:00:00'), SEC_TO_TIME(FLOOR(0 + (RAND() * 86401))));

insert into todos () values ();

INSERT INTO todos (id) SELECT 0 FROM todos; 
//3回繰り返し4行になった

UPDATE todos SET 
created_at = ADDTIME(CONCAT_WS(' ','2020-01-01' + INTERVAL RAND() * 180 DAY, '00:00:00'), SEC_TO_TIME(FLOOR(0 + (RAND() * 86401)))),
deadline_at = ADDTIME(CONCAT_WS(' ','2020-01-01' + INTERVAL RAND() * 180 DAY, '00:00:00'), SEC_TO_TIME(FLOOR(0 + (RAND() * 86401)))),
updated_at = ADDTIME(CONCAT_WS(' ','2020-01-01' + INTERVAL RAND() * 180 DAY, '00:00:00'), SEC_TO_TIME(FLOOR(0 + (RAND() * 86401)))),
delated_at = ADDTIME(CONCAT_WS(' ','2020-01-01' + INTERVAL RAND() * 180 DAY, '00:00:00'), SEC_TO_TIME(FLOOR(0 + (RAND() * 86401))));

UPDATE todos SET deleted_at = ADDTIME(CONCAT_WS(' ','2020-01-01' + INTERVAL RAND() * 180 DAY, '00:00:00'), SEC_TO_TIME(FLOOR(0 + (RAND() * 86401))));

UPDATE todos SET title = CONCAT('task', id);
UPDATE todos SET detail = CONCAT(title, title, title, title, title, title, title);
