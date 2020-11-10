<?php require_once(VIEWS_PATH."header.php"); ?>

<div class="bg-dark container rounded p-3">
    <h2 class="text-light">Actualizar Usuario</h2> 
    <div class="container rounded"> 
        <form class="mt-5" action="<?php echo FRONT_ROOT ;?>/User/ChangeProfile" method="POST">
        <div class="row m-auto mb-4">
                <div class="col-md">
                <label class="text-light" for="firstName">Nombre: </label>
                <input class="form-control m-auto" type="text" name="firstName" id="firstName" placeholder="<?php echo $user->getFirstname();?>" required></input>
                </div>
                <div class="col-md">
                <label class="text-light" for="lastName">Apellido: </label>
                <input class="form-control" type="text" name="lastName" id="lastName" placeholder="<?php echo $user->getLastName();?>" required></input>
                </div>
                </div>
                <!--<div class="row my-3 mx-1">
                <div class="col-md">
                 <input type="file" class="form-control" id="image" name="image" multiple>
                </div>
                </div>-->
                <div class="row my-3">
                <div class="col-md">
                <button type="submit" class='btn btn-success  text-light mt-0' value="1">Actualizar</button>
                </div></div>
    </div>
        </form>
    </div>
    <footer>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
</html>