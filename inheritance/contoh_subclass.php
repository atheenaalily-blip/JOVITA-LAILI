<?php
require "contoh_superclass.php";

class Siswa extends Person{
    private string $nisn;

    
    public function __construct(string $nama, string $alamat, string $nisn)
    
    {
        //memanggil constuct milik superclass
        parent::__construct($nama, $alamat); //warisan 
        $this->nisn = $nisn;
    }

    public function belajar():void{
        echo "Siswa bernama :" . $this->getNama()."<br>" 
        ."dengan NISN :". $this->nisn ."<br>"."sedang belajar mata pelajaran RPL. <br>";
    }
}

//pengujian inheritance melalui pembuatan object
$Siswa1 = new Siswa("Ahmad Dani", "Kendal", "087787");
$Siswa1->tampilkanInfo(); //method warisan
$Siswa1->belajar();

?>