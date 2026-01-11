document.addEventListener('DOMContentLoaded', () => {

  /* =========================
     DARK MODE TOGGLE
  ========================= */

  const themeToggle = document.getElementById('theme-toggle');
  const root = document.documentElement;

  if (themeToggle) {
    themeToggle.addEventListener('click', () => {
      root.classList.toggle('dark');

      // Optional: remember choice
      if (root.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
      } else {
        localStorage.setItem('theme', 'light');
      }
    });
  }

  /* =========================
     SIDEBAR TOGGLE (AUTHOR PAGE)
  ========================= */

  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('authorSidebar');

  if (sidebarToggle && sidebar) {
    sidebarToggle.addEventListener('click', () => {
      sidebar.classList.toggle('is-hidden');
    });
  }

});
