<?php

require './helpers/Database.php';
require './functions.php';
require './classes/Category.php' ;
require './classes/Film.php' ;

echo template_header('Read'); ?>

<section>
			<div class="col-8">
				<div class="p-3 border bg-info">
					<h3>Films</h3>
					<div class="row">
					<?php $film = Film::read($id);?>
				<div class="card" style="width: 18rem;">
					<div class="card-body">
						<h5 class="card-title"><?php echo $film["title"]?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?php echo $film["special_features"]?></h6>
						<p class="card-text"><?php echo $film["description"]?></p>
						<a href="film.php" class="card-link">Retour</a>
						<a href="#" class="card-link">Another link</a>
					</div>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>
