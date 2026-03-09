import BankAccount from "./BankAccount.js";

class SavingsAccount extends BankAccount {

    constructor(num, name, bal, rate) {
        super(num, name, bal);
        this.interestRate = rate;
    }

    toString() {
        let rate = this.interestRate * 100;
        return `
        Savings Account: ${this.number}
        Name: ${this.name}
        Balance: €${this.balance}
        Interest Rate: ${rate}%
        `;
    }
}

export default SavingsAccount;