<?php


class UsersModel{
    private $param;
    private $conn;
    private $statement;

    public function __construct()
    {
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=db_cc', 'root', '');
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getData($query){
        $this->statement = $this->conn->prepare($query);
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function login($request = []){
        $param = new stdClass();
        $password = htmlspecialchars(strip_tags(trim($request['password'])));
        $username = htmlspecialchars(strip_tags(trim($request['username'])));
    
        try {
            $query = "SELECT us.*, k.nama_kelompok, k.nim_anggota, k.nama_anggota, dospem.no_identitas as no_identitas_dosen, 
                        dospem.nama as nama_dospem, master_lomba.nama_lomba, pd.status as status_dospem
                        FROM users as us 
                        JOIN kelompok as k on us.id = k.id_mhs 
                        LEFT JOIN pemilihan_dospem as pd on pd.id_mhs = us.id
                        LEFT JOIN users as dospem on dospem.id = pd.id_dosen 
                        JOIN master_detail_lomba as detail_lomba ON detail_lomba.id = k.id_detail_lomba 
                        JOIN master_lomba on master_lomba.id = detail_lomba.id_mst_lomba 
                        WHERE us.username = :user 
                        AND pd.created_at = (
                            SELECT MAX(created_at) FROM pemilihan_dospem
                        )
                        LIMIT 1";
    
            $result = $this->conn->prepare($query);
            $result->bindParam(":user", $username);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
    
            if ($res) {
                if (password_verify($password, $res[0]['password'])) {
                    $param->status_code = 200;
                    $param->message = 'Success';

                    if (isset($res[0]['status'])) {
                        $param->status = $res[0]['status'];
                    } else {
                        $param->status = "Belum Memilih Dosen Pembimbing.";
                    }

                    $param->response = $res[0];
                } else {
                    $param->status_code = 401; 
                    $param->message = 'Username / Password Salah!';
                    $param->response = '';
                }                
            } else {
                $param->status_code = 200;
                $param->message = 'Data tidak ditemukan.';
                $param->response = '';
            }
        } catch (PDOException $e) {
            $param->status_code = 500;
            $param->message = 'Server Error. ' . $e->getMessage();
            $param->response = '';
        } finally {
            return json_encode($param);
        }
    }

    public function register($request = []){
        $param = new stdClass;
        // Param for users / ketua
        $nim = htmlspecialchars(trim($request['nim']));
        $nama = htmlspecialchars(trim($request['nama']));
        $username = htmlspecialchars(trim($request['username']));
        $password = md5(htmlspecialchars(trim($request['password'])));

        // Param for kelompok
        $id_detail_lomba = htmlspecialchars(trim($request['id_lomba']));
        $nama_kelompok = htmlspecialchars(trim($request['nama_kelompok']));
        $nama_anggota = trim($request['nama_anggota']);
        $nim_anggota = trim($request['nim_anggota']);
        $id_mhs = null;

        $this->conn->beginTransaction();
        try{
            $query = "INSERT INTO users(no_identitas, nama, username, password, tipe, created_at) value(:nim, :nama, :username, :password, 'mahasiswa', NOW())";
            $result = $this->conn->prepare($query);
            $result->bindParam(":nim", $nim);
            $result->bindParam(":nama", $nama);
            $result->bindParam(":username", $username);
            $result->bindParam(":password", $password);
            $res = $result->execute();
            if($res){
                $id_mhs = $this->conn->lastInsertId();
                $queryKelompok = "INSERT INTO kelompok(id_mhs, id_detail_lomba, nama_kelompok, nim_anggota, nama_anggota, created_at) VALUES(:id_mhs, :id_detail_lomba, :nama_kelompok, :nim_anggota, :nama_anggota, NOW())";
                $resultKelompok = $this->conn->prepare($queryKelompok);
                $resultKelompok->bindParam(":id_mhs", $id_mhs);
                $resultKelompok->bindParam(":id_detail_lomba", $id_detail_lomba);
                $resultKelompok->bindParam(":nama_kelompok", $nama_kelompok);
                $resultKelompok->bindParam(":nama_anggota", $nama_anggota);
                $resultKelompok->bindParam(":nim_anggota", $nim_anggota);
                $resKelompok = $resultKelompok->execute();
                $this->conn->commit();
                if($resKelompok){
                    $param->status_code = 200;
                    $param->message = 'Success';
                    $param->response = 'Berhasil menambahkan kelompok baru.';
                } else{
                    $this->conn->rollBack();
                    $param->status_code = 500;
                    $param->message = 'Terjadi kesalahan.';
                    $param->response = '';
                }
            } else{
                $this->conn->rollBack();
                $param->status_code = 500;
                $param->message = 'Terjadi kesalahan.';
                $param->response = '';
            }
        } catch(Exception $e){
            $this->conn->rollBack();
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = null;
        } catch(PDOException $e){
            $this->conn->rollBack();
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = null;
        } finally {
            return json_encode($param);
        }
    }

    public function cekEmail($request = []){
        $param = new stdClass;
        try{
            $query = "SELECT count(*) FROM users where email = :email";
            $result = $this->conn->prepare($query);
            $result->bindParam(":email", $request['email']);
            $result->execute();
            $res = $result->fetchColumn();

            $param->status_code = 200;
            $param->email = $request['email'];
            $param->result = $res;
        } catch(Exception $e){
            $param->status_code = 500;
            $param->error_message = $e->getMessage();
        } catch(PDOException $e){
            $param->status_code = 500;
            $param->error_message = $e->getMessage();
        } finally{
            return $param;
        }
    }

    public function insertOTP($otp){
        $this->conn->beginTransaction();
        try{
            $query = "INSERT INTO otp(kode, status) value('$otp', '1')";
            $result = $this->conn->prepare($query);
            $result->execute();
            $this->conn->commit();
        } catch(Exception $e){
            echo json_encode($e);
            $this->conn->rollBack();
        } catch(PDOException $e){
            echo json_encode($e);
            $this->conn->rollBack();
        }
    }

    public function cekOTP($request = []){
        var_dump($request);
        $param = new stdClass;
        try{
            $query = "SELECT count(*) FROM otp where kode = :otp and status = '1'";
            $result = $this->conn->prepare($query);
            $result->bindParam(":otp", $request['otp']);
            $result->execute();
            $res = $result->fetchColumn();

            $param->status_code = 200;
            $param->result = $res;
        } catch(Exception $e){
            $param->status_code = 500;
            $param->error_message = $e->getMessage();
        } catch(PDOException $e){
            $param->status_code = 500;
            $param->error_message = $e->getMessage();
        } finally{
            return $param;
        }
    }

    public function deactiveOTP($otp){
        $this->conn->beginTransaction();
        try{
            $query = "UPDATE otp SET status = '0' where kode = '$otp'";
            $result = $this->conn->prepare($query);
            $result->execute();
            $this->conn->commit();
        } catch(Exception $e){
            echo $e->getMessage();
            $this->conn->rollBack();
            return $e->getMessage();
        } catch(PDOException $e){
            echo $e->getMessage();
            $this->conn->rollBack();
            return $e->getMessage();
        }
    }

    public function resetPassword($request = []){
        $this->conn->beginTransaction();
        $param = new stdClass;
        try{
            $param->status_code = 200;

            $password = htmlspecialchars(trim($request['password']));
            $email = trim($request['email']);
    
            // Hash the password using bcrypt
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $query = "UPDATE users SET password = :pass, updated_at = now() WHERE email = :email";
            $result = $this->conn->prepare($query);
            $result->bindParam(':pass', $hashedPassword);
            $result->bindParam(':email', $email);
            $res = $result->execute();

            if($res){
                $this->conn->commit();
                $param->message = 'Success';
            } else {
                $this->conn->rollBack();
                $param->message = 'Terjadi kesalahan';
            }
        } catch(Exception $e){
            $this->conn->rollBack();
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
        } catch(PDOException $e){
            $this->conn->rollBack();
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
        } finally{
            return $param;
        }
    }

    public function getDataUser($request = []) {
        $param = new stdClass();
        $id_user = htmlspecialchars(trim($request['id_user']));
    
        try {
            $query = "SELECT us.*,
                            k.nama_kelompok,
                            k.nim_anggota,
                            k.nama_anggota,
                            dospem.no_identitas AS no_identitas_dosen,
                            dospem.nama AS nama_dospem,
                            master_lomba.nama_lomba,
                            pd.status AS status_dospem,
                            sj.status AS status_judul,
                            sp.status AS status_proposal
                    FROM users AS us
                    JOIN kelompok AS k ON us.id = k.id_mhs
                    LEFT JOIN pemilihan_dospem AS pd ON pd.id_mhs = us.id
                    LEFT JOIN users AS dospem ON dospem.id = pd.id_dosen
                    JOIN master_detail_lomba AS detail_lomba ON detail_lomba.id = k.id_detail_lomba
                    JOIN master_lomba ON master_lomba.id = detail_lomba.id_mst_lomba
                    LEFT JOIN submit_judul AS sj ON sj.id_dospem = pd.id
                    LEFT JOIN submit_proposal AS sp ON sp.id_judul = sj.id
                    WHERE us.id = :id_user
                    LIMIT 1";
    
            $result = $this->conn->prepare($query);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
    
            if ($res) {
                $param->status_code = 200;
                $param->message = 'Success';

                if ($res[0]['status_dospem'] != null && $res[0]['status_judul'] == null && $res[0]['status_proposal'] == null) {
                    if ($res[0]['status_dospem'] == "Accept") {
                        $param->status = "Belum Mengajukan Judul.";
                        $res[0]['status_judul'] = "Belum Mengajukan Judul.";
                    } else {
                        $param->status = $res[0]['status_dospem'] . " Dospem";
                    }
                } else if ($res[0]['status_dospem'] == null && $res[0]['status_judul'] == null && $res[0]['status_proposal'] == null) {
                    $param->status = "Belum Memilih Dosen Pembimbing.";
                    $res[0]['status_dospem'] = "Belum Memilih Dosen Pembimbing.";
                } else if ($res[0]['status_judul'] != null && $res[0]['status_proposal'] == null && $res[0]['status_dospem'] == "Accept") {
                    if ($res[0]['status_judul'] == "Accept") {
                        $param->status = "Belum Mengajukan Proposal.";
                        $res[0]['status_proposal'] = "Belum Mengajukan Proposal.";
                    } else {
                        $param->status = $res[0]['status_judul'] . " Judul";
                    }
                } else if ($res[0]['status_proposal'] != null && $res[0]['status_judul'] == "Accept" && $res[0]['status_dospem'] == "Accept") {
                    $param->status = $res[0]['status_proposal'] . " Proposal";
                } 
                
            
                $param->response = $res[0];
            } else {
                $param->status_code = 200;
                $param->message = 'Data tidak ditemukan.';
                $param->response = '';
            }
        } catch (PDOException $e) {
            $param->status_code = 500;
            $param->message = 'Server Error. ' . $e->getMessage();
            $param->response = '';
        } finally {
            return json_encode($param);
        }
    }

    public function registerWeb($request = []){
        
        $param = new stdClass;
        // Param for users / ketua
        $email = htmlspecialchars(trim($request['email']));
        $username = htmlspecialchars(trim($request['username']));

        $this->conn->beginTransaction();
        try{
            $query = "INSERT INTO users( username, email, tipe, created_at) value(:username, :email, 'mahasiswa', NOW())";
            $result = $this->conn->prepare($query);
            $result->bindParam(":email", $email);
            $result->bindParam(":username", $username);
            $res = $result->execute();
            if($res){
                $param->id = $this->conn->lastInsertId();
                $param->status = true;
                $param->email = $email;
                $this->conn->commit();
            } else{
                $param->status = false;
                $param->message = 'Terjadi kesalahan.';
            }
        } catch(Exception $e){
            $this->conn->rollBack();
            $param->status = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = null;
        } catch(PDOException $e){
            $this->conn->rollBack();
            $param->status = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = null;
        } finally {
            return $param;
        }
    }

    public function createPassword($request = []){
        $param = new stdClass;
        $namaAnggota = '';
        $nimAnggota = '';
        foreach($request['nimAnggota'] as $key => $item){
            $namaAnggota .= $request['namaAnggota'][$key] . ',';
            $nimAnggota .= $item;
        }

        $password = md5($request['password']);
        $id = $request['id'];
        $id_detail_lomba = $request['id_detail_lomba'];
        $namaKetua = $request['namaKetua'];
        $nimKetua = $request['nimKetua'];
        $namaTim = $request['nama_tim'];
        $query = "UPDATE users set password = :password, nama = :namaKetua, no_identitas = :nimKetua where id = $id";
        try{
            $this->conn->beginTransaction();
            $result = $this->conn->prepare($query);
            $result->bindParam(':password', $password);
            $result->bindParam(':namaKetua', $namaKetua);
            $result->bindParam(':nimKetua', $nimKetua);
            $res = $result->execute();
            if($res){
                $queryKelompok = "INSERT INTO kelompok(id_mhs, nama_kelompok, id_detail_lomba, nim_anggota, nama_anggota, created_at) values(:id_mhs, :nama_kelompok, :id_detail_lomba, :namaAnggota, :nimAnggota, now())";
                $resultKelompok = $this->conn->prepare($queryKelompok);
                $resultKelompok->bindParam(":id_mhs", $id);
                $resultKelompok->bindParam(":nama_kelompok", $namaTim);
                $resultKelompok->bindParam(":id_detail_lomba", $id_detail_lomba);
                $resultKelompok->bindParam(":nimAnggota", $nimAnggota);
                $resultKelompok->bindParam(":namaAnggota", $namaAnggota);
                $resKelompok = $resultKelompok->execute();
                if($resKelompok){
                    $this->conn->commit();
                    $param->status = 'ok';
                }
            } else{
                $this->conn->rollBack();
                $param->status = 'failed';
                $param->message = 'Terjadi kesalahan.';
            }
        } catch(Exception $e){
            $this->conn->rollBack();
            $param->status = 'failed';
            $param->message = 'Terjadi kesalahan.' . $e->getMessage();
        } catch(PDOException $e){
            $this->conn->rollBack();
            $param->status = 'failed';
            $param->message = 'Terjadi kesalahan.' . $e->getMessage();
        } finally{
            return $param;
        }
    }
}