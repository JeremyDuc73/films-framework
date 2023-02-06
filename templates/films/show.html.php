<hr>
<h3><?= $film->getTitle() ?></h3>
<image width="200px" src="images/<?= $film->getImage() ?>">
<p><?= $film->getSynopsis()?></p>
<hr>
<a href="index.php" class="btn btn-primary">RETOUR</a>
<a href="?type=film&action=remove&id=<?=$film->getId()?>" class="btn btn-danger">SUPPRIMER</a>