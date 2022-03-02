const Utilities = {
    print() {
        const printLinks = document.querySelectorAll('.js-print-link');
        printLinks.forEach((printLink) => {
            printLink.addEventListener('click', (e) => {
                window.print();

                e.preventDefault();
            });
        });
    },

    init: function () {
        this.print();
    },
};

export default Utilities;
