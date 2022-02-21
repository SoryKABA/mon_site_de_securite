<?php
require('../actions/database.php');
if (!empty($_GET['id']) AND !empty($_GET['cles'])) {
    $getId = $_GET['id'];
    $getCle = $_GET['cles'];

    $userSelect = $bdd->prepare('SELECT * FROM users WHERE id_user = ? AND cles = ?');
    $userSelect->execute(array($getId, $getCle));
    echo $userSelect->fetch()['fullName'];
    if ($userSelect->rowCount() > 0) {
        $infoUser = $userSelect->fetch();

        if ($infoUser['confirme_keys'] == 0) {
            $updateUser = $bdd->prepare('UPDATE users SET confirme_keys = ? WHERE id_user = ?');
            $updateUser->execute(array(1, $getId));
            $_SESSION['cle'] = $getCle;
            header('Location: ../../views/connexion.php?id='.$getId);
        }else {
            $_SESSION['id'] = $getId;
            $_SESSION['cle'] = $getCle;
            header('Location: ../../views/inscription.php?id='.$getId);
        }
    }
    
}