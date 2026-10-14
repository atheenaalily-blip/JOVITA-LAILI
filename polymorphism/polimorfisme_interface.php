<?php
//interface
interface Cetakable{
    //kontrak siapapun yang mengimplementasikan, wajib punya method tampilkan cetak()
    public function tampilkanCetak(): void;
}

//kelas laporan siswa
class laporanSiswa implements Cetakable{
    private string $namaSiswa;
    private string $kelas;

    public function __construct(string $namasiswa, string $kelas)
    {
        $this->namaSiswa = $namasiswa;
        $this->kelas = $kelas;
    
    }

    //wajib menjalankan kontrak implements interface yaitu membuat isi method/fungsi tampilkanCetak()
    public function tampilkanCetak(): void
    {
        echo "<div style = 'border:1px solid green; padding:10px; margin-bottom: 10px;'>";
        echo "<h3> Cetak Dokumen: Rapor Siswa </h3>";
        echo "Nama: {$this->namaSiswa} | Kelas: {$this->kelas}";
        echo "</div>";
    }
}

//buat kelas guru
class laporanGuru implements Cetakable{
    private string $namaGuru;
    private string $mataPelajaran;

    public function __construct(string $nama, string $mapel)
    {
        $this->namaGuru = $nama;
        $this->mataPelajaran = $mapel;
    }

    public function tampilkanCetak(): void
    {
        echo "<div style = 'border: 1px solid blue; padding: 10px; margin-bottom: 10px;'>";
        echo "<h3> Cetak Dokumen: Jadwal / Data Guru </h3>";
        echo "Nama Guru: {$this->namaGuru} | Mata Pelajaran: {$this->mataPelajaran}";
        echo "</div>";
    }
}

//buat kelas untuk mencetak berbagai macam objek
//yang mengimplementasikan interface 
class CetakManager{
    //menerima data apapun selama dia mengimplementasikan
    //interface Cetakable (ini adalan penerapan polimorfisme-nya)
    public static function prosesCetak(Cetakable $dokumen):void
    {
        //keyword static artinya: class bisa dipanggil langsung tanpa harus ada objeknya
        $dokumen->tampilkanCetak();
    } 
}

//Contoh Instansiasi Objek
echo "<h2>Daftar Cetak Dokumen Sekolah</h2>";

//membuat objek siswa
$siswa1 = new LaporanSiswa("Ahmad Naruto", "XI RPL 4");
$siswa2 = new LaporanSiswa("Sakura Lestari", "XI RPL 5");
$siswa3 = new LaporanSiswa("Laili Annisa", "XI RPL 1");
$siswa4 = new LaporanSiswa("Jovita Anindya", "XI RPL 1");

//membuat objek guru
$guru1 = new LaporanGuru("Pak Jerry, S.Pd", "Matematika");
$guru2 = new LaporanGuru("Pak Galih Haris Fauzi, S.Pd", "Produktif RPL");

//mencetak menggunakan kelas CetakManager (Hasil Polimorfisme)
CetakManager::prosesCetak($siswa1);
CetakManager::prosesCetak($siswa2);
CetakManager::prosesCetak($siswa3);
CetakManager::prosesCetak($siswa4);
CetakManager::prosesCetak($guru1);
CetakManager::prosesCetak($guru2);
?>