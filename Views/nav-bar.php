<nav class="navbar-expand-lg navbar navbar-dark bg-dark mb-5">
  <a class="navbar-brand text-light" href="<?php echo FRONT_ROOT; ?>/Home/Index">
  <img src="<?php echo FRONT_ROOT; ?>/layout/logo.png" alt="logo" height="60rem" class="p-1">
</a>
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
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/Cinema/ShowListView">Listar Cines</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <?php if(!isset($_SESSION['userName'])){ 
      echo"<a class='dropdown-item text-light item' href=" .FRONT_ROOT. "/login/Index>LOG IN</a>";
    }else{?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['userName'];?>
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/User/changeProfile">Modificar Perfil</a>
          <a class="dropdown-item text-light item" href="<?php echo FRONT_ROOT; ?>/User/logout">Cerrar Sesión</a>
        </div>
      </li> 
    <?php }?>
    </form>
  </div>
</nav>