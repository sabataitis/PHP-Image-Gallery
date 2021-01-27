module.exports = {
    purge: {
        enabled: true,
        content: [
            '../app/views/*.php',
            '../app/views/**/*.php',
        ],
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
