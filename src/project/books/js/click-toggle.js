// 08-3: Event delegation on cards
const popup = document.getElementById('overlay');
const confirm = document.getElementById('confirmBtn');
const cancel = document.getElementById('cancelBtn');
const deleteLink = document.querySelector('a.delete');

function visibility(element) {
    element.classList.toggle('hidden');
    element.classList.toggle('flex');

}

function highlight(element) {
    element.classList.toggle('highlight')
}

cardsContainer.addEventListener('click', (e) => {
    const link = e.target.closest('a');
    const title = e.target.closest('.card h2');
    const card = e.target.closest('.card');

    if (!card || !link) return;

    highlight(card);
    activeCard = card;

    if (link.classList.contains("delete")) {
        {
            e.preventDefault();

            setTimeout(() => {
                visibility(popup);
            }, 300)
            return;
        }
    }
    e.preventDefault();

    setTimeout(() => {
        highlight(card);
        window.location.href = link.href;
    }, 300)
});

confirm.addEventListener('click', () => {
    window.location.href = deleteLink.href;
    return;
});

cancel.addEventListener('click', () => {
    highlight(activeCard);
    visibility(popup);
    return;
});
