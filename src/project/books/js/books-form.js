let submitBtn = document.getElementById('submit_btn');
let bookForm = document.getElementById('book_form');
let errorSummaryTop = document.getElementById('error_summary_top');

let titleInput = document.getElementById('title');
let authorInput = document.getElementById('author');
let publisherIdInput = document.getElementById('publisher_id');
let yearInput = document.getElementById('year');
let isbnInput = document.getElementById('isbn');
let formatIdsInput = document.getElementsByName('format_ids[]');
let descriptionInput = document.getElementById('description');
let coverInput = document.getElementById('cover');

let titleError = document.getElementById('title_error');
let authorError = document.getElementById('author_error');
let publisherIdError = document.getElementById('publisher_id_error');
let yearError = document.getElementById('year_error');
let isbnError = document.getElementById('isbn_error');
let formatIdsError = document.getElementById('format_ids_error');
let descriptionError = document.getElementById('description_error');
let coverError = document.getElementById('cover_error');

let errors = {};

submitBtn.addEventListener('click', onSubmitForm);

function addError(fieldName, message) {
    errors[fieldName] = message;
}

function showErrorSummaryTop() {
    let messages = Object.values(errors);
    if (messages.length === 0) {
        errorSummaryTop.style.display = 'none';
        errorSummaryTop.innerHTML = '';
        return;
    }
    errorSummaryTop.innerHTML =
        '<strong>Please Fix The Following:</strong><ul>' + messages.map(function (m) {
            return '<li>' + m + '</li>';
        })
            .join('') + '</ul>';
    errorSummaryTop.style.display = 'block';
}

function showFieldErrors() {
    titleError.innerHTML = errors.title || '';
    authorError.innerHTML = errors.author || '';
    publisherIdError.innerHTML = errors.publisherId || '';
    yearError.innerHTML = errors.year || '';
    isbnError.innerHTML = errors.isbn || '';
    formatIdsError.innerHTML = errors.formatIds || '';
    descriptionError.innerHTML = errors.description || '';
    coverError.innerHTML = errors.cover || '';
}

function isRequired(input) {
    return String(input.value).trim() !== '';
}

function isString(input) {
    const pattern = /^[A-Za-z]+$/;
    return pattern.test(input.value.trim());
}

function isInteger(input) {
    const pattern = /^[0-9]+$/;
    const digitsOnly = input.value.trim().replace(/-/g, '');

    if (input === isbnInput) {
        return pattern.test(digitsOnly);
    }
    return pattern.test(input.value.trim());
}

function isLength(input, len) {
    const digitsOnly = input.value.trim().replace(/-/g, '');

    if (input === isbnInput) {
        return digitsOnly.length === len;
    }
    return String(input.value).trim().length === len;
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

function onSubmitForm(e) {

    e.preventDefault();

    errors = {};

    const titleMin = titleInput.dataset.minlength || 3;
    const titleMax = titleInput.dataset.maxlength || 255;
    const authorMin = authorInput.dataset.minlength || 3;
    const authorMax = authorInput.dataset.maxlength || 255;
    const yearLen = parseInt(yearInput.dataset.length) || 4;
    const isbnLen = parseInt(isbnInput.dataset.length) || 13;
    const descriptionMin = descriptionInput.dataset.minlength || 15;
    const formDataMode = bookForm.dataset.mode;

    if (!isRequired(titleInput)) {
        addError("title", "Title is required.");
    } else if (!isMinlength(titleInput, titleMin)) {
        addError("title", "Title must be at least " + titleMin + " characters.");
    } else if (!isMaxLength(titleInput, titleMax)) {
        addError("title", "Title must not exceed " + titleMax + " characters.");
    }

    if (!isRequired(authorInput)) {
        addError("author", "Author is required");
    } else if (!isString(authorInput)) {
        addError("author", "Author must comprise of letters A-Z.");
    } else if (!isMinlength(authorInput, authorMin)) {
        addError("author", "Author must be at least " + authorMin + " characters.");
    } else if (!isMaxLength(authorInput, authorMax)) {
        addError("author", "Author must not exceed " + authorMax + " characters.");
    }

    if (!isRequired(yearInput)) {
        addError("year", "Year is required.");
    } else if (!isInteger(yearInput)) {
        addError("year", "Year must be an integer.");
    } else if (!isLength(yearInput, yearLen)) {
        addError("year", "Year must be " + yearLen + " characters.");
    }

    if (!isRequired(isbnInput)) {
        addError("isbn", "ISBN is required.");
    } else if (!isInteger(isbnInput)) {
        addError("isbn", "  ISBN must be an integer.");
    } else if (!isLength(isbnInput, isbnLen)) {
        addError("isbn", "ISBN must be " + isbnLen + " characters.");
    }

    if (!isRequired(publisherIdInput)) {
        addError("publisherId", "Publisher is required.");
    }

    if (!isRequired(descriptionInput)) {
        addError("description", "Description is required.");
    } else if (!isMinlength(descriptionInput, descriptionMin)) {
        addError("description", "Description must be at least " + descriptionMin + " characters.");
    }

    if (!isChecked(formatIdsInput)) {
        addError("formatIds", "At least one format must be selected.");
    }

    if (formDataMode === "create") {

        if (!coverInput.files || coverInput.files.length === 0) {
            addError("cover", "Book Cover Image is required.");
        }
    } else if (formDataMode === "edit") {

        if (coverInput.files && coverInput.files.length > 0) {}
    }

    showErrorSummaryTop();
    showFieldErrors();

    if (Object.keys(errors).length === 0) {
        bookForm.submit();
    }
}