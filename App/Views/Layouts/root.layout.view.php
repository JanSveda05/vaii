<?php
/** @var string $contentHTML */
/** @var Framework\Auth\AppUser $user */
/** @var Framework\Support\LinkGenerator $link */
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= App\Configuration::APP_NAME ?></title>
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="<?= $link->url('home.index') ?>">
            <img src="<?= $link->asset('images/logo.png') ?>" alt="Logo" class="site-logo">
        </a>
        <span class="site-title">PC Konfigurátor</span>
    </div>

    <input type="checkbox" id="menu-toggle" class="menu-toggle-checkbox">
    <label for="menu-toggle" class="menu-icon">&#9776;</label>

    <nav class="main-nav">
        <ul>
            <li>
                <a href="<?= $link->url('home.index') ?>"
                   class="<?= (!isset($_GET['c']) || $_GET['c'] === 'Home' || $_GET['c'] === 'home') ? 'active' : '' ?>">
                    Domov
                </a>
            </li>
            <li>
                <a href="<?= $link->url('configurator.index') ?>"
                   class="<?= (isset($_GET['c']) && strtolower($_GET['c']) === 'configurator') ? 'active' : '' ?>">
                    Konfigurátor
                </a>
            </li>
            <li><a href="#">Katalóg</a></li>
            <li><a href="#">Komunita</a></li>
            <li><a href="#">Profil</a></li>
        </ul>
    </nav>
</header>

<?= $contentHTML ?>

<footer class="main-footer">
    <nav class="footer-nav">
        <ul>
            <li><a href="#">O aplikácii</a></li>
            <li><a href="#">Kontakt</a></li>
        </ul>
    </nav>
</footer>

</body>
</html>