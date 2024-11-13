<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap-grid.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Affichage des contact</title>

</head>

<body>

    <header class="text-center kl-nav">

        <nav class="navbar navbar-expand-sm kl-nav">

            <div class="container-fluid kl-nav">

              <a class="navbar-brand" href="index.html">

                <img src="mitsinjo/logo-mitsimbina.jpg" alt="Logo" style="width:40px;" class="rounded-pill">

              </a>

          

              <ul class="nav justify-content-center ml-auto">

                <li class="nav-item">

                  <a class="nav-link  " href="index.html">HOME</a>

                </li>

                <li class="nav-item">

                  <a class="nav-link" href="A-props.html">A PROPOS</a>

                </li>

                <li class="nav-item">

                  <a class="nav-link" href="Réalisation.html">REALISATION</a>

                </li>

                <li class="nav-item">

                  <a class="nav-link" href="Contact.html">CONTACT</a>

                </li>

              </ul>

            </div>

          </nav>

          

    </header>
      <div class="cotainer  text-center p-4">
                    
                <?php
                include "Affichage.php"
                ?>
      </div>
    

    <footer class="kl-foot">

        <div class="container text-center">

            <div class="row">

                <div class="col-md-4">

                    <p>Mitsimbina</p> 

                    <p>Antananarivo 101</p>

                </div>

                <div class="col-md-4">

                    <p>

                        <a class="text-white" href="https://www.facebook.com/profile.php?id=100070002064726&amp;sk=about "> 

                           <i class="fab fa-facebook"></i> Les amis de l'école Mitsimbina 

                        </a>

                    </p>

                    <p>

                        <i class="fas fa-envelope"></i> association.ecole.mitsimbina@gmail.com

                    </p>

                </div>

                <div class="col-md-4">

                    <p>

                        <i class="fab fa-linkedin"></i> Les amis de l'école Mitsimbina

                    </p>

                    <p>

                        <i class="fas fa-phone"></i> 0344640412

                    </p>

                </div>

            </div>

        </div>

    </footer>



    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/bootstrap.bundle.js"></script>
    <script>
      // Récupère l'URL de la page actuelle
      var currentPageUrl = window.location.href;

      // Sélectionne tous les liens de la navigation
      var navLinks = document.querySelectorAll('.nav-link');

      // Parcours chaque lien de la navigation
      navLinks.forEach(function(link) {
      // Vérifie si l'URL du lien correspond à l'URL de la page actuelle
      if (link.href === currentPageUrl) {
          // Ajoute la classe "active" au lien correspondant à la page actuelle
          link.classList.add('active');
          }
      });
  </script>

</body>

</html>