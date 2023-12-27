<?php 
session_start();
require 'config.php';
if(isset($_GET['id'])){
    $rest = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}

if(isset($_POST['submit'])){
    require 'config.php';
    $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    
    echo "<script>
            alert('Yeay, data pesanan berhasil dihapus!');
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
<div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h3 class="text-center mb-4">Hapus Data</h3>
                <h5>Apakah anda yakin akan menghapus pesanan dengan nomor antrian <?php echo "$rest->no"; ?> ? </h5>
            </div>
            <form method="POST">
                <div class="form-group mb-3"  align="right">
                    <button type="submit" name="submit" class="btn btn-primary bi bi-check-circle" style="font-family: Tekton Pro"> Hapus </button>
                    <input type="hidden" value="<?php echo "$rest->no"; ?>" class="from-control" name="no">
                    <a href="index.php" class="btn btn-danger bi bi-arrow-right-circle" style="font-family: Tekton Pro"> Batal </a>
                </div>   
            </form>                                                   
        </div>
</div>
    
</body>
</html>