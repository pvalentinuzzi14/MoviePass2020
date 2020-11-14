<nav class="navbar-expand-lg navbar navbar-dark bg-dark mb-5">
  <a class="navbar-brand text-light" href="<?php echo FRONT_ROOT; ?>/Home/Index">
  <img src="<?php echo FRONT_ROOT; ?>/layout/logo.png" alt="logo" height="60rem" class="p-1">
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link text-light" href="<?php echo FRONT_ROOT; ?>/Movie">Pelicula</a> </li>
      <li class="nav-item"><a class="nav-link text-light" href="<?php echo FRONT_ROOT; ?>/Cinema/ShowListView">Cines</a></li>
      <li class="nav-item"><a class="nav-link text-light" href="<?php echo FRONT_ROOT; ?>/User/Contact">Contacto</a> </li>

      <li class="nav-item">

      
      </li>

    </div>
    <form class="form-inline my-0 my-lg-0">
    <?php if(!isset($_SESSION['userName'])){ 
      echo"<a class='dropdown-item text-light item' href=" .FRONT_ROOT. "/login/Index>LOG IN</a>";
    }else if($_SESSION['userRole']==1){?>
      <label class="nav-item dropleft">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['userName'];?>
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/Admin">Administrar</a>
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/User/update">Modificar Perfil</a>
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/Movie/RefreshMovies">Actualizar Peliculas</a>
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/User/logout">Cerrar Sesión</a>
        </div>
      </label> 
    <?php }else{?>
      <label class="nav-item dropleft">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['userName'];?>
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/Movie">Comprar Entradas</a>
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/User/update">Modificar Perfil</a>
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/User/logout">Cerrar Sesión</a>
        </div>
    </label> 
      <?php }?>
    </form>
  </div>
</nav>