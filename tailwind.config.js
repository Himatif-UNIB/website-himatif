module.exports = {
  purge: [
    './resources/views/public/**/*.blade.php',
    './resources/views/public/*.blade.php',
    './resources/views/includes/*.blade.php',
    './resources/views/components/site/blog/*.blade.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily:{
        poppins: ['Poppins'],
      },
      keyframes: {
        wiggle: {
          '0%' : { transform: 'rotate(6deg)' },
          '25%' : { transform: 'rotate(-6deg)' },
          '50%' : { transform: 'rotate(12deg)' },
          '75%' : { transform: 'rotate(-1deg)' },
          '100%' : { transform: 'rotate(0deg)' },
        }
      },
      animation: {
        wiggle: 'wiggle 1.2s ease-in-out infinite',
       },
      width: {
        mammoth : '100vw'
      },
      margin: {
        '-half' : '-50vw',
      },
      colors: {
        orange: {
          '500' : '#FFA573',
          '600' : '#FF9359',
        },

        'icons': '#9DA3B0',

        'card-color' : '#49566d',

        'dark-blue': '#304352',
        'dark-blue-800': '#2F3F50',
        'dark-blue-400': '#92A4B2',
        'dark-blue-200': '#76848D',
        'dark-blue-100': '#374D5E',

        'category-text-green': '#75A665',
        'category-text-yellow': '#A69565',
        'category-text-blue': '#65A699',

        'category-button-green': '#B5FF9C',
        'category-button-yellow': '#FFE69C',
        'category-button-blue': '#9CFFEC',
      },
      height: {
        mammoth : '36rem'
      },
      fontFamily: {
        poppins : ['Poppins']
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
