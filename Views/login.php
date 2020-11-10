<?php require_once(VIEWS_PATH."header.php"); ?>

<div class="container bg-light p-3 rounded" style="opacity: 0.8">

<header>

    <h1 class="text-center">Login</h1>
      

  <div class="col-sm text-center">         
      <form class="" action="<?php echo FRONT_ROOT;?>/User/Login" method="post" >
      
      <h4 class="text-center text-danger"><?php 
        if (isset($_GET['error']))
        {
            echo "<p>Usuario/Contraseña incorrectos</p>";
        }
      ?></h4>
      
          <div class="form-group"><label for="user">
              Usuario<input type="text" name="user" class="form-control"></label>
            
          </div>
           <div class="form-group"><label for="password">
              Password<input type="password" name="password" class="form-control"></label>
          </div>
        

          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" >
          </div>
          <p>No se encuentra registrado?</p><a class="text-primary" href="<?php echo FRONT_ROOT;?>/User/Register">Registrarse</a>
      </form>
  </div>  
  <footer>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
</html>