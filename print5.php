<?php
require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();

// Ambil data dari URL
$nm_member = isset($_GET['nm_member']) ? htmlspecialchars($_GET['nm_member']) : "Tidak Diketahui";
$bayar = isset($_GET['bayar']) ? (int)$_GET['bayar'] : 0;
$kembali = isset($_GET['kembali']) ? (int)$_GET['kembali'] : 0;
$total = isset($_GET['total']) ? (int)$_GET['total'] : 0;

// Data array
$id_pesanan = isset($_GET['id']) ? explode(",", $_GET['id']) : [];
$merk = isset($_GET['merk']) ? explode(",", $_GET['merk']) : [];
$jumlah_barang = isset($_GET['jumlah_barang']) ? explode(",", $_GET['jumlah_barang']) : [];
$total1 = isset($_GET['total1']) ? explode(",", $_GET['total1']) : [];

// Validasi jumlah data array harus sama
if (count($id_pesanan) !== count($merk) || count($id_pesanan) !== count($jumlah_barang) || count($id_pesanan) !== count($total1)) {
    die("Data tidak valid atau tidak lengkap.");
}
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
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
        }
        .header {
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .total {
            text-align: right;
            font-size: 16px;
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
        <div class="header">
            <h1>Struk Pembayaran</h1>
            <p><?php echo $toko['nama_toko'];?></p>
            <p><?php echo $toko['alamat_toko'];?></p>
            <p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
        </div>

        <div class="info">
            <p>Nama Member: <strong><?= $nm_member; ?></strong></p>
            
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pesanan</th>
                    <th>Merk</th>
                    <th>Jumlah Barang</th>
                    <th>Total (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($id_pesanan); $i++): ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= htmlspecialchars($id_pesanan[$i]); ?></td>
                    <td><?= htmlspecialchars($merk[$i]); ?></td>
                    <td><?= htmlspecialchars($jumlah_barang[$i]); ?></td>
                    <td><?= number_format((int)$total1[$i], 0, ',', '.'); ?></td>
                </tr>
                <?php endfor; ?>
                <tr>
                    <td colspan="4"><b>Total</b></td>
                    <td><b>Rp <?= number_format($total, 0, ',', '.'); ?></b></td>
                </tr>
            </tbody>
        </table>

        <table>
            <tr>
                <td><p>Bayar: <strong>Rp <?= number_format($bayar, 0, ',', '.'); ?></strong></p></td>
            </tr>
            <tr>
                <td><p>Total Keseluruhan: <strong> Rp <?= number_format($total, 0, ',', '.'); ?></strong></p></td>
            </tr>
            <tr>
                <td><p>Kembalian: <strong>Rp <?= number_format($kembali, 0, ',', '.'); ?></strong></p></td>
            </tr>
        </table>

        

        <div class="footer">
            <p>Terima kasih atas pembelian Anda!</p>
        </div>
    </div>

    <script>window.print();</script>
</body>
</html>
