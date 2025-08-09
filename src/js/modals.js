// Dynamically import Swiper only when needed
let Swiper = null;
let swiperLoading = false;

async function loadSwiper() {
    if (Swiper) return Swiper;

    if (swiperLoading) {
        // Wait for existing load to complete
        while (swiperLoading) {
            await new Promise((resolve) => setTimeout(resolve, 10));
        }
        return Swiper;
    }

    swiperLoading = true;
    try {
        const module = await import("https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js");
        Swiper = module.default;
        return Swiper;
    } finally {
        swiperLoading = false;
    }
}

const Modal = {
    modals: function () {
        MicroModal.init({
            onClose: () => {
                const videoPlayers = document.querySelectorAll(".modal__content .video-player");

                videoPlayers.forEach((player) => {
                    const iframe = player.querySelector("iframe");
                    iframe.setAttribute("src", "");
                });
            },
            awaitOpenAnimation: true,
        });
    },

    videoModal: function () {
        const videoLinks = document.querySelectorAll(".js-video-modal");

        videoLinks.forEach((link) => {
            const modalTarget = link.dataset.micromodalTrigger;
            const modal = document.getElementById(modalTarget);
            const videoPlayer = modal.querySelector(".video-player");
            const iframe = videoPlayer.querySelector("iframe");
            const autoplayUrl = videoPlayer.dataset.autoplayUrl;

            link.addEventListener("click", (e) => {
                iframe.setAttribute("src", autoplayUrl);

                e.preventDefault();
            });
        });
    },

    acPlusModal: function () {
        const acPlusLinks = document.querySelectorAll(".js-ac-plus-modal");

        acPlusLinks.forEach((link) => {
            link.addEventListener("click", async (e) => {
                e.preventDefault();

                const slideIndex = link.dataset.slideIndex;
                console.log(slideIndex);

                // Load Swiper only when modal is triggered
                const SwiperClass = await loadSwiper();

                const acPlusSwiper = new SwiperClass(".swiper", {
                    autoplay: false,
                    speed: 600,
                    spaceBetween: 0,
                    initialSlide: parseFloat(slideIndex),
                    grabCursor: true,
                    loop: true,
                    navigation: false,
                    pagination: {
                        el: ".swiper-pagination",
                        type: "bullets",
                        clickable: true,
                    },
                });
            });
        });
    },

    leadershipModal: function () {
        const leadershipLinks = document.querySelectorAll(".js-leader-modal");

        leadershipLinks.forEach((link) => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
            });
        });
    },

    formModals: function () {
        const formLinks = document.querySelectorAll(".js-form-trigger");

        formLinks.forEach((link) => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
            });
        });
    },

    nabModal: function () {
        const modal = document.querySelector("#nab");
        const showModal = localStorage.getItem("showModal");

        if (sessionStorage.nablv2025_pageCount) {
            sessionStorage.nablv2025_pageCount = Number(sessionStorage.nablv2025_pageCount) + 1;
        } else {
            sessionStorage.nablv2025_pageCount = 1;
        }

        if (sessionStorage.nablv2025_pageCount == 1) {
            if (showModal == null) {
                localStorage.setItem("showModal", 1);
                MicroModal.show("nab");
            } else if (showModal >= 1 && showModal <= 5) {
                var visit_count = parseInt(localStorage.getItem("showModal"));
                visit_count++;
                localStorage.setItem("showModal", visit_count);
                MicroModal.show("nab");
            } else {
                var visit_count = parseInt(localStorage.getItem("showModal"));
                visit_count++;
                localStorage.setItem("showModal", visit_count);
            }
        }

        //MicroModal.show("nab");
    },

    homeHeroSwiper: async function () {
        const heroSwiperElement = document.querySelector(".hero-swiper");

        // Only initialize if the hero swiper element exists
        if (!heroSwiperElement) {
            return;
        }

        // Load Swiper only when needed
        const SwiperClass = await loadSwiper();

        // Add a small delay to ensure DOM is stable before initialization
        await new Promise((resolve) => setTimeout(resolve, 100));

        const heroSwiper = new SwiperClass(".hero-swiper", {
            autoplay: {
                delay: 4000,
            },
            speed: 600,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            spaceBetween: 0,
            grabCursor: true,
            loop: true,
            navigation: false,
            pagination: {
                el: ".swiper-pagination",
                type: "bullets",
                clickable: true,
            },
            // Ensure smooth initialization
            observer: true,
            observeParents: true,
        });
    },
    init: function () {
        this.modals();
        this.videoModal();
        this.acPlusModal();
        this.leadershipModal();
        this.formModals();
        this.nabModal();
        this.homeHeroSwiper();
    },
};

export default Modal;
