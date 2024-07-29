<?php
require_once __DIR__ . '/autoload.php';

use classes\DataBase;

DataBase::connection()->query('CREATE TABLE IF NOT EXISTS `Reviews` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(255) NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `text` TEXT NOT NULL , 
    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)) 
    ENGINE = InnoDB;');

header('Location:/');