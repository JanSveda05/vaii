<?php
/** @var \App\Models\Component[] $components */
/** @var \Framework\Support\LinkGenerator $link */
?>
<div class="catalog-container">
    <div class="catalog-header-bar">
        <h1 class="page-title">Katalóg komponentov</h1>
        <a href="<?= $link->url('catalog.add') ?>" class="btn btn-primary" style="padding: 10px 20px;">Pridať nový komponent</a>
    </div>

    <div class="products-grid">
        <?php foreach ($components as $component): ?>
            <div class="product-card">
                <div class="product-card-top">
                    <?php if ($component->getImage()): ?>
                        <img src="<?= $link->asset('images/' . $component->getImage()) ?>" alt="<?= e($component->getName()) ?>" class="product-img">
                    <?php else: ?>
                        <div class="product-img" style="display: flex; align-items: center; justify-content: center; font-size: 11px; color: var(--text-muted);">Bez foto</div>
                    <?php endif; ?>

                    <div class="product-info">
                        <div class="product-category"><?= e($component->getCategory()) ?></div>
                        <div class="product-title"><?= e($component->getName()) ?></div>
                        <div class="product-manufacturer"><?= e($component->getManufacturer()) ?> &bull; <?= e($component->getPowerW()) ?> W</div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="product-card-bottom">
                    <div class="product-price"><?= e($component->getPrice()) ?> €</div>

                    <div style="display: flex; gap: 5px;">
                        <a href="<?= $link->url('catalog.edit', ['id' => $component->getId()]) ?>" class="btn btn-secondary" style="padding: 6px 10px; font-size: 12px;">Upraviť</a>

                        <form method="post" action="<?= $link->url('catalog.delete') ?>" class="d-inline" data-confirm="Naozaj chcete zmazať tento komponent?">
                            <input type="hidden" name="id" value="<?= $component->getId() ?>">
                            <button type="submit" class="btn btn-secondary" style="padding: 6px 10px; font-size: 12px; color: #a94442;">Zmazať</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>