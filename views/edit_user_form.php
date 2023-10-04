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
    <p>Souhaitez vous modifier vos information ?</p> 
  </div>
  <?php include __ROOT__."/views/header.html"; ?>

  <div class="block">
    <div style="display:inline-block; vertical-align: top;"><!-- div où sera le questionnaire et l'image, style: aligner au centre et coller en haut -->
    <h2>Modifier vos informations ici : </h2>
        <!-- image coller aligner a gauche, responsive, arrondie avec des bordures (Bootstrap) -->
        <img src="../image/course.jpg" alt="coureuse" class="img-fluid rounded img-thumbnail" style="display: inline !important; float: left; width: 721px">
    <div style="float: right; margin: 5px;"><!-- div questionnaire, aligner a droite de l'image avec 5px de séparation -->
      <form method="post" action="/EditUserController"> <!-- questionnaire get qui redirige vers error.php , toutes les entrée sont obligatoires-->
        <div class="mb-3"><!-- div responsive géré par Bootstrap -->
        <div class="form-check form-check-inline">
            <label for="nom" class="form-label">Nom :</label>
            <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $nom; ?>" required><br>
        </div>
        <div class="form-check form-check-inline">
            <label for="prenom" class="form-label">Prenom :</label>
            <input class="form-control" type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>" required><br>
        </div>
        <br>
        <div class="form-check form-check-inline">
            <label class="form-label" for="dateNaissance">Date de naissance</label>
            <input  type="Date" name="dateNaissance" id="date" value="<?php echo $dateNaissance; ?>" required><br>
        </div>
        <br><br>
          <div class="form-check form-check-inline">
            <!-- entrée du questionnaire de type question a choix unique son style sera géré par bootstrap (comme toute les entrée) -->
            <input class="form-check-input" type="radio" name="sexe" id="sexe" value="0" <?php echo ($sexe == 0) ? 'checked' : ''; ?> required/>
            <label class="form-check-label">Homme</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sexe" id="sexe" value="1" <?php echo ($sexe == 1) ? 'checked' : ''; ?> required/>
            <label class="form-check-label">Femme</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sexe" id="sexe" value="2" <?php echo ($sexe == 2) ? 'checked' : ''; ?> required/>
            <label class="form-check-label">Autre</label>
          </div>

          <br><br>
          
          <div class="mb-3">
            <label class="form-label">Nouvelle Taille (en centimetre)</label>
            <!-- entrée du questionnaire de type nombre, pour la taille, min 50 et max 250 -->
            <input class="form-control" type="number" name="taille" id="taille" value="<?php echo $taille; ?>" required min="50" max="250">
          </div>
          
          <div class="mb-3">
            <label class="form-label">Nouveau Poids (en Kilogramme)</label>
            <!-- entrée du questionnaire de type nombre, pour le poids, min 4 et max 200 -->
            <input class="form-control" type="number" name="poids" id="poids" value="<?php echo $poids; ?>" required min="4" max="200">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nouvelle adresse electronique</label>
            <!-- entrée du questionnaire (mail) qui n'accepte que des adresses mails valide et qui met toto@titi.com comme exemple -->
            <input class="form-control" required type="email" id="mail" aria-describedby="emailHelp" placeholder="Entrez votre nouvel email" name="mail" value="<?php echo $mail; ?>">
            <div id="emailHelp" class="form-text">Confirmer votre nouvelle adresse électronique</div>
          </div>

          <div class="mb-3">
            <div class="col-auto">
              <!-- entrée questionnaire pour le mot de passe, ne s'affichera pas copie de celui juste au dessus-->
              <label for="inputPassword6" class="col-form-label">Nouveau mot de passe</label>
            </div>
            <div class="col-auto">
              <input class="form-control" type="password" id="password" name="password" minlenght="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="">
            </div>
            <div class="col-auto">
              <span id="passwordHelpInline" class="form-text">
                Confirmer votre nouveau mot de passe.
              </span>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Modifier ses informations</button><!--bouton de connection style géré par bootstrap-->

        </div>
      </form>
    </div>
    </div>
  </div>
<?php include __ROOT__."/views/footer.html"; ?>
</body>
</html>
