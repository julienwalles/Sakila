<?php

class Film extends Database{

    public static function all() {
        $films = self::query('SELECT * FROM film');
        return $films->fetchAll();
    }

    public static function read($id) {
        $film = self::query("SELECT * FROM film WHERE film_id=$id");
        return $film->fetch();
    }
}