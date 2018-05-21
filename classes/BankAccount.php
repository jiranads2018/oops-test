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
        $this->withdraw($amount);
        $balance = $amount->value() + $account->balance->value();
        $account->balance = new Money($balance);
    }

    public function withdraw(Money $amount)
    {
    	if($this->balance->value() > $amount->value()){
	    	$balance = $this->balance->value() - $amount->value();
	        return $this->balance = new Money($balance);
    	}else{
    		throw new Exception("Withdrawl amount larger than balance");
    	}
    }
}