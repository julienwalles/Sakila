<?php

class Category extends Database
{
    //get all categories
    public static function all() 
    {
        $categories = self::query('SELECT * FROM category');

        return $categories->fetchAll();
    }
}