const Content = {
    toggleResourcesSidebar() {
        const toggleLink = document.querySelector('.js-resources-sidebar-toggle');
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
    },

    init: function () {
        this.toggleResourcesSidebar();
    },
};

export default Content;
