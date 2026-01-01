document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.getElementById('theme-toggle');
  const html = document.documentElement;

  if (!toggle) return;

  // Load saved theme
  if (localStorage.getItem('theme') === 'light') {
    html.classList.remove('dark');
    toggle.textContent = '☀️';
  } else {
    html.classList.add('dark');
    toggle.textContent = '🌙';
  }

  toggle.addEventListener('click', function () {
    if (html.classList.contains('dark')) {
      html.classList.remove('dark');
      localStorage.setItem('theme', 'light');
      toggle.textContent = '☀️';
    } else {
      html.classList.add('dark');
      localStorage.setItem('theme', 'dark');
      toggle.textContent = '🌙';
    }
  });
});
