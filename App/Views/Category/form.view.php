<?php
/** @var \App\Models\Category $category */
/** @var string[] $errors */
/** @var \Framework\Support\LinkGenerator $link */
?>
<div class="catalog-container">
    <div class="catalog-header-bar">
        <h1 class="page-title"><?= $category->getId() ? 'Úprava kategórie' : 'Nová kategória' ?></h1>
    </div>

    <?php if (count($errors) > 0): ?>
        <div class="alert-danger">
            <?php foreach ($errors as $error): ?>
                <div><?= e($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= $link->url('category.save') ?>" class="catalog-form-box">
        <input type="hidden" name="id" value="<?= $category->getId() ?>">

        <div class="form-group">
            <label for="name">Názov kategórie</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= e($category->getName()) ?>" required maxlength="100">
        </div>

        <div class="form-group">
            <label for="slug">Slug (nepovinné – vygeneruje sa automaticky)</label>
            <input type="text" id="slug" name="slug" class="form-control" value="<?= e($category->getSlug()) ?>" maxlength="100">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-form-action">Uložiť</button>
            <a href="<?= $link->url('category.index') ?>" class="btn btn-secondary btn-form-action">Späť</a>
        </div>
    </form>
</div>