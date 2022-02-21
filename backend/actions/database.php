<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_securite;charset=utf8;', 'root', '');
} catch (Exception $e) {
    die('Erreur de connexion à la base de données '.$e->getMessate());
}