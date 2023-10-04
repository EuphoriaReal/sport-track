<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style/style.css"/> <!-- Relie la page au css pour appliquer notre style -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Balise pour utiliser le css Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> <!-- Balise pour utiliser le js Bootstrap -->
  <title>SportTrack | Validation de création</title>
  <link rel="icon" href="../image/logo.png"/> <!-- icone de la page -->
</head>
<body>
<div class="p-5 bg-primary text-white text-center" style="background-color: #7dc146 !important;"><!-- div texte blanc centré fond vert -->
    <h1>SportTrack - Validation de création</h1>
    <p>Bienvenue chez nous !</p> 
  </div>

  <div class="container mt-5">
    <h2 class="text-center">Vous êtes sur le point de créer un compte</h2>
    <p class="text-center">Veuillez vérifier les informations suivantes :</p>
    <?php
    // Récupérer les données du formulaire
    $userdata = $_SESSION['user'];

    $nom = $userdata->getNom();
    $prenom = $userdata->getPrenom();
    $dateNaissance = $userdata->getDateNaissance();
    $sexe = $userdata->getSexe();
    $taille = $userdata->getTaille();
    $poids = $userdata->getPoids();
    $mail = $userdata->getMail();
    $password = $userdata->getPassword();

    if($sexe == 0){
        $sexe = "Homme";
    }elseif($sexe == 1){
        $sexe = "Femme";
    }else{
        $sexe = "Autre";
    }

    // Afficher les informations du compte créé
    echo "<p>Nom : $nom</p>";
    echo "<p>Prénom : $prenom</p>";
    echo "<p>Date de naissance : $dateNaissance</p>";
    echo "<p>Sexe : $sexe</p>";
    echo "<p>Taille : $taille</p>";
    echo "<p>Poids : $poids</p>";
    echo "<p>Adresse email : $mail</p>";
    echo "<p>Mot de passe : $password</p>";
    echo "<p>Votre compte a été créé avec succès !</p>";  
    ?>

    <a href='/'>Retour à l'accueil</a>
  </div>

    <!-- Ajoutez des liens ou des boutons pour rediriger l'utilisateur vers d'autres pages si nécessaire -->
    <?php include __ROOT__."/views/footer.html"; ?>
</body>
</html>
