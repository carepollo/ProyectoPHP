<?php
if(!isset($_SESSION["logged"])){
echo '
  <nav class="navbar navbar-expand-lg navbar-light p-3 sticky-top bg-light">
        <a class="navbar-brand" href="index.php">
          <img src="imgs/logoFT.png" alt="logo" class="mx-1">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link navbarfontcolor navbarlinks" href="nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbarfontcolor navbarlinks" href="catalogo.php">Catálogo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbarfontcolor navbarlinks" href="contactenos.php">Contáctenos</a>
            </li>
            <li class="nav-item">
              <button type="button" class="btn nav-link navbarfontcolor navbarlinks" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in"></i> Ingresar</i></button>
            </li>
          </ul>
        </div>
</nav>
';
}
else{
  echo '
  <nav class="navbar navbar-expand-lg navbar-light p-3 sticky-top bg-light">
        <a class="navbar-brand" href="index.php">
          <img src="imgs/logoFT.png" alt="logo" class="mx-1">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link navbarfontcolor navbarlinks" href="nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbarfontcolor navbarlinks" href="adminperfil.php">Catálogo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbarfontcolor navbarlinks" href="contactenos.php">Contáctenos</a>
            </li>
            <li class="nav-item">
              <a type="button" class="btn btn-warning nav-link text-dark rounded-0" href="php/logout.php">Cerrar Sesión</a>
            </li>
          </ul>
        </div>
</nav>
';
}
?>
