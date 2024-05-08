<?php
class PengajuanProposalModel
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

    public function getAllPengajuan()
    {
        try {
            $query = "SELECT submit_proposal.id,nama_kelompok, judul FROM submit_proposal
            JOIN pemilihan_dospem ON submit_proposal.id_dospem = pemilihan_dospem.id
            JOIN submit_judul ON pemilihan_dospem.id = submit_judul.id_dospem
            JOIN users ON pemilihan_dospem.id_mhs = users.id
            JOIN kelompok ON users.id = kelompok.id_mhs WHERE submit_proposal.status = 'Waiting Approval'";

            $result = $this->conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;

        } catch (Exception $e) {

        } catch (PDOException $e) {

        }
    }

    public function getPengajuan($id)
    {
        try {
            $query = "SELECT * from submit_proposal WHERE id = $id";

            $result = $this->conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {

        } catch (PDOException $e) {

        }
    }

    public function updatePengajuanProposal($request = [])
    {
        $this->conn->beginTransaction();
        try {
            $id = $request[0]['id'] ?? null;
            $radio = $request[0]['radio'] ?? null;
            $review = $request[0]['review'] ?? null;

            $query = "UPDATE submit_proposal SET status = :status, review = :review, updated_at = now() WHERE id = $id";
            $result = $this->conn->prepare($query);
            $result->bindParam(':status', $radio);
            $result->bindParam(':review', $review);
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