const titlePreview = document.getElementById('titlePreview');
const authorPreview = document.getElementById('authorPreview');
const publisherPreview = document.getElementById('publisherPreview');
const yearPreview = document.getElementById('yearPreview');
const isbnPreview = document.getElementById('isbnPreview');
const formatsPreview = document.getElementById('formatsPreview');
const descriptionPreview = document.getElementById('descriptionPreview');
const coverPreview = document.getElementById('coverPreview');

// let titleInput = document.getElementById('title');
// let authorInput = document.getElementById('author');
// let publisherIdInput = document.getElementById('publisher_id');
// let yearInput = document.getElementById('year');
// let isbnInput = document.getElementById('isbn');
// let formatIdsInput = document.getElementsByName('format_ids[]');
// let descriptionInput = document.getElementById('description');
// let coverInput = document.getElementById('cover');

// const input2 = document.getElementById('my_input');
// const button3 = document.getElementById('my_button');
// const output = document.getElementById('output');

// button3.addEventListener('click', () => {
//     const p = document.createElement('p');
//     p.innerHTML = input2.value;
//     output.appendChild(p);
// });

const textInput = document.getElementById('preview_input');
const textPreview = document.getElementById('preview');

function updatePreview(previewElement, text, prefix = '') {
    const trimmed = text.trim();
    let content;

    if (previewElement === titlePreview) {
        content = trimmed === '' ? 'Title' : trimmed;
    } else {
        content = trimmed === '' ? '' : trimmed;
    }

    previewElement.textContent = prefix + content;
    // previewElement.classList.toggle('empty', trimmed === '');
}

titleInput.addEventListener('input', (e) => {
    updatePreview(titlePreview, e.target.value);
});
authorInput.addEventListener('input', (e) => {
    updatePreview(authorPreview, e.target.value, 'Author: ');
});
publisherIdInput.addEventListener('input', (e) => {
    const name = publisherMap[e.target.value] || '';
    updatePreview(publisherPreview, name, 'Publisher: ');
});
yearInput.addEventListener('input', (e) => {
    updatePreview(yearPreview, e.target.value, 'Publishing Year: ');
});
isbnInput.addEventListener('input', (e) => {
    updatePreview(isbnPreview, e.target.value, 'ISBN: ');
});
formatIdsInput.forEach(box => {
    box.addEventListener('input', () => {
        const values = formatIdsInput.filter(i => i.checked).map(i => formatMap[i.value.toString()]).join(', ');
        updatePreview(formatsPreview, values, 'Formats: ');
    });
});
descriptionInput.addEventListener('input', (e) => {
    updatePreview(descriptionPreview, e.target.value, 'Description: ');
});
coverInput.addEventListener('input', (e) => {
    updatePreview(coverPreview, e.target.value);
});

coverInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = event => coverPreview.src = event.target.result;
    reader.readAsDataURL(file);
})