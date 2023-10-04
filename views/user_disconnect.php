<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style/style.css"/> <!-- Relie la page au css pour appliquer notre style -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Balise pour utiliser le css Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> <!-- Balise pour utiliser le js Bootstrap -->
  <title>SportTrack | Déconnection</title>
  <link rel="icon" href="../image/logo.png"/> <!-- icone de la page -->
</head>
<body>
<div class="p-5 bg-primary text-white text-center" style="background-color: #7dc146 !important;"><!-- div texte blanc centré fond vert -->
    <h1>SportTrack - Déconnection</h1>
    <p>A la prochaine !</p> 
  </div>

  <div class="container mt-5">
    <h2 class="text-center">Vous êtes sur le point de vous déconnecter</h2>
    <?php
    //vous déconnecter de l'application (par exemple, détruire la session)
    if(!session_status() == PHP_SESSION_NONE) {
        session_destroy();
    } else {
        session_start();
        $_SESSION['user'] = null;
        session_destroy();
    }
    // Afficher un message de confirmation de déconnexion
    echo "Vous êtes déconnecté, au revoir";
    echo "<br>";
    echo "<a href=\"/\">Retour à la page principale</a><br>";
    ?>
    </div>

    <!-- Ajoutez des liens ou des boutons pour rediriger l'utilisateur vers d'autres pages si nécessaire -->
    <?php include __ROOT__."/views/footer.html"; ?>
</body>
</html>
