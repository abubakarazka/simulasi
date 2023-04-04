<?php include 'layout/navbar.php'; ?>

<?php
if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo " 
    <script type='text/javascript'>
        alert('Keranjang Anda Masih Kosong, Silahkan Belanja Terlebih Dahulu');
        window.location= 'index.php'
    </script>
    ";
}


?>

<div class="checkout">
        <?php foreach ($_SESSION["cart"] as $id_barang => $kuantitas) : ?>
            <?php
            $data = query("SELECT * FROM barang WHERE id_barang = '$id_barang'")[0];
            $subTotal = $data["harga_satuan"] * $kuantitas;
            ?>
    <form action="" method="POST">
        <label for="tanggal_transaksi">Tanggal Transaksi</label><br>
        <input type="text" name="tanggal_transaksi" id="tanggal_transaksi" readonly value="<?= date('Y-m-d'); ?>"><br><br>

        

        <label for="user">Nama penerima</label><br>
        <input type="text" name="user" id="nama_penerima" readonly value="<?= $_SESSION["nama_user"]; ?>"><br><br>

            <label for="nama_barang">Nama barang</label><br>
            <input type="text" name="nama_barang" id="nama_barang" readonly value="<?= $data["nama_barang"]; ?>"><br><br>

            <label for="jmlh_barang">Harga barang</label><br>
            <input type="text" name="jmlh_barang" id="jmlh_barang" readonly value="<?= $data["harga_satuan"]; ?>"><br><br>

            <label for="subtotal">Sub Total Harga</label><br>
            <input type="text" name="subtotal" id="subtotal" readonly value="<?= $subTotal; ?> "><br><br>

            <input type="hidden" name="foto" value="<?= $data["foto"]; ?>"><br><br>
            <input type="hidden" name="qty" value="<?= $kuantitas; ?>">
        <?php endforeach; ?>

        <button type="submit" name="checkout">Checkout</button>
    </form>
</div>
<?php 

    if (isset($_POST['checkout'])) {
        if (checkoutProduct($_POST) > 0) {
            echo "
            <script type = 'text/javascript'>
            alert('Yeaayyy!Barang Berhasil Di Checkout, silahkan ditunggu proses verifikasinya yaaaaaa!!');
            window.location='index.php';
            </script>
            ";
        } else {
            echo mysqli_error($conn);
        }
    }

?>