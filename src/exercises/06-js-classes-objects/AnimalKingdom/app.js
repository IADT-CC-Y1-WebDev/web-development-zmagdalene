import Cat from "./classes/Cat.js";
import Dog from "./classes/Dog.js";
import Lion from "./classes/Lion.js";
import Wolf from "./classes/Wolf.js";

let cat1 = new Cat('Tom', 2);
let dog1 = new Dog('Angela', 5)
let lion1 = new Lion('Zeus', 3)
let wolf1 = new Wolf('Nila', 6)

let animals = [cat1, dog1, lion1, wolf1];

animals.forEach((animal) => {
    animal.makeNoise();
    animal.roam();
    animal.sleep();
})

console.log("========================================");

// cat1.makeNoise();
// cat1.roam();
// cat1.sleep();

// dog1.makeNoise();
// dog1.roam();
// dog1.sleep();

// lion1.makeNoise();
// lion1.roam();
// lion1.sleep();

// wolf1.makeNoise();
// wolf1.roam();
// wolf1.sleep();