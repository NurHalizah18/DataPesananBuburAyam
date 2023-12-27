<?php session_start();
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
                <img src="logo.png" width="" class="mb-5">
                <h3 class="text-center">DATA PESANAN BUBUR AYAM MABOR</h3>
                <br/>
                
                <div class="table-responsive">
                    <table border="1" class="table table-hover table-bordered">
                        <thead>
                            <tr class="text-center" style="background-color: #97B4D6">
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Kategori Bubur</th>
                                <th>Keterangan Makan</th>
                                <th>Jumlah Pesanan</th>
                                <th>Total Harga</th>
                                <th>Metode Bayar</th>
                                <th colspan="2">Perintah</th>
                            </tr>
                        </thead>
                        <?php
                            require 'config.php';
                            $restaurant = $collection->find();
                            foreach ($restaurant as $rest) {
                            echo "<tr class='text-center'>";
                            echo "<th>".$rest->no."</th>";
                            echo "<td>".$rest->Nama_Pesanan."</td>";
                            echo "<td>".$rest->Kategori."</td>";
                            echo "<td>".$rest->Keterangan_Makan."</td>";
                            echo "<td>".$rest->Jumlah_Pesanan."</td>";
                            echo "<td>".$rest->Total_Harga."</td>";
                            echo "<td>".$rest->Metode_Bayar."</td>";
                            echo "<td>";
                            echo "<a href ='edit.php?id=".$rest->_id."'class='btn btn-warning bi bi-pen';''> Update </a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href ='hapus.php?id=".$rest->_id."'class='btn btn-danger bi bi-eraser' onclick = 'return confirm('Yakin Data Akan Dihapus ?');''> Hapus </a>";
                            echo "</td>";
                            echo "</tr>";
                            }
                        ?>
                    </table>
                    <a href="create.php" class="btn btn-primary bi bi-patch-plus" style="font-family: Tekton Pro"> Buat Pesanan </a>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>