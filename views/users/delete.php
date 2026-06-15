<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: http://localhost/PracowniaProjektowaniaStronInternetowych/PanelTest/users'); // Zakładając, że chcesz wrócić do listy użytkowników
    exit();
}
?>