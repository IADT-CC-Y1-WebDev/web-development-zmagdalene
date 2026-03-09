import BankAccount from "./classes/BankAccount.js";
import SavingsAccount from "./classes/SavingsAccount.js";
import CurrrentAccount from "./classes/CurrentAccount.js";

let bankAccount1 = new BankAccount('012345', 'John Doe', 2587.04);
let savingsAccount1 = new SavingsAccount('098765', 'Jane Doe', '14691.79', '0.02');
let currentAccount = new CurrrentAccount('023467', 'Jolly Ollie', 160);

currentAccount.deposit(50.00);
currentAccount.withdraw(20.00);
currentAccount.deposit(30.00);

console.log(`${bankAccount1}`);
console.log(`${savingsAccount1}`);
console.log(`${currentAccount}`);
console.log(`Balance: €${currentAccount.getBalance()}`);
console.log(`Transactions: ${currentAccount.getTransactionCount()}`);