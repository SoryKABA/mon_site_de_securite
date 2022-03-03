<?php require('../actions/AfficherClientAction.php'); ?>
<?php require('../actions/securityAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('../include/head.php'); ?>
    <link rel="stylesheet" href="../../assets/client.css">
<body>
    <?php include('../include/navbar.php'); ?>
    <div class="container w-75">
        <?php
            while ($message = $select->fetch()) {
                ?>
                    <div class="card my-3 me-5">
                        <div class="card-header">
                            <p class="card-title fw-bold"><strong><i>Sujet :</i></strong> <?= $message['sujet']; ?></p>
                            <p class="card-title"><strong><i>Nom :</i></strong><?= $message['nom_client']; ?> </p>
                            <p class="card-title"><strong><i>Email :</i></strong> <?= $message['email_client']; ?> </p>
                            <p class="card-title"><strong><i>Téléphone :</i></strong> <?= $message['telephone']; ?> </p>
                            <p class="card-title"><strong><i>Besoin :</i></strong> <?= $message['choix_client']; ?> </p>
                            <p class="card-title"><strong><i>Adresse :</i></strong><?= $message['adresse_client']; ?> </p>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= $message['message']; ?> </p>
                        </div>
                        <div class="card-footer">
                            <small class="float-start" data-bs-toggle="tooltip" title="Envoyer message"><a href="clientMessage.php?id=<?= $message['id_notif']; ?>"><i class="fas fa-sms fa-2x"></i></a></small>
                            <small class="float-end card-text"><?= $message['date_message']; ?> </small>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
    <?php include('../include/barre_laterale.php'); ?>
</body>
</html>