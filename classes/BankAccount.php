<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
    	$balance = $this->balance->value() + $amount->value();
        return $this->balance = new Money($balance);
    }

    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
    }

    public function withdraw(Money $amount)
    {
        //implement this method
    }
}