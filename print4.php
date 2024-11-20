<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .nota-container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        .nota-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .nota-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .nota-header p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }
        .nota-body {
            margin-bottom: 20px;
        }
        .nota-body table {
            width: 100%;
            border-collapse: collapse;
        }
        .nota-body table th, .nota-body table td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        .nota-footer {
            text-align: center;
            margin-top: 20px;
        }
        .nota-footer p {
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="nota-container">
        <div class="nota-header">
            <h1>Nota Pembayaran</h1>
            <p>Toko Anda</p>
        </div>
        <div class="nota-body">
            <table>
                <tr>
                    <th>Nama Member</th>
                    <td><?= htmlspecialchars($_GET['nm_member'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th>Total Pembayaran</th>
                    <td>Rp. <?= number_format($_GET['total'] ?? 0, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th>Jumlah Bayar</th>
                    <td>Rp. <?= number_format($_GET['bayar'] ?? 0, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th>Kembalian</th>
                    <td>Rp. <?= number_format($_GET['kembali'] ?? 0, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th>Merk Barang</th>
                    <td><?= htmlspecialchars($_GET['merk'] ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th>ID Pesanan</th>
                    <td><?= htmlspecialchars($_GET['id'] ?? 'N/A'); ?></td>
                </tr>
            </table>
        </div>
        <div class="nota-footer">
            <p>Terima kasih telah berbelanja!</p>
        </div>
    </div>
</body>
</html>
