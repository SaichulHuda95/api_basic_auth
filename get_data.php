<?php
require_once "auth.php";

try {
    $start = microtime(true);

    $stmt = $pdo->prepare("SELECT * FROM transaksi");
    $stmt->execute();
    $data_stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    $no = 1;
    foreach ($data_stmt as $row) {
        $data[] = [
            'no' => $no++,
            'kode_transaksi' => $row['kode_transaksi'],
            'nama_pelanggan' => $row['nama_pelanggan'],
            'total' => $row['total'],
            'status' => $row['status']
        ];
    }

    $end = microtime(true);
    $waktu = ($end - $start) . " detik\n";

    $response = [
        'response_code' => '00',
        'response_message' => 'success',
        'waktu' => $waktu,
        'data' => $data
    ];

    echo json_encode($response, JSON_PRETTY_PRINT);
} catch (PDOException $e) {
    echo "Error saat insert transaksi: " . $e->getMessage();
}
