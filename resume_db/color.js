function changeColorScheme() {
    const scheme = document.getElementById('colorScheme').value;
    switch (scheme) {
        case 'sunset':
            document.documentElement.style.setProperty('--background-color', '#FFF3E0'); // Very Light Orange
            document.documentElement.style.setProperty('--text-color', '#BF360C'); // Darker Orange
            document.documentElement.style.setProperty('--primary-color', '#FF5722'); // Vibrant Orange
            document.documentElement.style.setProperty('--highlight-color', '#FFCCBC'); // Light Orange
            document.documentElement.style.setProperty('--secondary-text-color', '#3E2723'); // Dark Brown

            document.documentElement.style.setProperty('--h1-color', '#BF360C'); // Darker Orange for h1
            document.documentElement.style.setProperty('--h2-color', '#D84315'); // Stronger Orange for h2
            document.documentElement.style.setProperty('--h3-color', '#FF7043'); // Lighter Orange for h3
            document.documentElement.style.setProperty('--p-color', '#3E2723'); // Dark Brown for p
            break;

        case 'ocean':
            document.documentElement.style.setProperty('--background-color', '#E0F7FA'); // Light Cyan
            document.documentElement.style.setProperty('--text-color', '#00695C'); // Dark Teal
            document.documentElement.style.setProperty('--primary-color', '#00796B'); // Teal
            document.documentElement.style.setProperty('--highlight-color', '#B2DFDB'); // Light Teal
            document.documentElement.style.setProperty('--secondary-text-color', '#004D40'); // Dark Teal

            document.documentElement.style.setProperty('--h1-color', '#00796B'); // Dark Teal for h1
            document.documentElement.style.setProperty('--h2-color', '#009688'); // Medium Teal for h2
            document.documentElement.style.setProperty('--h3-color', '#4DB6AC'); // Light Teal for h3
            document.documentElement.style.setProperty('--p-color', '#004D40'); // Dark Teal for p
            break;

        case 'forest':
            document.documentElement.style.setProperty('--background-color', '#E8F5E9'); // Light Green
            document.documentElement.style.setProperty('--text-color', '#1B5E20'); // Dark Green
            document.documentElement.style.setProperty('--primary-color', '#388E3C'); // Green
            document.documentElement.style.setProperty('--highlight-color', '#A5D6A7'); // Light Green
            document.documentElement.style.setProperty('--secondary-text-color', '#2E7D32'); // Darker Green

            document.documentElement.style.setProperty('--h1-color', '#1B5E20'); // Dark Green for h1
            document.documentElement.style.setProperty('--h2-color', '#388E3C'); // Green for h2
            document.documentElement.style.setProperty('--h3-color', '#A5D6A7'); // Light Green for h3
            document.documentElement.style.setProperty('--p-color', '#1B5E20'); // Dark Green for p
            break;

        case 'desert':
            document.documentElement.style.setProperty('--background-color', '#FFFDE7'); // Very Light Yellow
            document.documentElement.style.setProperty('--text-color', '#3E2723'); // Dark Brown
            document.documentElement.style.setProperty('--primary-color', '#FFC107'); // Yellow
            document.documentElement.style.setProperty('--highlight-color', '#FFE082'); // Light Yellow
            document.documentElement.style.setProperty('--secondary-text-color', '#F57F17'); // Darker Yellow

            document.documentElement.style.setProperty('--h1-color', '#F57F17'); // Darker Yellow for h1
            document.documentElement.style.setProperty('--h2-color', '#FFC107'); // Yellow for h2
            document.documentElement.style.setProperty('--h3-color', '#FFE082'); // Light Yellow for h3
            document.documentElement.style.setProperty('--p-color', '#3E2723'); // Dark Brown for p
            break;

        case 'night':
            document.documentElement.style.setProperty('--background-color', '#212121'); // Dark Grey
            document.documentElement.style.setProperty('--text-color', '#FFFFFF'); // White
            document.documentElement.style.setProperty('--primary-color', '#424242'); // Medium Grey
            document.documentElement.style.setProperty('--highlight-color', '#B0BEC5'); // Light Blue Grey
            document.documentElement.style.setProperty('--secondary-text-color', '#E0E0E0'); // Light Grey

            document.documentElement.style.setProperty('--h1-color', '#FFFFFF'); // White for h1
            document.documentElement.style.setProperty('--h2-color', '#B0BEC5'); // Light Blue Grey for h2
            document.documentElement.style.setProperty('--h3-color', '#E0E0E0'); // Light Grey for h3
            document.documentElement.style.setProperty('--p-color', '#E0E0E0'); // Light Grey for p
            break;

        default: // Default
            document.documentElement.style.setProperty('--background-color', '#1b0637');
            document.documentElement.style.setProperty('--text-color', '#fff');
            document.documentElement.style.setProperty('--primary-color', '#0077b6');
            document.documentElement.style.setProperty('--highlight-color', '#00bfff');
            document.documentElement.style.setProperty('--secondary-text-color', '#ddd');

            document.documentElement.style.setProperty('--h1-color', '#fff'); // White for h1
            document.documentElement.style.setProperty('--h2-color', '#ddd'); // Light Grey for h2
            document.documentElement.style.setProperty('--h3-color', '#aaa'); // Slightly Darker Grey for h3
            document.documentElement.style.setProperty('--p-color', '#fff'); // White for p
            break;
    }
}
