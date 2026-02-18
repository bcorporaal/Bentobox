const path = require("path");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    path.resolve(__dirname, "../site/**/*.php"),
    path.resolve(__dirname, "./src/**/*.css"),
  ],
  theme: {
    extend: {
      spacing: {
        100: "100px",
      },
      colors: {
        "bentobox-bg": "var(--color-bg)",
        "bentobox-stripe": "var(--color-stripe)",
        "bentobox-link": "var(--color-link)",
        "bentobox-link-hover": "var(--color-link-hover)",
        "bentobox-panel-title": "var(--color-panel-title)",
        "bentobox-panel-title-highlight": "var(--color-panel-title-highlight)",
        "bentobox-logo": "var(--color-logo-fill)",
      },
      fontFamily: {
        sans: ["var(--font-sans)", "system-ui", "sans-serif"],
      },
      fontSize: {
        bentobox: ["0.75rem", { lineHeight: "1.2rem" }],
      },
    },
  },
  plugins: [],
};
