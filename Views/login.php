<div class="container bg-light p-3 rounded" style="opacity: 0.8">

<header>

    <h1 class="text-center">Login</h1>
      

  <div class="col-sm text-center">         
      <form class="" action="<?php echo FRONT_ROOT;?>/User/Login" method="post" >
      
      <h4 class="text-center text-danger"><?php 
        if (isset($_GET['error']))
        {
            echo "<p> {$_GET['error']}</p>";
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