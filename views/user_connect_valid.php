<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style/style.css"/> <!-- Relie la page au css pour appliquer notre style -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Balise pour utiliser le css Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> <!-- Balise pour utiliser le js Bootstrap -->
  <title>SportTrack | Connexion</title>
  <link rel="icon" href="../image/logo.png"/> <!-- icone de la page -->
</head>
<body>
  
  <div class="p-5 bg-primary text-white text-center" style="background-color: #7dc146 !important;"><!-- div texte blanc centré fond vert -->
    <h1>SportTrack - Connexion</h1>
    <p>Bon retour !</p> 
  </div>
  <div class="container mt-5">
    <h2 class="text-center">Vous êtes sur le point de vous connecter</h2>
    <p class="text-center">Veuillez vérifier les informations suivantes :</p>
    <?php
    // Afficher un message de confirmation de connexion ou d'erreur
    echo "Vous êtes connecté, bonjour";
    echo "<br>";
    echo "Lastname : ". $data['lastname'];
    echo "<br>";
    echo "Firstname : ". $data['firstname'];
    echo "<br>";
    echo "Email : ". $data['email'];


    ?>
    <br>
    <!-- Ajoutez des liens ou des boutons pour rediriger l'utilisateur vers d'autres pages si nécessaire -->
    <a href="/">Retour à l'accueil</a>
  </div>
  <?php include __ROOT__."/views/footer.html"; ?>
</body>
</html>
