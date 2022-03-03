<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<link rel="stylesheet" href="../../assets/barre.css">
<body>
    <section class="section bg-dark">
        <div class="container">
            <ul id="list">
                <li class="active"><a href="#"><i class="fa-light fa-table-columns"></i> Dashboard</a></li>
                <li class="liste"><a class="count" href="../admins/client.php">Clients</a>
                <span class="notif"></span>
            </li>
                <li><a href="../admins/users.php">Employés</a></li>
                <li><a href="../views/inscription.php">Inscrire</a></li>
                <li><a href="#">Matériels</a></li>
            </ul>
        </div>
    </section>
    <script src="../../assets/barre.js"></script>
    <?php require('../../header_footer/index.php'); ?>
</body>
</html>