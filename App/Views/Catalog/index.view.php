<?php
/** @var \App\Models\Component[] $components */
/** @var \Framework\Support\LinkGenerator $link */

use App\Configuration;
?>
<div class="catalog-container">
    <div class="catalog-header-bar">
        <h1 class="page-title">Katalóg komponentov</h1>
        <div>
            <a href="<?= $link->url('category.index') ?>" class="btn btn-secondary btn-catalog-add me-2">Spravovať kategórie</a>
            <a href="<?= $link->url('catalog.add') ?>" class="btn btn-primary btn-catalog-add">Pridať nový komponent</a>
        </div>
    </div>

    <div class="products-grid">
        <?php foreach ($components as $component): ?>
            <div class="product-card">
                <div class="product-card-top">
                    <?php if ($component->getImage()): ?>
                        <img src="<?= $link->asset(Configuration::UPLOAD_URL . $component->getImage()) ?>" alt="<?= e($component->getName()) ?>" class="product-img">
                    <?php else: ?>
                        <div class="product-img product-img-placeholder">Bez foto</div>
                    <?php endif; ?>

                    <div class="product-info">
                        <div class="product-category"><?= e($component->getCategory()?->getName() ?? 'Nezaradené') ?></div>
                        <div class="product-title"><?= e($component->getName()) ?></div>
                        <div class="product-manufacturer"><?= e($component->getManufacturer()) ?> &bull; <?= e($component->getPowerW()) ?> W</div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="product-card-bottom">
                    <div class="product-price"><?= e($component->getPrice()) ?> €</div>

                    <div class="product-actions">
                        <a href="<?= $link->url('catalog.edit', ['id' => $component->getId()]) ?>" class="btn btn-secondary btn-action">Upraviť</a>

                        <form method="post" action="<?= $link->url('catalog.delete') ?>" class="d-inline" data-confirm="Naozaj chcete zmazať tento komponent?">
                            <input type="hidden" name="id" value="<?= $component->getId() ?>">
                            <button type="submit" class="btn btn-secondary btn-action btn-action-delete">Zmazať</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>