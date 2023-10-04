<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style/style.css"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Balise pour utiliser le css Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>  <!-- Balise pour utiliser le js Bootstrap -->
  <title>SportTrack | Se connecter</title>
  <link rel="icon" href="../image/logo.png"/> <!-- icone de la page -->
</head>
<body>

  <div class="p-5 bg-primary text-white text-center" style="background-color: #7dc146 !important;"> <!-- div texte blanc centré fond vert -->
    <h1>SportTrack - Se connecter</h1>
    <p>Rebonjour, ravie de vous revoir sur SportTrack, connectez-vous !</p> 
  </div>

  <?php include __ROOT__."/views/header.html"; ?>

  <?php
  if (isset($_SESSION['error_message'])) {
      echo '<div class="alert alert-danger" role="alert">';
      echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
      <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
    </svg> '; // Icône d'exclamation
      echo $_SESSION['error_message'];
      echo '</div>';
      unset($_SESSION['error_message']); // Effacez le message d'erreur de la session une fois affiché.
  }
  ?>


<div class="container mt-5">
    <div class="row">
    <form method="post" action="ConnectUserController">
      <h2>Connectez-vous !</h2>
      
      <!--Adresse électronique-->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Adresse electronique</label>
        <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="toto@titi.com" name="mail">
        <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre adresse mail.</div>
      </div>
     
      <!--Mot de passe-->
      <div class="mb-3">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Mot de passe</label>
        </div>
        <div class="col-auto">
          <input required type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Mot de Passe" name="mdp">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Veuillez entrer votre mot de passe.
          </span>
        </div>
      </div>
    
      <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

    </div>
  </div>
            
<?php include __ROOT__."/views/footer.html"; ?>
