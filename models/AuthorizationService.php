<?php

class AuthorizationService extends BaseRepository
{
    public function Authorize($username, $password)
    {
        $sql = 'SELECT * FROM admins
                    WHERE username = :username';
        $params = [
            ':username' => $username,
        ];
        $result = $this->db->SelectOne($sql, $params);
        if (!$result) {
            return false;
        }
        if (password_verify($password, $result['password'])) {
            return $result;
        }
        return false;
    }

    public function Register($username, $password, $name, $surname)
    {
        $searchSql = 'SELECT * FROM admins 
                            WHERE username = :username';
        $searchParams = [
          ':username' => $username
        ];
        $searchRes = $this->db->SelectOne($searchSql, $searchParams);

        if ($searchRes !== false) {
            return false;
        }

        $sql = 'INSERT into admins (username, password, name, surname) VALUES (:username, :password, :name, :surname)';
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $params = [
            ':username' => $username,
            ':password' => $passHash,
            ':name' => $name,
            ':surname' => $surname,
        ];
        return $this->db->Insert($sql, $params);
    }
}