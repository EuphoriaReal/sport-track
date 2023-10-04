<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style/style.css"/> <!-- Relie la page au css pour appliquer notre style -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Balise pour utiliser le css Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> <!-- Balise pour utiliser le js Bootstrap -->
  <title>SportTrack | Créer un compte</title>
  <link rel="icon" href="image/logo.png"/> <!-- icone de la page -->
</head>
<div class="p-5 bg-primary text-white text-center" style="background-color: #7dc146 !important;"><!-- div texte blanc centré fond vert -->
    <h1>SportTrack - Créer un compte</h1>
    <p>Bienvenue sur SportTrack, inscrivez-vous !</p> 
  </div>
<body>
<?php include __ROOT__."/views/header.html"; ?>
  
 

<div class="block"> <!-- div qui contient tout le corps de la page-->
    <div style="display:inline-block; vertical-align: top;"> <!-- div où sera le questionnaire et l'image, style: aligner au centre et coller en haut -->
        <h2>S'inscrire !</h2>
        <!-- image coller aligner a gauche, responsive, arrondie avec des bordures (Bootstrap) -->
        <img src="image/cour.jpeg" alt="coureur" class="img-fluid rounded img-thumbnail" style="display: inline !important; float: left;"> 
    
    <div style="float: right; margin: 5px;"> <!-- div questionnaire, aligner a droite de l'image avec 5px de séparation -->
    <form action="/AddUserController" method="post"> <!-- questionnaire get qui redirige vers error.php , toutes les entrée sont obligatoires-->
      
      <div class="mb-3"><!-- div responsive géré par Bootstrap -->
        <label  class="form-label">Nom</label>
        <input required class="form-control" type="text" name="nom" id="nom" ><!-- entrée du questionnaire basique, son style sera géré par bootstrap (comme toute les entrée) -->
      </div>
      
      <div class="mb-3">
        <label class="form-label">Prénom</label>
        <input required class="form-control" type="text" name="prenom" id="prenom"><!-- entrée du questionnaire basique-->
      </div>
      
      <div class="mb-3">
        <label class="form-label">Date de naissance</label>
        <input required class="form-control" type="Date" name="dateNaissance" id="date"> <!-- entrée du questionnaire de type date -->
      </div>

      
      <div class="form-check form-check-inline"> <!-- entrée du questionnaire de type question a choix unique -->
        <input required class="form-check-input" type="radio" name="sexe" id="sexe" value="0"/>
        <label class="form-check-label">Homme</label>
      </div>

      <div class="form-check form-check-inline">
        <input required class="form-check-input" type="radio" name="sexe" id="sexe" value="1" /><!-- entrée du questionnaire de type question a choix unique -->
        <label class="form-check-label">Femme</label>
      </div>

      <div class="form-check form-check-inline">
        <input required class="form-check-input" type="radio" name="sexe" id="sexe" value="2"/><!-- entrée du questionnaire de type question a choix unique -->
        <label class="form-check-label">Autre</label>
      </div>
      <br>
      <div class="mb-3">
        <label class="form-label">Taille (en centimetre)</label>
        <!-- entrée du questionnaire de type nombre, pour la taille, min 50 et max 250 -->
        <input required class="form-control" type="number" name="taille" id="taille" required min="50" max="250">
      </div>
      
      <div class="mb-3">
        <label class="form-label">Poids (en Kilogramme)</label>
        <!-- entrée du questionnaire de type nombre, pour le poids, min 4 et max 200 -->
        <input required class="form-control" type="number" name="poids" id="poids" required min="4" max="200">
      </div>
      
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Adresse electronique</label>
        <!-- entrée du questionnaire (mail) qui n'accepte que des adresses mails valide et qui met toto@titi.com comme exemple -->
        <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="toto@titi.com" name="mail">
        <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre adresse mail.</div> <!-- div géré par Bootstrap pour afficher un message-->
      </div>
      <div class="mb-3">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Mot de passe</label>
        </div>
        <div class="col-auto">
          <!-- entrée questionnaire pour le mot de passe, ne s'affichera pas-->
        <input required type="password" id="mot_de_passe" aria-describedby="passwordHelpInline" placeholder="Mot de Passe" name="password" minlenght="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" > 
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text" >
            Veuillez entrer votre mot de passe.
            <br>
            Il doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.
          </span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Se connecter</button> <!--bouton de connection style géré par bootstrap-->
    
    </form>
    </div>
    </div>
  </div>
    <?php include __ROOT__."/views/footer.html"; ?>
</body>
</html>
