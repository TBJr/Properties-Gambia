export function setupNavigation() {
    const navMenu = $('#nav-menu');
    const navToggle = $('#nav-toggle');

    navToggle.on('click', () => {
        navMenu.css('right', '0');
    });

    $('#close-flyout').on('click', () => {
        navMenu.css('right', '-100%');
    });

    $(document).on('click', (e) => {
        if ($(window).width() < 768 && !$(e.target).closest('#nav-toggle, #nav-menu').length) {
            navMenu.css('right', '-100%');
        }
    });
}
