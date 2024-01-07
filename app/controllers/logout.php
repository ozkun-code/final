<?php
session_start();

// Hapus cookie sesi
setcookie(session_name(), '', time() - 3600, '/');

// Hapus variabel sesi
unset($_SESSION['username']);
unset($_SESSION['login']);
session_destroy();

// Redirect ke halaman login
header("Location: login.php?pesan=keluar");
