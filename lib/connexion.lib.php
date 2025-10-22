<?php

// variables pour les champs du formulaire, erreurs, de travail et validation
$formName = $formErrors = $formLogs = "";
$registerExclusive = ['passwordConfirm', 'name'];
$fields = [
    'email' => '', 
    'password' => '', 
    'passwordConfirm' => '', 
    'name' => ''
];
$isConnected = false;
$userName = '';

// fichier json pour stocker comptes enregistres
$dataAccounts = new stdClass();
if(file_exists('data/accounts.json')) $dataAccounts = json_decode(file_get_contents('data/accounts.json'));
// var_dump($dataAccounts);

// traitement du formulaire
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // print_r($_POST);
    $formName = $_POST['formName'];

    // validation des champs
    foreach($fields as $key => $value){
        // nettoyage des champs
        if(empty($_POST[$key])){
            if(in_array($key, $registerExclusive) && $formName == 'formLogin'){
                // echo 'special';
                $fields[$key] = $value = null;
            }else{
                if($formErrors == '') $formErrors = 'Tous les champs sont obligatoires.<br>';
            }
        }else{
            $fields[$key] = $value = cleanField($_POST[$key]);
        }
        // var_dump($fields[$key]);
        // var_dump($value);

        // validation du email
        if($key == 'email'){
            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                $formErrors.='Le e-mail est mal formatté.<br>';
            }
        }

        // validation du mot de passe
        if($key == 'passwordConfirm' && $formName == 'formRegister'){
            if($fields['password'] !== $value){
                $formErrors.='La confirmation du mot de passe a échoué.<br>';
            }
            if(strlen($fields['password']) < 8){
                $formErrors.='Le mot de passe doit contenir au moins 8 caractères.<br>';
            }
        }

        // validation du nom
        if($key == 'name' && $formName == 'formRegister'){
            // echo 'valider nom';
            if(!preg_match("/^[a-zA-Z-' ]*$/", $value)){
                $formErrors.='Seulement les lettres et espaces sont permis dans le champ <i>\'Nom complet\'</i>.<br>';
            }
        }
    }
    // var_dump($fields);
    // var_dump($formErrors);

    if($formErrors === ''){
        // creation et enregistrement du compte dans db
        if($formName == 'formRegister'){
            [$formErrors, $formLogs] = setAccount($fields, $dataAccounts, $formErrors, $formLogs);
        }

        // recherche compte dans db
        if($formName == 'formLogin'){
            [$formErrors, $formLogs] = getAccount($fields, $dataAccounts, $formErrors, $formLogs);
        }
    }
    // setAccount($fields, $dataAccounts, $formErrors, $formLogs);
}


/*
    * Nettoie les données d'entrée des caractères non voulus
    * 
    * @param string $data Données à nettoyer
    * 
    * @return string Données nettoyées
    */
function cleanField($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


/**
 * Crée un compte et l'ajoute au fichier JSON
 * 
 * @param array $data Données du formulaire
 * @param object $file Contenu du fichier JSON
 * @param string $errors Chaîne pour accumuler les messages d'erreur
 * @param string $logs Chaîne pour accumuler les messages de log
 * 
 * @return array Tableau contenant les chaînes mises à jour des erreurs et des logs
 */
function setAccount($data, $file, $errors, $logs){
    $account = new stdClass();
    // var_dump($account);
    $accountKey = $data['email'];
    $account -> password = password_hash($data['password'], PASSWORD_BCRYPT);
    $account -> name = $data['name'];
    // var_dump($account);
    // var_dump($file);

    if(!isset($file -> $accountKey)){
        $file -> $accountKey = $account;
    }else{
        $errors.='Cette adresse couriell est déjà enregistrée.<br>';
        return;
    }
    // var_dump($file);

    if(file_put_contents('data/accounts.json', json_encode($file, JSON_PRETTY_PRINT)) != false){
        $logs.='Compte enregistré.<br>';
        // echo 'account added';
    }else{
        $errors.='Une erreur s\'est produite pendant l\'enregistrement du compte.<br>';
    }

    // return [$errors, $logs];
    return getAccount($data, $file, $errors, $logs);
}


/**
 * Récupère un compte à partir du fichier JSON et vérifie les informations d'identification
 * 
 * @param array $data Données du formulaire
 * @param object $file Contenu du fichier JSON
 * @param string $errors Chaîne pour accumuler les messages d'erreur
 * @param string $logs Chaîne pour accumuler les messages de log
 * 
 * @return array Tableau contenant les chaînes mises à jour des erreurs et des logs
 */
function getAccount($data, $file, $errors, $logs){
    // var_dump($data);
    // var_dump($file);
    $accountKey = $data['email'];
    global $isConnected, $userName;

    if(isset($file -> $accountKey)){
        if(password_verify($data['password'], $file -> $accountKey -> password)){
            $logs.='Connexion réussie.<br>';
            setcookie('isConnected', true);
            $isConnected = true;
            setcookie('userName', $file -> $accountKey -> name);
            $userName = $file -> $accountKey -> name;
        }else{
            $errors.='Mot de passe invalide.<br>';
        }
    }else{
        $errors.='Ce compte n\'existe pas.<br>';
    }

    return [$errors, $logs];
}
?>