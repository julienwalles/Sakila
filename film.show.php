<?php

require './helpers/Database.php';
require './functions.php';
require './classes/Category.php';
require './classes/Film.php';
require './classes/Rental.php';

echo template_header('Read'); ?>

<section>
	<?php $id = $_GET["id"];
				$films = Film::read($id); ?>

	<h1 class="title text-center m-4"><?php echo $films["title"]?></h1>

	<div class="container">
		<div class="row g-0 bg-light position-relative">
			<div class="col-6">
				<img src="./images/image_film.jpg" class="w-100" alt="...">
			</div>
			<div class="col-6 p-4 text-center">
				<h5 class="mt-0 card-title"><?php echo $films["title"]?></h5>
				<h6 class="card-subtitle mb-2 text-muted"><?php echo $films["special_features"]?></h6>
				<h6 class="card-subtitle mb-2 text-muted"><?php echo $film["name"]?></h6>
				<p><?php echo $films["description"]?></p>
				<p>Acteur/Actrice:<?php echo $films["nom"]?></p>
				<p> Année: <?php echo $films["release_year"]?></p>
				<p> Prix: <?php echo $films["rental_rate"]?> €/jour</p>
				<a href="form_emprunt.php?id=<?php echo $films["film_id"] ?> " class="btn btn-primary">Louer ce DVD</a>
				<a href="index.php" class="btn btn-secondary">Retour</a>
			</div>
		</div>
	</div>
</section>

<?php

echo template_footer('Read'); ?>