<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style/style.css"/> <!-- Relie la page au css pour appliquer notre style -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Balise pour utiliser le css Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> <!-- Balise pour utiliser le js Bootstrap -->
  <title>SportTrack | Modifier mes informations</title>
  <link rel="icon" href="../image/logo.png"/> <!-- icone de la page -->
</head>
<body>
  
  <div class="p-5 bg-primary text-white text-center" style="background-color: #7dc146 !important;"><!-- div texte blanc centré fond vert -->
    <h1>SportTrack - Modifier mes informations</h1>
    <p>Vous avez modifier vos informations</p> 
  </div>

    <div class="container mt-5">
    <h2 class="text-center">Vous avez modifier vos informations</h2>
    <p class="text-center">Veuillez vérifier les informations suivantes :</p>

    <?php

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $user = $_SESSION['user'];
    
    $nom = $user->getNom();
    $prenom = $user->getPrenom();
    $dateNaissance = $user->getDateNaissance();
    $sexe = $user->getSexe();
    $taille = $user->getTaille();
    $poids = $user->getPoids();
    $mail = $user->getMail();
    $password = $user->getPassword();

    if($sexe == 0){
        $sexe = "Homme";
    }elseif($sexe == 1){
        $sexe = "Femme";
    }else{
        $sexe = "Autre";
    }

    echo "<p>Les données suivantes ont été mises à jour :</p>";
    echo "<ul>";
    echo "<li>Nom : $nom</li>";
    echo "<li>Prénom : $prenom</li>";
    echo "<li>Date de naissance : $dateNaissance</li>";
    echo "<li>Sexe : $sexe</li>";
    echo "<li>Taille : $taille</li>";
    echo "<li>Poids : $poids</li>";
    echo "<li>Mail : $mail</li>";
    echo "<li>Mot de passe : $password</li>";
    echo "</ul>";

    // Afficher un message de confirmation ou d'erreur en fonction du résultat de la mise à jour du compte
    echo "<p>Le compte a été mis à jour avec succès.</p>";

    echo "<a href='/'>Retour à l'accueil</a>";
    ?>
    </div>

    <?php include __ROOT__."/views/footer.html"; ?>

    <!-- Ajoutez des liens ou des boutons pour rediriger l'utilisateur vers d'autres pages si nécessaire -->
</body>
</html>


