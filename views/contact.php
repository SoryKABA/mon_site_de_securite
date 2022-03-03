<?php require('../header_footer/message.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Contact</title>
</head>
<body>
    <div>
        <?php include('../header_footer/header.php'); ?>
        <link rel="stylesheet" href="../header_footer/style.css">
    </div>
    <div class="container bg-danger text-white fw-normal rounded w-50 my-2">
        <?php
            if (!empty($errors)) {
                foreach ($errors as $li) {
                    ?>
                        <ul>
                            <li><?= $li; ?> </li>
                        </ul>
                    <?php
                }  
            }
        ?>
    </div>
    <div class="container bg-success w-50 my-3">
        <?php
            if (!empty($messageResponse)) {
                ?>
                    <p class="text-center fw-bold text-white">
                        <?= $messageResponse; ?>
                    </p>
                <?php
            }
        ?>
    </div>
    <section class="my-5" id="contact">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-12 col-md-3 border border-1 align-items-center">
                    <div class="mb-0 mx-5">
                        <i class="fas fa-phone-alt fa-8x bg-light border border-1 rounded-circle"></i>
                        <h2 class="fw-bold">Téléphone</h2>
                        <p class="fw-light">+33 06 52 83 87 25</p>
                    </div>
                    <div class="mb-0 mx-5">
                        <i class="fas fa-envelope fa-8x bg-light border border-1 rounded-circle"></i>
                        <h2 class="fw-bold">E-mail</h2>
                        <p class="fw-light">loire.s.securite@gmail.com</p>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="mb-2 p-3 bg-white">
                        <h1 class="mb-0 fw-bold text-center bg-danger text-white">CONTACTEZ-NOUS</h1>
                        <p class="fw-light fs-5 text-wrap text-center">
                            Si vous avez des questions sur nos services ou si vous souhaitez simplement des informations, 
                            veuillez envoyer votre message via notre page de contact.
                        </p>
                    </div>
                    <div class="mb-2 p-3 bg-white">
                        <form action="" method="POST" id="form_control">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="" class="form-label">Sujet</label>
                                    <input type="text" name="sujet" class="form-control" id="subject">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="" class="form-label">Nom complet</label>
                                    <input type="text" name="nom_complet" class="form-control">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="" class="form-label">Adresse</label>
                                    <input type="text" class="form-control" name="adresse">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="" class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" name="telephone">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="" class="form-label">Vos besoins ?</label>
                                    <select name="selectionne" class="form-select">
                                        <option selected>Veuillez selectionner un besoin</option>
                                        <option value="filtre">Filtre</option>
                                        <option value="gardiennage">Gardiennage et Surveillance</option>
                                        <option value="gestion">Gestion du trafic et alarme</option>
                                        <option value="intervention">Intervention et ronde</option>
                                        <option value="securite">Sécurité incendie (SSIAP)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3">
                                <label for="" class="form-label">Message</label>
                                <textarea name="message" id="message" class="form-control"></textarea>
                            </div> 
                            <div class="d-grid gap-2">
                                <div class="col-12 d-grid gap-3 my-3">
                                    <button class="btn btn-primary btn-lg" type="submit" name="valide">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
        <?php include('footer.php'); ?>
    </div>
    <script src="../header_footer/header.js"></script>
</body>
</html>