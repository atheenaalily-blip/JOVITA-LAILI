<?php

//class = transaksi
//property = nama_barang, harga, jumlah_barang
//method = menampilkan struk(), hitung total pembayaran()
//object = transaksiBarang1, transaksiBarang2


//class
class transaksi {

    //property
    public string $namabarang;
    public int $harga;
    public int $jumlahbarang;

    //method
    public function __construct(string $namabarang, int $harga, int $jumlahbarang) {
        $this->namabarang = $namabarang;
        $this->harga = $harga;
        $this->jumlahbarang = $jumlahbarang;
    }

    public function hitungTotalPembayaran(): int {
        return $this->harga * $this->jumlahbarang;
    }

    public function tampilStruk(): void {
        echo "Nama barang : " . $this->namabarang . "<br>";
        echo "Harga : Rp" . $this->harga . "<br>";
        echo "Jumlah barang : " . $this->jumlahbarang . "<br>";
        echo "Total : Rp" . $this->hitungTotalPembayaran() . "<br>";
        echo "--------------------------<br>";
    }
}

//object
$transaksiBarang1 = new transaksi("Tas Gucci", 25000000, 4);
$transaksiBarang2 = new transaksi("Sepatu Nike", 1500000, 2);

//menampilkanstruk
echo "=== STRUK TRANSAKSI 1 ===<br>";
$transaksiBarang1->tampilStruk();

echo "=== STRUK TRANSAKSI 2 ===<br>";
$transaksiBarang2->tampilStruk();

//menghitung total pembayaran
$totalPembayaran = 
    $transaksiBarang1->hitungTotalPembayaran() +
    $transaksiBarang2->hitungTotalPembayaran();

echo "Total Pembayaran : Rp" . $totalPembayaran . "<br>";

?>