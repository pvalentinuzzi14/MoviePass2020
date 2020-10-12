<nav class="navbar-expand-lg navbar navbar-dark bg-dark mb-5">
  <a class="navbar-brand text-light" href="<?php echo FRONT_ROOT; ?>/Home/Index">Movie Pass 2020</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acciones
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/Movie/GetAll">Listar Peliculas Actuales</a>
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/Cinema/GetAll">Listar Cines</a>
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/Cinema/showAddView">Agregar Cines</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/Login/Index">Login</a>
    </form>
    
   
  </div>
</nav>