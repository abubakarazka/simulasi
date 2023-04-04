<?php
session_start();
require 'functions.php';

$id = $_GET["id"];
$barang = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if (isset($_POST["kirim"])) {
    if (editProduk($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('Data barang berhasil diubah');
                window.location = 'barang.php';
            </script>
        ";
    } else {
        echo "
        <script type='text/javascript'>
            alert('Data barang gagal diubah');
            window.location = 'barang.php';
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php' ?>

<div class="main">
    <div class="box">
        <h3>Edit Data barang</h3>
        <form action="" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id_barang" class="form-control" value="<?= $barang["id_barang"]; ?>">

            <label for="nama_barang">Nama barang</label><br />
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $barang["nama_barang"]; ?>"><br /> <br />

            <label for="foto">Foto</label><br />
            <input type="file" name="foto" id="foto" class="form-control" value="<?= $barang["foto"] ?>"><br /> <br />

            <label for="harga_satuan">harga_satuan</label><br />
            <input type="text" name="harga_satuan" id="harga_satuan" class="form-control" value="<?= $barang["harga_satuan"] ?>"><br /> <br />


            <label for="stok">Stok</label><br />
            <input type="text" name="stok" id="stok" class="form-control" value="<?= $barang["stok"] ?>"><br /> <br />


            <button type="submit" name="kirim">Edit</button>
        </form>

    </div>
</div>