document.addEventListener('DOMContentLoaded', () => {
  const querySection = document.querySelector('.query-section');
  const closeBtn = document.querySelector('.close-btn');
  const openBtn = document.querySelector('.btn_add2');

  // Obsługa zamykania sidebaru
  closeBtn.addEventListener('click', (event) => {
    event.preventDefault();
    querySection.classList.add('hidden');
  });

  // Obsługa otwierania sidebaru
  openBtn.addEventListener('click', (event) => {
    event.preventDefault();
    querySection.classList.remove('hidden');
  });
});
