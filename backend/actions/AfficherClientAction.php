<?php
require('../actions/database.php');
$select = $bdd->query("SELECT * FROM notifications ORDER BY id_notif DESC");