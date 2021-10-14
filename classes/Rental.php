<?php

class Rental extends Database 
{
    //create a rental
    public static function rent() 
    {
        try 
        {
            $sql = "INSERT INTO rental (film_id, rental_date, staff_id, customer_id, inventory_id) 
                    VALUES (:film_id, :rental_date, :staff_id, :customer_id, :inventory_id);";

            $query = $db->prepare($sql);

            $query->bindValue(':film_id', $film_id, PDO::PARAM_INT);
            $query->bindValue(':rental_date', $rental_date, PDO::PARAM_STR);
            $query->bindValue(':staff_id', $staff_id, PDO::PARAM_INT);
            $query->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
            $query->bindValue(':inventory_id', $inventory_id, PDO::PARAM_INT);

            $query->execute();
        } 
            catch(PDOException $e) 
            {
                echo 'ERROR: ' . $e->getMessage();
            }
    }
}