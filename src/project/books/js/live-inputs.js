const titlePreview = document.getElementById('titlePreview');
const authorPreview = document.getElementById('authorPreview');
const publisherPreview = document.getElementById('publisherPreview');
const yearPreview = document.getElementById('yearPreview');
const isbnPreview = document.getElementById('isbnPreview');
const formatsPreview = document.getElementById('formatsPreview');
const descriptionPreview = document.getElementById('descriptionPreview');
const coverPreview = document.getElementById('coverPreview');

const titlePreview2 = document.getElementById('titlePreview2');
const authorPreview2 = document.getElementById('authorPreview2');
const coverPreview2 = document.getElementById('coverPreview2');

const textInput = document.getElementById('preview_input');
const textPreview = document.getElementById('preview');

function updatePreview(previewElement, text, prefix = '') {
    const trimmed = text.trim();
    let content;

    if (previewElement === titlePreview || previewElement === titlePreview2) {
        content = trimmed === '' ? 'Title' : trimmed;
    } else {
        content = trimmed === '' ? '' : trimmed;
    }

    previewElement.textContent = prefix + content;
}

titleInput.addEventListener('input', (e) => {
    updatePreview(titlePreview, e.target.value);
    updatePreview(titlePreview2, e.target.value);
});
authorInput.addEventListener('input', (e) => {
    updatePreview(authorPreview, e.target.value, 'Author: ');
    updatePreview(authorPreview2, e.target.value, 'Author: ');
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
    if (!file) {
        coverPreview.src = 'images/defaultImage';
        coverPreview2.src = 'images/defaultImage';
        return;
    }
    const reader = new FileReader();
    reader.onload = (event) => {
        coverPreview.src = event.target.result;
        coverPreview2.src = event.target.result;
    }
    reader.readAsDataURL(file);
})