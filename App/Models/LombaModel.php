<?php

class LombaModel
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

    public function getAllData($request = [])
    {
        try {
            // $query = "SELECT master_lomba.nama_lomba, pelaksanaan_lomba.*, detail_pelaksanaan_lomba.tanggal_mulai, detail_pelaksanaan_lomba.tanggal_akhir, detail_pelaksanaan_lomba.status FROM pelaksanaan_lomba JOIN detail_pelaksanaan_lomba ON detail_pelaksanaan_lomba.id_pelaksanaan_lomba = pelaksanaan_lomba.id JOIN master_lomba ON master_lomba.id = pelaksanaan_lomba.id_mst_lomba";
            $query = "SELECT * FROM master_lomba";

            $result = $this->conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            if ($res) {
                foreach ($res as $i => $item) {
                    $queryDetail = "SELECT * FROM master_detail_lomba WHERE id_mst_lomba = " . $item['id'];
                    $resultDetail = $this->conn->prepare($queryDetail);
                    $resultDetail->execute();
                    $resultDetail->setFetchMode(PDO::FETCH_ASSOC);
                    $resDetail = $resultDetail->fetchAll();
                    if ($resDetail) {
                        $res[$i]['detailLomba'] = $resDetail;
                    }

                    $queryPelaksanaan = "SELECT * FROM pelaksanaan_lomba WHERE id_mst_lomba = " . $item['id'];
                    $resultPelaksanaan = $this->conn->prepare($queryPelaksanaan);
                    $resultPelaksanaan->execute();
                    $resultPelaksanaan->setFetchMode(PDO::FETCH_ASSOC);
                    $resPelaksanaan = $resultPelaksanaan->fetchAll();
                    if ($resPelaksanaan) {
                        $res[$i]['detailPelaksanaan'] = $resPelaksanaan;
                    }
                }

                $this->param->status_code = 200;
                $this->param->message = 'Success';
                $this->param->response = $res;
            } else {
                $this->param->status_code = 200;
                $this->param->message = 'Data tidak ditemukan';
                $this->param->response = '';
            }
        } catch (Exception $e) {
            $this->param->status_code = 500;
            $this->param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $this->param->response = '';
        } catch (PDOException $e) {
            $this->param->status_code = 500;
            $this->param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $this->param->response = '';
        } finally {
            return $this->param;
        }
    }

    public function getRequestedData($request = [])
    {
        $param = new stdClass();

        $id_detail_lomba = htmlspecialchars(trim($request['id_lomba']));

        try {
            $query = "SELECT master_lomba.nama_lomba, master_detail_lomba.foto, master_detail_lomba.detail_lomba, pelaksanaan_lomba.tanggal, pelaksanaan_lomba.info, detail_pelaksanaan_lomba.status, detail_pelaksanaan_lomba.tanggal_mulai, detail_pelaksanaan_lomba.tanggal_akhir FROM pelaksanaan_lomba JOIN detail_pelaksanaan_lomba ON detail_pelaksanaan_lomba.id_pelaksanaan_lomba = pelaksanaan_lomba.id JOIN master_lomba ON master_lomba.id = pelaksanaan_lomba.id_mst_lomba JOIN master_detail_lomba on master_detail_lomba.id_mst_lomba = master_lomba.id where master_detail_lomba.id = :id";

            $result = $this->conn->prepare($query);
            $result->bindParam(":id", $id_detail_lomba);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();

            if ($res) {
                $param->status_code = 200;
                $param->message = 'Success';
                $param->response = $res[0];
            } else {
                $param->status_code = 200;
                $param->message = 'Data tidak ditemukan';
                $param->response = '';
            }
        } catch (Exception $e) {
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = '';
        } catch (PDOException $e) {
            $param->status_code = 500;
            $param->message = 'Terjadi kesalahan. ' . $e->getMessage();
            $param->response = '';
        } finally {
            return json_encode($param);
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

    public function insert($request = [])
    {
        try {
            $nama = $request[0]['nama'] ?? null;
            $deskripsi = $request[0]['deskripsi'] ?? null;

            //ambil gambar
            $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . '/storage/public/'; // Folder tujuan untuk menyimpan gambar
            $namaFileBaru = $nama . '.' . pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
            $targetFile = $targetDirectory . $namaFileBaru;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Validasi tipe file
            $allowedTypes = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowedTypes)) {
                echo "Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
                $uploadOk = 0;
            }

            // Validasi ukuran file 
            if ($_FILES["gambar"]["size"] > 5000000) {
                echo "Ukuran file terlalu besar. Maksimum 5MB.";
                $uploadOk = 0;
            }

            // Cek apakah file sudah ada
            if (file_exists($targetFile)) {
                echo "Maaf, file sudah ada.";
                $uploadOk = 0;
            }

            // Lakukan upload jika lolos validasi
            if ($uploadOk == 0) {
                echo "Upload gagal.";
            } else {
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
                    echo "File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil diunggah.";
                } else {
                    echo "Terjadi kesalahan saat mengunggah file.";
                }
            }

            // Memulai transaksi
            $this->conn->beginTransaction();

            // Insert master lomba
            $queryInsertMaster = "INSERT INTO master_lomba(nama_lomba) VALUES(:nama)";
            $resultInsertMaster = $this->conn->prepare($queryInsertMaster);
            $resultInsertMaster->bindParam(':nama', $nama);
            $res1 = $resultInsertMaster->execute();

            if ($res1) {
                // Mendapatkan ID terakhir yang di-generate dari operasi INSERT sebelumnya
                $lastinsertedId = $this->conn->lastInsertId();

                // Insert detail lomba dengan ID yang didapatkan sebelumnya
                $queryInsertDetail = "INSERT INTO master_detail_lomba(id_mst_lomba, detail_lomba,foto, created_at) VALUES(:idLomba, :detail_lomba, :foto, now())";
                $resultInsertDetail = $this->conn->prepare($queryInsertDetail);
                $resultInsertDetail->bindParam(':idLomba', $lastinsertedId);
                $resultInsertDetail->bindParam(':detail_lomba', $deskripsi);
                $resultInsertDetail->bindParam(':foto', $namaFileBaru);
                $res2 = $resultInsertDetail->execute();

                if ($res2) {
                    // Commit transaksi jika kedua operasi INSERT berhasil
                    $this->conn->commit();
                    return [
                        'status' => true
                    ];
                }
            }

            // Rollback transaksi jika ada operasi INSERT yang gagal
            $this->conn->rollBack();
            return [
                'status' => false,
                'error_message' => 'Gagal melakukan operasi INSERT'
            ];
        } catch (Exception $e) {
            // Rollback transaksi dan tangani exception
            $this->conn->rollBack();
            return [
                'status' => false,
                'error_message' => $e->getMessage()
            ];
        }

    }

    public function getLomba($id)
    {
        try {
            $query = "SELECT master_lomba.id, nama_lomba, detail_lomba, foto FROM master_lomba JOIN master_detail_lomba ON master_lomba.id = master_detail_lomba.id_mst_lomba WHERE master_lomba.id = $id";

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
        try {
            $nama = $request[0]['nama'] ?? null;
            $deskripsi = $request[0]['deskripsi'] ?? null;

            //ambil gambar
            $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . '/storage/public/'; // Folder tujuan untuk menyimpan gambar
            $namaFileBaru = $nama . '.' . pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
            $targetFile = $targetDirectory . $namaFileBaru;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Validasi tipe file
            $allowedTypes = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowedTypes)) {
                echo "Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
                $uploadOk = 0;
            }

            // Validasi ukuran file 
            if ($_FILES["gambar"]["size"] > 5000000) {
                echo "Ukuran file terlalu besar. Maksimum 5MB.";
                $uploadOk = 0;
            }

            // Cek apakah file sudah ada
            if (file_exists($targetFile)) {
                echo "Maaf, file sudah ada.";
                $uploadOk = 0;
            }

            // Lakukan upload jika lolos validasi
            if ($uploadOk == 0) {
                echo "Upload gagal.";
            } else {
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
                    echo "File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil diunggah.";
                } else {
                    echo "Terjadi kesalahan saat mengunggah file.";
                }
            }

            // Memulai transaksi
            $this->conn->beginTransaction();

            // Insert master lomba
            $queryInsertMaster = "INSERT INTO master_lomba(nama_lomba) VALUES(:nama)";
            $resultInsertMaster = $this->conn->prepare($queryInsertMaster);
            $resultInsertMaster->bindParam(':nama', $nama);
            $res1 = $resultInsertMaster->execute();

            if ($res1) {
                // Mendapatkan ID terakhir yang di-generate dari operasi INSERT sebelumnya
                $lastinsertedId = $this->conn->lastInsertId();

                // Insert detail lomba dengan ID yang didapatkan sebelumnya
                $queryInsertDetail = "INSERT INTO master_detail_lomba(id_mst_lomba, detail_lomba,foto, created_at) VALUES(:idLomba, :detail_lomba, :foto, now())";
                $resultInsertDetail = $this->conn->prepare($queryInsertDetail);
                $resultInsertDetail->bindParam(':idLomba', $lastinsertedId);
                $resultInsertDetail->bindParam(':detail_lomba', $deskripsi);
                $resultInsertDetail->bindParam(':foto', $namaFileBaru);
                $res2 = $resultInsertDetail->execute();

                if ($res2) {
                    // Commit transaksi jika kedua operasi INSERT berhasil
                    $this->conn->commit();
                    return [
                        'status' => true
                    ];
                }
            }

            // Rollback transaksi jika ada operasi INSERT yang gagal
            $this->conn->rollBack();
            return [
                'status' => false,
                'error_message' => 'Gagal melakukan operasi INSERT'
            ];
        } catch (Exception $e) {
            // Rollback transaksi dan tangani exception
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
            $query = "DELETE FROM master_lomba WHERE id = $id";
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