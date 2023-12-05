<?php
class PengajuanJudulModel
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
            $query = "SELECT submit_judul.id, nama_kelompok, nama_anggota, nim_anggota, judul FROM submit_judul
            JOIN pemilihan_dospem ON pemilihan_dospem.id = submit_judul.id_dospem
            JOIN kelompok ON kelompok.id_mhs = pemilihan_dospem.id_mhs
            JOIN users ON users.id = pemilihan_dospem.id_dosen WHERE submit_judul.status = 'Waiting Approval' AND users.id = $id";

            $result = $this->conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {

        } catch (PDOException $e) {

        }
    }

    public function updatePengajuanJudul($id, $request = [])
    {
        $this->conn->beginTransaction();
        try {
            $query = "UPDATE submit_judul SET status = :status, review = :review, updated_at = now() WHERE id = $id";
            $result = $this->conn->prepare($query);
            $result->bindParam(':status', $request[0]['radio']);
            $result->bindParam(':review', $request[0]['tanggapanJudul']);
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