import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js';

const Modal = {
    modals: function () {
        MicroModal.init({
            onClose: () => {
                const videoPlayers = document.querySelectorAll('.modal__content .video-player');

                videoPlayers.forEach((player) => {
                    const iframe = player.querySelector('iframe');
                    iframe.setAttribute('src', '');
                });
            },
            awaitOpenAnimation: true,
            debugMode: true,
        });
    },

    videoModal: function () {
        const videoLinks = document.querySelectorAll('.js-video-modal');

        videoLinks.forEach((link) => {
            const modalTarget = link.dataset.micromodalTrigger;
            const modal = document.getElementById(modalTarget);
            const videoPlayer = modal.querySelector('.video-player');
            const iframe = videoPlayer.querySelector('iframe');
            const autoplayUrl = videoPlayer.dataset.autoplayUrl;

            link.addEventListener('click', (e) => {
                iframe.setAttribute('src', autoplayUrl);

                e.preventDefault();
            });
        });
    },

    acPlusModal: function () {
        const acPlusLinks = document.querySelectorAll('.js-ac-plus-modal');

        acPlusLinks.forEach((link) => {
            link.addEventListener('click', (e) => {
                const slideIndex = link.dataset.slideIndex;
                console.log(slideIndex);

                const acPlusSwiper = new Swiper('.swiper', {
                    autoplay: false,
                    speed: 600,
                    spaceBetween: 0,
                    initialSlide: parseFloat(slideIndex),
                    grabCursor: true,
                    loop: true,
                    navigation: false,
                    pagination: {
                        el: '.swiper-pagination',
                        type: 'bullets',
                        clickable: true,
                    },
                });

                e.preventDefault();
            });
        });
    },

    leadershipModal: function () {
        const leadershipLinks = document.querySelectorAll('.js-leader-modal');

        leadershipLinks.forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
            });
        });
    },

    formModals: function () {
        const formLinks = document.querySelectorAll('.js-form-trigger');

        formLinks.forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
            });
        });
    },

    init: function () {
        this.modals();
        this.videoModal();
        this.acPlusModal();
        this.leadershipModal();
        this.formModals();
    },
};

export default Modal;
