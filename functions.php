<?php

function template_header($title) {
  echo <<<EOT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>$title</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link href="style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    </head>
    <body>
      <nav class="navtop">
        <div>
          <h1></h1>
              <a href="auth_read.php">Home</a>
              <a href="rayon.php">Rayon</a>
          
              <a href="catalogue_r.php">Catalogue</a>
              
              <a href="">Emprunts</a>
            
              <a href="adherent.php">Adhérents</a>
              
        </div>
      </nav>
  EOT;
}


/**
 * function permettant de printer la template de footer
 */
function template_footer() {
  $year = date("Y");
  echo <<<EOT
        <footer>
          <p>©$year Sakila.NC</p>
        </footer>
      </body>
  </html>
  EOT;
}
?>