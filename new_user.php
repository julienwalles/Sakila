<?php
require 'request.php';
$conn = pdo_connect_mysql();

if(isset($_POST['create']) && $_POST['password'] === $_POST['confirmPassword']) {

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$username = $_POST['username'];

//aumente la valeur de coût
$options = ['cost' => 10];
//hachage du password
$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT, $options);


$query = "INSERT INTO staff (first_name, last_name, password, username) VALUES(:firstname, :lastname, :password, :username)";
$stmt = $conn->prepare($query); 
$stmt->execute(array(":firstname"=>$firstname,":lastname"=>$lastname, ":password"=>$hashed_password, ":username"=>$username));

if($stmt) {
echo '<script type="text/javascript">alert("Nouvel utilisateur ajouté");
          </script>';
		  header('location: index.php');
}	
}

?>

<?php echo template_index() ?>

<h3>Créer un nouvel utilisateur</h3>

<div class="container">
	<form method="post" action="#"class="row g-3 m-auto">
		<div class="col-2">
			<label for="exampleFormControlInput1" class="form-label">firstname</label>
			<input type="text" class="form-control" name="firstname" id="exampleFormControlInput1" placeholder="firstname">
		</div>

		<br>

		<div class="col-2">
			<label for="exampleFormControlInput2" class="form-label">lastname</label>
			<input type="text" class="form-control" name="lastname" id="exampleFormControlInput2" placeholder="lastname">
		</div>

		<br>

		<div class="col-2">
			<label for="exampleFormControlInput3" class="form-label">login</label>
			<input type="text" class="form-control" name="username" id="exampleFormControlInput3" placeholder="login">
		</div>

		<br>

		<div class="col-2">
			<label for="exampleFormControlInput4" class="form-label">password</label>
			<input type="password" class="form-control" name="password" id="exampleFormControlInput4" placeholder="password">
		</div>

		<br>

		<div class="col-2">
			<label for="exampleFormControlInput5" class="form-label">Confirm password</label>
			<input type="password" class="form-control" name="confirmPassword" id="exampleFormControlInput5" placeholder="password">
		</div>

		<div class="col-4">
			<input type="submit" name="create" value="Créer" class="btn btn-primary">
			<a class="btn btn-primary" href="./index.php" role="button">Retour</a>
		</div>
	</form>
</div>

<?php echo template_footer(); ?>
