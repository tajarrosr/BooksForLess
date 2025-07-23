/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  darkMode: ["class"],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Poppins", ...defaultTheme.fontFamily.sans],
      },
      colors: {
        background: "#F8FAFC",  // Light bluish-gray background
        text: "#1E293B",        // Dark slate for text
        accent: "#6366F1",      // Soft indigo for buttons/links
        secondary: "#94A3B8",   // Cool muted gray
      },
      borderRadius: {
        lg: "var(--radius)",
        md: "calc(var(--radius) - 2px)",
        sm: "calc(var(--radius) - 4px)",
      },
    },
  },
  plugins: [require("daisyui"), require("tailwindcss-animate")],
  daisyui: {
    themes: [
      {
        light: {
          primary: "#6366F1", // Soft indigo
          secondary: "#94A3B8", // Cool gray
          accent: "#6366F1",
          neutral: "#1E293B", // Text color
          "base-100": "#F8FAFC", // Background
          info: "#3ABFF8",
          success: "#36D399",
          warning: "#FBBD23",
          error: "#F87272",
        },
        dark: {
          primary: "#818CF8", // Lighter indigo for dark mode
          secondary: "#CBD5E1", // Lighter gray for dark mode
          accent: "#6366F1",
          neutral: "#F1F5F9", // Light text for dark mode
          "base-100": "#0F172A", // Dark background
          info: "#3ABFF8",
          success: "#36D399",
          warning: "#FBBD23",
          error: "#F87272",
        },
      },
    ],
  },
};
