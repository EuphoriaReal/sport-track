<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style/style.css"/> <!-- Relie la page au css pour appliquer notre style -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Balise pour utiliser le css Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> <!-- Balise pour utiliser le js Bootstrap -->
  <title>SportTrack | Vos Activités</title>
  <link rel="icon" href="../image/logo.png"/> <!-- icone de la page -->
</head>
<body>
  
  <div class="p-5 bg-primary text-white text-center" style="background-color: #7dc146 !important;"><!-- div texte blanc centré fond vert -->
    <h1>SportTrack - Vos Activités</h1>
    <p>Vous pouvez être fier de vous !</p> 
  </div>
  <?php include __ROOT__."/views/header.html"; ?>

    <div class="container mt-5">
    <h2 class="text-center">Vos activités</h2>

    <table class="table table-striped table-hover table-bordered mt-5">
		<thead>
			<tr>
				<th class="table table-striped table-hover table-bordered">Description </th>
				<th class="table table-striped table-hover table-bordered">Date </th>
				<th class="table table-striped table-hover table-bordered">Durée </th>
				<th class="table table-striped table-hover table-bordered">Distance </th>
				<th class="table table-striped table-hover table-bordered">Fréquence cardiaque min </th>
				<th class="table table-striped table-hover table-bordered">Fréquence cardiaque max </th>
        <th class="table table-striped table-hover table-bordered">Fréquence cardiaque moyenne </th>
			</tr>
		</thead>
		<tbody>
    <?php foreach ($activities as $activity): ?>
            <tr>
                <td><?= $activity->getDescription() ?></td>
                <td><?= $activity->getDate() ?>     </td>
                <td><?= $activity->getDuree() ?>    </td>
                <td><?= $activity->getDistance() ?>     </td>
                <td><?= $activity->getMinCardioFrequency() ?>   </td>
                <td><?= $activity->getMaxCardioFrequency() ?>   </td>
                <td><?= $activity->getMoyCardioFrequency() ?>   </td>
                <td>
                <form method="post" action="/DeleteActivityController">
                    <input type="hidden" name="idActivity" value="<?= $activity->getIdActivity() ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
	</table>
        
    </div>

  <?php include __ROOT__."/views/footer.html"; ?> 
</body>
</html>
