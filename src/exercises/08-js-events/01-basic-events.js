const toggleBtn = document.getElementById('toggle_box_btn');
const toggleBox = document.getElementById('box');

const textInput = document.getElementById('preview_input');
const textPreview = document.getElementById('preview');

function hide(element) {
    if (!element.classList.contains('hidden')) {
        element.classList.add('hidden');
    }
    if (element.classList.contains('flex')) {
        element.classList.remove('flex');
    }
}

function show(element) {
    if (!element.classList.contains('flex')) {
        element.classList.add('flex');
    }
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
    }
}

function toggleVisibility(element) {
    element.classList.toggle('hidden');
}

function updatePreview(previewElement, text) {
    const trimmed = text.trim();

    if (trimmed === '') {
        previewElement.textContent = '(nothing yet)';
        previewElement.classList.add('empty');
    } else {
        previewElement.textContent = trimmed;
        previewElement.classList.remove('empty');
    }
}

toggleBtn.addEventListener('click', () => {
    toggleVisibility(box);
});

textInput.addEventListener('input', (e) => [
    updatePreview(textPreview, e.target.value)
]);