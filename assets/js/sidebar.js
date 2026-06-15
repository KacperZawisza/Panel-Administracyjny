document.addEventListener("DOMContentLoaded", function () {
  // Sprawdź, które menu ma być rozwinięte
  const openMenuId = localStorage.getItem("openMenu");
  if (openMenuId) {
    const submenu = document.getElementById(openMenuId);
    const heading = submenu.previousElementSibling;

    submenu.classList.add("visible");
    heading.classList.add("active");
    heading.querySelector(".arrow").classList.add("down");
  }

  // Dodaj listener do wszystkich nagłówków
  document.querySelectorAll(".sidebar-heading").forEach((heading) => {
    heading.addEventListener("click", function () {
      const menuId = heading.nextElementSibling.id;

      // Przełącz widoczność submenu
      if (heading.nextElementSibling.classList.contains("visible")) {
        heading.nextElementSibling.classList.remove("visible");
        heading.classList.remove("active");
        heading.querySelector(".arrow").classList.remove("down");
        localStorage.removeItem("openMenu"); // Usuń stan, jeśli zamknięte
      } else {
        // Zamknij wszystkie inne
        document.querySelectorAll(".submenu").forEach((submenu) => submenu.classList.remove("visible"));
        document.querySelectorAll(".sidebar-heading").forEach((head) => head.classList.remove("active"));
        document.querySelectorAll(".arrow").forEach((arrow) => arrow.classList.remove("down"));

        // Otwórz wybrane
        heading.nextElementSibling.classList.add("visible");
        heading.classList.add("active");
        heading.querySelector(".arrow").classList.add("down");
        localStorage.setItem("openMenu", menuId); // Zapisz stan
      }
    });
  });

  // Oznacz aktywną pozycję w submenu
  const currentUrl = window.location.href;
  document.querySelectorAll(".submenu li").forEach((listItem) => {
    const link = listItem.querySelector("a");
    if (link && link.href === currentUrl) {
      listItem.classList.add("aktywne"); // Dodaj klasę do elementu li

      // Rozwiń menu nadrzędne, jeśli jest zagnieżdżone
      const submenu = listItem.closest(".submenu");
      if (submenu) {
        submenu.classList.add("visible");
        const heading = submenu.previousElementSibling;
        heading.classList.add("active");
        heading.querySelector(".arrow").classList.add("down");
        localStorage.setItem("openMenu", submenu.id);
      }
    }
  });
});
