let message = "Hello World";
console.log(message);

console.log("---Function timesTwo---");
function timesTwo(inputNumber) {
    return inputNumber * 2;
}
console.log(timesTwo(10));

console.log("---Function Square---");
function square(num) {
    return num * num;
}
console.log(square(5));

console.log("---Function Square Refactor---");
const square2 = num => num * num;
console.log(square2(6));

console.log("---Function logDateTime---");
const logDateTime = () => console.log(new Date());
console.log(logDateTime());

console.log("---Function isGreaterThan---");
const isGreaterThan = (numberOne, numberTwo) => numberOne > numberTwo ? true : false;
console.log(isGreaterThan(6, 2))

console.log("---Function Multiply---");
const multiply = (a, b = 1) => a * b;
console.log(multiply(5, 3));
console.log(multiply(5, 2));
console.log(multiply(5, 1));
console.log(multiply(5));

console.log("---Function setTimeout---");
setTimeout(() => {
    console.log("5 seconds have elapsed!");
}, 5000);
setTimeout(5000);

console.log("---Function combinedLength---");
const combinedLength = (str1, str2) => console.log(str1.length + str2.length);
combinedLength("Hi", "You");

console.log("---Array Exampples---");
const colors = ["red", "orange", "yellow", "green", "blue", "violet"]; //create array with values
const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]; //create array with values

console.log(colors.join()); //outputs all values of the array separated by a ','
console.log(colors.reverse()); //reverses order of values in array
console.log(colors.sort()); //arranges in alphabetical order
console.log(colors.concat(days)); //joins two arrays together
console.log(colors.slice(0, 3)); //returns a part of the array from index (x to y) -> (0 , 3)
colors.splice(6, 0, "Indigo"); //adds value(s) into index x and deletes amount y (6, 0, "values")
console.log(colors);
colors.push("pink"); //inserts new value into last index in array
console.log(colors);
colors.pop(); // deletes the value of last index in array
console.log(colors);
colors.unshift("purple"); // inserts value into first index in array
console.log(colors);
colors.shift(); //shifts index values back by 1 and deletes first value in array
console.log(colors);
console.log(colors.toString()); //converts array to string values


console.log("---forEach str---");
let str = ['Thinking in JS', 'JS Patterns', 'JS: The Good Parts', 'ES6 and Beyond'];

console.log("I need to read " + str[str.length - 1]);
str.forEach((strElement) => console.log(`I need to read ${strElement}`));

console.log("---Function squareAndFilterEven---");
function squareAndFilterEven(numbers) {
    answers = [];

    numbers.forEach(num => {
        if (num % 2 === 0) {
            answers.push(num * num);
        }
    });
    return answers;
}
console.log(squareAndFilterEven([3, 6, 7, 2, 4]));

console.log("---Function countAboveThreshold---");
function countAboveThreshold(numbers, threshold) {
    answers = [];
    numbers.forEach(num => {
        if (num > threshold) {
            answers.push(num);
        }
    });
    return answers.length;
}
console.log(countAboveThreshold([10, 15, 25, 30, 5, 40], 20));

console.log("---Function reverseWords---");
function reverseWords(words) {
    reverseWords = [];
    words.forEach(words => {
        reverseWords.push(words.split('').reverse().join('') + " ");
    });
    return reverseWords;
}
console.log(reverseWords(["hello", "world"]));

console.log("___OBJECTS___");
console.log("---user object---");
let user = {
    firstName: "John",
    lastName: "Jones",
    age: 25,
    hobbbies: ["Gym", "Movies"],
    friends: [
        {
            firstName: "Tim",
            lastName: "Murphy",
            age: 32
        }
    ],
    getFriends() {
        return this.friends;
    }
};

console.log(user.firstName + " " + user.lastName);
console.log(user.getFriends());