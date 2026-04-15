// 08-3: Event delegation on cards
// const page = document.body.dataset.page;
// const popup = document.getElementById('overlay');
// const confirm = document.getElementById('confirmBtn');
// const cancel = document.getElementById('cancelBtn');
const toggle = document.getElementById('toggle');
const prevCard = document.querySelectorAll('.prevCard');
let clickElement = document.querySelector('#book_cards');

// let activeCard;
// let deleteLink;

function visibility(element) {
    element.classList.toggle('hidden');
    element.classList.toggle('flex');
}

function highlight(element) {
    element.classList.toggle('highlight');
}

// let deleteElement = document.querySelector('.delete');
// let deleteDialog = document.querySelector('#deleteDlg');
// let confirmBtn = document.querySelector('#confirmBtn');
// let cancelBtn = document.querySelector('#cancelBtn');
// let bookTitle = document.querySelector('#dlgBookTitle');

// if (deleteElement !== null && deleteDialog !== null) {
//     let target = null;
//     let card = null;

//     deleteElement.addEventListener('click', function (e) {
//         target = e.target;
//         card = target.closest('.book');

//         let deleteBtn = target.closest('.deleteBtn');

//         if (deleteBtn !== null) {
//             e.preventDefault();
//             bookTitle.innerHTML = card.dataset.title;
//             deleteDialog.showModal();
//         }
//     });

//     confirmBtn.addEventListener('click', function (e) {
//         deleteDialog.close();
//         window.location = target.href;
//     });
//     cancelBtn.addEventListener('click', function (e) {
//         deleteDialog.close();
//         console.log("Cancelled");
//     });
// }
if (clickElement !== null) {
    let target = null;
    let card = null;

    clickElement.addEventListener('click', (e) => {
        target = e.target;
        card = target.closest('.book');

        let link = e.target.closest('a');

        // if (!card || !link) return;

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