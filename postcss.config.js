module.exports = {
    plugins: [
        require('tailwindcss'),
        require('autoprefixer'),
    ],
    content: [
        "./app/Views/**/*.php",
        "./public/**/*.js",
    ],
};