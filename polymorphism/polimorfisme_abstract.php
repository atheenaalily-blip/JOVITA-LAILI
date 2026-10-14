<?php
//buat abstract baru, abstract itu class yang tidak bisa dipakai langsung jadi object
abstract class notifikasiWeb{
    protected string $penerima;
    protected string $pesan;

    public function __construct(string $penerima, string $pesan)
    {
        $this->penerima = $penerima;
        $this->pesan = $pesan;
    }

    //method biasa yg bisa diwariskan dan digantikan langsung oleh kelas turunannya
    public function getinfoPengiriman(): string{
        return "mengirim ke: {$this->penerima}";
    }

    //abstract method: kontrak wajib yg harus di override
    abstract public function kirimNotifikasi(): void;
}

//kelas turunan 1: notifikasi via email
class notifEmail extends notifikasiWeb{
    private string $subjek;

    public function __construct(string $penerima, string $pesan, string $subjek)
    {
        parent::__construct($penerima, $pesan);
        $this->subjek = $subjek;
    }

    //wajib meng-override abstract method dari parent class
    public function kirimNotifikasi(): void 
    {
        echo "<div style = 'border: 2px solid #007bff; padding: 10px; margin-bottom: 10px; background-color: #f8f9fa'>";
        echo "<h4> [EMAIL] - Subjek : {$this->subjek}</h4>";
        echo "<p>{$this->getinfoPengiriman()}</p>";
        echo "<p>Isi Pesan: <i> {$this->pesan}</i></p>";
        echo "</div>";
    }
}

//kelas turunan 2: notifikasi via WhatsApp
//class notif WA
class notifWA extends notifikasiWeb{
    //wajib override abstract method dari parent
    public function kirimNotifikasi(): void
    {
        echo "<div style='border:2px solid #28a745; padding:10px; margin-bottom:10px; background-color: #e8f5e9'>";
        echo "<h4> [WhatsApp Message] </h4>";
        echo "<p>{$this->getinfoPengiriman()}</p>";
        echo "<p>Pesan: <i> {$this->pesan}</i></p>";
        echo "</div>";
    }
}

//kelas turunan 3: notifikasi browser
class notifBrowser extends notifikasiWeb{
    private string $browserApp;

    public function __construct(string $penerima, string $pesan, string $browserApp)
    {
        parent::__construct($penerima, $pesan);
        $this->browserApp = $browserApp;
    }

    //wajib override abstract method dari parent
    public function kirimNotifikasi(): void
    {
        echo "<div style='border:1px solid #ffc107; padding:10px; margin-bottom:10px; background-color: #fff3cd'>";
        echo "<h4> [Push Notif] - Browser: {$this->browserApp}</h4>";
        echo "<p>{$this->getinfoPengiriman()}</p>";
        echo "<p>Notif: <i> {$this->pesan}</i></p>";
        echo "</div>";
    }
}

//kelas turunan 4: notifikasi github
class notifGitHub extends notifikasiWeb{
    private string $repoName;

    public function __construct(string $penerima, string $pesan, string $repoName)
    {
        parent::__construct($penerima, $pesan);
        $this->repoName = $repoName;
    }

    //wajib override abstract method dari parent
    public function kirimNotifikasi(): void
    {
        echo "<div style='border:1px solid #bd2130; padding:10px; margin-bottom:10px; background-color: #f8d7da'>";
        echo "<h4> [Push Notif] - Repository: {$this->repoName}</h4>";
        echo "<p>{$this->getinfoPengiriman()}</p>";
        echo "<p>Notif: <i> {$this->pesan}</i></p>";
        echo "</div>";
    }
}

//class manager untuk menerapkan polimorfisme
class notifikasiManager{
    //menerima tipe data berdasarkan abstract class, apapun objeknya asalkan turunan notifikasiWeb bisa masuk
    public static function prosesKirim(notifikasiWeb $notif): void
    {
        $notif->kirimNotifikasi();
    }
} 

//penggunaan dan instansiasi objek
echo "<h2>Dashboard Simulasi Pengiriman Notifikasi Web</h2>";

//membuat berbagai macam objek notif
$notif1 = new notifEmail("heraalily@gmail.com", "Akun anda berhasil didaftarkan", "Konfirmasi Akun");
$notif2 = new notifWA("08123456789", "Kode OTP anda adalah 67891", "Jangan berikan kode ini kepada siapapun");
$notif3 = new notifBrowser("Token_Device_Asus", "Ada diskon 40% untuk produk pilihan anda1", "Google Chrome");
$notif4 = new notifGitHub("heraalily@gmail.com", "Anda memiliki komentar baru di repositori Anda", "my-project");

//mengirimkan dan menampilkan semua notif secara polimorfisme melelaui manager
notifikasiManager::prosesKirim($notif1);
notifikasiManager::prosesKirim($notif2);    
notifikasiManager::prosesKirim($notif3);
notifikasiManager::prosesKirim($notif4);

?>