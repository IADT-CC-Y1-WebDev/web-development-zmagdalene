import Car from "./classes/Car.js";

let bmw = new Car('BMW', '5 Series', 2025, 'Green');
console.log(`${bmw}`);

let volkswagen = new Car('Volkswagen', 'S Series', '2024', 'Blue');
volkswagen.extras.push('bluetooth speaker', 'cooling fan');
let mercedes = new Car('Mercedez-Benz', 'Series X', '2026', 'Red');
mercedes.extras.push('dynamic heating', 'touchscreen');
let porsche = new Car('Porsche', '6 Series', '2023', 'Grey');
porsche.extras.push('self-driving feature', 'camera sensors')

const myCarCollection = [volkswagen, mercedes, porsche];

myCarCollection.forEach(car => {
    console.log(`Extras for ${car.make} ${car.model}:`, car.getExtras());
}
);


