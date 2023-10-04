<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <form action="/ConnectUserContoller" method="post">
        
    <label for="email">Email :</label>
        <input required type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="toto@titi.com" name="mail">

        <label for="mot_de_passe">Mot de passe :</label>
        <input required type="password" id="mot_de_passe" aria-describedby="passwordHelpInline" placeholder="Mot de Passe" name="mdp" minlenght="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
