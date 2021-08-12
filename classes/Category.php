<?php

class Category extends Database{

    public static function all() {
        $categories = self::query('SELECT * FROM category');
        return $categories->fetchAll();
    }
}