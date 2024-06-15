// Check for theme preference in local storage
const currentTheme = localStorage.getItem('theme');

// Apply the saved theme or default to light theme
if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);
}

// Toggle between light and dark themes
document.getElementById('themeToggle').addEventListener('change', function() {
    if (this.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    }
});
if(currentTheme === 'dark'){
    document.getElementById('themeToggle').checked = true;
    }