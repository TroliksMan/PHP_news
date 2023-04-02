<?php

class CategoriesRepository extends BaseRepository
{
    public function GetCategory($id)
    {
        $sql = 'SELECT * FROM categories
                    WHERE id = :id';
        $params = [
            ':id' => $id
        ];
        return $this->db->SelectOne($sql, $params);
    }

    public function GetCategories()
    {
        $sql = 'SELECT * FROM categories
                    ORDER BY name';
        return $this->db->SelectAll($sql);
    }

    public function InsertCategory($name)
    {
        $sql = 'INSERT INTO categories (name) VALUES (:name)';
        $params = [
            ':name' => $name,
        ];
        return $this->db->Insert($sql, $params);
    }

    public function UpdateCategory($id, $name)
    {
        $sql = 'UPDATE categories set name = :name 
                    WHERE id = :id';
        $params = [
            ':name' => $name,
            ':id' => $id,
        ];
        return $this->db->Update($sql, $params);
    }

    public function RemoveCategory($id)
    {
        $sql = 'DELETE FROM categories WHERE id = :id';
        $params = [
            ':id' => $id
        ];
        $this->db->Delete($sql, $params);
    }

    public function GetCount()
    {
        $sql = 'SELECT COUNT(ar.id) as article_count, ca.id, ca.name FROM categories ca
            LEFT JOIN articles ar on ar.cat_id = ca.id
            GROUP BY ca.id, ca.name';
        return $this->db->SelectAll($sql);
    }
}