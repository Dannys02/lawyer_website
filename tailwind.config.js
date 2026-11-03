/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'ns-navy': {
          950: '#070F1E',
          900: '#0B162C',
          800: '#132242',
          700: '#1D315C',
        },
        'ns-gold': {
          400: '#E2B842',
          500: '#D4AF37',
          700: '#785706',
        },
        'ns-ivory': '#F8F7F4',
        'ns-paper': '#F1EFEA',
        'ns-ink': {
          900: '#0B162C',
          700: '#334155',
          500: '#475569',
        },
        'ns-light': {
          100: '#F8FAFC',
          300: '#CBD5E1',
        },
        'ns-border': {
          light: '#D6D3CD',
          navy: 'rgba(212, 175, 55, 0.28)',
        }
      },
      fontFamily: {
        sans: ['"Poppins"', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', 'sans-serif'],
        serif: ['"Poppins"', 'sans-serif'],
        display: ['"Poppins"', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
