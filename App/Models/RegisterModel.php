<?php
class RegisterModel
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

    public function getAllLomba()
    {
        try {
            $query = "SELECT nama_lomba, master_detail_lomba.id FROM master_lomba JOIN master_detail_lomba ON master_lomba.id = master_detail_lomba.id_mst_lomba";

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
            $lomba = $request['radioLomba'] ?? null;
            $tim = $request['namaTim'] ?? null;
            $namaKetua = $request['namaKetua'] ?? null;
            $nimKetua = $request['nimKetua'] ?? null;
            $emailKetua = $request['emailKetua'] ?? null;
            $namaAnggota1 = $request['namaAnggota1'] ?? null;
            $nimAnggota2 = $request['nimAnggota1'] ?? null;
            $namaAnggota1 = $request['namaAnggota2'] ?? null;
            $nimAnggota2 = $request['nimAnggota2'] ?? null;
            $namaAnggota1 = $request['namaAnggota3'] ?? null;
            $nimAnggota2 = $request['nimAnggota3'] ?? null;

            $query = "INSERT INTO master_lomba(nama_lomba, foto, deskripsi, created_at) VALUES(:nama, :foto, :deskripsi, now())";
            $result = $this->conn->prepare($query);
            $result->bindParam(':nama', $nama);
            $result->bindParam(':foto', $foto);
            $result->bindParam(':deskripsi', $deskripsi);
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