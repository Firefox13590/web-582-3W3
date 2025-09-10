<footer>
            <h2>teeTIM</h2>
            <div class="contenu">
                <section class="achats">
                    <h3><?= $_pp->achatsTitre; ?></h3>
                    <nav>
                        <a href="faq.php" class="faq"><?= $_pp->achatsFaq; ?></a>
                        <a href="livraison.php" class="livraison"><?= $_pp->achatsLivraison; ?></a>
                        <a href="conditions.php" class="conditions"><?= $_pp->achatsConditions; ?></a>
                        <a href="confidentialite.php" class="confidentialite"><?= $_pp->achatsConfidentialite; ?></a>
                    </nav>
                </section>
                <section class="apropos">
                    <h3><?= $_pp->aproposTitre; ?></h3>
                    <nav>
                        <a href="compagnie.php" class="faq"><?= $_pp->aproposCompagnie; ?></a>
                        <a href="equipe.php" class="livraison"><?= $_pp->aproposEquipe; ?></a>
                        <a href="emploi.php" class="conditions"><?= $_pp->aproposEmplois; ?></a>
                    </nav>
                </section>
                <section class="coordonnees">
                    <h3><?= $_pp->coordonneesTitre; ?></h3>
                    <nav>
                        <span><?= $_pp->coordonneesTelephone; ?><b>1 866 888 6666</b></span>
                        <span><?= $_pp->coordonneesCourriel; ?><b>aide@teetim.ca</b></span>
                    </nav>
                </section>
            </div>
            <p class="da">
                &copy; <?= $_pp->droits; ?> teeTIM 
                <?php echo date("Y"); ?>
            </p>
        </footer>
    </div>
    
</body>
</html>