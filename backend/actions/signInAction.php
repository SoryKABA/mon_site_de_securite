<?php
require('../backend/actions/database.php');
if (isset($_POST['valider'])) {
    $errors = [];
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $email = $_POST['username'];
        $password = $_POST['password'];
        $selectUser = $bdd->prepare("SELECT * FROM users WHERE email = ?");
        $selectUser->execute(array($email));
        if ($selectUser->rowCount() > 0) {
            $verifyInfo = $selectUser->fetch();
            if (password_verify($password, $verifyInfo['password'])) {
                if ($verifyInfo['confirme_keys'] == 1) {
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $verifyInfo['id_user'];
                    $_SESSION['nom_complet'] = $verifyInfo['fullName'];
                    $_SESSION['email'] = $verifyInfo['email'];
                    $_SESSION['phone'] = $verifyInfo['phone'];
                    $_SESSION['photo'] = $verifyInfo['picture_user'];
                    header('Location: ../backend/admins/users.php?id='.$verifyInfo['id_user']);
                }else {
                    $errors['confirme_keys'] = "Echec d'inscription ";
                }
            }else {
                $errors['password'] = "Mot de passe incorrect";
            }
            
        }else {
            $errors['email'] = "Login incorrect";
        }
    }else {
        echo "Aucun champ ne doit être vide ";
    }
}