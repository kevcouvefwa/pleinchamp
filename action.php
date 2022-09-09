<?php
//INFO CONNEXION API ODOO
$url = 'https://federation-wallonne-agriculture-staging-5246360.dev.odoo.com';
$db = 'federation-wallonne-agriculture-staging-5246360';
$username = 'api@fwa.be';
$password = 'Fwa%Api957*';
require_once('ripcord/ripcord.php');


////////////////////////////////////
//VALEURS DES INPUT FORMULAIRE & CONNEXION A L'API ODOO + QUERY
////////////////////////////////////


if (isset($_POST['submit'])) {
    $rubrique = $_POST['rubrique'];
    $annonce = $_POST['priceLine'];
    $annonce1 = $_POST['priceLine1'];
    $annonce2 = $_POST['priceLine2'];
    $annonce3 = $_POST['priceLine3'];
    $annonce4 = $_POST['priceLine4'];
    $parution = $_POST['parution'];
    $facture = $_POST['facture'];
    $societe = $_POST['société'];
    $tva = $_POST['tva'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prénom'];
    $rue = $_POST['rue'];
    $numero = $_POST['numéro'];
    $cp = $_POST['CP'];
    $localite = $_POST['localité'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];

    /*
     * QUERY
     */

    // Connexion
    $connexion = ripcord::client($url . '/xmlrpc/2/common');

    $uid = $connexion->authenticate($db, $username, $password, array());

    // Appel des méthodes Odoo
    $models = ripcord::client("$url/xmlrpc/2/object");

    // Id User Guy
    $guyId = 6;
    // Team id
    $teamId = 24;
    // Label Id
    $labelId = 3;
    //Société Fédération
    $society = 3;
    // Date de création
    $now = new DateTime('now');
    // Description annonce
    $description = $annonce ."\r" . $annonce1 . "\r" . $annonce2 . "\r" . $annonce3 . "\r" . $annonce4;

    //Creation ticket petite annonce
    $id = $models->execute_kw($db, $uid, $password, 'helpdesk.ticket', 'create', array(array(
        'name' => "Nouvelle annonce",
        'team_id' => $teamId, //ManyToOne Relation
        //'user_id' => $guyId, // ManyToOne Relation
        // (tag)- ManyToMany Relation
        'company_id' => $society,
        'create_date' => $now,
        'partner_email' => $mail,
        'description' => $description
    )));
}


////////////////////////////////////
//FACTURATION / CALCUL DU RECAPITULATIF DE PAIEMENT
////////////////////////////////////


// Calcul du forfait des lignes supplémentaires du formulaire

if (!empty($_POST['priceLine1']) and empty($_POST['priceLine2'] and $_POST['priceLine3'] and $_POST['priceLine4'])) {
    $priceLines = (number_format(1.5, 2));
}
if (!empty($_POST['priceLine1'] and $_POST['priceLine2']) and empty($_POST['priceLine3'] and $_POST['priceLine4'])) {
    $priceLines = (number_format(3, 2));
}
if (!empty($_POST['priceLine1'] and $_POST['priceLine2'] and $_POST['priceLine3']) and empty($_POST['priceLine4'])) {
    $priceLines = (number_format(4.5, 2));
}
if (!empty($_POST['priceLine1'] and $_POST['priceLine2'] and $_POST['priceLine3'] and $_POST['priceLine4'])) {
    $priceLines = (number_format(6, 2));
}


//Quantité des lignes supplémentaires utilisées

$annonces = [$annonce1, $annonce2, $annonce3, $annonce4];

$val = null;

foreach ($annonces as $key => $value) {
    if (!empty($value)) {
        $val++;
        $qte = number_format($val, 2);
    }
}

// Facturation de 2.50 si checked

$bill = null;

if (!empty($_POST['facture'])) {
    $bill = (number_format(2.5, 2));
}

//Total pour une parution
$basicLinesPrice = 6;
$subTotal = number_format($basicLinesPrice + $priceLines + $bill, 2);


// Nombre de parutions
$nbrParution = (number_format($parution, 2));

// Total à payer
$total = (number_format($subTotal * $nbrParution, 2));


////////////////////////////////////
//UPLOAD FILE
////////////////////////////////////


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Check file size
if ($_FILES["file"]["size"] > 1000000) {
    echo "Désolé, le fichier est trop gros.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf") {
    $uploadOk = 0;
}


