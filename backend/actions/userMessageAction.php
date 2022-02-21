<?php
require('../actions/database.php');
if (!empty($_GET['id'])) {
    $getId = $_GET['id'];
    $recepteur = $bdd->prepare("SELECT * FROM users WHERE id_user = ?");
    $recepteur->execute(array($getId));
    if ($recepteur->rowCount() > 0) {
        $infoRecepteur = $recepteur->fetch();
        $nom_recepteur = $infoRecepteur['fullName'];
        $image_recepteur = $infoRecepteur['picture_user'];
        if (isset($_POST['validate'])) {
            if (isset($_POST['message'])) {
                if (!empty($_POST['message'])) {
                    $message = nl2br(htmlspecialchars($_POST['message']));
                    //echo $message;
                    $insertMessage = $bdd->prepare("INSERT INTO messages(contenu, id_author, name_author, photo_author, id_correspondant, name_correspondant, photo_correspondant)
                                                                VALUES(?, ?, ?, ?, ?, ?, ?)");
                    $insertMessage->execute(array($message,
                                                  $_SESSION['id'],
                                                  $_SESSION['nom_complet'],
                                                  $_SESSION['photo'],
                                                  $getId,
                                                  $nom_recepteur,
                                                  $image_recepteur));
                    
                }
            }
        }
        $messageId = $bdd->prepare("SELECT * FROM messages WHERE id_author = ? AND id_correspondant = ? || id_correspondant = ? AND id_author = ?");
        $messageId->execute(array($_SESSION['id'], $getId, $getId, $_SESSION['id']));
    }
    
}