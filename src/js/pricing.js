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

            adjustPadding();
            window.addEventListener("resize", adjustPadding);
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
        this.heroPadding();
        this.toggleFeatureExpansion();
    },
};

export default Pricing;
