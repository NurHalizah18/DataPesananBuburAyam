<?php

require_once __DIR__ . "/vendor/autoload.php";

// Konfigurasi koneksi MongoDB Atlas
$mongoClient = new MongoDB\Client("mongodb+srv://noorhalizah0:LvgWucvmeFE4SUh9@buburayam.ibyp8rp.mongodb.net/");

// Pilih database dan koleksi
$database = $mongoClient->selectDatabase('DataBuburAyam');
$collection = $database->selectCollection('buburayam');

?>
