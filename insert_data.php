<?php
require_once "auth.php";

try {
    $statuses = ['pending', 'selesai', 'batal'];
    $start = microtime(true);

    for ($i = 1; $i <= 100000; $i++) {
        $kode = 'TRX' . str_pad($i, 8, '0', STR_PAD_LEFT);
        $nama = 'Pelanggan ' . $i;
        $total = rand(10000, 1000000);
        $status = $statuses[array_rand($statuses)];

        $stmt_insert = $pdo->prepare("INSERT INTO transaksi (
            kode_transaksi, nama_pelanggan, total, status
        ) VALUES (
            :kode_transaksi, :nama_pelanggan, :total, :status
        )");

        $stmt_insert->execute([
            ':kode_transaksi' => $kode,
            ':nama_pelanggan' => $nama,
            ':total' => $total,
            ':status' => $status
        ]);

        if ($i % 1000 == 0) {
            echo "Inserted $i records...\n";
        }
    }

    $end = microtime(true);
    echo "Selesai dalam " . ($end - $start) . " detik\n";
} catch (PDOException $e) {
    echo "Error saat insert transaksi: " . $e->getMessage();
}
