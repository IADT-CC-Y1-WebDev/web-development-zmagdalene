class BankAccount {

    constructor(num, name, bal) {
        this.number = num;
        this.name = name;
        this.balance = bal;
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