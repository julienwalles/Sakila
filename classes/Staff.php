<?php

class Staff extends Database
{
    // get all staff
    public static function all() {
        $staffs = self::query('SELECT * FROM staff');
        return $staffs->fetchAll();
    }
}