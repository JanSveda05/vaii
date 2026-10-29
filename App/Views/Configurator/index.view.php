<?php
/** @var \Framework\Support\LinkGenerator $link */
?>

<main class="configurator-container">

    <h1 class="page-title">Zostavte si vlastné PC</h1>

    <div class="configurator-layout">
        <section class="components-list">

            <article class="component-card">
                <img src="<?= $link->asset('images/cpu.png') ?>" alt="AMD Ryzen 9 9900X" class="component-img">
                <div class="component-info">
                    <h2>Procesor</h2>
                    <p class="component-name">AMD Ryzen 9 9900X</p>
                    <span class="price">373,90 €</span>
                </div>
                <button type="button" class="btn btn-secondary">Vybrať / Zmeniť</button>
            </article>

            <article class="component-card">
                <img src="<?= $link->asset('images/motherboard.png') ?>" alt="ASROCK B650I LIGHTNING WIFI" class="component-img">
                <div class="component-info">
                    <h2>Základná doska</h2>
                    <p class="component-name">ASROCK B650I LIGHTNING WIFI</p>
                    <span class="price">154,90 €</span>
                </div>
                <button type="button" class="btn btn-secondary">Vybrať / Zmeniť</button>
            </article>

            <article class="component-card">
                <img src="<?= $link->asset('images/gpu.png') ?>" alt="SAPPHIRE PURE AMD Radeon RX 9060 XT GAMING OC 16G" class="component-img">
                <div class="component-info">
                    <h2>Grafická karta</h2>
                    <p class="component-name">SAPPHIRE PURE AMD Radeon RX 9060 XT GAMING OC 16G</p>
                    <span class="price">712,90 €</span>
                </div>
                <button type="button" class="btn btn-secondary">Vybrať / Zmeniť</button>
            </article>

            <article class="component-card">
                <img src="<?= $link->asset('images/memory.png') ?>" alt="Patriot Viper Venom 64 GB KIT DDR5 6000 MHz CL30" class="component-img">
                <div class="component-info">
                    <h2>RAM</h2>
                    <p class="component-name">Patriot Viper Venom 64 GB KIT DDR5 6000 MHz CL30</p>
                    <span class="price">1 290,90 €</span>
                </div>
                <button type="button" class="btn btn-secondary">Vybrať / Zmeniť</button>
            </article>

            <article class="component-card">
                <img src="<?= $link->asset('images/psu.png') ?>" alt="Corsair RM650e" class="component-img">
                <div class="component-info">
                    <h2>Zdroj</h2>
                    <p class="component-name">Corsair RM650e</p>
                    <span class="price">84,90 €</span>
                </div>
                <button type="button" class="btn btn-secondary">Vybrať / Zmeniť</button>
            </article>

            <article class="component-card">
                <img src="<?= $link->asset('images/case.png') ?>" alt="DeepCool CH260" class="component-img">
                <div class="component-info">
                    <h2>Skrinka</h2>
                    <p class="component-name">DeepCool CH260</p>
                    <span class="price">77,90 €</span>
                </div>
                <button type="button" class="btn btn-secondary">Vybrať / Zmeniť</button>
            </article>

            <div class="add-component-container">
                <button type="button" class="btn btn-add">Pridať komponent</button>
            </div>

        </section>

        <aside class="summary-sidebar">
            <h2>Aktuálna zostava</h2>
            <p class="count">6 pridaných komponentov</p>

            <ul class="summary-list">
                <li><span>Procesor</span> <span>373,90 €</span></li>
                <li><span>Základná doska</span> <span>154,90 €</span></li>
                <li><span>Grafická karta</span> <span>712,90 €</span></li>
                <li><span>RAM</span> <span>1 290,90 €</span></li>
                <li><span>Zdroj</span> <span>84,90 €</span></li>
                <li><span>Skrinka</span> <span>77,90 €</span></li>
            </ul>

            <hr class="divider">

            <div class="total-price-box">
                <span>Celkom</span>
                <strong class="total-price">2 695,4 €</strong>
            </div>

            <div class="summary-actions">
                <button type="button" class="btn btn-primary btn-block">Uložiť zostavu</button>
                <button type="button" class="btn btn-outline btn-block">Exportovať do PDF</button>
            </div>
        </aside>

    </div>

</main>