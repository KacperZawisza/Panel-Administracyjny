<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Po usunięciu przekieruj użytkownika z powrotem na stronę, np. listę użytkowników
    header('Location: http://localhost/PracowniaProjektowaniaStronInternetowych/PanelTest/products'); // Zakładając, że chcesz wrócić do listy użytkowników
    exit();
}
?>