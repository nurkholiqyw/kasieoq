<?php

require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();

// Ambil data dari URL
$nm_member = htmlspecialchars($_GET['nm_member'] ?? '');
$bayar = htmlspecialchars($_GET['bayar'] ?? 0);
$kembali = htmlspecialchars($_GET['kembali'] ?? 0);
$total = htmlspecialchars($_GET['total'] ?? 0);
$id_pesanan = explode(',', $_GET['id'] ?? '');
$merk = explode(',', $_GET['merk'] ?? []);
$jumlah_barang = explode(",", $_GET['jumlah_barang']);
$total1 = explode(",", $_GET['total1']);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .total {
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Struk Pembayaran</h1>
        <h2>Toko Anda</h2>
        <h3>Terima Kasih Telah Berbelanja</h3>

        <p><strong>Nama Member:</strong> <?php echo $nm_member; ?></p>
        <table>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Merk</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($id_pesanan as $key => $id): ?>
                <tr>
                    <td><?php echo htmlspecialchars($id); ?></td>
                    <td><?php echo htmlspecialchars($merk[$key] ?? '-'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table>
            <tr>
                <td class="total">Total:</td>
                <td class="total">Rp. <?php echo number_format($total, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td>Bayar:</td>
                <td>Rp. <?php echo number_format($bayar, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td>Kembali:</td>
                <td>Rp. <?php echo number_format($kembali, 0, ',', '.'); ?></td>
            </tr>
        </table>

        <div class="footer">
            <p>Harap Simpan Struk Ini Sebagai Bukti Pembayaran</p>
        </div>
    </div>
</body>
</html>
