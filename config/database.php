<?php

class Database{
    private static ?PDO $instance=null;

    public static function getInstance():PDO{
        if(!self::$instance){
            $dsn="mysql:host=localhost;dbname=mabagnole";
            self::$instance =new PDO($dsn, 'root','',[
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
            ]);
        }
        return self::$instance;
    }
}
