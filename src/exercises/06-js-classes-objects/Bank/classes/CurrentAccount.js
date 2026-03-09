import BankAccount from "./BankAccount.js";

class CurrentAccount extends BankAccount {

    transactionCount = 0;

    deposit(amount) {
        this.transactionCount++;
        super.deposit(amount);
    }

    withdraw(amount) {
        this.transactionCount++;
        super.withdraw(amount);
    }

    getTransactionCount() {
        return this.transactionCount;
    }
}

export default CurrentAccount;