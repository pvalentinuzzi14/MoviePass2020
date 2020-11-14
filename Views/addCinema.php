<main>
	<body class="bodyAdministration">
	<div class="bg-dark container rounded p-3">
    <h2 class="text-light">Agregar Cine</h2>

        <form  action="<?php echo FRONT_ROOT; ?>/Cinema/Add" method="POST"> 
            <div class="row m-auto mb-4">
                <div class="col-md">
                    <label class="text-light" for="nameInput">Nombre</label>
                    <input type="text" name="name" class="form-control m-auto" id="nameInput" placeholder="Ingrese un nombre" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="address">Direccion</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Ingrese una direccion" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="openingTime">Apertura</label>
                    <input type="time" name="openingTime" class="form-control m-auto" id="openingTime" placeholder="Ingrese un horario de apertura" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="closingTime">Cierre</label>
                    <input type="time" name="closingTime" class="form-control m-auto" id="closingTime" placeholder="Ingrese un horario de cierre" required>
                </div>
            </div>
            <div class="row align-right p-2">
                <div class="col-md-10"></div>
                <div class="col-md-1">
                <input type="submit" name="submit" class="btn btn-primary m-auto" style="text-align: right;" value="Agregar">
                </div>

            </div>
            
        </form>
	</div>
	</body>
</main>