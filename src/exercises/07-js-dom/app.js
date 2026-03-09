const p = document.createElement('p');
p.innerHTML = 'This is a <strong>paragraph</strong>';
document.body.appendChild(p);

const input = document.getElementById('myInput');

input.addEventListener('input', () => {
    console.log(input.value);
});

const button = document.getElementById('myButton');

button.addEventListener('click', () => {
    const p = document.createElement('p');
    p.innerHTML = 'This is a <strong>paragraph</strong>';
    document.body.appendChild(p);
});

const button2 = document.getElementById('myButton2');

button2.addEventListener('click', addParagraph);

function addParagraph() {
    const p = document.createElement('p');
    p.innerHTML = 'This is a <strong>paragraph2</strong>';
    document.body.appendChild(p);
}

const input2 = document.getElementById('my_input');
const button3 = document.getElementById('my_button');
const output = document.getElementById('output');

button3.addEventListener('click', () => {
    const p = document.createElement('p');
    p.innerHTML = input2.value;
    output.appendChild(p);
});