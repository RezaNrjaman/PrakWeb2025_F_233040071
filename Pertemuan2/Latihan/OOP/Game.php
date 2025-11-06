<?php
// === CHILD CLASS KEDUA ===
class Game extends Produk
{
    // Properti khusus milik Game
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getHarga()
    {
        return $this->harga;
    }
    
    // Method khusus Game
    public function getInfoProduk()
    {
        $infoParent = parent::getInfoProduk();
        return "Game : {$infoParent} ~ {$this->waktuMain} Jam.";
    }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 25000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr/>";

echo $produk2->getHarga();
