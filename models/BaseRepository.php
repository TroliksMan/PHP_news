<?php

class BaseRepository
{
    protected Database $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

}