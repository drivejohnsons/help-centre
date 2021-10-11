module.exports = {
  purge: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
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
