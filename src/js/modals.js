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

    init: function () {
        this.modals();
        this.videoModal();
    },
};

export default Modal;
