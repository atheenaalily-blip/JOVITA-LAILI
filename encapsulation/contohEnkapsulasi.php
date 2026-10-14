<?php
// Contoh Konsep Enkapsulasi

class AkunBank {
    // Properti dengan akses private
    private $nomorRekening;
    private $saldo;
    private $pin;
    private $namaPemilik;

    // Method constructor
    public function __construct($nomorRekening, $saldo, $pin, $namaPemilik) {
        $this->nomorRekening = $nomorRekening;
        $this->setSaldo($saldo);
        $this->setPin($pin);
        $this->namaPemilik = $namaPemilik;
    }

    // Getter nama pemilik
    public function getNamaPemilik() {
        return $this->namaPemilik;
    }

    // Getter nomor rekening (read-only)
    public function getNomorRekening() {
        return $this->nomorRekening;
    }

    // Getter saldo
    public function getSaldo() {
        return "Rp " . number_format($this->saldo, 0, ',', '.');
    }

    // Setter saldo dengan validasi
    public function setSaldo($saldo) {
        if ($saldo >= 0) {
            $this->saldo = $saldo;
        } else {
            echo "Error: Saldo awal/perubahan tidak valid!<br>";
        }
    }

    // Setter PIN dengan enkripsi
    public function setPin($pinBaru) {
        if (preg_match('/^[0-9]{6}$/', (string) $pinBaru)) {
            $this->pin = password_hash(
                (string) $pinBaru,
                PASSWORD_BCRYPT
            );
        } else {
            echo "Error: PIN harus berupa 6 digit angka!<br>";
        }
    }

    // Tidak ada getter PIN demi keamanan data
}

// Penggunaan kode

// Membuat objek beserta isi propertinya
$akun1 = new AkunBank(
    "3246-786-123",
    500000,
    "123456",
    "arka"
);

// Membaca data melalui getter
echo "Nama Pemilik: " . $akun1->getNamaPemilik() . "<br>";
echo "Nomor Rekening: " . $akun1->getNomorRekening() . "<br>";
echo "Saldo Saat Ini: " . $akun1->getSaldo() . "<br>";

// Mengubah data melalui setter
$akun1->setSaldo(750000);
echo "Saldo Setelah Diupdate: " . $akun1->getSaldo() . "<br>";

// Mengubah data dengan nilai tidak valid
$akun1->setSaldo(-250000);
echo "Saldo Setelah Pengujian Saldo Negatif: " . $akun1->getSaldo() . "<br>";

// Pembuktian enkapsulasi
echo "<br><b>Pembuktian Enkapsulasi:</b><br>";
echo "Saldo tidak dapat diubah langsung dari luar class karena bersifat private.<br>";

// Gunakan setter untuk mengubah saldo, bukan akses langsung:
// $akun1->saldo = 950000; // Akan menyebabkan fatal error
?>