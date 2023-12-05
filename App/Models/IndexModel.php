<?php

class IndexModel
{
    private $param;
    private $conn;
    private $statement;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=db_cc', 'root', '');
            $this->param = new stdClass;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllFaq()
    {
        try {
            $query = "SELECT * FROM master_question";

            $result = $this->conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {

        } catch (PDOException $e) {

        }
    }

    public function getAllLomba()
    {
        try {
            $query = "SELECT master_lomba.id, nama_lomba, detail_lomba, foto FROM master_lomba JOIN master_detail_lomba ON master_lomba.id = master_detail_lomba.id_mst_lomba";

            $result = $this->conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {

        } catch (PDOException $e) {

        }
    }
}