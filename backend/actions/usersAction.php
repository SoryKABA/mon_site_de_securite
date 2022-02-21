<?php
require('../actions/database.php');

$selectUser = $bdd->query("SELECT * FROM users");
