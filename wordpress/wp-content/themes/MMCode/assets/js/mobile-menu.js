document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('mobileMenuToggle');
  const nav = document.getElementById('mobileMenu');

  if (!toggle || !nav) return;

  toggle.addEventListener('click', () => {
    nav.classList.toggle('is-open');
  });
});
