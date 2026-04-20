const toggle = document.getElementById('toggle');
const prevCard = document.querySelectorAll('.prevCard');
let clickElement = document.querySelector('#book_cards');

function visibility(element) {
    element.classList.toggle('hidden');
    element.classList.toggle('flex');
}

function highlight(element) {
    element.classList.toggle('highlight');
}

if (clickElement !== null) {
    let target = null;
    let card = null;

    clickElement.addEventListener('click', (e) => {
        target = e.target;
        card = target.closest('.book');

        let link = e.target.closest('a');
        highlight(card);

        if (card !== null && link !== null && !link.classList.contains('deleteBtn')) {
            e.preventDefault();
            highlight(card);

            setTimeout(() => {
                window.location.href = link.href;
            }, 300);
        }
    });
}

function selected(element) {
    element.classList.toggle('selected');
}

if (toggle !== null) {
    toggle.addEventListener('click', () => {
        toggle.querySelectorAll('.toggleBtn').forEach(button => {
            selected(button);
        })
        prevCard.forEach(card => {
            visibility(card);
        })
    })
}