<?php

require('connect.php');

if (isset($_POST['sujet'])) {
    $subject = (String) $_POST["sujet"];
	$comment = (String) $_POST["comment"];
	$query = $bdd->prepare("INSERT INTO comment(sujet, poste) VALUES (?, ?)");
	$query->execute(array($sujet, $comment));
}