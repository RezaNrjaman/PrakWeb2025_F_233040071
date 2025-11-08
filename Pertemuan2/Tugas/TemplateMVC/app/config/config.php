<?php

//session agar flasher dapat bekerja
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define("BASEURL", "http://localhost/PrakWeb2025_F_233040071/Pertemuan2/Tugas/TemplateMVC/public/");

// DATANASE
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvc');
