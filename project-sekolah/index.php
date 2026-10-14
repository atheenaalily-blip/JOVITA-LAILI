<?php

//memanggil namespace
use App\Models\Siswa;
use App\Controllers\SiswaController;

//memuat file kelas
require_once 'App/Models/Siswa.php';
require_once 'App/Controllers/SiswaController.php';

echo "<h2>Sistem Informasi Sekolah - SMK Texmaco Semarang</h2>";
echo "<hr>";

//instansiasi controller dan menjalankan method
$controller = new SiswaController();
$controller->prosesData();

echo "<br> <hr>";

//instansiasi objek
$siswa1 = new Siswa ("25701", "Siti Kusmini", "Rekayasa Perangkat Lunak", "XI RPL 1");
echo "NIS : ". $siswa1->getNis(). "<br>";
echo "Nama : ". $siswa1->getNama(). "<br>";
echo "Jurusan : ". $siswa1->getJurusan(). "<br>";
echo "Kelas : ". $siswa1->getKelas();
?>