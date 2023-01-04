<?php
require_once("utils/init.php");

if (array_all_keys_exist($_POST, "username", "password", "password-1", "email")) {
//to verify:
//username does not exist
//password and password-1 are the same
//email does not exist 

//if any error ->messages

//if success:
//hash password
//create new user in users.json
//redirect login.php
}
//TODO: állapottartás az inputokra hiba esetén
?>
<?php require("partials/header.php"); ?>

<div class="d-flex justify-content-center">
  <form class="col col-12 col-sm-8 col-lg-6 col-xl-4" method="post" action="login.php" novalidate>
    <h2>Register</h2>

    <div class="my-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" class="form-control" id="username">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>

    <div class="mb-3">
      <label for="password-1" class="form-label">Repeat password</label>
      <input type="password" name="password-1" class="form-control" id="password-1">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="email">
    </div>

    <button type="submit" class="btn btn-primary mb-2">Log in</button>

  </form>
</div>