<?php

require './helpers/Database.php';
require './functions.php';
require './classes/Category.php' ;
require './classes/Film.php' ;

echo template_header('Read'); 

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
		</div>
	</div>
</section>

<?php

echo template_footer('Read'); ?>