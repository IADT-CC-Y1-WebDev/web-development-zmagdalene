// 08-3: Event delegation on cards
// const popup = document.getElementById('overlay');
// const confirm = document.getElementById('confirmBtn');
// const cancel = document.getElementById('cancelBtn');

// const allCards = document.querySelectorAll('.card');
// const link = allCards.querySelectorAll('a');
// const deleteLink = link.querySelector('.delete a')

// popup.classList.add('hidden');

// allCards.querySelectorAll('.card').forEach(card => {

//     if (!card || !link) return;

//     card.classList.add('highlight');

//     if (link.classList.contains("delete")) {
//         {
//             e.preventDefault();

//             setTimeout(() => {
//                 popup.classList.remove('hidden');
//                 popup.classList.add('flex');
//                 card.classList.remove('highlight');
//             }, 300)
//             return;
//         }
//     }
//     e.preventDefault();

//     setTimeout(() => {
//         card.classList.remove('highlight');
//         window.location.href = link.href;
//     }, 300)


// });

// // cardsContainer.addEventListener('click', (e) => {
// //     const link = e.target.closest('a');
// //     const title = e.target.closest('.card h2');
// //     const card = e.target.closest('.card');

// //     if (!card || !link) return;

// //     card.classList.add('highlight');


// //     if (link.classList.contains("delete")) {
// //         {
// //             e.preventDefault();

// //             setTimeout(() => {
// //                 popup.classList.remove('hidden');
// //                 popup.classList.add('flex');
// //                 card.classList.remove('highlight');
// //             }, 300)
// //             return;
// //         }
// //     }
// //     e.preventDefault();

// //     setTimeout(() => {
// //         card.classList.remove('highlight');
// //         window.location.href = link.href;
// //     }, 300)
// // });

// confirm.addEventListener('click', () => {
//     window.location.href = deleteLink.href;
//     // popup.classList.add('hidden');
//     // popup.classList.remove('flex');
//     return;
// });

// cancel.addEventListener('click', () => {
//     popup.classList.add('hidden');
//     popup.classList.remove('flex');
//     return;
// });
