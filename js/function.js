document.addEventListener('DOMContentLoaded', function () {
    const allStar = document.querySelectorAll('.rating .star');

    allStar.forEach((item, idx) => {
        item.addEventListener('click', function () {
            allStar.forEach(i => {
                i.classList.remove('bx-star');
                i.classList.add('bxs-star');
            });
            for (let j = allStar.length - 1; j > idx; j--) {
                allStar[j].classList.remove('bxs-star');
                allStar[j].classList.add('bx-star');
            }
        });
    });
});
