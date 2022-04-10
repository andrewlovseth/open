const Content = {
    toggleResourcesSidebar() {
        const toggleLink = document.querySelector('.js-resources-sidebar-toggle');
        if (toggleLink) {
            const sidebar = document.querySelector('.resources-sidebar-nav');
            const showText = toggleLink.dataset.show;
            const hideText = toggleLink.dataset.hide;

            toggleLink.addEventListener('click', (e) => {
                sidebar.classList.toggle('show');

                const isShown = sidebar.classList.contains('show');

                if (isShown) {
                    toggleLink.textContent = hideText;
                } else {
                    toggleLink.textContent = showText;
                }

                e.preventDefault();
            });
        }
    },

    partnersFilter() {
        const partnerFilterLinks = document.querySelectorAll('.js-partner-filter-link');
        const partners = document.querySelectorAll('.partners-grid .partner');

        partnerFilterLinks.forEach((filterLink) => {
            filterLink.addEventListener('click', (e) => {
                // ACTIVE TAB
                partnerFilterLinks.forEach((otherLink) => {
                    otherLink.classList.remove('active');
                });

                filterLink.classList.add('active');
                const filter = filterLink.dataset.filter;
                console.log(filter);

                // SHOW ONLY FILTERED RESULTS
                partners.forEach((partner) => {
                    const isActive = partner.classList.contains(filter);
                    if (filter !== 'all') {
                        if (isActive) {
                            partner.style.display = 'block';
                        } else {
                            partner.style.display = 'none';
                        }
                    } else {
                        partner.style.display = 'block';
                    }
                });

                e.preventDefault();
            });
        });
    },

    init: function () {
        this.toggleResourcesSidebar();
        this.partnersFilter();
    },
};

export default Content;
