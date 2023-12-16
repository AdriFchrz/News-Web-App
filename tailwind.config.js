/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/**/*.php",
    "./public/**/*.{css, js}",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("tailwindcss"), require("autoprefixer")],
}