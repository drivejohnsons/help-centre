module.exports = {
  purge: {
      content: [
          './resources/**/*.blade.php',
          './resources/**/*.js',
          './resources/**/*.vue',
      ],
      safelist: [
          'p-4',
          'border-l-4',
          'border-gray-300',
      ],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        colors: {
            'brand-red': '#d21123',
        }
    },
  },
  variants: {
    extend: {
        ringWidth: ['hover', 'dark', 'focus'],
        ringColor: ['hover', 'dark', 'focus'],
        ringOffsetWidth: ['hover', 'dark', 'focus'],
        bgColor: ['disabled'],
        cursor: ['disabled'],
    },
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
}
