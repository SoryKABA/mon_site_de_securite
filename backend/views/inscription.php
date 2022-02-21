<?php require('../actions/signUpAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
 <?php include('../include/head.php'); ?>
<body>
        <div class="container bg-danger text-light fw-bold my-2 rounded text-center" style="width: 10vw;">
            <?php
                if (!empty($errors)) {
                   ?>
                    <ul>
                        <?php
                            foreach ($errors as $li) {
                                ?>
                                 <li><?= $li; ?></li>
                                <?php
                            }
                        ?>
                    </ul>
                   <?php 
                }
                if (!empty($echec)) {
                    ?>
                      <p class="fw-bold fs-3"><?= $echec;?></p>
                    <?php
                }
            ?>
        </div>
        <div class="bg-success text-light container">
            <?php
                if (!empty($success)) {
                    ?>
                      <p class="fw-bold"><?= $success;?></p>
                    <?php
                }
            ?>
        </div>
    <div class="FormInscription">
       <span id="msg"></span>
       <div class="form-text">Inscription</div>
       <div class="form-saisie container">
           <form action="" method="POST" enctype="multipart/form-data">
               <div class="row gy-2">
                   <div class="col-6">
                    <span>Nom & Prénom :</span>
                        <input type="text" name="nom_complet" placeholder="Tapez le nom complet">
                        <span>E-mail :</span>
                        <input type="email" name="email" placeholder="Tapez l'adresse email">
                   </div>
               </div>
               <div class="row gy-2">
                   <div class="col-6">
                        <span>Téléphone :</span>
                        <input type="text" name="telephone" placeholder="Tapez le numéro de téléphone ">
                        <span>Photo de profil :</span>
                        <input type="file" name="image" placeholder="La photo de profil">
                   </div>
               </div>
               <div class="row gy-2">
                   <div class="col-6">
                        <span>Mot de passe :</span>
                        <input type="password" name="password" placeholder="Tapez le mot de passe">
                        <span>Confirmation de mot de passe :</span>
                        <input type="password" name="confirmation" placeholder="confirmez le mot de passe">
                   </div>
               </div>
               <div class="row gy-3">
                   <div class="col-10">
                        <input type="submit" name="submit_ins" class="btnInscris" value="S'inscrire" id="btn_insc">
                        Vous êtes inscris ?&nbsp <a href="connexion.php">Connectez-vous</a>
                   </div>
               </div>
           </form>
       </div>
   </div>
   <script src="main.js"></script>
</body>
</html>