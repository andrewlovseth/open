const body = document.querySelector('body');
const hamburger = document.querySelector('.js-nav-trigger');

const Global = {

    hamburger() {
        hamburger.addEventListener('click', (e) => {
            hamburger.classList.toggle('active');
            body.classList.toggle('nav-overlay-open');
            e.preventDefault();
        });
    },

    esc() {
        document.addEventListener('keyup', (e) => {
            if (e.key == "Escape") {
                body.classList.remove('nav-overlay-open');
            }
        });
    },

    clickOffNav() {
        const mobileNav = '.mobile-nav';
        const hamburgerMenu = '.js-nav-trigger';

        document.addEventListener('click', (e) => {
            if (e.target.closest(hamburgerMenu) || e.target.closest(mobileNav) ) return;
            body.classList.remove('nav-overlay-open');
        });
    },

    desktopSubNavToggle() {
        const headerLinks = document.querySelectorAll('.desktop-nav .header-link');

        headerLinks.forEach(headerLink => {
            headerLink.addEventListener('click', (e) => {            
                e.preventDefault();
            });
        });
    },

    mobileSubNavToggle() {
        const sectionHeaders = document.querySelectorAll('.mobile-nav .dropdown .section-header');

        sectionHeaders.forEach(header => {
            header.addEventListener('click', (e) => {
                let subnav_string = e.target.hash;
                let subnav = document.querySelector(subnav_string);
                let dropdown = e.target.closest('.dropdown');    

                subnav.classList.toggle('active');
                dropdown.classList.toggle('active');
            
                e.preventDefault();
            });
        });
    },

    init: function() {
        this.hamburger();
        this.esc();
        this.clickOffNav();
        this.desktopSubNavToggle();
        this.mobileSubNavToggle();
    },
};

export default Global;


