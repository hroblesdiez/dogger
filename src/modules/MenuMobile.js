class MenuMobile {
    constructor() {
        const menuBtn = document.querySelector(".site-header__menu-trigger");
        const menu = document.querySelector(".container .site-header__menu");

        let $showMenu = false;

        menuBtn.addEventListener ('click', toggleMenu);

        function toggleMenu() {
            if (!$showMenu) {
                menuBtn.classList.add('open');
                menu.classList.add('open');
                $showMenu = true;
            } else {
                menuBtn.classList.remove('open');
                menu.classList.remove('open');
                $showMenu = false;
            }
        }
    }
}
export default MenuMobile;