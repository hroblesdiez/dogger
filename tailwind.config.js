module.exports = {
  content: [
    './*.html',
    './*.php',
    './src/**/*.js'
  ],
  theme: {
    screens: {
      sm: '480px',
      md: '660px',
      lg: '992px',
      xl: '1440px',
    },
    colors: {
      'primary': '#f7a905',
      'secondary': '#ffe2c9',
      'text': '#564741',
      'bg': '#fff9f4',
      'bg2': '#FBFBFB',
      'white': '#fff',
      'black': '#000',
      'red':  'red',
      'transparent': 'transparent',
      'current': 'currentColor',
      
    },
    fontFamily: {
      paytone: ['"Paytone One"', 'sans-serif'],
      poppins: ['Poppins', 'sans-serif'],
      
    },
    fontSize: {
      sm: ['14px', '24px'],
      base: ['16px', '26px'],
      lg: ['20px', '28px'],
      xl: ['24px', '30px'],
      '2xl': ['28px', '32px'],
      '3xl': ['32px', '34px'],
      '4xl': ['36px', '36px'],
    },

    extend: {
      boxShadow: {
        'card': '0 5px 20px 2px rgba(0, 0, 0, 0.15)',
      }
    },
  },
  plugins: [],
}
