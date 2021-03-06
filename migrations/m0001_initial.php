<?php

class m0001_initial
{
    public function up()
    {
        $db = \nawar\framework\Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS users (
               id INT AUTO_INCREMENT PRIMARY KEY,
               email VARCHAR(255) NOT NULL,
               first_name VARCHAR(255) NOT NULL,
               last_name VARCHAR(255) NOT NULL,
               status TINYINT NOT NULL,
               created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }
    public function down()
    {
        $db = \nawar\framework\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS users;";
        $db->pdo->exec($SQL);
    }
}