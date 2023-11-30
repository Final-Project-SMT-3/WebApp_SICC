<?php
// Koneksi ke database
$pdo = new PDO('mysql:host=localhost;dbname=db_cc', 'root', ' ');
$statement = $pdo->prepare("SELECT earnings, expenses FROM nama_tabel ORDER BY tanggal DESC LIMIT 8");
$statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// Inisialisasi array untuk data pendapatan dan pengeluaran
$earnings = [];
$expenses = [];

// Memasukkan data dari database ke dalam array
foreach ($rows as $row) {
    $earnings[] = $row['earnings'];
    $expenses[] = $row['expenses'];
}

// Data yang diambil dari database dikirim kembali dalam bentuk JSON ke JavaScript
echo json_encode(['earnings' => $earnings, 'expenses' => $expenses]);
?>