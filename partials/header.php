
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="index.css" rel="stylesheet">
  <title>Szavazás</title>
  <style>
    <?php include 'index.css'; ?>
</style>
</head>

<body class="h-100 d-flex flex-column">
  <header class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <div class="navbar-brand ms-3">
        <a href="index.php"><img src="resources/monkey_logo.jpg" alt="Brand logo"></a>
      </div>
      <div class="navbar-nav">
        <?php if (is_user_logged_in()) : ?>
          <div class="nav-item"> 
            <a href="createpoll.php" class="nav-link">Create poll</a>
          </div>
        <?php endif; ?>

        <div class="nav-item">
          <?php if (is_user_logged_in()) : ?>
            <a href="logout.php" class="nav-link">Log out</a>
          <?php else: ?>
            <a href="login.php" class="nav-link">Log in</a>
          <?php endif; ?>
        </div>
        <div class="nav-item">
            <a href="register.php" class="nav-link">Register</a>
        </div>
      </div>
    </div>
  </header>