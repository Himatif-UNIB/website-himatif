module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
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
