<?php
require('database.php');
if (!empty($_GET['id'])) {
    $getId = $_GET['id'];
    
    $userDelete = $bdd->prepare("SELECT * FROM users WHERE id_user = ?");
    $userDelete->execute(array($getId));
    if ($userDelete->rowCount() > 0) {
        $deleteUser = $bdd->prepare("DELETE FROM users WHERE id_user = ?");
        $deleteUser->execute(array($getId));
        if ($deleteUser->execute(array($getId))) {
            header('Location: ../admins/users.php?id='.$_SESSION['id']);
        }
    }
}