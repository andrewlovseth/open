const Content = {
    toggleResourcesSidebar() {
        const toggleLink = document.querySelector(".js-resources-sidebar-toggle");
        if (toggleLink) {
            const sidebar = document.querySelector(".resources-sidebar-nav");
            const showText = toggleLink.dataset.show;
            const hideText = toggleLink.dataset.hide;

            toggleLink.addEventListener("click", (e) => {
                sidebar.classList.toggle("show");

                const isShown = sidebar.classList.contains("show");

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
        const partnerFilterLinks = document.querySelectorAll(".js-partner-filter-link");
        const partners = document.querySelectorAll(".partners-grid .partner");

        partnerFilterLinks.forEach((filterLink) => {
            filterLink.addEventListener("click", (e) => {
                // ACTIVE TAB
                partnerFilterLinks.forEach((otherLink) => {
                    otherLink.classList.remove("active");
                });

                filterLink.classList.add("active");
                const filter = filterLink.dataset.filter;
                console.log(filter);

                // SHOW ONLY FILTERED RESULTS
                partners.forEach((partner) => {
                    const isActive = partner.classList.contains(filter);
                    if (filter !== "all") {
                        if (isActive) {
                            partner.style.display = "block";
                        } else {
                            partner.style.display = "none";
                        }
                    } else {
                        partner.style.display = "block";
                    }
                });

                e.preventDefault();
            });
        });
    },

    leaderBios() {
        const bioTriggers = document.querySelectorAll(".leader__bio-trigger");

        bioTriggers.forEach((trigger) => {
            const leader = trigger.closest(".leader");
            const dialog = leader.querySelector(".leader__bio");
            const closeButton = dialog.querySelector(".leader__bio-close");

            // Open dialog
            trigger.addEventListener("click", () => {
                dialog.showModal();
            });

            // Close with button
            closeButton.addEventListener("click", () => {
                dialog.close();
            });

            // Close when clicking outside
            dialog.addEventListener("click", (e) => {
                const dialogDimensions = dialog.getBoundingClientRect();
                if (
                    e.clientX < dialogDimensions.left ||
                    e.clientX > dialogDimensions.right ||
                    e.clientY < dialogDimensions.top ||
                    e.clientY > dialogDimensions.bottom
                ) {
                    dialog.close();
                }
            });
        });
    },

    futureFeaturesToggle() {
        const featureItems = document.querySelectorAll(".future-features__item");

        featureItems.forEach((item) => {
            const headline = item.querySelector(".future-features__headline");
            const copy = item.querySelector(".future-features__copy");
            const icon = headline.querySelector(".icon svg");

            if (headline && copy) {
                headline.addEventListener("click", () => {
                    const isHidden = copy.style.display === "none" || copy.style.display === "";

                    if (isHidden) {
                        copy.style.display = "block";
                        if (icon) {
                            icon.style.transform = "rotate(180deg)";
                        }
                    } else {
                        copy.style.display = "none";
                        if (icon) {
                            icon.style.transform = "rotate(0deg)";
                        }
                    }
                });
            }
        });
    },

    init: function () {
        this.toggleResourcesSidebar();
        this.partnersFilter();
        this.leaderBios();
        this.futureFeaturesToggle();
    },
};

export default Content;
