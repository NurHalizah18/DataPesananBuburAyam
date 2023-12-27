<?php
session_start();

if(isset($_POST['submit'])){
    require 'config.php';

    //Menghitung Total Harga Bubur Ayam
    $jumlahPesanan = $_POST['Jumlah_Pesanan'];
    $hargaPerItem = 5000;
    $totalHarga = $jumlahPesanan * $hargaPerItem;

    $insertOneResult = $collection->insertOne([
        'no' => $_POST['no'],
        'Nama_Pesanan' => $_POST['Nama_Pesanan'],
        'Kategori' => $_POST['Kategori'],
        'Keterangan_Makan' => $_POST['Keterangan_Makan'],
        'Jumlah_Pesanan' => $jumlahPesanan,
        'Total_Harga' => $totalHarga,
        'Metode_Bayar' => $_POST['Metode_Bayar'],
    ]);

    echo "<script>
            alert('Selamat, data pesanan berhasil ditambahkan!');
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
</head>
<body>
    <div class="container col-md-8">
        <div class="row justify-content-center">
            <div class="col">

                <h3 class="text-center mb-4"> Buat Pesanan </h3>
                <form method="POST">
                    <table class="table table-hover">
                        <div class="container2">
                            <tr>
                                <td for="no">No</td>
                                <td><input type="text" class="form-control" name="no" require="required"></td>
                            </tr>

                            <tr>
                                <td for="Nama_Pesanan">Nama Pemesan</td>
                                <td><input type="text" class="form-control" name="Nama_Pesanan" require="required"></td>
                            </tr>

                            <tr>
                                <td for="Kategori">Kategori</td>
                                <td><input type="text" class="form-control" name="Kategori" require="required"></td>
                            </tr>

                            <tr>
                                <td for="Keterangan_Makan">Keterangan Makan</td>
                                <td><input type="text" class="form-control" name="Keterangan_Makan" require="required"></td>
                            </tr>

                            <tr>
                                <td for="Jumlah_Pesanan">Jumlah Pesanan</td>
                                <td><input type="text" class="form-control" name="Jumlah_Pesanan" require="required"></td>
                            </tr>

                            <tr>
                                <td for="Metode_Bayar">Metode Bayar</td>
                                <td><input type="text" class="form-control" name="Metode Bayar" require="required"></td>
                            </tr>

                        </div>
                    </table>
                    <div align="right">
                        <button type="submit" name="submit" class="btn btn-primary bi bi-check-circle" style="font-family: Tekton Pro"> Pesan </button>
                        <a href="index.php" class="btn btn-danger bi bi-arrow-right-circle" style="font-family: Tekton Pro"> Batal </a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Skrip JS buat update total pesanan
        document.addEventListener('DOMContentLoaded', function () {
            var jumlahPesananInput = document.querySelector('input[name="Jumlah_Pesanan"]');
            var totalHargaText = document.getElementById('totalHargaText');

            jumlahPesananInput.addEventListener('input', function () {
                var jumlahPesanan = parseInt(jumlahPesananInput.value) || 0;
                var hargaPerItem = 5000; 
                var totalHarga = jumlahPesanan * hargaPerItem;

                totalHargaText.textContent = 'Total Harga: ' + totalHarga;
            });
        });
    </script>
</body>
</html>
