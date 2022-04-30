class MenuMobile {
    constructor() {
       //Grab all elements

            const btn = document.querySelector(".mobile-button");
            const menu = document.querySelector(".mobile-menu");
            const open = document.querySelector(".mobile-open");
            const close = document.querySelector(".mobile-close");
            const theBody = document.querySelector("body");
            let isOpen = false;

        //Add event listener
        btn.addEventListener( "click", toggleMenu);

function toggleMenu() {
            if (!isOpen) {
                menu.classList.remove('hidden');
                menu.classList.add('opacity-100');
                menu.classList.add('top-[80px]');
                open.classList.add('hidden');
                close.classList.remove('hidden');
                theBody.classList.add('overflow-hidden');
                isOpen = true;
            } else {
                menu.classList.add('hidden');
                menu.classList.remove('opacity-100');
                menu.classList.remove('top-[80px]');
                close.classList.add('hidden');
                open.classList.remove('hidden');
                theBody.classList.remove('overflow-hidden');
                isOpen = false;
            }
        }
    }
}
export default MenuMobile;