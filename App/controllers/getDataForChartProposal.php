<?php
// Koneksi ke database
$pdo = new PDO('mysql:host=localhost;dbname=db_cc', 'root', ' ');
$statement = $pdo->prepare("SELECT IFNULL((SELECT COUNT(kelompok.id) FROM kelompok JOIN pemilihan_dospem ON kelompok.id_mhs = pemilihan_dospem.id_mhs RIGHT JOIN master_detail_lomba ON master_detail_lomba.id = kelompok.id_detail_lomba RIGHT JOIN master_lomba ON master_detail_lomba.id_mst_lomba = master_lomba.id WHERE id_detail_lomba = dl.id AND YEAR(pemilihan_dospem.created_at) = YEAR(NOW()) AND pemilihan_dospem.id_dosen = 2 AND pemilihan_dospem.status = 'Accept'), 0) AS total, l.nama_lomba AS lomba 
FROM kelompok AS k 
JOIN pemilihan_dospem AS pd ON pd.id_mhs = k.id_mhs 
RIGHT JOIN master_detail_lomba AS dl ON k.id_detail_lomba = dl.id
RIGHT JOIN master_lomba AS l ON dl.id_mst_lomba = l.id
GROUP BY lomba");
$statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// Inisialisasi array untuk data pendapatan dan pengeluaran
$total = [];
$lomba = [];

// Memasukkan data dari database ke dalam array
foreach ($rows as $row) {
    $total[] = $row['total'];
    $lomba[] = $row['lomba'];
}

// Data yang diambil dari database dikirim kembali dalam bentuk JSON ke JavaScript
echo json_encode(['total' => $total, 'lomba' => $lomba]);
?>