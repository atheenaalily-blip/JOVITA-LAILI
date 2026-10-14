<?php
//namespace kelas
namespace App\Models; //bisa di sesuaikan dengan dirrectory

//class baru untuk siswa
class Siswa{
    private string $nis;
    private string $nama;
    private string $jurusan;
    private string $kelas;

    public function __construct(string $nis, string $nama, string $jurusan, string $kelas)
    {
        $this->nis = $nis;
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->kelas = $kelas;
    }

    public function getNis(): string
    {
        return $this->nis;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getJurusan(): string
    {
        return $this->jurusan;
    }

    public function getKelas(): string
    {
        return $this->kelas;
    }
}
?>