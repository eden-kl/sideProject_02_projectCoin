/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        keyframes: {
            'modal-bg-fade-out': {
                '0%': { opacity: "0" },
                '100%': { opacity: "1" },
            },
            'modal-bg-fade-in': {
                '0%': { opacity: "1" },
                '100%': { opacity: "0" },
            },
            'modal-fade-out': {
                '0%': { opacity: "0", transform: "scale(0)"},
                '100%': { opacity: "1", transform: "scale(1)" },
            },
            'modal-fade-in': {
                '0%': { opacity: "1", transform: "scale(1)" },
                '100%': { opacity: "0", transform: "scale(0)" },
            },
            'sidebar-fade-close': {
                '0%': { 'margin-left': '0'},
                '100%': { 'margin-left': '-18rem' },
            },
            'sidebar-fade-open': {
                '0%': { 'margin-left': '-18rem'},
                '100%': { 'margin-left': '0' },
            },
            'navbar-fade-close': {
                '0%': { 'margin-left': '18rem'},
                '100%': { 'margin-left': '0' },
            },
            'navbar-fade-open': {
                '0%': { 'margin-left': '0'},
                '100%': { 'margin-left': '18rem' },
            },
        },
        animation: {
            'modal-bg-out': 'modal-bg-fade-out 0.3s ease-out',
            'modal-bg-in': 'modal-bg-fade-in 0.2s ease-in',
            'modal-out': 'modal-fade-out 0.3s ease-out',
            'modal-in': 'modal-fade-in 0.2s ease-in',
            'sidebar-close': 'sidebar-fade-close 0.5s ease-in-out',
            'sidebar-open': 'sidebar-fade-open 0.5s ease-in-out',
            'navbar-close': 'navbar-fade-close 0.5s ease-in-out',
            'navbar-open': 'navbar-fade-open 0.5s ease-in-out',
        }
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}

