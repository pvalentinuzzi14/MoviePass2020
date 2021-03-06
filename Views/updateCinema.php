<main>
	<body class="bodyAdministration">
	<div class="bg-dark container rounded p-3">
    <h2 class="text-light">Actualizar Cine</h2>
            <div class="row m-auto mb-4">
                <div class="col-md">
                    <label class="text-light" for="nameInput">Nombre</label>
                    <input type="text" name="name"  class="form-control m-auto" id="nameInput" disabled placeholder="<?php echo $cinema->getName();?>">
                </div>
                <div class="col-md">
                    <label class="text-light" for="address">Direccion</label>
                    <input type="text" name="address" class="form-control" id="address" disabled placeholder="<?php echo $cinema->getAddress();?>" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="address">Cant Salas</label>
                    <input type="text" name="address" class="form-control" id="address" disabled placeholder="<?php echo $cinema->getRooms();?>" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="openingTime">Apertura</label>
                    <input type="text" name="openingTime" class="form-control m-auto" disabled id="openingTime" placeholder="<?php echo $cinema->getOpeningTime();?>" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="closingTime">Cierre</label>
                    <input type="text" name="closingTime" class="form-control m-auto" disabled id="closingTime" placeholder="<?php echo $cinema->getClosingTime();?>" required>
                </div>
            </div>  
            <div class="row">
                <form class="mt-5" action="<?php echo FRONT_ROOT ;?>/Cinema/updateName" method="POST"> 
                        <input type="hidden" name="updateID" value='<?php echo $cinema->getId(); ?>'>
                        <label class="text-light" for="name">Nombre: </label>
                        <input type="text" name="name" for="name"></input>
                        <button type="submit" class='btn btn-success  text-light mt-0' value="1"> 
                        Actualizar Nombre
                    </button>
                </form>
                <form class="mt-5 ml-5" action="<?php echo FRONT_ROOT ;?>/Cinema/updateAddress" method="POST"> 
                        <input type="hidden" name="updateID" value='<?php echo $cinema->getId(); ?>'>
                        <label class="text-light" for="address">Direccion:</label>
                        <input type="text" name="address" for="address"></input>
                        <button type="submit" class='btn btn-success text-light mt-0' value="1"> 
                        Actualizar Direccion
                    </button>
                </form>
                <form class="mt-5" action="<?php echo FRONT_ROOT ;?>/Cinema/updateOpeningTime" method="POST"> 
                        <input type="hidden" name="updateID" value='<?php echo $cinema->getId(); ?>'>
                        <label class="text-light" for="openingtime">Apertura: </label>
                        <input type="time" name="openingtime" for="openingtime"> </input>
                        <button type="submit" class='btn btn-success  text-light mt-0' value="1"> 
                        Actualizar Apertura
                    </button>
                </form>
                <form class="mt-5 ml-5" action="<?php echo FRONT_ROOT ;?>/Cinema/updateClosingTime" method="POST"> 
                        <input type="hidden" name="updateID" value='<?php echo $cinema->getId(); ?>'>
                        <label class="text-light" for="closingTime">Cierre: </label>
                        <input type="time" name="closingTime" for="closingTime"> </input>
                        <button type="submit" class='btn btn-success  text-light mt-0' value="1"> 
                        Actualizar Cierre
                    </button>
                </form>
            </div>

    </div>   
	</body>
</main>