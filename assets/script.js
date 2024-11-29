const Explores = document.querySelectorAll('.js-kham-pha');
const modal = document.querySelector('.js-modal');
const modalClose = document.querySelector('.js-modal-close');
function ShowExplore() {
    modal.classList.add ('open');
}; 
function HideExplore() {
    modal.classList.remove ('open');
};
for ( const Explore of Explores) {
    Explore.addEventListener('click', ShowExplore);
};

modalClose.addEventListener('click', HideExplore);
//header
document.addEventListener('DOMContentLoaded', function() {
const navToggle = document.querySelector('.nav-toggle');
const headerNav = document.querySelector('.header-nav');
const headerLogin = document.querySelector('.header-login');
navToggle.addEventListener('click', function() {
this.classList.toggle('active'); // Thêm/xóa lớp active cho nút menu
headerNav.classList.toggle('active'); // Thêm/xóa lớp active cho header-nav
headerLogin.classList.toggle('active'); // Thêm/xóa lớp active cho header-login
});
});
// login
// slide
    const $next = document.querySelector('.next');
        const $prev = document.querySelector('.prev');

        $next.addEventListener (
            'click',
            () => {
                const items = document.querySelectorAll('.item');
                document.querySelector('.slide').
                appendChild(items[0]);
            },
        );
        $prev.addEventListener(
            'click',
            () => {
                const items = document.querySelectorAll('.item');
                document.querySelector('.slide').
                prepend(items[items.length -1]);
            },
        );