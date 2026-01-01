/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./**/*.php",
    "./**/*.js",
    "./**/*.jsx",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#dc2626",
        primaryHover: "#b91c1c",
        bg: "#0a0a0a",
        surface: "#111111",
        surfaceLight: "#1a1a1a",
        textBase: "#e5e5e5",
        textMuted: "#a3a3a3",
        borderBase: "#262626",
        danger: "#dc2626",
        success: "#16a34a",
      },
    },
  },

 plugins: [
  function ({ addComponents, theme }) {
    addComponents({

      /* === BASE BUTTON === */
      '.btn': {
        display: 'inline-flex',
        alignItems: 'center',
        justifyContent: 'center',
        gap: '0.5rem',
        padding: '0.5rem 1rem',
        borderRadius: '0.5rem',
        fontWeight: '600',
        fontSize: '0.875rem',
        transition: 'all 0.2s ease',
      },

      /* === PREV / NEXT NAV BUTTONS === */
      '.btn-nav': {
        display: 'inline-flex',
        alignItems: 'center',
        gap: '0.5rem',
        padding: '0.5rem 1rem',
        borderRadius: '0.75rem',
        backgroundColor: theme('colors.surface'),
        border: `1px solid ${theme('colors.borderBase')}`,
        color: theme('colors.primary'),
        fontWeight: '600',
        fontSize: '0.875rem',
        transition: 'all 0.2s ease',
      },

      '.btn-nav:hover': {
        backgroundColor: theme('colors.surfaceLight'),
      },

      '.btn-nav-disabled': {
        display: 'inline-flex',
        alignItems: 'center',
        gap: '0.5rem',
        padding: '0.5rem 1rem',
        borderRadius: '0.75rem',
        backgroundColor: theme('colors.surface'),
        border: `1px solid ${theme('colors.borderBase')}`,
        color: theme('colors.textMuted'),
        opacity: '0.4',
        cursor: 'not-allowed',
      },

      /* === HEADER === */
      '.site-header': {
        backgroundColor: theme('colors.bg'),
        borderBottom: `1px solid ${theme('colors.borderBase')}`,
      },

      '.site-header-inner': {
        maxWidth: '72rem',
        marginLeft: 'auto',
        marginRight: 'auto',
        padding: '1rem 1.5rem',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'space-between',
      },

      '.site-logo': {
        fontSize: '1.25rem',
        fontWeight: '700',
        letterSpacing: '0.05em',
        color: theme('colors.primary'),
        transition: 'color 0.2s ease',
      },

      '.site-logo:hover': {
        color: theme('colors.accent'),
      },

      /* === NAV === */
      '.nav-main': {
        display: 'flex',
        alignItems: 'center',
        gap: '2rem',
        color: theme('colors.primary'),
      },

      '.nav-link': {
        color: theme('colors.textMuted'),
        fontWeight: '500',
        transition: 'color 0.2s ease',
      },

      '.nav-link:hover': {
        color: theme('colors.primary'),
      },

      /* === THEME TOGGLE === */
      '.btn-theme-toggle': {
        marginLeft: '1rem',
        padding: '0.5rem 0.75rem',
        borderRadius: '0.5rem',
        border: `1px solid ${theme('colors.borderBase')}`,
        backgroundColor: theme('colors.surface'),
        color: theme('colors.textBase'),
        fontSize: '0.875rem',
        transition: 'background-color 0.2s ease',
      },

      '.btn-theme-toggle:hover': {
        backgroundColor: theme('colors.surfaceLight'),
      },

      /* === FOOTER NAV === */
      '.footer-nav': {
        display: 'flex',
        flexWrap: 'wrap',
        gap: '1.5rem',
        fontSize: '0.875rem',
        color: theme('colors.textMuted'),
      },

      '.footer-nav a': {
        color: theme('colors.textMuted'),
        transition: 'color 0.2s ease',
      },

      '.footer-nav a:hover': {
        color: theme('colors.primary'),
      },

      /* === NAV DROPDOWN STRUCTURE === */
      '.nav-main li': {
        position: 'relative',
      },

      '.nav-main li ul': {
        position: 'absolute',
        left: '0',
        top: '100%',
        marginTop: '0.75rem',
        minWidth: '12rem',
        backgroundColor: theme('colors.surface'),
        border: `1px solid ${theme('colors.borderBase')}`,
        borderRadius: '0.75rem',
        padding: '0.5rem',
        opacity: '0',
        visibility: 'hidden',
        transform: 'translateY(8px)',
        transition: 'all 0.2s ease',
        zIndex: '50',
      },

      /* === SHOW ON HOVER === */
      '.nav-main li:hover > ul': {
        opacity: '1',
        visibility: 'visible',
        transform: 'translateY(0)',
      },

      /* === DROPDOWN LINKS === */
      '.nav-main li ul li a': {
        display: 'block',
        padding: '0.5rem 0.75rem',
        borderRadius: '0.5rem',
        fontSize: '0.875rem',
        color: theme('colors.textMuted'),
        transition: 'all 0.2s ease',
      },

      '.nav-main li ul li a:hover': {
        backgroundColor: theme('colors.surfaceLight'),
        color: theme('colors.primary'),
      },

    })
  }
],
 }