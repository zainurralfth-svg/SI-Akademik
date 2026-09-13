<?php 
// 1. Memuat header.php (yang berisi <!DOCTYPE html>, <head>, dan link CSS Bootstrap)
include __DIR__ . '/../Partials/header.php'; 

// 2. Memuat navbar.php (menu navigasi atas)
include __DIR__ . '/../Partials/navbar.php'; 
?>

<!-- 3. Konten utama dinamis dari masing-masing halaman view (misal: index.php mahasiswa) -->
<main class="container mt-4">
    <?php require_once $content; ?>
</main>

<?php 
// 4. Memuat footer.php (yang berisi penutup </body> </html> dan script JS Bootstrap)
include __DIR__ . '/../Partials/footer.php'; 
?>