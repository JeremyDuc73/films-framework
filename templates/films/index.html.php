<?php foreach ($films as $film) : ?>

    <hr>
    <h2><?= $film->getTitle() ?></h2>
    <image width="100px" src="images/<?= $film->getImage() ?>">
    <p><strong><?= $film->getSynopsis() ?></strong></p>
    <a href="?type=film&action=show&id=<?= $film->getId() ?>" class="btn btn-success">VOIR</a>
    <hr>

<?php endforeach; ?>
