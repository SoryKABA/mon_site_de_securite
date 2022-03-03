<?php require('../actions/clientMessageAction.php'); ?>
<?php require('../actions/securityAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('../include/head.php'); ?>
    <!-- <link rel="stylesheet" href="../../assets/client.css"> -->
<body>
    <div class="container w-50 bg-danger">
        
    </div>
    <div class="container w-50 bg-success">
        <?php
        if (!empty($error)) {
            ?>
                <p class="text-white fw-bold">
                    <?= $error; ?>
                </p>
            <?php
        }
        ?>
    </div>
    <?php include('../include/navbar.php'); ?>
    <div class="container w-75 h-50 float-end my-5">
        <form action="" method="POST" class="my-3 w-75" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-12">
                    <label for="" class="form-label">Sujet</label>
                    <input type="text" class="form-control input" name="sujet">
                </div>
            </div>
            <div class="mb-3 form-floating my-3">
                <label for="" class="form-label">Ecrire message</label>
                <textarea name="message" placeholder="Ecrire message" class="form-control input" cols="30" rows="30"></textarea>
            </div>
            <div class="row g-3">
                <div class="col-4">
                    <input type="file" class="form-control" name="fichier">
                </div>
                <div class="col-8">
                    <button class="btn btn-primary" name="button">ENVOYER</button>
                </div>
            </div>
        </form>
    </div>
    <?php include('../include/barre_laterale.php'); ?>
    <script src="../../assets/users.js"></script>
</body>
</html>