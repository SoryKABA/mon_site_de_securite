<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gelasio:ital@1&display=swap" rel="stylesheet">
    <title>En-tête</title>
</head>
<body>
    <header class="container-fluid header">
        <div class="container-fluid child" data-add="28.7125">
            <div class="logo mb-5 mx-3">
                <span class="bg bg-danger">L</span><span class="bg bg-primary">2S</span>
                <p>Loire sanous securite</p>
            </div>
            <ul class="list">
                <li class="list-item active"><a href="../views/home.php">Accueil</a></li>
                <li class="list-item"><a href="../views/about.php">A propos</a></li>
                <li class="list-item"><a href="../views/service.php">Services</a></li>
                <li class="list-item"><a href="../views/contact.php">Contactez-nous</a></li>
                <li class="list-item media" id="media">
                    <span class="lien"><a href="#"><i class="fab fa-facebook-square"></i></a></span>
                    <span class="lien"><a href="#"><i class="fab fa-twitter-square"></i></a></span>
                    <span class="lien"><a href="#"><i class="fab fa-linkedin"></i></a></span>
                </li>
            </ul>
            <div class="icon">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <div class="container">
            <h1 class="fs-2">Votre partenaire de protection</h1>
            <p>Efficacité, rapidité et qualité de service <br>
            <span class="text-center">A votre service 7j/7 24h/24</span></p>
            <div class="mb-3">
                <button>
                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#infoProjet1"
                    aria-controls="infoProjet1">Voir plus</a>
                </button>
            </div>
        </div>
        <div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="infoProjet1" aria-labelledby="titelProjet1">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="titelProjet1">
                    <h4 class="fw-bold text-danger text-start border-0">LOIRE SANOUS SECURITE</h4>
                </h5>
                <button type="button" class="btn-close btn-lg text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
                <div class="offcanvas-body">
                    <div class="container-fluid">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <h2 class="bg-danger fw-bold text-white text-uppercase">votre sécurité c'est maintenant</h2>
                                <p class="fw-light text-wrap fs-2">
                                    Notre priorité est de prévenir votre sécurité et celle de vos biens.
                                    Travaillons ensemble pour votre sécurité. Avec L2S sûrté, plus vite, plus sûr <br>
                                    <span class="text-danger"> <strong>LOIRE SANOUS SECURITE</strong></span> met à vos 
                                    services une équipe de professionnels qualifiés en fonction de votre demande. Tous nos 
                                    agents ont la carte professionnelle et se conforment au respect des dispositions législatives
                                    et réglementaires, notamment les activités privées de sécurité.
                                </p>
                            </div>
                            <div class="col-12 col-md-6">
                                <img src="../images/logo.jpeg" alt="" class="img-fluid rounded shadow">
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </header>
</body>
</html>