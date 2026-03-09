class BankAccount {

    constructor(num, name, bal) {
        this.number = num;
        this.name = name;
        this.balance = bal;
    }

    getBalance() {
        return this.balance;
    }

    deposit(amount) {
        this.balance += amount;
    }

    withdraw(amount) {
        this.balance -= amount;
    }

    toString() {
        return `
        Account: ${this.number}
        Name: ${this.name}
        Balance: €${this.balance} 
        `;
    }
}

export default BankAccount;