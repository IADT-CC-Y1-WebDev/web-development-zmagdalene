let submitBtn = document.getElementById('submit_btn');
let bookForm = document.getElementById('book_form');
let errorSummaryTop = document.getElementById('error_summary_top');

let titleInput = document.getElementById('title');
let authorInput = document.getElementById('author');
let yearInput = document.getElementById('year');
let publisherIdInput = document.getElementById('publisher_id');
let descriptionInput = document.getElementById('description');
let formatIdsInput = document.getElementsByName('format_ids[]');
let imageInput = document.getElementById('image');

let titleError = document.getElementById('title_error');
let authorError = document.getElementById('author_error');
let yearError = document.getElementById('year_error');
let publisherIdError = document.getElementById('publisher_id_error');
let descriptionError = document.getElementById('description_error');
let formatIdsError = document.getElementById('format_ids_error');
let imageError = document.getElementById('image_error');

submitBtn.addEventListener('click', onSubmitForm);

let errors = {};

function addError(fieldName, message) {
    errors[fieldName] = message;
}

function isRequired(input) {
    return String(input.value).trim() !== '';
}

function isMinlength(input, min) {
    return String(input.value).trim().length >= min;
}

function isMaxLength(input, max) {
    return String(input.value).trim().length <= max;
}

function isChecked(input) {
    for (let i = 0; i < input.length; i++) {
        if (input[i].checked) {
            return true;
        }
    }
    return false;
}

function showFieldErrors() {
    titleError.innerHTML = errors.title || '';
    authorError.innerHTML = errors.author || '';
    yearError.innerHTML = errors.year || '';
    publisherIdError.innerHTML = errors.publisherId || '';
    descriptionError.innerHTML = errors.description || '';
    formatIdsError.innerHTML = errors.formatIds || '';
    imageError.innerHTML = errors.image || '';
}

function onSubmitForm(e) {

    e.preventDefault();

    errors = {};

    const titleMin = titleInput.dataset.minlength || 3;
    const titleMax = titleInput.dataset.maxlength || 255;
    const authorMin = authorInput.dataset.minlength || 3;
    const authorMax = authorInput.dataset.maxlength || 255;
    const yearMin = yearInput.dataset.minlength || 4;
    const yearMax = yearInput.dataset.minlength || 4;
    const descriptionMin = descriptionInput.dataset.minlength || 15;

    if (!isRequired(titleInput)) {
        addError("title", "Title is required");
    } else if (!isMinlength(titleInput, titleMin)) {
        addError("title", "Title must be at least 3 characters");
    } else if (!isMaxLength(titleInput, titleMax)) {
        addError("title", "Title must not exceed 255 characters")
    }
    if (!isRequired(authorInput)) {
        addError("author", "Author is required");
    } else if (!isMinlength(authorInput, authorMin)) {
        addError("author", "Author must be at least 3 characters");
    } else if (!isMaxLength(authorInput, authorMax)) {
        addError("author", "Author must not exceed 255 characters")
    }
    if (!isRequired(yearInput)) {
        addError("year", "Year is required");
    } else if (!isMinlength(yearInput, yearMin)) {
        addError("year", "Year must be 4 characters");
    } else if (!isMaxLength(yearInput, yearMax)) {
        addError("year", "Year be 4 characters")
    }
    if (!isRequired(publisherIdInput)) {
        addError("publisherId", "Publisher is required");
    }
    if (!isRequired(descriptionInput)) {
        addError("description", "Description is required");
    } else if (!isMinlength(descriptionInput, descriptionMin)) {
        addError("description", "Description must be at least 15 characters");
    }
    if (!isChecked(formatIdsInput)) {
        addError("formatIds", "At least one format(s) must be selected");
    }

    if (!imageInput.files || imageInput.files.length === 0) {
        addError("image", "Image is required");
    }

    showFieldErrors();

    if (Object.keys(errors).length === 0) {
        alert('Book Stored Successfully!');
    }
}