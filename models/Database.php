<?php

class Database
{
    const HOST = 'mysqlstudenti.litv.sssvt.cz';
    const DBNAME = '4b2_stankomichal_db1';
    const USER = 'stankomichal';
    const PASSWORD = '123456Ab';

    private $conn;

    public function __construct()
    {
        $this->conn = new PDO(
            'mysql:host=' . self::HOST . ';dbname=' . self::DBNAME,
            self::USER,
            self::PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }

    public function SelectAll($sql, $params = [])
    {
        $stmt = $this->Execute($sql, $params);
        return $stmt->fetchAll();
    }

    public function SelectOne($sql, $params)
    {
        $stmt = $this->Execute($sql, $params);
        return $stmt->fetch();
    }

    public function Insert($sql, $params)
    {
        $this->Execute($sql, $params);
        return $this->conn->lastInsertId();
    }

    public function Update($sql, $params)
    {
        $stmt = $this->Execute($sql, $params);
        return $stmt->rowCount();
    }

    public function Delete($sql, $params)
    {
        return $this->Update($sql, $params);
    }

    private function Execute($sql, $params)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}