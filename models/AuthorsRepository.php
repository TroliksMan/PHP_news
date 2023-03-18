<?php

class AuthorsRepository extends BaseRepository
{
    public function GetAuthor($id)
    {
        $sql = 'SELECT * FROM authors
                WHERE id = :id';
        $params = [
            ':id' => $id,
        ];
        return $this->db->SelectOne($sql, $params);
    }

    public function GetAuthors()
    {
        $sql = 'SELECT * FROM authors
                ORDER BY name, surname';
        return $this->db->SelectAll($sql);
    }

    public function InsertAuthor($name, $surname)
    {
        $sql = 'INSERT INTO authors (name, surname) VALUES  (:name, :surname)';
        $params = [
            ':name' => $name,
            ':surname' => $surname,
        ];
        return $this->db->Insert($sql, $params);
    }

    public function UpdateAuthor($id, $name, $surname)
    {
        $sql = 'UPDATE authors set name = :name, surname = :surname
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
        $sql = 'DELETE FROM authors WHERE id = :id';
        $params = [
            ':id' => $id
        ];
        $this->db->Delete($sql, $params);
    }

    public function GetCount() {
        $sql = 'SELECT COUNT(ar.id) as article_count, au.id, au.name, au.surname FROM authors au
            LEFT JOIN articles ar on ar.author_id = au.id
            GROUP BY au.id, au.name, au.surname ';
        return $this->db->SelectAll($sql);
    }
}