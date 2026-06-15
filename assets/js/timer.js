// Funkcja do aktualizacji zegara z datą
function aktualizujZegar() {
    const teraz = new Date();

    // Pobieranie daty
    const dzien = String(teraz.getDate()).padStart(2, '0');
    const miesiac = String(teraz.getMonth() + 1).padStart(2, '0'); // Miesiące są liczone od 0
    const rok = teraz.getFullYear();

    // Pobieranie godziny
    const godziny = String(teraz.getHours()).padStart(2, '0');
    const minuty = String(teraz.getMinutes()).padStart(2, '0');
    const sekundy = String(teraz.getSeconds()).padStart(2, '0');

    // Wyświetlanie daty i godziny
    document.getElementById('zegar').textContent = `${dzien}-${miesiac}-${rok} ${godziny}:${minuty}:${sekundy}`;
}

// Aktualizuj zegar co sekundę
setInterval(aktualizujZegar, 1000);

// Uruchom zegar natychmiast po załadowaniu strony
aktualizujZegar();
