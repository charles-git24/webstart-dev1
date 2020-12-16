<?php
  require_once('header.php');
  require_once('inc/functions.php');

  $registered_emails = [
    'admin@exemple.com' => '$2y$10$IchHWehjTW53NSXCvoiHNuoI55uPhA6EPvQP7.LO7pOdrkKaHLQx2'
  , 'toto@test.com' => '$2y$10$.dx3hV2QolmLEgeAhMcu9uNtalis/iwhx7lWlmTWcmJoPZbO9/RwK'
  ];

  // tableau des erreurs du formulaire
  $form_errors = [];

  // TODO : Validation du formulaire d'inscription
  if (post('action') === "register") {
    // Validation de l'inscription

    // Validation de l'email
    $form_email = trim(post('email'));
    if (empty($form_email)) {
      $form_errors['email'] = "L'email ne doit pas être vide";
    } elseif (!filter_var($form_email, FILTER_VALIDATE_EMAIL)) {
      $form_errors['email'] = "L'email est invalide";
    } else {
      // TODO test en base de donnée
      // version simplifiée avec un tableau
      if (in_array($form_email, array_keys($registered_emails))) {
        $form_errors['email'] = "L'email existe déjà";
      }
    }

    // Validation du mot de passe
    $form_password = post('password');
    $form_confirmPassword = post('confirmPassword');
    if (empty($form_password)) {
      $form_errors['password'] = "le mot de passe ne doit pas être vide";
    } elseif (empty($form_confirmPassword)) {
      $form_errors['confirmPassword'] = "la confirmation du mot de passe ne doit pas être vide";
    } elseif ($form_password !== $form_confirmPassword) {
      $form_errors['confirmPassword'] = "Les mots de passe sont différents";
    } elseif (strlen($form_password) < 8) {
      $form_errors['password'] = "le mot de passe doit faire au moins 8 caractères";
    }
    else {
      // TODO hasher le mot de passe
      $hash_password = password_hash($form_password, PASSWORD_DEFAULT);
      var_dump($hash_password);
    }

  }

  // Validation du formulaire de connexion
  if (post('action') === "login") {
    $form_login_email = post('login_email');
    $form_login_password = post('login_password');
    if (!in_array($form_login_email, array_keys($registered_emails))) {
      $form_errors['login_email'] = 'Cet email est inconnu';
    } elseif (!password_verify($form_login_password, $registered_emails[$form_login_email])) {
      $form_errors['login_email'] = 'Erreur de mot de passe';
    } else {
      // TODO redirection vers une autre page
      echo '<h1>Vous êtes connecté</h1>';
    }
  }

?>

<div class="container">
  <form action="" method="post">
    <input type="hidden" name="action" value="register">
    <div class="form-group">
      <label for="id_email">Email :</label>
      <input type="text" id="id_email" name="email" class="<?php echo isset($form_errors['email']) ? "invalid" : ''; ?>" value="<?php echo $form_email; ?>"/>
      <?php if (isset($form_errors['email'])) : ?>
        <div class="invalid-feedback">
          <?php echo $form_errors['email']; ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <label for="id_password">Mot de passe :</label>
      <input type="password" id="id_password" name="password" class="<?php echo isset($form_errors['password']) ? "invalid" : ''; ?>"/>
      <?php if (isset($form_errors['password'])) : ?>
        <div class="invalid-feedback">
          <?php echo $form_errors['password']; ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <label for="id_confirm">Mot de passe (confirmation) :</label>
      <input type="password" id="id_confirm" name="confirmPassword" class="<?php echo isset($form_errors['confirmPassword']) ? "invalid" : ''; ?>" />
      <?php if (isset($form_errors['confirmPassword'])) : ?>
        <div class="invalid-feedback">
          <?php echo $form_errors['confirmPassword']; ?>
        </div>
      <?php endif; ?>
    </div>
    <button type="submit">S'enregistrer</button>
  </form>

  <hr>

  <form action="" method="post">
    <input type="hidden" name="action" value="login">
    <div class="form-group">
      <label for="id_login_email">Email :</label>
      <input type="text" id="id_login_email" name="login_email" class="<?php echo isset($form_errors['login_email']) ? "invalid" : ''; ?>" value="<?php echo $form_login_email; ?>"/>
      <?php if (isset($form_errors['login_email'])) : ?>
        <div class="invalid-feedback">
          <?php echo $form_errors['login_email']; ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <label for="id_login_password">Mot de passe :</label>
      <input type="password" id="id_login_password" name="login_password" class="<?php echo isset($form_errors['login_password']) ? "invalid" : ''; ?>"/>
      <?php if (isset($form_errors['login_password'])) : ?>
        <div class="invalid-feedback">
          <?php echo $form_errors['login_password']; ?>
        </div>
      <?php endif; ?>
    </div>
    <button type="submit">Se connecter</button>
  </form>
</div>

</body>
</html>