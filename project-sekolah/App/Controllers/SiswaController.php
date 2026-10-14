<?php

//namespace controller
namespace App\controllers;

//memanggil namespace model siswa
use App\Models\Siswa;

//membuat class yang baru
class SiswaController {
        public function prosesData(): void {
            //simulasi ambil data dari model(yg nantinya dari database)
            $siswa1 = new Siswa("25701", "Siti Kusmini", "Rekayasa Perangkat Lunak", "XI RPL 1");

            //controller untuk memproses dan merender tampilan HTML
            echo "<div style='border: 2px solid #007bff; padding: 15px; border-radius: 8px; font-family: sans-serif; margin-bottom: 10px; background: #f8f9fa'>";
            echo "<h3 style='color: #007bff; margin-top: 0;'>Data Profil Siswa (Via Controller)</h3>";
            echo "<b>NIS:</b> {$siswa1->getNis()} <br>";
            echo "<b>Nama:</b> {$siswa1->getNama()} <br>";
            echo "<b>Jurusan:</b> {$siswa1->getJurusan()} <br>";
            echo "<b>Kelas:</b> {$siswa1->getKelas()} <br>";
            echo "</div>";

            $siswa2 = new Siswa("257020", "Laili Annisa", "Rekayasa Perangkat Lunak", "XI RPL 1");

            //controller untuk memproses dan merender tampilan HTML
            echo "<div style='border: 2px solid #007bff; padding: 15px; border-radius: 8px; font-family: sans-serif; margin-bottom: 10px; background: #f8f9fa'>";
            echo "<h3 style='color: #007bff; margin-top: 0;'>Data Profil Siswa (Via Controller)</h3>";
            echo "<b>NIS:</b> {$siswa2->getNis()} <br>";
            echo "<b>Nama:</b> {$siswa2->getNama()} <br>";
            echo "<b>Jurusan:</b> {$siswa2->getJurusan()} <br>";
            echo "<b>Kelas:</b> {$siswa2->getKelas()} <br>";
            echo "</div>";

            $siswa3 = new Siswa("257017", "Jovita Anindya", "Rekayasa Perangkat Lunak", "XI RPL 1");

            //controller untuk memproses dan merender tampilan HTML
            echo "<div style='border: 2px solid #007bff; padding: 15px; border-radius: 8px; font-family: sans-serif; background: #f8f9fa'>";
            echo "<h3 style='color: #007bff; margin-top: 0;'>Data Profil Siswa (Via Controller)</h3>";
            echo "<b>NIS:</b> {$siswa3->getNis()} <br>";
            echo "<b>Nama:</b> {$siswa3->getNama()} <br>";
            echo "<b>Jurusan:</b> {$siswa3->getJurusan()} <br>";
            echo "<b>Kelas:</b> {$siswa3->getKelas()} <br>";
            echo "</div>";
        }
}  
?>
