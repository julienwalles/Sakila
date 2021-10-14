<?php

class Film extends Database 
{
    //get all films
    public static function all() 
    {
        $films = self::query(' SELECT film.film_id, film.title, film.description, film.release_year, 
                                      film.special_features, category.name
                                FROM film
                                LEFT JOIN film_category
                                ON film.film_id = film_category.film_id
                                LEFT JOIN category
                                ON category.category_id = film_category.category_id
                                LIMIT $perPage OFFSET $offset'
                            );

        return $films->fetchAll();
    }

    /************************************************************************************************** */

    //get one film
    public static function read (int $id) 
    {
        $films = self::query(" SELECT film.film_id, film.title, film.description, film.release_year, 
                                      film.special_features, film.rental_rate, CONCAT( actor.first_name, ' ', actor.last_name) AS nom,
                                      inventory.inventory_id, category.name
                                FROM film  
                                LEFT JOIN inventory 
                                ON film.film_id = inventory.film_id
                                LEFT JOIN film_category
                                ON film.film_id = film_category.film_id
                                LEFT JOIN category
                                ON category.category_id = film_category.category_id
                                LEFT JOIN film_actor
                                ON film.film_id = film_actor.film_id
                                LEFT JOIN actor
                                ON actor.actor_id = film_actor.actor_id
                                WHERE film.film_id= $id"
                            );

        return $films->fetch();
    }

    /*************************************************************************************************** */

    //get all films by category
    public static function findByCategory (int $id)
    {
        $films = self::query(" SELECT film.film_id, film.title, film.description, film.release_year, 
                                      film.special_features, category.name
                                FROM film
                                LEFT JOIN film_category
                                ON film.film_id = film_category.film_id
                                LEFT JOIN category
                                ON category.category_id = film_category.category_id
                                WHERE film_category.category_id = $id"
                            );

        return $films->fetchAll();
    }
}