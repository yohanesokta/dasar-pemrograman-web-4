<?php
require_once(__DIR__."/../index.php");

$schema = "CREATE TABLE $db_database.`users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` TEXT NOT NULL,
    `email` TEXT NULL DEFAULT NULL,
    `name` TEXT NULL DEFAULT NULL,
    `ttl` VARCHAR(255) NULL DEFAULT NULL,
    `tokens` VARCHAR(255) NULL DEFAULT '',
    `gender` VARCHAR(255) NULL DEFAULT '',
    `premium` INT NULL DEFAULT '0',
    `update_premium` VARCHAR(255) NULL DEFAULT NULL,
    `expire_premium` VARCHAR(255) NULL DEFAULT NULL,
    `wach_letter` JSON  NULL DEFAULT NULL,
    `download` JSON NULL DEFAULT NULL,
    `family_user` JSON NULL DEFAULT NULL,
    `family_token_generated` INT NULL DEFAULT NULL,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;";

$schema2 = "CREATE TABLE $db_database. `history` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `film_id` INT NOT NULL,
    `film_name` VARCHAR(255) NOT NULL,
    `film_thumbnail` VARCHAR(255) NOT NULL,
    `update_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`ID`)) ENGINE = InnoDB";



try {
    $conn->execute_query($schema);
    $conn->execute_query($schema2);
} catch (Exception $e) {
    echo "". $e->getMessage() ."";
}
