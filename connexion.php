<?php 
    // Indiquer la page
    $page = "connexion";
    include("modules/entete.mod.php");
?>
    <main class="page-connexion">
        <article class="amorce">
            <h1><?= $_->titre; ?></h1>
        </article>
        <article class="principal">
            <!-- <p style="color: red;">&ast; Champs obligatoires</p> -->
            <p style="color: red;"><?= $formErrors; ?></p>
            <p style="color: green;"><?= $formLogs; ?></p>
            <form id="formLogin" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <fieldset>
                    <legend><?= $_->formLogin->legende; ?></legend>
                    <input type="hidden" id="formName" name="formName" value="formLogin">

                    <label for="loginEmail"><?= $_->formCommon->labelEmail; ?></label>
                    <input type="email" name="email" id="loginEmail" placeholder="<?= $_->formCommon->placeholderEmail; ?>"><br>

                    <label for="loginPass"><?= $_->formCommon->labelPassword; ?></label>
                    <input type="password" name="password" id="loginPass" placeholder="<?= $_->formCommon->placeholderPassword; ?>"><br>

                    <br><input type="submit" value="<?= $_->formLogin->legende; ?>">
                </fieldset>
            </form>

            <form id="formRegister" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <fieldset>
                    <legend><?= $_->formRegister->legende; ?></legend>
                    <input type="hidden" id="formName" name="formName" value="formRegister">

                    <label for="registerEmail"><?= $_->formCommon->labelEmail; ?></label>
                    <input type="email" name="email" id="registerEmail" placeholder="<?= $_->formCommon->placeholderEmail; ?>"><br>

                    <label for="registerPass"><?= $_->formCommon->labelPassword; ?></label>
                    <input type="password" name="password" id="registerPass" placeholder="<?= $_->formCommon->placeholderPassword; ?>"><br>

                    <label for="registerPassConfirm"><?= $_->formRegister->labelConfirmPassword; ?></label>
                    <input type="password" name="passwordConfirm" id="registerPassConfirm" placeholder="<?= $_->formRegister->placeholderConfirmPassword; ?>"><br>

                    <label for="registerName"><?= $_->formRegister->labelName; ?></label>
                    <input type="text" name="name" id="registerName" placeholder="<?= $_->formRegister->placeholderName; ?>"><br>

                    <br><input type="submit" value="<?= $_->formRegister->legende; ?>">
                </fieldset>
            </form>
        </article>
    </main>
<?php 
// inclure contenu du pied de page ici
include("modules/pied.mod.php"); 
?>