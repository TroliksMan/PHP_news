<?php

class AdminsRepository extends BaseRepository
{
    public function GetAuthor($id)
    {
        $sql = 'SELECT * FROM admins
                WHERE id = :id';
        $params = [
            ':id' => $id,
        ];
        return $this->db->SelectOne($sql, $params);
    }

    public function GetAuthors()
    {
        $sql = 'SELECT * FROM admins
                ORDER BY name, surname';
        return $this->db->SelectAll($sql);
    }

    public function InsertAuthor($name, $surname)
    {
        $sql = 'INSERT INTO admins (name, surname) VALUES  (:name, :surname)';
        $params = [
            ':name' => $name,
            ':surname' => $surname,
        ];
        return $this->db->Insert($sql, $params);
    }

    public function UpdateAuthor($id, $name, $surname)
    {
        $sql = 'UPDATE admins set name = :name, surname = :surname
                    WHERE id = :id';
        $params = [
            ':name' => $name,
            ':surname' => $surname,
            ':id' => $id,
        ];
        return $this->db->Insert($sql, $params);
    }

    public function RemoveAuthor($id)
    {
        $sql = 'DELETE FROM admins WHERE id = :id';
        $params = [
            ':id' => $id
        ];
        $this->db->Delete($sql, $params);
    }

    public function GetCount() {
        $sql = 'SELECT COUNT(ar.id) as article_count, au.id, au.name, au.surname, au.isAdmin FROM admins au
            LEFT JOIN articles ar on ar.author_id = au.id
            GROUP BY au.id, au.name, au.surname ';
        return $this->db->SelectAll($sql);
    }

    public function ChangeAdmin($id)
    {
        $sql = 'UPDATE admins set isAdmin = !isAdmin
                    WHERE id = :id';
        $params = [
            ':id' => $id
        ];
        return $this->db->Update($sql, $params);
    }
}