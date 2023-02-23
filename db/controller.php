<?php

class Controller
{
    private $db;

    function __construct($con)
    {
        $this->db = $con;
    }

    function prefixv()
    {
        try {
            $sql = "SELECT * FROM tbl_prefixs";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function documents()
    {
        try {
            $sql = "SELECT * FROM tbl_documents";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}