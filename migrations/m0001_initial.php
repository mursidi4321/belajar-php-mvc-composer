<?php

use app\core\Application;

class m0001_initial {
    public function up(){
        $db = Application::$app->db;
        $sql = "CREATE TABLE users (
            id INT auto_increment primary key,
            email varchar (255) not null,
            firstname varchar(255) not null,
            lastname varchar(255) not null,
            status tinyint not null,
            created_at timestamp default current_timestamp

        ) ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down(){
        $db = Application::$app->db;
        $sql = "DROP TABLE users";
        $db->pdo->exec($sql);
    }
}
?>