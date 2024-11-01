/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./**/**/*.php",
    "./includes/Elementor/**/**/*.php",
    "./includes/Elementor/**/**/*.js",
    "./includes/Admin/*.php",
    "./includes/Admin/views/*.php",
  ],
  prefix: "se-",
  theme: {
    screens: {
      xs: "500px",
      sm: "640px",
      md: "768px",
      lg: "1024px",
      xl: "1280px",
      "2xl": "1440px",
      "3xl": "1780px",
      "4xl": "2160px", // only need to control product grid mode in ultra 4k device
    },
    extend: {
      colors: {
        brand: "#0F2137",
      },
      boxShadow: {
        widgetCard:
          "rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;",
        tutorialCard: "rgba(38, 78, 118, 0.1) 0px 6px 30px",
      },
      animation: {
        "ping-motion": "pingMotion 1.5s cubic-bezier(0, 0, 0.2, 1) infinite",
      },
      keyframes: {
        pingMotion: {
          "0%": {
            transform: "scale(1)",
            opacity: 1,
          },
          "100%": {
            transform: "scale(1.5)",
            opacity: 0,
          },
        },
      },
    },
  },
  plugins: [],
};