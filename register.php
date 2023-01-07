<?php
require_once("utils/init.php");

if (array_all_keys_exist($_POST, "username", "password", "password-1", "email")) {
//tasks to verify:
//username does not exist
//password and password-1 are the same
//email does not exist
$nameError = false;
foreach($users as $user){
  if($user["username"] === $_POST["username"]){
    $nameError = true;
    break;
  }
}

$emailError = false; 
foreach($users as $user){
  if($user["email"] === $_POST["email"]){
    $emailError = true;
    break;
  }
}

$passwordError = false;
if($_POST["password"] !== $_POST["password-1"]){
  $passwordError = true;
}

//if any error ->messages
if($nameError){
  $messages[] = ["type" => "danger", "text" => "Name is already taken"];
}
if($emailError){
  $messages[] = ["type" => "danger", "text" => "Email is already in use"];
}
if($passwordError){
  $messages[] = ["type" => "danger", "text" => "Passwords do not match"];
}

//if success:
//hash password
//create new user in users.json
//redirect login.php
if(!$nameError && !$emailError && !$passwordError){
  $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);

  $newUser = [
    "id" => uniqid("userid", true),
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "password" => $hash,
    "isAdmin" => false,
  ];
  $c = count($users);
  $users["userId{$c}"] = $newUser;

  save_to_file("data/users.json", $users);

  redirect("login.php");
}

}
?>
<?php require("partials/header.php"); ?>
<div class="d-flex justify-content-center">
  <form class="col col-12 col-sm-8 col-lg-6 col-xl-4" method="post" action="register.php" novalidate>
    <h2>Register</h2>

    <div class="my-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" class="form-control" id="username"  value="<?= $_POST["username"] ?? ''?>">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password" value="<?= $_POST["password"] ?? ''?>">
    </div>

    <div class="mb-3">
      <label for="password-1" class="form-label">Repeat password</label>
      <input type="password" name="password-1" class="form-control" id="password-1" value="<?= $_POST["password-1"] ?? ''?>">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="email" value="<?= $_POST["email"] ?? ''?>">
    </div>

    <button type="submit" class="btn btn-primary mb-2">Register</button>

  </form>
</div>

<?php require("partials/footer.php"); ?>