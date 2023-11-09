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
