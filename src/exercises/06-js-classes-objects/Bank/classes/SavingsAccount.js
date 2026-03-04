import BankAccount from "./BankAccount.js";

class SavingsAccount extends BankAccount {

    constructor(num, name, bal, rate) {
        super(num, name, bal);
        this.interestRate = rate;
    }

    toString() {
        rate = this.interestRate * 100;
        return `
        Savings Account: ${this.num}
        Name: ${this.name}
        Balance: €${this.balance}
        Interest Rate: ${this.interestRate}%
        `;
    }
}

export default SavingsAccount;