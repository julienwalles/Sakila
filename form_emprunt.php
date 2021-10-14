<?php

require './helpers/Database.php';
require './functions.php';
require './classes/Category.php' ;
require './classes/Film.php' ;
require './classes/Staff.php' ;
require './classes/Customer.php' ;
require './classes/Rental.php' ;

echo template_header('Read');
?>

<section>
    <div class="container">
        <div class="row">
            <h1> Formulaire de location </h1>
            <form method="POST" action="#">
                <div class="row">
                    <div class="col-3">
                        <label for="customer" class="form-label">Customer</label>
                        <select class="form-select" aria-label="Default select example">
                            <?php
                $customers = Customer::all(); foreach($customers as $customer) : ?>
                            <option name="customer_id" value="<?php echo $customer["customer_id"] ?>"><?php echo $customer["first_name"]. ' '.$customer["last_name"] ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </div>

                    <div class="col-3">
                        <?php $id = $_GET["id"];
				$films = Film::read($id); ?>
                        <label for="film" class="form-label">Film</label>
                        <input type="text" name='inventory_id' class="form-control" id="film" value="<?php echo $films['title'] ?>" disabled>
                    </div>

                    <div class="col-4">
                        <label for="rental_date" class="form-label">Date d'emprunt</label>
                        <input type="date" class="form-control" id="rental_date" name='rental_date'placeholder="Date d'emprunt">
                    </div>

                    <!--<div class="col-6">
                        <label for="return_return" class="form-label">Date de retour prévue</label>
                        <input type="date" class="form-control" id="return_date" name='return_date' placeholder="Date d'emprunt">
                    </div> -->

                    <div class="col-3">

                        <label for="staff_id" class="form-label">Staff</label>
                        <select class="form-select" aria-label="Default select example">
                            <?php
                    $staffs = Staff::all(); foreach($staffs as $staff) : ?>
                            <option name='staff_id' value="<?php echo $staff["staff_id"] ?>"><?php echo $staff["first_name"] ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </div>

                    <div class="col-3">                
                        <label for="film" class="form-label">Prix/jour (€)</label>
                        <input type="text" name='inventory_id' class="form-control" id="film" value="<?php echo $films['rental_rate'] ?>" disabled>
                    </div>

                    <div class="row">
                        <div class="btn-group col-4" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-primary">Louer</button>
                            <a href="./index.php" class="btn btn-secondary">Retour</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    
</script>