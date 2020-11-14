<main>
	<body class="bodyAdministration">
	<div class="bg-dark container rounded p-3">
    <h2 class="text-light">Actualizar Cine</h2>
            <div class="row m-auto mb-4">
                <div class="col-md">
                    <label class="text-light" for="nameInput">Nombre</label>
                    <input type="text" name="name"  class="form-control m-auto" id="nameInput" disabled placeholder="<?php echo $room->getName();?>">
                </div>
                <div class="col-md">
                    <label class="text-light" for="address">Cinema</label>
                    <input type="text" name="address" class="form-control" id="address" disabled placeholder="<?php echo $room->getCinema();?>" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="ticket_price">Precio Ticket</label>
                    <input type="text" name="ticket_price" class="form-control" id="ticket_price" disabled placeholder="<?php echo $room->getTicketPrice();?>" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="Capacidad">Capacidad</label>
                    <input type="text" name="Capacidad" class="form-control m-auto" disabled id="Capacidad" placeholder="<?php echo $room->getCapacity();?>" required>
                </div>
            
            </div>
        <form class="mt-5" action="<?php echo FRONT_ROOT ;?>/Room/updateName" method="POST"> 
                <input type="hidden" name="updateID" value='<?php echo $room->getId(); ?>'>
                <label class="text-light" for="name">Nombre: </label>
                <input type="text" name="name" for="name"></input>
                <button type="submit" class='btn btn-success  text-light mt-0' value="1"> 
                Actualizar Nombre
            </button>
        </form>
        <form class="mt-5" action="<?php echo FRONT_ROOT ;?>/Room/updateCinema" method="POST"> 
                <input type="hidden" name="updateID" value='<?php echo $room->getId(); ?>'>
                <label class="text-light" for="address">Cinema:</label>
                <input type="text" name="address" for="address"></input>
                <button type="submit" class='btn btn-success text-light mt-0' value="1"> 
                Actualizar Cinema
            </button>
        </form>
        <form class="mt-5" action="<?php echo FRONT_ROOT ;?>/Room/updateTicketPrice" method="POST"> 
                <input type="hidden" name="updateID" value='<?php echo $room->getId(); ?>'>
                <label class="text-light" for="openingtime">Precio: </label>
                <input type="number" name="openingtime" for="openingtime" min="100"> </input>
                <button type="submit" class='btn btn-success  text-light mt-0' value="1"> 
                Actualizar Precio
            </button>
        </form>
        <form class="mt-5" action="<?php echo FRONT_ROOT ;?>/Room/updateCapacity" method="POST"> 
                <input type="hidden" name="updateCapacity" value='<?php echo $room->getId(); ?>'>
                <label class="text-light" for="updateCapacity">Cierre: </label>
                <input type="number" name="updateCapacity" for="closingTime" min="10"> </input>
                <button type="submit" class='btn btn-success  text-light mt-0' value="1"> 
                Actualizar Capacidad
            </button>
        </form>
    </div>
        
	</body>
</main>