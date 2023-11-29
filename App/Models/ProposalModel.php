<?php

class ProposalModel {
    private $param;
    private $conn;

    public function __construct() {
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=db_cc', 'root', '');
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function pengajuanProposal($request = []) {
        $param = new stdClass;
        $id_dospem = htmlspecialchars(trim($request['id_dospem']));
        $id_judul = htmlspecialchars(trim($request['id_judul']));
        $file_path = htmlspecialchars(trim($request['file_path'])); 
    
        $this->conn->beginTransaction();
        try {
            $new_file_path = $this->generateFileName($id_judul) . '.pdf'; 
    
            if (file_put_contents('./storage/proposal/'.$new_file_path, base64_decode($file_path))) {
                $query = "INSERT INTO submit_proposal(id_dospem, id_judul, path, submit_date, created_at) VALUES (:id_dospem, :id_judul, :path_file, now(),  now())";
                $result = $this->conn->prepare($query);
                $result->bindParam(':id_dospem', $id_dospem);
                $result->bindParam(':id_judul', $id_judul);
                $result->bindParam(':path_file', $new_file_path); // Corrected binding
    
                $res = $result->execute();
                $this->conn->commit();
    
                if ($res) {
                    $param->status_code = 200;
                    $param->message = 'Success';
                    $param->response = 'Berhasil Mengajukan Proposal';
                } else {
                    $this->conn->rollBack();
                    $param->status_code = 500;
                    $param->message = 'Terjadi kesalahan.';
                    $param->response = '';
                }
            } else {
                $this->conn->rollBack();
                $param->status_code = 500;
                $param->message = 'Terjadi kesalahan saat menyalin file.';
                $param->response = '';
            }
        } catch (Exception $e) {
            $this->conn->rollBack();
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = '';
        } catch (PDOException $e) {
            $this->conn->rollBack();
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = '';
        } finally {
            return $param;
        }
    }

    public function pengajuanRevisiProposal($request = []) {
        $param = new stdClass;
        $id_pengajuan = htmlspecialchars(trim($request['id_pp']));
        $id_judul = htmlspecialchars(trim($request['id_judul']));
        $file_path = htmlspecialchars(trim($request['file_path'])); 
    
        $this->conn->beginTransaction();
        try {
            $new_file_path = $this->generateFileName($id_judul) . '.pdf';

            if (file_put_contents('./storage/proposal/'.$new_file_path, base64_decode($file_path))) {
                $query = "UPDATE submit_proposal SET path = :path_file, submit_date = now(), updated_at = now() WHERE id = :id_pp";
                $result = $this->conn->prepare($query);
                $result->bindParam(':id_pp', $id_pengajuan);
                $result->bindParam(':path_file', $new_file_path); // Corrected binding

                $res = $result->execute();
                $this->conn->commit();
    
                if ($res) {
                    $param->status_code = 200;
                    $param->message = 'Success';
                    $param->response = 'Berhasil Mengajukan Revisi Proposal';
                } else {
                    $this->conn->rollBack();
                    $param->status_code = 500;
                    $param->message = 'Terjadi kesalahan.';
                    $param->response = '';
                }
            } else {
                $this->conn->rollBack();
                $param->status_code = 500;
                $param->message = 'Terjadi kesalahan saat menyalin file.';
                $param->response = '';
            }
        } catch (Exception $e) {
            $this->conn->rollBack();
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = '';
        } catch (PDOException $e) {
            $this->conn->rollBack();
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = '';
        } finally {
            return $param;
        }
    }

    private function generateFileName($id_judul) {
        $query = "SELECT us.id AS id_user, us.nama, REPLACE(k.nama_kelompok, ' ', '_') AS nama_kelompok
                    FROM users AS us 
                    JOIN kelompok AS k ON us.id = k.id_mhs 
                    LEFT JOIN pemilihan_dospem AS pd ON pd.id_mhs = us.id
                    LEFT JOIN users AS dospem ON dospem.id = pd.id_dosen 
                    LEFT JOIN submit_judul AS sj ON sj.id_dospem = pd.id
                    WHERE sj.id = :id_judul";

        $result = $this->conn->prepare($query);
        $result->bindParam(':id_judul', $id_judul);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        if (empty($res) || $res[0]['nama_kelompok'] === null) {
            return "default_filename"; 
        } else {
            return $res[0]['nama_kelompok'];
        }
    }

    public function getDetailProposal($request = []) {
        $param = new stdClass;
        $id_mhs = htmlspecialchars(trim($request['id_mhs']));

        try {
            $query = "SELECT us.id AS id_user, us.no_identitas, us.nama, k.nama_kelompok, pd.id AS id_dospem, sj.id AS id_judul,
                        dospem.nama AS nama_dospem, master_lomba.nama_lomba, pd.status AS status_dospem, sp.status AS status_proposal, 
                        sp.id AS id_pengajuan_proposal, sp.path, sp.review, sp.submit_date
                        FROM users AS us 
                        JOIN kelompok AS k ON us.id = k.id_mhs 
                        LEFT JOIN pemilihan_dospem AS pd ON pd.id_mhs = us.id
                        LEFT JOIN users AS dospem ON dospem.id = pd.id_dosen 
                        LEFT JOIN submit_judul AS sj ON sj.id_dospem = pd.id
                        LEFT JOIN submit_proposal AS sp ON sp.id_dospem = pd.id
                        JOIN master_detail_lomba AS detail_lomba ON detail_lomba.id = k.id_detail_lomba 
                        JOIN master_lomba ON master_lomba.id = detail_lomba.id_mst_lomba 
                        WHERE us.id = :id_mhs
                        AND pd.created_at = (SELECT MAX(created_at) FROM pemilihan_dospem)
                        LIMIT 1";

            $result = $this->conn->prepare($query);
            $result->bindParam(":id_mhs", $id_mhs);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();

            if($res){
                $param->status_code = 200;
                $param->message = 'Success';
                $param->response = $res[0];
            } else{
                $param->status_code = 200;
                $param->message = 'Data tidak ditemukan';
                $param->response = '';
            }
        } catch(Exception $e){
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = '';           
        } catch(PDOException $e){
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = '';           
        } finally{
            return json_encode($param);
        }
    }
}