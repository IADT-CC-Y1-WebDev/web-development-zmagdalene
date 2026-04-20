const titlePreview = document.getElementById('titlePreview');
const authorPreview = document.getElementById('authorPreview');
const publisherPreview = document.getElementById('publisherPreview');
const yearPreview = document.getElementById('yearPreview');
const isbnPreview = document.getElementById('isbnPreview');
const formatsPreview = document.getElementById('formatsPreview');
const descriptionPreview = document.getElementById('descriptionPreview');
const coverPreview = document.getElementById('coverPreview');

const formatMap = json_encode(array_column($prevFormats, 'name', 'id'));
const publisherMap = json_encode(array_column($prevPublishers, 'name', 'id'));

let inputs = [titleInput, authorInput, publisherIdInput, yearInput, isbnInput, formatIdsInput, descriptionInput, coverInput];

let previews = [titlePreview, authorPreview, publisherPreview, yearPreview, isbnPreview, formatsPreview, descriptionPreview, coverPreview];

titleInput.addEventListener('input', () => {
    title.innerHTML = titleInput.value;
});

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

function updatePreview(previewElement, text, prefix) {
    const trimmed = text.trim();

    if (trimmed === '') {
        previewElement.textContent = '(nothing yet)';
        previewElement.classList.add('empty');
    } else {
        previewElement.textContent = trimmed;
        previewElement.classList.remove('empty');
    }
}

inputs.forEach((input, index) => {
    const preview = previews[index];

    if (Array.isArray(input)) {
        input.forEach(box => {
            box.addEventListener('input', () => {
                const values = input.filter(i => i.checked).map(i => formatMap[i.value]).join(', ');
                updatePreview(preview, values);
            })
        })
    } else {
        input.addEventListener('input', e => updatePreview(preview, e.target.value));
    }
});

// inputs.forEach(input => {
//     input.addEventListener('input', (e) => {
//         updatePreview(titlePreview, e.target.value);
//         updatePreview(authorPreview, e.target.value);
//         updatePreview(publisherPreview, e.target.value);
//         updatePreview(yearPreview, e.target.value);
//         updatePreview(isbnPreview, e.target.value);
//         updatePreview(formatsPreview, e.target.value);
//         updatePreview(coverPreview, e.target.value);
//     });
// })
