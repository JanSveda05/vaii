# PC Konfigurátor

Ján Šveda

5ZYI33

## Stručný opis projektu
Webová aplikácia **PC Konfigurátor** slúži na interaktívny návrh počítačových zostáv. Rieši problém prácneho overovania technickej zhody jednotlivých dielov a pomáha používateľom lepšie sa orientovať v ponuke trhu. Všetky diely sú prehľadne rozdelené podľa kategórií, výrobcov a parametrov.

Aplikácia vedie používateľa krok za krokom pri výbere hlavných dielov. Automaticky sčíta celkovú cenu a vyhodnocuje vlastnosti zostavy. Umožňuje bezpečné ukladanie konfigurácií do osobného účtu. Používatelia môžu zároveň prezerať a čerpať inšpiráciu z komunitných zostáv iných používateľov.

## Role v projekte
* **Neregistrovaný používateľ:**
    * Má prístup k verejným častiam webu.
    * Môže používať konfigurátor na vyskladanie zostavy.
    * Môže si zobraziť katalóg komponentov a existujúce zostavy.
* **Registrovaný používateľ:**
    * Má prístup k osobnému účtu.
    * Môže si ukladať vytvorené PC zostavy do svojej knižnice.
    * Spravuje svoje zostavy a môže si ich stiahnuť alebo exportovať.
* **Admin:**
    * Zodpovedá za správnosť dát v systéme.
    * Spravuje katalóg komponentov.
    * Správa používateľských účtov.

## Prípady použitia podľa rolí
* **Návštevník:**
    * Vyhľadá si konkrétny komponent v katalógu.
    * Interaktívne vyskladá vlastnú PC zostavu krok za krokom.
* **Registrovaný používateľ:**
    * Používateľ sa zaregistruje a prihlási do svojho účtu.
    * Uloží si rozpracovanú alebo dokončenú PC zostavu do svojej knižnice zostáv.
    * Spraví export zostavy s cenami komponentov.
* **Správca:**
    * Správca pridá do katalógu nový produkt s vlastnosťami a cenou.

## Plánované entity
* **User:** Reprezentuje osobu v systéme.
	* *Atribúty:* `id`, `name`, `email`, `password`, `role`
	* *Účel:* Autentifikácia a autorizácia používateľov.
* **Category:** Reprezentuje kategóriu komponentov (procesory, dosky, grafiky).
	* *Atribúty:* `id`, `name`, `slug`
	* *Účel:* Triedenie komponentov.
* **Manufacturer:** Reprezentuje značku alebo výrobcu komponentov.
	* *Atribúty:* `id`, `name`, `country`, `website`
	* *Účel:* Evidencia výrobcov hardvéru.
* **Component:** Reprezentuje konkrétny diel PC zostavy.
	* *Atribúty:* `id`, `name`, `category`, `price`, `manufacturer`, `power_w`
	* *Účel:* Uchovávanie technických údajov o komponentoch pre konfiguráciu a kompatibilitu.
* **Build:** Reprezentuje konkrétnu poskladanú zostavu používateľa.
	* *Atribúty:* `id`, `user_id`, `build_name`, `price_total`, `created_at`
	* *Účel:* Spájanie jednotlivých komponentov do jedného celku.
* **Build_Component:** Asociatívna entita medzi zostavou a komponentom.
	* *Atribúty:* `build_id`, `component_id`, `quantity`
	* *Účel:* Realizácia väzby M:N, evidencia počtu kusov daného komponentu v zostave.

## Vzťahy medzi entitami
- **Manufacturer – Component (1:N):** Jeden výrobca zahŕňa viacero komponentov a každý komponent patrí jednému výrobcovi.
- **Category – Component (1:N):** Jedna kategória obsahuje viacero komponentov, každý komponent patrí do jednej kategórie.
- **User – Build (1:N):** Jeden používateľ vytvára viacero zostáv a každá zostava patrí jednému používateľovi.
- **Build – Component (M:N):** Jedna zostava obsahuje viacero komponentov a daný komponent sa môže nachádzať vo viacerých zostavách.

## Hlavné stránky aplikácie
1. **Domovská stránka:** Obsahuje hornú navigačnú lištu s odkazmi na stránky, stredovú uvítaciu sekciu s nadpisom a tlačidlom pre rýchly štart do konfigurátora.
2. **Stránka konfigurátora:** Mriežka slotov pre jednotlivé komponenty s bočným panelom, priebežným súčtom ceny, stavom a tlačidlom na uloženie zostavy.
3. **Katalóg produktov:** Obsahuje horný vyhľadávací riadok, bočný panel s filtrami a responzívnu mriežku kariet. Každá karta reprezentuje jeden komponent s obrázkom, cenou a tlačidlom details.
4. **Komunitné zostavy:** Zoznam verejných používateľských zostáv usporiadaných do vizuálnych blokov. Jednotlivé bloky obsahujú názov zostavy, zoznam použitých kľúčových dielov, celkovú cenu a autora.
5. **Profil používateľa:** Stránka je rozdelená na hlavičku s osobnými údajmi používateľa a blokový zoznam jeho uložených zostáv. Blok zostavy ponúka tlačidlá na úpravu, zobrazenie detailov alebo vymazanie.
6. **Administračný panel:** Obsahuje zabezpečenú navigáciu pre správu systému a tabuľky pre jednotlivé entity s ovládacími prvkami pre pridanie, editáciu a mazanie záznamov.

## Rozdelenie funkcionality
### Základné funkcie:
* **Interaktívny konfigurátor:** Skladanie vlastnej počítačovej zostavy výberom jednotlivých dielov s priebežným prepočítavaním celkovej ceny.
* **Používateľské účty:** Registrácia, prihlásenie a zabezpečený prístup do osobného profilu pre každého používateľa.
* **Správa vlastných zostáv:** Vytváranie, prezeranie, úprava a mazanie uložených PC zostáv v používateľskom profile.
* **Správa katalógu:** Administrátorské rozhranie určené na pridávanie, úpravu a odstraňovanie hardvérových komponentov a výrobcov.
* **Sekcia komunitných zostáv:** Prehľad verejných zostáv vytvorených inými používateľmi.

### Rozširujúce funkcie:
* **Kontrola kompatibility:** Automatické overovanie kompatibility vybraných hardvérových dielov.
* **Export zostavy:** Možnosť stiahnutia kompletného zoznamu vybranej zostavy a cien do dokumentu.
