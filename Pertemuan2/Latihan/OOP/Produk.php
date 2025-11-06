<?php
//Parent class
//class ini berisi semua properti/method umum
//yang dimiliki oleh SEMUA produk

class Produk {
    //Properti umum
    public $judul, $penulis, $penerbit, $harga;

    //Contruktor milik parent
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    //method milik parent
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk() {
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga}";
    }
}