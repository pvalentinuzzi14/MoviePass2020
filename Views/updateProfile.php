<main>
	<body class="bodyAdministration">
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
                <div class="row my-3">
                <div class="col-md">
                <button type="submit" class='btn btn-success  text-light mt-0' value="1">Actualizar</button>
                </div></div>
    </div>
        </form>
        <p class="text-light">Si desea modificar Usuario o Contraseña <a class="text-light" href="<?php echo FRONT_ROOT ;?>/User/Contact">contactese</a> con nosotros</p>
    </div>
        
	</body>
</main>