const nav = document.querySelector(".site-navigation");
const linkList = document.querySelector(".site-navigation .link-list");
const linkGroup = linkList.querySelector("ul");
const mobileNav = document.querySelector(".mobile-nav");

function transitionIn() {
    document.body.classList.add("nav-overlay-open");

    setTimeout(function () {
        nav.classList.add("slide-in");
        linkList.classList.add("slide-in");
    }, 1);

    setTimeout(function () {
        linkGroup.classList.add("show");
    }, 1200);
}

function transitionOut() {
    nav.classList.add("slide-out");
    linkList.classList.add("slide-out");
    linkGroup.classList.remove("show");
    mobileNav.classList.remove("open");

    setTimeout(function () {
        nav.classList.remove("slide-out", "slide-in");
        linkList.classList.remove("slide-out", "slide-in");
    }, 1200);

    setTimeout(function () {
        document.body.classList.remove("nav-overlay-open");

        const initialTab = document.querySelector('[data-tab-panel="initial"]');
        const tabClone = initialTab.cloneNode(true);
        const activeTab = document.querySelector(".site-navigation .nav-content .tab-panel");

        activeTab.replaceWith(tabClone);
    }, 1225);
}

const Header = {
    esc() {
        document.addEventListener("keyup", (e) => {
            if (e.key == "Escape") {
                transitionOut();
            }
        });
    },

    searchToggle() {
        const searchToggle = document.querySelector(".js-search-toggle");
        const searchClose = document.querySelector(".js-search-close");
        const searchContainer = document.querySelector(".search-container");
        const searchModal = document.querySelector(".search-modal");

        searchToggle.addEventListener("click", (e) => {
            searchContainer.classList.toggle("show");
            e.preventDefault();
        });

        searchClose.addEventListener("click", (e) => {
            searchContainer.classList.remove("show");
            e.preventDefault();
        });

        document.addEventListener("keyup", (e) => {
            if (e.key == "Escape") {
                searchContainer.classList.remove("show");
            }
        });

        document.addEventListener("click", (e) => {
            if (e.target.closest(".search-modal") || e.target.closest(".js-search-toggle")) return;
            searchContainer.classList.remove("show");
        });
    },

    desktopSubNavs() {
        const desktopSubNavs = document.querySelectorAll('[data-subnav="true"]');
        desktopSubNavs.forEach((desktopSubNav) => {
            const hoverLink = desktopSubNav.querySelector(".desktop-nav__link");

            desktopSubNav.addEventListener("mouseover", function () {
                this.setAttribute("data-state", "active");
                hoverLink.setAttribute("data-state", "active");
                console.log("active");
            });

            desktopSubNav.addEventListener("mouseout", function () {
                this.setAttribute("data-state", "inactive");
                hoverLink.setAttribute("data-state", "inactive");
                console.log("inactive");
            });

            hoverLink.addEventListener("click", (e) => {
                e.preventDefault();
            });
        });
    },

    navTabs() {
        const tabLinks = document.querySelectorAll(".site-navigation a.type-tab");

        tabLinks.forEach((tabLink) => {
            tabLink.addEventListener("click", (e) => {
                e.preventDefault();

                tabLinks.forEach((tabAnchor) => {
                    tabAnchor.classList.remove("active");
                });

                tabLink.classList.add("active");

                const tabTarget = tabLink.dataset.tab;
                const tab = document.querySelector(`[data-tab-panel="${tabTarget}"]`);
                const tabClone = tab.cloneNode(true);
                const activeTab = document.querySelector(".site-navigation .nav-content .tab-panel");

                activeTab.replaceWith(tabClone);

                console.log(tab);
            });
        });

        const mutationObserver = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === "childList") {
                    const activeTab = document.querySelector(".site-navigation .nav-content .tab-panel");
                    setTimeout(() => {
                        activeTab.classList.add("show");
                    }, 200);

                    console.log(mutation);
                }
            });
        });

        const navContent = document.querySelector(".site-navigation .nav-content");

        mutationObserver.observe(navContent, {
            childList: true,
        });
    },

    mobileNavSectionToggle() {
        const mobileToggleLinks = document.querySelectorAll(".mobile-nav .js-mobile-nav-toggle");

        mobileToggleLinks.forEach((toggleLink) => {
            toggleLink.addEventListener("click", (e) => {
                const targetSectionID = toggleLink.dataset.sectionId;
                const targetSection = document.querySelector(`.mobile-nav-body[data-section="${targetSectionID}"]`);

                targetSection.classList.toggle("active");
                toggleLink.classList.toggle("active");

                e.preventDefault();
            });
        });
    },

    mobileNavToggle() {
        const mobileCloseToggle = document.querySelector(".js-mobile-nav-trigger");

        mobileCloseToggle.addEventListener("click", (e) => {
            mobileNav.classList.toggle("open");

            e.preventDefault();
        });
    },

    mobileNavClose() {
        const mobileCloseBtn = document.querySelector(".js-mobile-nav-close");

        mobileCloseBtn.addEventListener("click", (e) => {
            mobileNav.classList.remove("open");

            e.preventDefault();
        });
    },

    init: function () {
        this.esc();
        this.desktopSubNavs();
        this.searchToggle();
        this.navTabs();
        this.mobileNavToggle();
        this.mobileNavSectionToggle();
        this.mobileNavClose();
    },
};

export default Header;
