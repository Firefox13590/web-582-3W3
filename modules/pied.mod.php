        <footer>
            <h2><?= $_pp->titreFooter; ?></h2>
            <div class="contenu">
                <section class="achats">
                    <h3><?= $_pp->sectionAchats[0]; ?></h3>
                    <nav>
                        <a href="faq.php" class="faq"><?= $_pp->sectionAchats[1]; ?></a>
                        <a href="livraison.php" class="livraison"><?= $_pp->sectionAchats[2]; ?></a>
                        <a href="conditions.php" class="conditions"><?= $_pp->sectionAchats[3]; ?></a>
                        <a href="confidentialite.php" class="confidentialite"><?= $_pp->sectionAchats[4]; ?></a>
                    </nav>
                </section>
                <section class="apropos">
                    <h3><?= $_pp->sectionAPropos[0]; ?></h3>
                    <nav>
                        <a href="compagnie.php" class="faq"><?= $_pp->sectionAPropos[1]; ?></a>
                        <a href="equipe.php" class="livraison"><?= $_pp->sectionAPropos[2]; ?></a>
                        <a href="emploi.php" class="conditions"><?= $_pp->sectionAPropos[3]; ?></a>
                    </nav>
                </section>
                <section class="coordonnees">
                    <h3><?= $_pp->sectionCoordonnees[0]; ?></h3>
                    <nav>
                        <span><?= $_pp->sectionCoordonnees[1]; ?><b>1 866 888 6666</b></span>
                        <span><?= $_pp->sectionCoordonnees[2]; ?>aide@teetim.ca</span>
                    </nav>
                </section>
            </div>
            <p class="da"><?php echo $_pp->copyright." ".date("Y"); ?></p>
        </footer>
    </div>
    
</body>
</html>