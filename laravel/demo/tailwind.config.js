/** @type {import('tailwindcss').Config} */
module.exports = {
  // هنا نحدد المسارات لجميع الملفات التي تحتوي على كلاسات Tailwind
  // يجب التأكد من أن المسار صحيح لملفات JSX و JS
  content: [
    "./src/**/*.{js,jsx,ts,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
