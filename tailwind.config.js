/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      lineHeight: {
        '85': '85%',
      },
      colors: {
        'text': {
          50: 'rgb(var(--text-50))',
          100: 'rgb(var(--text-100))',
          200: 'rgb(var(--text-200))',
          300: 'rgb(var(--text-300))',
          400: 'rgb(var(--text-400))',
          500: 'rgb(var(--text-500))',
          600: 'rgb(var(--text-600))',
          700: 'rgb(var(--text-700))',
          800: 'rgb(var(--text-800))',
          900: 'rgb(var(--text-900))',
          950: 'rgb(var(--text-950))',
        },
        'background': {
          50: 'rgb(var(--background-50))',
          100: 'rgb(var(--background-100))',
          200: 'rgb(var(--background-200))',
          300: 'rgb(var(--background-300))',
          400: 'rgb(var(--background-400))',
          500: 'rgb(var(--background-500))',
          600: 'rgb(var(--background-600))',
          700: 'rgb(var(--background-700))',
          800: 'rgb(var(--background-800))',
          900: 'rgb(var(--background-900))',
          950: 'rgb(var(--background-950))',
        },
        'primary': {
          50: 'rgb(var(--primary-50))',
          100: 'rgb(var(--primary-100))',
          200: 'rgb(var(--primary-200))',
          300: 'rgb(var(--primary-300))',
          400: 'rgb(var(--primary-400))',
          500: 'rgb(var(--primary-500))',
          600: 'rgb(var(--primary-600))',
          700: 'rgb(var(--primary-700))',
          800: 'rgb(var(--primary-800))',
          900: 'rgb(var(--primary-900))',
          950: 'rgb(var(--primary-950))',
        },
        'secondary': {
          50: 'rgb(var(--secondary-50))',
          100: 'rgb(var(--secondary-100))',
          200: 'rgb(var(--secondary-200))',
          300: 'rgb(var(--secondary-300))',
          400: 'rgb(var(--secondary-400))',
          500: 'rgb(var(--secondary-500))',
          600: 'rgb(var(--secondary-600))',
          700: 'rgb(var(--secondary-700))',
          800: 'rgb(var(--secondary-800))',
          900: 'rgb(var(--secondary-900))',
          950: 'rgb(var(--secondary-950))',
        },
        'accent': {
          50: 'rgb(var(--accent-50))',
          100: 'rgb(var(--accent-100))',
          200: 'rgb(var(--accent-200))',
          300: 'rgb(var(--accent-300))',
          400: 'rgb(var(--accent-400))',
          500: 'rgb(var(--accent-500))',
          600: 'rgb(var(--accent-600))',
          700: 'rgb(var(--accent-700))',
          800: 'rgb(var(--accent-800))',
          900: 'rgb(var(--accent-900))',
          950: 'rgb(var(--accent-950))',
        },
        'error': {
          700: 'rgb(var(--error))',
        },
        'success': {
          700: 'rgb(var(--success))',
        },
        'badge': {
          800: 'rgb(var(--badge))'
        }
      },
      fontFamily: {
        butler: ['Butler', 'serif'],
        'butler-stencil': ['Butler Stencil', 'serif'],
        voguella: ['Voguella', 'serif'],
        stonewaller: ['Stonewaller', 'serif'],
        'elegante-classica': ['Elegante Classica', 'serif'],
        iphone: ['Iphone', 'sans-serif'],
        merriweather: ['Merriweather', 'serif'],

      },
      fontWeight: {
        200: '200',
        300: '300',
        400: '400',
        500: '500',
        700: '700',
        800: '800',
        900: '900',
      },

      fontStyle: {
        italic: 'italic',
        normal: 'normal',
      },
    }
  },
  plugins: [require('daisyui'),
    function ({ addUtilities }) { 
      const newUtilities = {
        '.util-loader-props': {
          position: 'fixed',
          width: '100dvw',
          height: '100dvh',
          backgroundColor: '#000',
          pointerEvents: 'none',
          clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
        },
        '.util-loader-imgs-container-props': {
          width: '150%',
          position: 'absolute',
          top: '50%',
          left: '50%',
          translate: '-50% -50%',
          gap: '0.625rem',
          clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
          display: 'flex',
        },
        '.util-imgs-wrapper-props': {
          position: 'relative',
          flex: 1,
          clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
        },
        '.util-img-props': {
          width: '100%',
          height: '100%',
          objectFit: 'cover',
        },
        '.util-hero-props': {
          width: '100%',
          position: 'absolute',
          top: '45%',
          transform: 'translateY(-50%)',
          textTransform: 'uppercase',
          fontFamily: 'butler-stencil',
          
        },
        '.util-h1-wrapper-props': {
          width: '100%',
          textAlign: 'center',
          fontSize: '4vw',
          clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
          fontFamily: 'butler',
        },
        '.util-h1-props': {
          position: 'relative',
          fontWeight: '500',
          lineHeight: '85',
        },
        '.util-emphasis-props': {
          fontFamily: 'elegante-classica',
          fontWeight: '700',
        },
        '.util-footer-props': {
          width: '100%',
          position: 'absolute',
          bottom: '1.875rem',
          right: '1.875rem',
          display: 'flex',
          justifyContent: 'flex-end',
          gap: '0.625rem',
          clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
        },
        '.util-items-props': {
          position: 'relative',
          width: '6.25rem',
          height: '6.25rem',
          objectFit: 'fit',
        },
      };
      addUtilities(newUtilities, ['responsive', 'hover']);
    }
  ]
}
