<?php
ob_start();
$title = "Homepage";
?>

    <h1>Hompage</h1>

    <section>
        <?php foreach ($data as $row): ?>
        <article>
            <header>
                <img src="./assets/images/<?= $row->getImage(); ?>" 
                    alt="<?= $row->getImage(); ?>"
                />
            </header>
            <div>
                <p><?= $row->getDescription() ?></p>
                <p><?= $row->getDate() ?></p>
            </div>
        </article>
        <?php endforeach; ?>
    </section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';