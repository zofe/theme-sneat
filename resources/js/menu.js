// Vertical menu behaviour (replaces Sneat's menu.js + helpers.js):
// - .menu-toggle opens / closes its sub-menu (siblings close, like an accordion)
// - .layout-menu-toggle: below xl slides the menu in and out (layout-menu-expanded on <html>),
//   from xl on collapses it to icons (layout-menu-collapsed) and expands it on hover.
const html = document.documentElement;
const XL = 1200;

document.addEventListener('click', (e) => {
    const toggle = e.target.closest('.menu-vertical .menu-toggle');
    if (toggle) {
        e.preventDefault();
        const item = toggle.closest('.menu-item');
        const wasOpen = item.classList.contains('open');
        item.parentElement.querySelectorAll(':scope > .menu-item.open').forEach(i => i.classList.remove('open'));
        if (! wasOpen) item.classList.add('open');
        return;
    }
    if (e.target.closest('.layout-menu-toggle')) {
        e.preventDefault();
        if (window.innerWidth < XL) {
            html.classList.toggle('layout-menu-expanded');
        } else {
            html.classList.toggle('layout-menu-collapsed');
            html.classList.remove('layout-menu-hover');
            try { localStorage.rapydMenuCollapsed = html.classList.contains('layout-menu-collapsed') ? '1' : ''; } catch (err) {}
        }
    }
});

const menu = document.getElementById('layout-menu');
if (menu) {
    menu.addEventListener('mouseenter', () => { if (html.classList.contains('layout-menu-collapsed')) html.classList.add('layout-menu-hover'); });
    menu.addEventListener('mouseleave', () => html.classList.remove('layout-menu-hover'));
    try { if (localStorage.rapydMenuCollapsed === '1' && window.innerWidth >= XL) html.classList.add('layout-menu-collapsed'); } catch (err) {}
}
window.addEventListener('resize', () => { if (window.innerWidth >= XL) html.classList.remove('layout-menu-expanded'); });
