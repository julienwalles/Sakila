<?php

require './helpers/Database.php';
require './functions.php';
require './classes/Category.php' ;
require './classes/Film.php' ;

echo template_header('Read'); 

$pdo = new PDO("mysql:dbname=sakila;host=localhost", "root", "secret", [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$currentPage = (int)($_GET['page'] ?? 1);

if($currentPage <= 0)
	{
		throw new Exception('Numérode page invalide');
	}

$count = (int)$pdo->query("SELECT COUNT(film_id) 
						   FROM film")->fetch(PDO::FETCH_NUM)[0];
$perPage = 10;
$pages = ceil($count / $perPage);

if($currentPage > $pages)
	{
		throw new Exception("Cette page n'existe pas");
	}	

$offset = $perPage * ($currentPage - 1);

$query = $pdo->query ("SELECT film.film_id, film.title, film.description, film.release_year, 
					film.special_features, category.name
					FROM film
					LEFT JOIN film_category
					ON film.film_id = film_category.film_id
					LEFT JOIN category
					ON category.category_id = film_category.category_id
					LIMIT $perPage OFFSET $offset");

$films = $query->fetchAll();

?>

<section>
	<div class="container">
		<h1 class="title text-center m-4">LISTE DE DVD</h1>
	</div>
</section>

<section class='content'>
	<div class="container px-4">
		<div class="row gx-5">
			<div class="col-4">
				<div class="p-3 border bg-info">
					<h3>Categories</h3>
					<ol>
						<?php
        $categories = Category::all(); foreach($categories as $category) :  ?>
						<li>
							<a class="link-dark"
								href="filmByCategory.php?id=<?php echo $category["category_id"] ?>"><?php echo $category["name"]; ?></a>
						</li>
						<?php endforeach ; ?>
					</ol>
				</div>
			</div>
			<div class="col-8">
				<div class="p-3 border bg-info">
					<h3>Films</h3>
					<div class="row">
						<?php
        foreach($films as $film) : ?>
						<div class="card" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title"><?php echo $film["title"]?></h5>
								<h6 class="card-subtitle mb-2 text-muted"><?php echo $film["special_features"]?></h6>
								<h6 class="card-subtitle mb-2 text-muted"><?php echo $film["name"]?></h6>
								<p class="card-text"><?php echo $film["description"]?></p>
								<a href="film.show.php?id=<?php echo $film["film_id"] ?> " class="btn btn-secondary">Voir
									plus</a>
							</div>
						</div>
						<?php endforeach ; ?>
					</div>
					<div class="d-flex justify-content-between my-4">
						<?php if($currentPage > 1): ?>
							<?php $link = './index.php';
							if($currentPage > 2) $link .= '?page' . $currentPage - 1; ?>
						<a href="<?= $link ?>" class="btn btn-primary ml-auto"> &laquo; Page
							précédente </a>
						<?php endif ?>

						<?php if($currentPage < $pages): ?>
						<a href="./index.php?page=<?= $currentPage + 1 ?>" class="btn btn-primary ml-auto"> Page suivante &raquo;
						</a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php

echo template_footer('Read'); ?>