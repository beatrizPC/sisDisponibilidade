<?php
class Conexao
{
    public static function connect()
    {
        $pdo = new PDO('mysql:host=localhost;port=3306; charset=UTF8; dbname=sisdisponibilidade', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
}
