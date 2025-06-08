<?php
require("../index.php");

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
    PRIMARY KEY (`id`)) ENGINE = InnoDB;";


if ($conn->execute_query($schema) === TRUE) {
echo "<h1> Table And Database Success Created! Dont Use Again </h1>";
}
else { 
    echo "<h1>Fail<h1>";
}