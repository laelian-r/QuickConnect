<?php
ob_start();
$title = "Homepage";
?>

    <h1>Ajouter un post</h1>

    <?php if (isset($error)): ?>
        <div style="color:red"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="/publier" method="post" enctype="multipart/form-data">
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';