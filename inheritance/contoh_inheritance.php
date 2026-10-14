<?php
class karyawan {
    private $nama;
    protected $gajipokok;

    public function __construct($nama, $gajipokok)
    {
        $this->nama = $nama;
        $this->gajipokok = $gajipokok;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function hitungtotalgaji()
    {
        return $this->gajipokok;
    }
}

class manager extends karyawan{
    private $bonus;

    public function __construct($nama, $gajipokok, $bonus)
    {
        parent::__construct($nama, $gajipokok);
        $this->bonus = $bonus;
    }
    public function getBonus()
    {
        return $this->bonus;
    }
}

$staff = new Karyawan("Budi", 5000000);
$manager = new Manager("Andi", 10000000, 2000000);

echo "Nama Karyawan: " .$staff->getNama().
" | Total Gaji: Rp. ". number_format($staff->hitungtotalgaji(), 0, ',', '.') . "<br>";

$totalGajiManager = $manager->hitungtotalgaji() + $manager->getBonus();
echo "Nama Manager: " . $manager->getNama() .
" | Total Gaji: Rp. ". number_format($totalGajiManager, 0, ',', '.'). "<br>";
?>