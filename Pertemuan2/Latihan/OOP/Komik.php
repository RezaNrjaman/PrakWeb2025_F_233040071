<?php
//CHILLD CLASS
class Komik extends Produk {
    public $jmlHalaman;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman)
    {
        parent::__construct( $judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $infoParent = parent::getInfoProduk();
        return "Komik : {$infoParent} - {$this->jmlHalaman} Halaman.";
    }

}