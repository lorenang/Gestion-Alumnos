import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'
import aspectRatio from '@tailwindcss/aspect-ratio';

export default {
    content: ['./resources/**/*.blade.php', './vendor/filament/**/*.blade.php'],
    darkMode: 'class',
    theme: {

        extend: {
            // Colores y pantallas que ya tienes
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
                
            },
            screens: {
                'dark': {'raw': '(prefers-color-scheme: dark)'},
            },
            // Añade estilos personalizados para botones
            borderRadius: {
                'xl': '1rem', // ejemplo de borde redondeado
            },
            boxShadow: {
                'btn': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
            },
        },
    },
    plugins: [forms, typography],
}
