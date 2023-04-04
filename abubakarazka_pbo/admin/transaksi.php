<?php
require 'functions.php';

session_start();

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if ($_SESSION["roles"] != "admin") {
    echo "
    <script type='text/javascript'>
        alert('Mohon maaf anda bukan admin, enggak bisa masuk kesini!')
        window.location = '../login/index.php';
    </script>
    ";
}


$transaksi = query("SELECT * FROM transaksi WHERE status = 'proses'");
$tolak = query("SELECT * FROM transaksi WHERE status = 'ditolak'");
$verifikasi = query("SELECT * FROM transaksi WHERE status = 'terverifikasi'");

?>

<?php require '../layout/sidebar.php'; ?>

<div class="content">
    <h1>Data Transaksi</h1>
    <hr>
    <h3>Produk Request</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>tgl Transaksi</th>
            <th>Nama Pemesan</th>
            <th>barang</th>
            <th>No Wa</th>
            <th>Produk Yang DiPesan</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($transaksi as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["tgl_transaksi"]; ?></td>
                <td><?= $data["user"]; ?></td>
                <td><?= $data["barang"]; ?></td>
                <td><?= $data["jmlh_barang"]; ?></td>
                <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="70"></td>
                <td><?= $data["subtotal"]; ?></td>
                <td><?= $data["status"]; ?></td>
                <td>
                    <a href="verifikasi.php?id=<?= $data["id_transaksi"]; ?>" onclick="return confirm('Apakah anda yakin ingin verivikasi pesanan?');">Accept</a>
                    <a href="tolak.php?id=<?= $data["id_transaksi"]; ?>" onclick="return confirm('Apakah anda yakin ingin menolak pesanan?');">Decline</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <h3>Produk Selesai - Terverifikasi</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>tgl Transaksi</th>
            <th>Nama Pemesan</th>
            <th>barang</th>
            <th>No Wa</th>
            <th>Produk Yang DiPesan</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($verifikasi as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["tgl_transaksi"]; ?></td>
                <td><?= $data["user"]; ?></td>
                <td><?= $data["barang"]; ?></td>
                <td><?= $data["jmlh_barang"]; ?></td>
                <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="70"></td>
                <td><?= $data["subtotal"]; ?></td>
                <td><?= $data["status"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <h3>Produk Selesai - Di Tolak</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>tgl Transaksi</th>
            <th>Nama Pemesan</th>
            <th>barang</th>
            <th>No Wa</th>
            <th>Produk Yang DiPesan</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($tolak as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["tgl_transaksi"]; ?></td>
                <td><?= $data["user"]; ?></td>
                <td><?= $data["barang"]; ?></td>
                <td><?= $data["jmlh_barang"]; ?></td>
                <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="70"></td>
                <td><?= $data["subtotal"]; ?></td>
                <td><?= $data["status"]; ?></td>
                
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    
</div>