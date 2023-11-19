function showMenu(icon) {
    // Hide all other menus
    hideAllMenus();

    // Find the parent menu and show its actions-menu
    const parentMenu = icon.closest('.post_menu');
    const actionsMenu = parentMenu.querySelector('.actions-menu');
    actionsMenu.style.display = 'block';

    // Close the menu when clicking outside of it
    document.addEventListener('click', function closeMenu(event) {
        if (!parentMenu.contains(event.target)) {
            actionsMenu.style.display = 'none';
            document.removeEventListener('click', closeMenu);
        }
    });
}

function hideAllMenus() {
    // Hide all actions-menus
    const allMenus = document.querySelectorAll('.actions-menu');
    allMenus.forEach(menu => {
        menu.style.display = 'none';
    });
}







//this for dark and light mode ----------------------------




document.addEventListener('DOMContentLoaded', function() {
 const body = document.body;
 const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

 // Check for saved dark mode preference
 const currentTheme = localStorage.getItem('theme');
 if (currentTheme) {
     body.classList.add(currentTheme);
     if (currentTheme === 'dark-mode') {
         toggleSwitch.checked = true;
     }
 }

 // Toggle dark mode
 toggleSwitch.addEventListener('change', function() {
     if (this.checked) {
         body.classList.replace('light-mode', 'dark-mode');
         localStorage.setItem('theme', 'dark-mode');
     } else {
         body.classList.replace('dark-mode', 'light-mode');
         localStorage.setItem('theme', 'light-mode');
     }
 });
});

