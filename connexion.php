<?php 
    // Indiquer la page
    $page = "connexion";
    include("modules/entete.mod.php");
?>
    <main class="page-connexion">
        <article class="amorce">
            <h1><?= $obj_page->titre; ?></h1>
        </article>
        <article class="principal">
            <!-- <p style="color: red;">&ast; Champs obligatoires</p> -->
            <p style="color: red;"><?= $formErrors; ?></p>
            <p style="color: green;"><?= $formLogs; ?></p>
            <form id="formLogin" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <fieldset>
                    <legend><?= $obj_page->formLogin->legende; ?></legend>
                    <input type="hidden" id="formName" name="formName" value="formLogin">

                    <label for="loginEmail"><?= $obj_page->formCommon->labelEmail; ?></label>
                    <input type="email" name="email" id="loginEmail" placeholder="<?= $obj_page->formCommon->placeholderEmail; ?>"><br>

                    <label for="loginPass"><?= $obj_page->formCommon->labelPassword; ?></label>
                    <input type="password" name="password" id="loginPass" placeholder="<?= $obj_page->formCommon->placeholderPassword; ?>"><br>

                    <br><input type="submit" value="<?= $obj_page->formLogin->legende; ?>">
                </fieldset>
            </form>

            <form id="formRegister" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <fieldset>
                    <legend><?= $obj_page->formRegister->legende; ?></legend>
                    <input type="hidden" id="formName" name="formName" value="formRegister">

                    <label for="registerEmail"><?= $obj_page->formCommon->labelEmail; ?></label>
                    <input type="email" name="email" id="registerEmail" placeholder="<?= $obj_page->formCommon->placeholderEmail; ?>"><br>

                    <label for="registerPass"><?= $obj_page->formCommon->labelPassword; ?></label>
                    <input type="password" name="password" id="registerPass" placeholder="<?= $obj_page->formCommon->placeholderPassword; ?>"><br>

                    <label for="registerPassConfirm"><?= $obj_page->formRegister->labelConfirmPassword; ?></label>
                    <input type="password" name="passwordConfirm" id="registerPassConfirm" placeholder="<?= $obj_page->formRegister->placeholderConfirmPassword; ?>"><br>

                    <label for="registerName"><?= $obj_page->formRegister->labelName; ?></label>
                    <input type="text" name="name" id="registerName" placeholder="<?= $obj_page->formRegister->placeholderName; ?>"><br>

                    <br><input type="submit" value="<?= $obj_page->formRegister->legende; ?>">
                </fieldset>
            </form>
        </article>
    </main>
<?php 
// inclure contenu du pied de page ici
include("modules/pied.mod.php"); 
?>