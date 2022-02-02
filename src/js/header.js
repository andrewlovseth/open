const nav = document.querySelector('.site-navigation');
const linkList = document.querySelector('.site-navigation .link-list');
const hamburger = document.querySelector('.js-nav-trigger');
const linkGroup = linkList.querySelector('ul');

function transitionIn() {
    document.body.classList.add('nav-overlay-open');

    setTimeout(function () {
        nav.classList.add('slide-in');
        linkList.classList.add('slide-in');
    }, 1);

    setTimeout(function () {
        hamburger.classList.add('active');
    }, 50);

    setTimeout(function () {
        linkGroup.classList.add('show');
    }, 1200);
}

function transitionOut() {
    nav.classList.add('slide-out');
    linkList.classList.add('slide-out');
    linkGroup.classList.remove('show');

    setTimeout(function () {
        nav.classList.remove('slide-out', 'slide-in');
        linkList.classList.remove('slide-out', 'slide-in');
    }, 1200);

    setTimeout(function () {
        hamburger.classList.remove('active');

        document.body.classList.remove('nav-overlay-open');
    }, 1225);
}

const Header = {
    hamburger() {
        hamburger.addEventListener('click', (e) => {
            let isActive = hamburger.classList.contains('active');

            if (isActive) {
                transitionOut();
            } else {
                transitionIn();
            }

            e.preventDefault();
        });
    },

    esc() {
        document.addEventListener('keyup', (e) => {
            if (e.key == 'Escape') {
                transitionOut();
            }
        });
    },

    logoBackground() {
        const logo = document.querySelector('.site-logo');
        const fold = document.querySelector('.site-content > *:nth-child(1)');
        let observer = new IntersectionObserver(
            (entries) => {
                if (entries[0].isIntersecting) {
                    logo.classList.remove('scrolled');
                } else {
                    logo.classList.add('scrolled');
                }
            },
            {
                rootMargin: '-108px 0px 0px 0px',
            }
        );
        observer.observe(fold);
    },

    searchToggle() {
        const searchToggle = document.querySelector('.js-search-toggle');
        const searchClose = document.querySelector('.js-search-close');
        const searchContainer = document.querySelector('.search-container');
        const searchModal = document.querySelector('.search-modal');

        searchToggle.addEventListener('click', (e) => {
            searchContainer.classList.toggle('show');
            e.preventDefault();
        });

        searchClose.addEventListener('click', (e) => {
            searchContainer.classList.remove('show');
            e.preventDefault();
        });

        document.addEventListener('keyup', (e) => {
            if (e.key == 'Escape') {
                searchContainer.classList.remove('show');
            }
        });

        document.addEventListener('click', (e) => {
            if (
                e.target.closest('.search-modal') ||
                e.target.closest('.js-search-toggle')
            )
                return;
            searchContainer.classList.remove('show');
        });
    },

    init: function () {
        this.hamburger();
        this.esc();
        this.logoBackground();
        this.searchToggle();
    },
};

export default Header;
