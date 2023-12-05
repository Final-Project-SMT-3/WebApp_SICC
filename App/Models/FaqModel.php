<?php

class FaqModel
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

    public function insert($request = [])
    {
        $this->conn->beginTransaction();
        try {
            $pertanyaan = $request[0]['pertanyaan'] ?? null;
            $jawaban = $request[0]['jawaban'] ?? null;
            $tipe = $request[0]['radioTipe'] ?? null;

            $queryInsertMaster = "INSERT INTO master_question(pertanyaan, jawaban, tipe, created_at) VALUES(:pertanyaan, :jawaban, :tipe, now())";
            $resultInsertMaster = $this->conn->prepare($queryInsertMaster);
            $resultInsertMaster->bindParam(':pertanyaan', $pertanyaan);
            $resultInsertMaster->bindParam(':jawaban', $jawaban);
            $resultInsertMaster->bindParam(':tipe', $tipe);
            $res = $resultInsertMaster->execute();

            if ($res) {
                $this->conn->commit();
                return [
                    'status' => true
                ];
            }

        } catch (Exception $e) {
            $this->conn->rollBack();
            return [
                'status' => false,
                'error_message' => $e->getMessage()
            ];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return [
                'status' => false,
                'error_message' => $e->getMessage()
            ];
        }
    }

    public function getFaq($id)
    {
        try {
            $query = "SELECT * from master_question where id = $id";

            $result = $this->conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {

        } catch (PDOException $e) {

        }
    }

    public function update($request = [])
    {
        $this->conn->beginTransaction();
        try {
            $id = $request[0]['id'];
            $pertanyaan = $request[0]['pertanyaan'] ?? null;
            $jawaban = $request[0]['jawaban'] ?? null;
            $tipe = $request[0]['radioTipe'] ?? null;

            $query = "UPDATE master_question SET pertanyaan = :pertanyaan, jawaban = :jawaban, tipe= :tipe, updated_at = now() WHERE id = $id";
            $result = $this->conn->prepare($query);
            $result->bindParam(':pertanyaan', $pertanyaan);
            $result->bindParam(':jawaban', $jawaban);
            $result->bindParam(':tipe', $tipe);
            $res = $result->execute();
            if ($res) {
                $this->conn->commit();
                return [
                    'status' => true
                ];
            }
        } catch (Exception $e) {
            $this->conn->rollBack();
            return [
                'status' => false,
                'error_message' => $e->getMessage()
            ];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return [
                'status' => false,
                'error_message' => $e->getMessage()
            ];
        }
    }

    public function delete($id)
    {
        $this->conn->beginTransaction();
        try {
            $query = "DELETE FROM master_question WHERE id = $id";
            $result = $this->conn->prepare($query);
            $res = $result->execute();
            if ($res) {
                $this->conn->commit();
                return [
                    'status' => true
                ];
            }
        } catch (Exception $e) {
            $this->conn->rollBack();
            return [
                'status' => false,
                'error_message' => $e->getMessage()
            ];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return [
                'status' => false,
                'error_message' => $e->getMessage()
            ];
        }
    }
}