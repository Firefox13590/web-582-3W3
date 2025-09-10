        <footer>
            <h2><?= $obj_pied->titreFooter; ?></h2>
            <div class="contenu">
                <section class="achats">
                    <h3><?= $obj_pied->sectionAchats[0]; ?></h3>
                    <nav>
                        <a href="faq.php" class="faq"><?= $obj_pied->sectionAchats[1]; ?></a>
                        <a href="livraison.php" class="livraison"><?= $obj_pied->sectionAchats[2]; ?></a>
                        <a href="conditions.php" class="conditions"><?= $obj_pied->sectionAchats[3]; ?></a>
                        <a href="confidentialite.php" class="confidentialite"><?= $obj_pied->sectionAchats[4]; ?></a>
                    </nav>
                </section>
                <section class="apropos">
                    <h3><?= $obj_pied->sectionAPropos[0]; ?></h3>
                    <nav>
                        <a href="compagnie.php" class="faq"><?= $obj_pied->sectionAPropos[1]; ?></a>
                        <a href="equipe.php" class="livraison"><?= $obj_pied->sectionAPropos[2]; ?></a>
                        <a href="emploi.php" class="conditions"><?= $obj_pied->sectionAPropos[3]; ?></a>
                    </nav>
                </section>
                <section class="coordonnees">
                    <h3><?= $obj_pied->sectionCoordonnees[0]; ?></h3>
                    <nav>
                        <span><?= $obj_pied->sectionCoordonnees[1]; ?><b>1 866 888 6666</b></span>
                        <span><?= $obj_pied->sectionCoordonnees[2]; ?>aide@teetim.ca</span>
                    </nav>
                </section>
            </div>
            <p class="da"><?php echo $obj_pied->copyright." ".date("Y"); ?></p>
        </footer>
    </div>
    
</body>
</html>