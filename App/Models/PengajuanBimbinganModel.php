<?php
class PengajuanBimbinganModel
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

    public function getAllPengajuan($id)
    {
        try {
            $query = "SELECT pemilihan_dospem.id, nama_kelompok, nama_anggota, nim_anggota FROM pemilihan_dospem
            JOIN users ON users.id = pemilihan_dospem.id_dosen
            JOIN kelompok ON pemilihan_dospem.id_mhs = kelompok.id_mhs WHERE pemilihan_dospem.status = 'Waiting Approval' AND users.id = $id";

            $result = $this->conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {

        } catch (PDOException $e) {

        }
    }

    public function updateAcc($id)
    {
        $this->conn->beginTransaction();
        try {
            $query = "UPDATE pemilihan_dospem SET status = 'Accept', updated_at = now() WHERE id = $id";
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
    public function updateDec($id)
    {
        $this->conn->beginTransaction();
        try {
            $query = "UPDATE pemilihan_dospem SET status = 'Decline', updated_at = now() WHERE id = $id";
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
?>