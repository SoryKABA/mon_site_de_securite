<?php
require "../backend/actions/database.php";
function securite($donnee)
{
    $donnees = htmlspecialchars($donnee);
    $donnees = html_entity_decode($donnee);
    $donnees = trim($donnee);
    return $donnees;
}
if (isset($_POST['valide'])) {
    $sujet = securite($_POST['sujet']);
    $nom_complet = securite($_POST['nom_complet']);
    $email = $_POST['email'];
    $adresse = securite($_POST['adresse']);
    $telephone = $_POST['telephone'];
    $selectionne = $_POST['selectionne'];
    $message = securite($_POST['message']);
    $gmtTimezone =date('H') - 1;
    $date_message = date('d-m-Y, '.$gmtTimezone.':i:s');

    $errors = [];

    if (empty($sujet) || !preg_match("/^[a-zA-Z0-9_éèêëàâäîïùç,.!-_;:?'\ ]+$/", $sujet)) {
        $errors['sujet'] = "Le champ sujet ne doit pas être, si c'est pas le cas, 
        veuillez vérifier que vous n'ayez pas mis un caractère non accepté par le système";
    }
    if (empty($nom_complet)) {
        $errors['nom_complet'] = "Le champ nom complet ne doit pas être vide";
    }elseif (!preg_match("/^[a-zA-Z0-9_éèêëàâäîïùç'\ ]+$/", $nom_complet)) {
        $errors['nom_complet'] = "Le champ contient des caractères que le système n'accèpte pas";
    }
    if (empty($email)) {
        $errors['email'] = "Le champ email ne doit pas être vide ";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Adresse mail non valide ";
    }
    if (empty($telephone)) {
        $errors['telephone'] = "Le champ numéro de téléphone ne doit pas être vide ";
    }elseif (!preg_match("/^[0-9 ]+$/", $telephone)) {
        $errors['telephone'] = "Aucun caractère n'est accepté dans le numéro de téléphone";
    }
    if (empty($selectionne) || $selectionne == "Veuillez selectionner un besoin") {
        $errors['selectionne'] = "Le champ Vos besoins ne doit pas être vide, vous devez selectionner un besoin";
    }if (empty($message) || !preg_match("/^[a-zA-Z0-9_éèêëàâäîïùç,.!-_;:?'\ ]+$/", $message)) {
        $errors['message'] = "Le champ message ne doit pas être vide, 
        veuillez écrire quelque chose de compréhensible ";
    }
    //var_dump($errors);
    if (empty($errors)) {
        $selectNotif = $bdd->prepare("SELECT * FROM notifications WHERE email_client = ?");
        $selectNotif->execute(array($email));
        if ($selectNotif->rowCount() <= 0) {
            $insertNotif = $bdd->prepare("INSERT INTO notifications(sujet, message_status, nom_client, email_client, adresse_client, telephone, choix_client, message, date_message) VALUES
            (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $response = $insertNotif->execute(array($sujet,
                                        1,
                                        $nom_complet,
                                        $email,
                                        $adresse,
                                        $telephone,
                                        $selectionne,
                                        $message,
                                        $date_message));
            $messageResponse = "";
            if ($response) {
                $messageResponse = "Votre message a bien été envoyé ! <br> Merci de bien vouloir patienter nous vous répondrons dès possible";
            }else {
                $messageResponse = "Une erreur s'est produite, veuillez bien vérifier les informations que vous avez rentrées";
            }
            
        }else {
            $messageResponse = "Ce message a déjà été envoyé !";
        }
    }

}