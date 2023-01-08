/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [
    ],
    darkMode: "media",
    safelist: [
        "bg-orange-400", "bg-orange-500", "bg-orange-600", "bg-orange-700", "bg-orange-800", "bg-amber-400", "bg-amber-500", "bg-amber-600", "bg-amber-700", "bg-amber-800", "bg-yellow-400", "bg-yellow-500", "bg-yellow-600", "bg-yellow-700", "bg-yellow-800", "bg-lime-400", "bg-lime-500", "bg-lime-600", "bg-lime-700", "bg-lime-800", "bg-green-400", "bg-green-500", "bg-green-600", "bg-green-700", "bg-green-800", "bg-emerald-400", "bg-emerald-500", "bg-emerald-600", "bg-emerald-700", "bg-emerald-800", "bg-teal-400", "bg-teal-500", "bg-teal-600", "bg-teal-700", "bg-teal-800", "bg-cyan-400", "bg-cyan-500", "bg-cyan-600", "bg-cyan-700", "bg-cyan-800", "bg-sky-400", "bg-sky-500", "bg-sky-600", "bg-sky-700", "bg-sky-800", "bg-blue-400", "bg-blue-500", "bg-blue-600", "bg-blue-700", "bg-blue-800", "bg-indigo-400", "bg-indigo-500", "bg-indigo-600", "bg-indigo-700", "bg-indigo-800", "bg-violet-400", "bg-violet-500", "bg-violet-600", "bg-violet-700", "bg-violet-800", "bg-fuchsia-400", "bg-fuchsia-500", "bg-fuchsia-600", "bg-fuchsia-700", "bg-fuchsia-800", "bg-pink-400", "bg-pink-500", "bg-pink-600", "bg-pink-700", "bg-pink-800", "bg-red-400", "bg-red-500", "bg-red-600", "bg-red-700", "bg-red-800", "bg-rose-400", "bg-rose-500", "bg-rose-600", "bg-rose-700", "bg-rose-800",
    ]
}