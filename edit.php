<?php
session_start();

require 'config.php';
if(isset($_GET['id'])){
    $rest = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}
if(isset($_POST['submit'])){
    $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
        [
            '$set' => [
                'no' => $_POST['no'],
                'Nama_Pesanan' => $_POST['Nama_Pesanan'],
                'Kategori' => $_POST['Kategori'],
                'Keterangan_Makan' => $_POST['Keterangan_Makan'],
                'Jumlah_Pesanan' => $_POST['Jumlah_Pesanan'],
                'Total_Harga' => $_POST['Total_Harga'],
                'Metode_Bayar' => $_POST['Metode_Bayar'],
            ]
        ]
    );
    echo "<script>
            alert('Selamat, data pesanan berhasil diupdate!');
            document.location.href = 'index.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan Bubur Ayam - Nur Halizah</title>
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

    <!-- Skrip JS buat hitung total harga -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var jumlahPesananInput = document.querySelector('input[name="Jumlah_Pesanan"]');
            var totalHargaInput = document.querySelector('input[name="Total_Harga"]');
            var hargaPerItem = 5000;

            function updateTotalHarga() {
                var jumlahPesanan = parseInt(jumlahPesananInput.value) || 0;
                var totalHarga = jumlahPesanan * hargaPerItem;

                totalHargaInput.value = totalHarga;
            }

            // event listener berfungsi kalau semisal jumlah pesanannya berubah
            jumlahPesananInput.addEventListener('input', updateTotalHarga);

            updateTotalHarga();
        });
    </script>
    
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h3 class="text-center mb-4">Edit Data</h3>
                <form method="POST">
                    <table class="table table-hover">
                        <div class="container2">
                        <tr>
                            <td><label for="no">No</label></td>
                            <td><input type="text" class="form-control" name="no" value="<?php echo $rest->no; ?>"></td>
                        </tr>

                        <tr>
                            <td><label for="Nama_Pesanan">Nama Pesanan</label></td>
                            <td><input type="text" class="form-control" name="Nama_Pesanan" value="<?php echo $rest->Nama_Pesanan; ?>"></td>
                        </tr>

                        <tr>
                            <td><label for="Kategori">Kategori</label></td>
                            <td><input type="text" class="form-control" name="Kategori" value="<?php echo $rest->Kategori; ?>"></td>
                        </tr>

                        <tr>
                            <td for="Keterangan_Makan">Keterangan Makan</td>
                            <td><input type="text" class="form-control" name="Keterangan_Makan" value="<?php echo $rest->Keterangan_Makan; ?>"></td>
                        </tr>

                        <tr>
                            <td><label for="Jumlah_Pesanan">Jumlah Pesanan</label></td>
                            <td><input type="text" class="form-control" name="Jumlah_Pesanan" value="<?php echo $rest->Jumlah_Pesanan; ?>"></td>
                        </tr>

                        <tr>
                            <td><label for="Total_Harga">Total Harga</label></td>
                            <td><input type="text" class="form-control" name="Total_Harga" value="<?php echo $rest->Total_Harga; ?>"></td>
                        </tr>

                        <tr>
                            <td for="Metode_Bayar">Metode Bayar</td>
                            <td><input type="text" class="form-control" name="Metode_Bayar" value="<?php echo $rest->Metode_Bayar; ?>"></td>
                        </tr>

                        </div>
                    </table>
                    <div align="right">
                        <button type="submit" name="submit" class="btn btn-primary bi bi-check-circle" style="font-family: Tekton Pro">
                        Submit</button>
                        <a href="index.php" class="btn btn-danger bi bi-arrow-right-circle" style="font-family: Tekton Pro"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
