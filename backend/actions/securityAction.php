<?php

if (!$_SESSION['auth']) {
    header('Location: ../../views/connexion.php');
}