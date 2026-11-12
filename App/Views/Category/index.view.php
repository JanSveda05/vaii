<?php
/** @var \App\Models\Category[] $categories */
/** @var \Framework\Support\LinkGenerator $link */
?>
<div class="catalog-container">
    <div class="catalog-header-bar">
        <h1 class="page-title">Kategórie komponentov</h1>
        <a href="<?= $link->url('category.add') ?>" class="btn btn-primary btn-catalog-add">Pridať kategóriu</a>
    </div>

    <div class="components-list">
        <?php foreach ($categories as $category): ?>
            <div class="component-card">
                <div class="component-info">
                    <h2><?= e($category->getName()) ?></h2>
                    <div class="component-name">Slug: <?= e($category->getSlug()) ?></div>
                </div>

                <div class="product-actions">
                    <a href="<?= $link->url('category.edit', ['id' => $category->getId()]) ?>" class="btn btn-secondary btn-action">Upraviť</a>

                    <form method="post" action="<?= $link->url('category.delete') ?>" class="d-inline" data-confirm="Naozaj chcete zmazať túto kategóriu?">
                        <input type="hidden" name="id" value="<?= $category->getId() ?>">
                        <button type="submit" class="btn btn-secondary btn-action btn-action-delete">Zmazať</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>