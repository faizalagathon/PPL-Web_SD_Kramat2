<?php

if (isset($_GET['home'])) {
    header('Location: home.php');
}
if (isset($_GET['profile'])) {
    header('Location: profile/profile.php');
}
if (isset($_GET['berita'])) {
    header('Location: daftarBerita/berita.php');
}
if (isset($_GET['galeri'])) {
    header('Location: daftarGaleri/user/galeri.php');
}
if (isset($_GET['guru'])) {
    header('Location: daftarGuru/daftar_guru_user.php');
}
if (isset($_GET['admin-carousel'])) {
    header('Location: daftarCarousel/modifikasi_carousel.php');
}
if (isset($_GET['admin-guru'])) {
    header('Location: daftarGuru/daftar_guru.php');
}
if (isset($_GET['admin-sejarah'])) {
    header('Location: profile/edit_sejarah.php');
}
if (isset($_GET['admin-visi-misi'])) {
    header('Location: profile/edit_visi_misi.php');
}
if (isset($_GET['admin-sambutan'])) {
    header('Location: profile/edit_sambutan.php');
}
if (isset($_GET['admin-ekskul'])) {
    header('Location: daftarEskull/crud_eskull.php');
}
if (isset($_GET['admin-galeri'])) {
    header('Location: daftarGaleri/admin/galeri.php');
}
if (isset($_GET['admin-berita'])) {
    header('Location: daftarBerita/crud_berita.php');
}
if (isset($_GET['admin-profile'])) {
    header('Location: profile/edit_jumlahsiswa_akreditasi.php');
}
if (isset($_GET['logout'])) {
    header('Location: login/logout.php');
}
if (isset($_GET['login'])) {
    header('Location: login/login.php');
}

