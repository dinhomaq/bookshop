<?php
namespace App\Db;

use PDO;
use PDOException;

class Db
{

    private static $instance;

    public static function db()
    {

        self::$instance = NULL;

        try {

            self::$instance = new PDO('mysql:host=localhost;dbname=db_bookshop;charset=utf8', 'root', '');

            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {

            echo "Error menssage" . $erro->getMessage();
            echo "Line Error" . $erro->getLine();

        }
        if (!self::$instance) {

            echo "erro ao conectar";
        } else {
            // echo "conectou";
            return self::$instance;
        }

    }
}




?>