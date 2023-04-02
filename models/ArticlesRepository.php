<?php

class ArticlesRepository extends BaseRepository
{
    public function GetArticles(bool $alphabetical = false, bool $publishedOnly = true)
    {
        if ($publishedOnly) {
            $sql = 'SELECT a.*, c.name as cat_name, ar.name, ar.surname FROM articles a
                    INNER JOIN categories c on c.id = a.cat_id
                    INNER JOIN admins ar on ar.id = a.author_id
                    WHERE a.published = true
                    ';
        } else {
            $sql = 'SELECT a.*, c.name as cat_name, ar.name, ar.surname FROM articles a
                    INNER JOIN categories c on c.id = a.cat_id
                    INNER JOIN admins ar on ar.id = a.author_id
                    ';
        }
        if ($alphabetical)
            $sql = $sql . 'ORDER BY a.heading';
        else
            $sql = $sql . 'ORDER BY a.create_date DESC';
        return $this->db->SelectAll($sql);
    }

    public function GetArticlesByCategory($cat_id)
    {
        $sql = 'SELECT a.*, c.name as cat_name, ar.name, ar.surname FROM articles a
                    INNER JOIN categories c on c.id = a.cat_id
                    INNER JOIN admins ar on ar.id = a.author_id
                    WHERE a.cat_id = :id AND published = true
                    ORDER BY a.create_date DESC';
        $params = [
            ':id' => $cat_id
        ];
        return $this->db->SelectAll($sql, $params);
    }

    public function GetArticlesByAuthor($author_id)
    {
        $sql = 'SELECT a.*, c.name as cat_name ,ar.name, ar.surname FROM articles a
                    INNER JOIN categories c on c.id = a.cat_id
                    INNER JOIN admins ar on ar.id = a.author_id
                    WHERE a.author_id = :id AND published = true
                    ORDER BY a.create_date DESC';
        $params = [
            ':id' => $author_id
        ];
        return $this->db->SelectAll($sql, $params);
    }

    public function GetArticleByID($id)
    {
        $sql = 'SELECT a.*, c.name as cat_name, ar.name, ar.surname FROM articles a 
                    INNER JOIN categories c on c.id = a.cat_id
                    INNER JOIN admins ar on ar.id = a.author_id                         
                    WHERE a.id = :id';
        $params = [
            ':id' => $id,
        ];
        return $this->db->SelectOne($sql, $params);
    }

    public function InsertArticle($cat_id, $author_id, $heading, $intro, $content)
    {
        $sql = 'INSERT INTO articles (cat_id, author_id, heading, intro, content) VALUES (:cat_id, :author_id, :heading, :intro, :content)';
        $params = [
            ':cat_id' => $cat_id,
            ':author_id' => $author_id,
            ':heading' => $heading,
            ':intro' => $intro,
            ':content' => $content,
        ];
        return $this->db->Insert($sql, $params);
    }

    public function UpdateArticle($id, $cat_id, $author_id, $heading, $intro, $content)
    {
        $sql = 'UPDATE articles SET cat_id = :cat_id, author_id = :author_id, heading = :heading, intro = :intro, content = :content
                    WHERE id = :id';
        $params = [
            ':id' => $id,
            ':cat_id' => $cat_id,
            ':author_id' => $author_id,
            ':heading' => $heading,
            ':intro' => $intro,
            ':content' => $content,
        ];
        return $this->db->Update($sql, $params);
    }

    public function RemoveArticle($id)
    {
        $sql = 'DELETE FROM articles WHERE id = :id';
        $params = [
            ':id' => $id,
        ];
        $this->db->Delete($sql, $params);
    }

    public function ChangePublished($id)
    {
        $sql = 'UPDATE articles set published = !published
                    WHERE id = :id';
        $params = [
            ':id' => $id
        ];
        return $this->db->Update($sql, $params);
    }
}