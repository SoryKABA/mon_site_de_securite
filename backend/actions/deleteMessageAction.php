<?php
require('database.php');
if (!empty($_GET['id'])) {
    $getId = $_GET['id'];
    
    $userDelete = $bdd->prepare("SELECT * FROM messages WHERE id_message = ?");
    $userDelete->execute(array($getId));
    if ($userDelete->rowCount() > 0) {
        $deleteUser = $bdd->prepare("DELETE FROM messages WHERE id_message = ?");
        $deleteUser->execute(array($getId));
        if ($deleteUser->execute(array($getId))) {
            header('Location: ../admins/userMessage.php?id='.$_SESSION['id']);
        }
    }
}