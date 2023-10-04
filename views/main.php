
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style/style.css"/> <!-- Relie la page au css pour appliquer notre style -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Balise pour utiliser le css Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> <!-- Balise pour utiliser le js Bootstrap -->
  <title>SportTrack | Créer un compte</title>
  <link rel="icon" href="image/logo.png"/> <!-- icone de la page -->
</head>
<body>

<div class="p-5 bg-primary text-white text-center" style="background-color: #7dc146 !important;"><!-- div texte blanc centré fond vert -->
    <h1>SportTrack</h1>
    <p>Bienvenue sur SportTrack, choississez votre activité et enregistrez vos performances !</p> 
</div>
<?php include __ROOT__."/views/header.html"; ?>
  <div class="block"> <!-- div qui contient tout le corps de la page-->
    <div style="display:inline-block; vertical-align: top;"> <!-- div où sera le questionnaire et l'image, style: aligner au centre et coller en haut -->
        <h2>Bonjour, bienvenue sur SportTrack</h2>
        <!-- image coller aligner a gauche, responsive, arrondie avec des bordures (Bootstrap) -->
        <img src="image/cour.jpeg" alt="coureur" class="img-fluid rounded img-thumbnail" style="display: inline !important; float: left;"> 
    </div>
  </div>
<?php include __ROOT__."/views/footer.html"; ?>
</body>
</html>
            

