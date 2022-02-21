<?php require('../actions/usersAction.php'); ?>
<?php require('../actions/securityAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../../assets/users.css">
<?php include('../include/head.php'); ?>
<body>
    <?php include('../include/navbar.php'); ?>
    
    <section class="table my-5" style="margin: 0px;">
        <div class="container">
        <table class="table table-info table-hover">
            <thead>
                <tr>
                    <th>PROFIL</th>
                    <th>NOM</th>
                    <th>EMAIL</th>
                    <th class="text-uppercase">téléphone</th>
                    <th>MESSAGE</th>
                    <th>SUPPRIMER</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($rows = $selectUser->fetch()) {
                    ?>
                    <tr>
                        <td>
                            <?php if (!empty($rows['picture_user'])) {
                               ?>
                                <img src="../actions/profil_users/<?= $rows['picture_user']; ?>" style="width:70px; height:70px; border-radius:50%;" alt="">
                                <?php
                                } 
                            ?>
                        </td>
                        <td><?= $rows['fullName']; ?></td>
                        <td><?= $rows['email']; ?></td>
                        <td><?= $rows['phone']; ?></td>
                        <td><a href="userMessage.php?id=<?= $rows['id_user']; ?>"><i class="fas fa-sms"></i></a> </td>
                        <td><a href="../actions/deleteUserAction.php?id=<?= $rows['id_user']; ?>" onclick="confirm('Voulez-vous supprimer <?= $rows['fullName']; ?> ?')"><i class="far fa-trash-alt"></i></a> </td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
        </div>
    </section>
    <?php include('../include/barre_laterale.php'); ?>
</body>
</html>