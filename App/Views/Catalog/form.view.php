<?php
/** @var \App\Models\Component $component */
/** @var string[] $errors */
/** @var \Framework\Support\LinkGenerator $link */
?>
<div class="catalog-container">
    <div class="catalog-form-box">
        <h1 class="page-title"><?= $component->getId() ? 'Úprava komponentu' : 'Nový komponent' ?></h1>

        <?php if (count($errors) > 0): ?>
            <div class="alert-danger">
                <?php foreach ($errors as $error): ?>
                    <div><?= e($error) ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= $link->url('catalog.save') ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $component->getId() ?>">

            <div class="form-group">
                <label for="name">Názov</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= e($component->getName()) ?>" required>
            </div>

            <div class="form-group">
                <label for="category">Kategória</label>
                <input type="text" id="category" name="category" class="form-control" value="<?= e($component->getCategory()) ?>" required>
            </div>

            <div class="form-group">
                <label for="manufacturer">Výrobca</label>
                <input type="text" id="manufacturer" name="manufacturer" class="form-control" value="<?= e($component->getManufacturer()) ?>" required>
            </div>

            <div class="form-group">
                <label for="price">Cena (€)</label>
                <input type="number" step="0.01" id="price" name="price" class="form-control" value="<?= e($component->getPrice()) ?>" required>
            </div>

            <div class="form-group">
                <label for="power_w">Spotreba (W)</label>
                <input type="number" id="power_w" name="power_w" class="form-control" value="<?= e($component->getPowerW()) ?>">
            </div>

            <div class="form-group">
                <label for="image">Obrázok komponentu</label>
                <?php if ($component->getImage()): ?>
                    <div style="margin-bottom: 8px;">
                        <img src="<?= $link->asset('images/' . $component->getImage()) ?>" alt="" style="max-height: 80px; border: 1px solid var(--border-light); padding: 2px;">
                        <span style="font-size: 12px; color: var(--text-muted); display: block;">Aktuálny obrázok: <?= e($component->getImage()) ?></span>
                    </div>
                <?php endif; ?>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="padding: 10px 20px;">Uložiť</button>
                <a href="<?= $link->url('catalog.index') ?>" class="btn btn-secondary" style="padding: 10px 20px;">Späť</a>
            </div>
        </form>
    </div>
</div>