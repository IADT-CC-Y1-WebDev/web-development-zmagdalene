// 08-3: Event delegation on cards
const page = document.body.dataset.page;
const cardsContainer = document.getElementById('book_cards');
const popup = document.getElementById('overlay');
const confirm = document.getElementById('confirmBtn');
const cancel = document.getElementById('cancelBtn');
let activeCard;
let deleteLink;

function visibility(element) {
    element.classList.toggle('hidden');
    element.classList.toggle('flex');
}

function highlight(element) {
    element.classList.toggle('highlight');
}

if (page === "book_list.php" || page === "book_view.php") {

    cardsContainer.addEventListener('click', (e) => {
        const link = e.target.closest('a');
        let card;

        if (page === "book_list.php") {
            card = e.target.closest('.card')
        } else if (page === "book_view.php") {
            card = e.target.closest('.hCard');
        }

        if (!card || !link) return;

        highlight(card);
        activeCard = card;

        if (link.classList.contains("delete")) {
            {
                e.preventDefault();

                const bookId = link.dataset.bookId;
                const bookTitle = link.dataset.bookTitle;
                deleteLink = link;

                setTimeout(() => {
                    visibility(popup);
                }, 300);

                popup.querySelector('.bookTitle').textContent = bookTitle;
                return;
            }
        }
        e.preventDefault();

        setTimeout(() => {
            highlight(card);
            window.location.href = link.href;
        }, 300);
    });

    confirm.addEventListener('click', () => {
        if (!deleteLink) return;
        setTimeout(() => {
            window.location.href = deleteLink.href;
        }, 300);
        return;
    });

    cancel.addEventListener('click', () => {
        highlight(activeCard);
        visibility(popup);
        return;
    });
}
