<?php

class Customer extends Database 
{
    //get all customers
    public static function all() 
    {
        $customers = self::query("SELECT * FROM customer");

        return $customers->fetchAll();
    }
}