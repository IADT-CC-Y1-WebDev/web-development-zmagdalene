// 08-3: Event delegation on cards

cardsContainer.addEventListener('click', (e) => {
    const card = e.target.closest('.card');
    const link = e.target.closest('a');
    const title = e.target.closest('.card h2');

    if (!card || !link) return;

    card.classList.add('highlight')


    if (link.classList.contains("delete")) {
        if (!confirm("Are you sure you want to delete this book?")) {
            e.preventDefault();
            card.classList.remove('highlight');
            return;
        }
        return;
    }

    e.preventDefault();

    setTimeout(() => {
        card.classList.remove('highlight');
        window.location.href = link.href;
    }, 300)
});
