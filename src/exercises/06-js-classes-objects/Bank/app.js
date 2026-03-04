import BankAccount from "./classes/BankAccount.js";
import SavingsAccount from "./classes/BankAccount.js";

let bankAccount1 = new BankAccount('012345', 'John Doe', 2587.04);
let savingsAccount1 = new SavingsAccount('098765', 'Jane Doe', '14691.79', '2.56');

console.log(`${bankAccount1}`);
console.log(`${savingsAccount1}`);