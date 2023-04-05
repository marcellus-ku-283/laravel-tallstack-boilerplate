const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        fontFamily: {
            sans: ["Figtree", ...defaultTheme.fontFamily.sans],
        },
        extend: {
            colors: {
                primary: "var(--light)",
                dark: "var(--dark)",
                darker: "var(--darker)",
                primary: {
                    DEFAULT: "#eb4432",
                    50: "#fef3f2",
                    100: "#fee5e2",
                    200: "#fdd0cb",
                    300: "#fbaea6",
                    400: "#f68073",
                    500: "#eb4432",
                    600: "#da3928",
                    700: "#b72d1e",
                    800: "#97291d",
                    900: "#7e271e",
                },
                success: {
                    DEFAULT: colors.green[600],
                    50: colors.green[50],
                    100: colors.green[100],
                    light: colors.green[500],
                    lighter: colors.green[400],
                    dark: colors.green[700],
                    darker: colors.green[800],
                },
                warning: {
                    DEFAULT: colors.orange[600],
                    50: colors.orange[50],
                    100: colors.orange[100],
                    light: colors.orange[500],
                    lighter: colors.orange[400],
                    dark: colors.orange[700],
                    darker: colors.orange[800],
                },
                danger: {
                    DEFAULT: colors.red[600],
                    50: colors.red[50],
                    100: colors.red[100],
                    light: colors.red[500],
                    lighter: colors.red[400],
                    dark: colors.red[700],
                    darker: colors.red[800],
                },
                info: {
                    DEFAULT: colors.cyan[600],
                    50: colors.cyan[50],
                    100: colors.cyan[100],
                    light: colors.cyan[500],
                    lighter: colors.cyan[400],
                    dark: colors.cyan[700],
                    darker: colors.cyan[800],
                },
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("tw-elements/dist/plugin"),
    ],
};
