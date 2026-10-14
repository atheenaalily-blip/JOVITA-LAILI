<?php
//parent class
class Pegawai {
    protected $nama_pegawai;
    protected $gaji_pegawai;

    //method construct
    public function __construct($nama_pegawai, $gaji_pegawai)
    {
    $this->nama_pegawai = $nama_pegawai;
    $this->gaji_pegawai = $gaji_pegawai;
    }

    //method getter untuk ambil nama
    public function getNama()
    {
        return $this->nama_pegawai;
    }

    //method dasar di parent class
    public function hitungGaji()
    {
        return $this->gaji_pegawai;
    }
}

//polimorfisme dengan inheritance menggunakan overriding
class freelancer extends Pegawai{
    private $projectRate;
    private $jumlahProject;

    public function __construct($nama_pegawai, $projectRate, $jumlahProject)
    //gaji  dibuat 0, karena freelance dibayar per project
    {
        parent::__construct($nama_pegawai, 0);
        $this->projectRate = $projectRate;
        $this->jumlahProject = $jumlahProject;
    }

    //overriding untuk menghitung ulang gaji
    //menimpa atau menulis kembali karakteristik method hitungGaji
    public function hitungGaji()
    {
        return $this->projectRate * $this->jumlahProject;
    }
}

   //child class kedua
    class KaryawanTetap extends Pegawai{
        private $tunjangan;

        public function __construct($nama_pegawai, $gaji_pegawai, $tunjangan)
        {
            parent::__construct($nama_pegawai, $gaji_pegawai);
            $this->tunjangan = $tunjangan;
        }

        //polimorfisme dengan overriding atau menimpa karakteristik
        #[override]
        public function hitungGaji()
        {
            //ambil gaji pokok dari parent lalu tambahkan tunjangan
            return parent::hitungGaji() + $this->tunjangan;
        }

    }

    //buat fungsi untuk melihat hasil penerapan polimorfisme
    function cetakGaji(Pegawai $pegawai){ //menerima objek pegawai dan turunannya
        echo "Gaji " . $pegawai->getNama(). ": Rp." . number_format($pegawai->hitungGaji(),0,',','.'). "<br>";
    }

    //penggunaan class dan fungsi
    $pegawaiBiasa = new Pegawai('Chiko', 3000000);
    $pegawaiFreelancer = new Freelancer ('Miguel', 10000000, 4);
    $pegawaiTetap = new karyawanTetap ('James', 70000000, 5000000);

    //menggunakan saty fungsi yang sama untuk berbagai objek
    cetakGaji($pegawaiBiasa);
    cetakGaji($pegawaiFreelancer);
    cetakGaji($pegawaiTetap);
?>