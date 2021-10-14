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
						   FROM film_category")->fetch(PDO::FETCH_NUM)[0];
$perPage = 10;
$pages = ceil($count / $perPage);

if($currentPage > $pages)
	{
		throw new Exception("Cette page n'existe pas");
	}	

$offset = $perPage * ($currentPage - 1);
$query = $pdo->query(" SELECT film.film_id, film.title, film.description, film.release_year, 
						film.special_features, category.name
						FROM film
						LEFT JOIN film_category
						ON film.film_id = film_category.film_id
						LEFT JOIN category
						ON category.category_id = film_category.category_id
						WHERE film_category.category_id = $id");

$films = $query->fetchAll();

?>

<section>
	<div class="container">
		<h1 class="title text-center m-4">LISTE DE DVD</h1>
	</div>
</section>

<section>
	<div class="container px-4">
		<div class="row gx-5">
			<div class="col-4">
				<div class="p-3 border bg-info">
					<h3>Categories</h3>
					<ol>
						<?php
        $categories = Category::all(); foreach($categories as $category) :  ?>
						<li>
							<a class="link-dark" href="filmByCategory.php?id=<?php echo $category["category_id"] ?>"><?php echo $category["name"]; ?></a>
						</li>
						<?php endforeach ; ?>
					</ol>
				</div>
			</div>
			<div class="col-8">
				<div class="p-3 border bg-info">
					<h3>Films</h3>
					<div class="row">
						<?php $id = $_GET["id"];
        $films = Film::findByCategory($id); foreach($films as $film) : ?>
						<div class="card col-5 ">
							<div class="card-body">
								<h5 class="card-title"><?php echo $film["title"]?></h5>
								<h6 class="card-subtitle mb-2 text-muted"><?php echo $film["special_features"]?></h6>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $film["name"]?></h6>
								<p class="card-text"><?php echo $film["description"]?></p>
								<a href="film.show.php?id=<?php echo $film["film_id"] ?> " class="card-link">Voir plus</a>
							</div>
						</div>
						<?php endforeach ; ?>
					</div>
				</div>
			</div>

			<nav>
				<ul class="pagination">
					<li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
						<a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
					</li>
					<?php for($page = 1; $page <= $pages; $page++): ?>
					<li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
						<a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
					</li>
					<?php endfor ?>
					<li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
						<a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</section>

<?php

echo template_footer('Read'); ?>