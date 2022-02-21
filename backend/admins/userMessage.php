<?php require('../actions/userMessageAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="../../assets/userMessage.css">
    <?php include('../include/head.php'); ?>
<body>
    <?php include('../include/navbar.php'); ?>
    <section class="container">
        <div class="container gy-3">
            <?php
                while ($messagerow = $messageId->fetch()) {
                    if ($messagerow['id_correspondant'] == $getId) {
                    ?>
                    <div class="row">
                        <div class="col align-self-start">
                            <div class="card">
                                <div class="card-header" id="correspondant">
                                    <div class="card-title">
                                        <?php
                                        if (!empty($messagerow['photo_correspondant'])) {
                                        ?>
                                        <img src="../actions/profil_users/<?= $messagerow['photo_correspondant']; ?>" alt="" class="img-fluid circle">
                                        <?php    
                                        }else {
                                            ?>
                                                <?= $messagerow['name_correspondant']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?= $messagerow['name_correspondant']; ?>
                                        <a href="../actions/deleteMessageAction.php?id=<?= $messagerow['id_message'];?>" class="bg-light float-end" onclick="confirm('Êtes-vous sûr de bien vouloir supprimer ce message ?')">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <?= $messagerow['contenu']; ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="float-end">
                                        <?= $messagerow['date_message']; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        if ($messagerow['id_author'] == $_SESSION['id']) {
                        ?>
                        <div class="col align-self-end my-5">
                            <div class="card rounded">
                                <div class="card-header" id="author">
                                    <div class="card-title">
                                    <?php
                                        if (!empty($messagerow['photo_author'])) {
                                        ?>
                                        <img src="../actions/profil_users/<?= $messagerow['photo_author']; ?>" alt="" class="img-fluid circle">
                                        <?php    
                                        }else {
                                            ?>
                                                <?= $messagerow['name_author']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?= $messagerow['name_author']; ?>
                                        <a href="../actions/deleteMessageAction.php?id=<?= $messagerow['id_message'];?>" class="bg-light float-end" onclick="confirm('Êtes-vous sûr de bien vouloir supprimer ce message ?')">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <?= $messagerow['contenu']; ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="float-end">
                                        <?= $messagerow['date_message']; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }
            ?>
        </div>
        <div class="container form">
            <form action="" method="POST">
                <div class="row gy-3">
                    <div class="col-10">
                        <textarea name="message" id="" class="form-control"></textarea>
                    </div>
                    <div class="col-2">
                        <button type="submit" name="validate" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php include('../include/barre_laterale.php'); ?>
</body>
</html>