const title = document.querySelectorAll('p.title');

titleInput.addEventListener('input', () => {
    title.innerHTML = titleInput.value;
    console.log(titleInput.value);
});

// let titleInput = document.getElementById('title');
// let authorInput = document.getElementById('author');
// let publisherIdInput = document.getElementById('publisher_id');
// let yearInput = document.getElementById('year');
// let isbnInput = document.getElementById('isbn');
// let formatIdsInput = document.getElementsByName('format_ids[]');
// let descriptionInput = document.getElementById('description');
// let coverInput = document.getElementById('cover');

const input2 = document.getElementById('my_input');
const button3 = document.getElementById('my_button');
const output = document.getElementById('output');

button3.addEventListener('click', () => {
    const p = document.createElement('p');
    p.innerHTML = input2.value;
    output.appendChild(p);
});