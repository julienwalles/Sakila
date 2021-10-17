<?php

class Rental extends Database 
{
    //create a rental
    public static function rent() 
    {
        try 
        {
            $sql = self::query("INSERT INTO rental ( rental_date, staff_id, customer_id, inventory_id) 
                    VALUES ( :rental_date, :staff_id, :customer_id, :inventory_id);");

            $query->execute();
           
            echo "<script> alert(Location effectuée) </script>";
        } 
            catch(PDOException $e) 
            {
                echo 'ERROR: ' . $e->getMessage();
            }
    }
}