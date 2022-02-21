<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Document</title>
</head>
<body>
    <footer class="container-fluid bg-dark text-light">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-12 col-md-4">
                    <h2 class="mb-0 fw-bold">LOCALITE</h2>
                    <table class="mb-4">
                        <tr>
                            <td><strong>Nantes / Laval et Vendée :</strong> 06 52 83 87 25</td>
                        </tr>
                        <tr>
                            <td><strong>Sarthe :</strong> 06 11 33 78 71</td>
                        </tr>
                        <tr>
                            <td><strong>Angers :</strong> 06 50 18 89 16</td>
                        </tr>
                        <tr>
                            <td><strong>La Rochelle :</strong> 06 51 71 36 52</td>
                        </tr>
                        <tr>
                            <td class="text-wrap"><strong>Siège :</strong> 14 Rue du Clos des chènes 44830 Bouaye</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="mb-0 fw-bold text-uppercase">Renseignements</h2>
                    <p class="fw-light text-wrap me-1">
                        SASUS Au capital de 1000 £/SIRET:
                        894 242 254 00015; APE - 8010Z - 
                        Activités de Sécurité Privée - AUT -
                        044- 2120-03-18-20210777296.
                        Article L612-14- L’autorisation 
                        d’exercice ne confère aucune préro-
                        rogative de puissance publique à
                        l’entreprise ou aux personnes qui 
                        en bénéficient
                    </p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="mb-0 fw-bold text-uppercase">Géo-localisation</h2>
                    <?php include('carte.html'); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid border-top">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-12 col-md-4">
                        <p class="fw-light">loire.s.securite@gmail.com</p>
                    </div>
                    <div class="col-6 col-md-4">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#" class="text-decoration-none text-light" data-bs-toggle="modal" data-bs-target="#mentionsLegales">Mention légale</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="" class="text-decoration-none text-light" data-bs-toggle="tooltip" title="linkedIn">
                                    <i class="fab fa-linkedin fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-decoration-none text-light" data-bs-toggle="tooltip" title="facebook">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-decoration-none text-light" data-bs-toggle="tooltip" title="twitter">
                                    <i class="fab fa-twitter-square fa-2x border-circle"></i>
                                </a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>