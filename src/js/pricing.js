const Pricing = {
    heroPadding() {
        const hero = document.querySelector(".page-template-pricing .hero");
        const features = document.querySelector(".page-template-pricing .features");
        const overview = document.querySelector(".page-template-pricing .overview__grid");

        if (hero && features && overview) {
            const adjustPadding = () => {
                if (window.innerWidth > 992) {
                    const overviewHeight = overview.offsetHeight;
                    const halfOverviewHeight = overviewHeight / 2;
                    const paddingValue = `${halfOverviewHeight}px`;
                    hero.style.paddingBottom = paddingValue;
                    features.style.marginTop = `-${halfOverviewHeight}px`;
                } else {
                    hero.style.paddingBottom = "";
                    features.style.marginTop = "";
                }
            };

            // Hide content initially
            document.body.style.visibility = "hidden";

            // Pre-calculate padding
            adjustPadding();

            // Show content and apply transitions
            window.addEventListener("load", () => {
                document.body.style.visibility = "visible";
                hero.style.transition = "padding-bottom 0.3s ease-in-out";
                features.style.transition = "margin-top 0.3s ease-in-out";
            });

            // Debounce the resize event handler
            let resizeTimer;
            window.addEventListener("resize", () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(adjustPadding, 250);
            });
        }
    },
    toggleFeatureExpansion() {
        const featureNames = document.querySelectorAll(".page-template-pricing .features__table-td.name");

        if (featureNames) {
            featureNames.forEach((featureName) => {
                featureName.addEventListener("click", function () {
                    if (window.innerWidth >= 768) {
                        this.classList.toggle("expanded");
                    }
                });
            });
        }
    },
    init: function () {
        //this.heroPadding();
        this.toggleFeatureExpansion();
    },
};

export default Pricing;
