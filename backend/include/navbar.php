<!DOCTYPE html>
<html lang="en">
<body>
  <header class="py-4">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <a href="" class="navbar-brand text-uppercase fw-bold">
            <span class="bg-primary bg-gradient p-1 rounded-3 text-light">LOIRE SANOUS</span> SECURITE
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Déconnecter</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                    <?php
                      if (!empty($_SESSION['photo'])) { ?> <img src="../actions/profil_users/<?= $_SESSION['photo']; ?>" alt="" style="width:35px; height:35px; border-radius:50%;">  Login<?php
                        
                      }else {
                        ?>Profil
                          <i class="far fa-user" style="width:35px; height:35px;"></i>
                        <?php
                      }
                    ?>
                  </a>
                </li>
            </ul>
        </div> 
      </div>
    </nav>
  </header>  
</body>
</html>