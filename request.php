<?php

  function pdo_connect_mysql() {
  $servername = "localhost";
  $username = "root";
  $password = "secret";
  
  session_start ();
  // $connected = NULL;
  
  try {
      $conn = new PDO("mysql:host=$servername;dbname=sakila", $username, $password, );
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Your connection is active";
      

      return $conn;


    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      
    } 
  
  }


/**
 * function permettant de printer la template de header
 */
function template_header($title) {
  echo <<<EOT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>$title</title>
      <link href="style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
      <nav class="navtop">
        <div>
          <h1>BIBLIOTHEQUE NC</h1>
              <a href="biblio.php"><i class="fas fa-home"></i>Home</a>
              <a href="livres_read.php"><i class="fas fa-book"></i>Livres</a>
              <a href="adh_read.php"><i class="fas fa-users"></i>Adhérents</a>
              <a href="emprunt_read.php"><i class="fas fa-check-circle"></i>Emprunts</a>
              <a href="rayons_read.php"><i class="fas fa-book"></i>Rayons</a>
              <a href="./logout.php">Se déconnecter</a>
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
          <p>©$year SAKILA</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      </body>
  </html>
  EOT;
}

function template_index() {
  $year = date("Y");
  echo <<<EOT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      
      <link href="style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
      <nav class="navtop">
        <div>
          <h1>SAKILA</h1>
        </div>
      </nav>
  EOT;
}
?>